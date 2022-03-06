<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datasatwa extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->Model('DatasatwaModel','Model');
		$this->load->library('pagination');
	}

	public function index()
	{	
		//pagination
		$config['base_url'] = 'http://localhost/webgis/index.php/datasatwa/index';
		$config['total_rows'] = $this->Model->countAll();
		$config['per_page'] = 5;

		//pagination-style
		$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

		//SEARCHING
		if($this->input->post('submit')){
			$datacontent['keyword'] = $this->input->post('keyword');
			$this->session->set_userdata('keyword', $datacontent['keyword']);
		} else {
			$datacontent['keyword'] = $this->session->userdata('keyword');
		}

		$this->db->like('nama_satwa', $datacontent['keyword']);
		$this->db->from('m_deskripsi');
		$config['total_rows'] = $this->db->count_all_results();
		$datacontent['total_rows'] = $config['total_rows'];

		//initialize
		$this->pagination->initialize($config);
		
		$datacontent['url']='datasatwa';
		$datacontent['title']='Data Satwa';
		// $datacontent['datatable']=$this->Model->get();
		$datacontent['pagination'] = $this->pagination->create_links();
		$datacontent['start'] = $this->uri->segment(3);
		$datacontent['datasatwa'] = $this->Model->getDeskripsi($config['per_page'],$datacontent['start'],$datacontent['keyword']);
		$data['content']=$this->load->view('data/datasatwaView',$datacontent,TRUE);
		$data['title']='Data Satwa';	
		$this->load->view('layout/html',$data);
	}

	public function form($parameter='',$id='')
	{	
		$datacontent['url']='datasatwa';
		$datacontent['parameter']=$parameter;
		$datacontent['id']=$id;
		$datacontent['title']='Form Deskripsi';
		$data['content']=$this->load->view('form/formdeskripsi',$datacontent,TRUE);
		$data['title']='Data Deskripsi';	
		$this->load->view('layout/html',$data);
	}

	public function simpan()
	{
		if($this->input->post('simpan')){
			$data=[
				'nama_satwa'=>$this->input->post('nama_satwa'),
				'nama_lain'=>$this->input->post('nama_lain'),
                'nama_latin'=>$this->input->post('nama_latin'),
                'status_IUCN'=>$this->input->post('status_IUCN'),
				'kontak'=>$this->input->post('kontak'),
                'rujukan_peta'=>$this->input->post('rujukan_peta'),
				'tanggal_upload'=>$this->input->post('tanggal_upload'),

			];

			// upload
            if($_FILES['file_pdf']['name']!=''){
				$upload=upload('file_pdf','pdf');
				if($upload['info']==true){
					$data['file_pdf']=$upload['upload_data']['file_name'];
				}
				elseif($upload['info']==false){
					$info='<div class="alert alert-danger alert-dismissible">
	            		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	            		<h4><i class="icon fa fa-ban"></i> Error!</h4> '.$upload['message'].' </div>';
					$this->session->set_flashdata('info',$info);
					redirect('datasatwa');
					exit();
				}
			}

			// upload

			if($_POST['parameter']=="tambah"){
				$this->Model->insert($data);
			}
			else{
				$this->Model->update($data,['id_deskripsi'=>$this->input->post('id_deskripsi')]);
			}

		}

		redirect('datasatwa');
	}
	public function hapus($id=''){
		// hapus file di dalam folder
		$this->db->where('id_deskripsi',$id);
		$get=$this->Model->get()->row();
		$file_geojson=$get->file_geojson;
		unlink('assets/unggah/geojson'.$file_geojson);
		// end hapus file di dalam folder
		$this->Model->delete(["id_deskripsi"=>$id]);
		redirect('datasatwa');
	}

	public function pdf(){
		
	}

}



