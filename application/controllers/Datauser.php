<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datauser extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->Model('UserModel','Model');
		$this->load->library('pagination');
	}

	public function index()
	{	
	
		//pagination
		$config['base_url'] = 'http://localhost/webgis/index.php/datauser/index';
		// $config['total_rows'] = $this->Model->countAll();
		
		$config['per_page'] = 10;

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

		$this->db->like('username', $datacontent['keyword']);
		$this->db->from('m_user');
		$config['total_rows'] = $this->db->count_all_results();
		$datacontent['total_rows'] = $config['total_rows'];

		//initialize
		$this->pagination->initialize($config);

		$datacontent['url']='datauser';
		$datacontent['title']='Data User';
		// $datacontent['datatable']=$this->Model->get();
		$datacontent['pagination'] = $this->pagination->create_links();
		$datacontent['start'] = $this->uri->segment(3);
		$datacontent['datauser'] = $this->Model->getUser($config['per_page'],$datacontent['start'],$datacontent['keyword']);
		$data['content']=$this->load->view('data/datauserView',$datacontent,TRUE);
		$data['title']='Data User';
		$this->load->view('layout/html',$data);

	}
    public function form($parameter='',$id='')
	{	
		$datacontent['url']='datauser';
		$datacontent['parameter']=$parameter;
		$datacontent['id']=$id;
		$datacontent['title']='Form User';
		$data['content']=$this->load->view('form/formuser',$datacontent,TRUE);
		$data['title']='Data User';	
		$this->load->view('layout/html',$data);
	}
	public function simpan()
	{
		if($this->input->post('simpan')){
			$data=[
				'username'=>$this->input->post('username'),
                'email'=>$this->input->post('email'),
                'status'=>$this->input->post('status'),
                'nama_instansi'=>$this->input->post('nama_instansi'),
                'role'=>$this->input->post('role'),

			];

			if($_POST['parameter']=="tambah"){
				$this->Model->insert($data);
			}
			else{
				$this->Model->update($data,['id_user'=>$this->input->post('id_user')]);
			}

		}

		redirect('datauser');
	}
	public function hapus($id=''){
		// hapus file di dalam folder
		$this->db->where('id_user',$id);
		$get=$this->Model->get()->row();
		$this->Model->delete(["id_user"=>$id]);
		
		redirect('datauser');
	}

	//pagination
	


}



