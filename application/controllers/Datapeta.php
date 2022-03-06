<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datapeta extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->Model('DatapetaModel','Model');
		$this->load->library('pagination');
	}

	public function index()
	{	
	
		//pagination
		$config['base_url'] = 'http://localhost/webgis/index.php/datapeta/index';
		// $config['total_rows'] = $this->Model->countAll();
		
		$config['per_page'] = 8;

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
		$this->db->from('m_peta');
		$config['total_rows'] = $this->db->count_all_results();
		$datacontent['total_rows'] = $config['total_rows'];

		//initialize
		$this->pagination->initialize($config);

		$datacontent['url']='datapeta';
		$datacontent['title']='Data Peta';
		// $datacontent['datatable']=$this->Model->get();
		$datacontent['pagination'] = $this->pagination->create_links();
		$datacontent['start'] = $this->uri->segment(3);
		$datacontent['datapeta'] = $this->Model->getPeta($config['per_page'],$datacontent['start'],$datacontent['keyword']);
		$data['content']=$this->load->view('data/datapetaView',$datacontent,TRUE);
		$data['title']='Data Peta';
		$this->load->view('layout/html',$data);

	}

	public function form($parameter='',$id='')
	{	
		$datacontent['url']='datapeta';
		$datacontent['parameter']=$parameter;
		$datacontent['id']=$id;
		$datacontent['title']='Form Peta';
		$data['content']=$this->load->view('form/formpeta',$datacontent,TRUE);
		$data['title']='Data Peta';	
		$this->load->view('layout/html',$data);
	}

	public function simpan()
	{
		if($this->input->post('simpan')){
			$data=[
				'nama_satwa'=>$this->input->post('nama_satwa'),
				'warna'=>$this->input->post('warna'),
				'tanggal_upload'=>$this->input->post('tanggal_upload'),
			];

			// upload
			if($_FILES['file_geojson']['name']!=''){
				$upload=upload('file_geojson','geojson');
				if($upload['info']==true){
					$data['file_geojson']=$upload['upload_data']['file_name'];
				}
				elseif($upload['info']==false){
					$info='<div class="alert alert-danger alert-dismissible">
	            		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	            		<h4><i class="icon fa fa-ban"></i> Error!</h4> '.$upload['message'].' </div>';
					$this->session->set_flashdata('info',$info);
					redirect('datapeta');
					exit();
				}
			}

			// upload

			if($_POST['parameter']=="tambah"){
				$this->Model->insert($data);
			}
			else{
				$this->Model->update($data,['id_peta'=>$this->input->post('id_peta')]);
			}

		}

		redirect('datapeta');
	}
	public function hapus($id=''){
		// hapus file di dalam folder
		$this->db->where('id_peta',$id);
		$get=$this->Model->get()->row();
		$file_geojson=$get->file_geojson;
		unlink('assets/unggah/geojson'.$file_geojson);
		// end hapus file di dalam folder
		$this->Model->delete(["id_peta"=>$id]);
		
		redirect('datapeta');
	}

	//pagination
	
	public function lihatpdf($id_peta='$id_peta')
	{
		$data['lihatpdf'] = $this->Model->get_pdf($id_peta);
		var_dump($data);
		die();

		$this->load->view('layoutuser/pdf',$data);
	}
}



