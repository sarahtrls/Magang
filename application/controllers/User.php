<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
		$this->load->model('DatasatwaModel');
		$this->load->model('DatapetaModel','Model');
		$this->load->library('pagination');
	}

	public function index()
	{
		//pagination
		$config['base_url'] = 'http://localhost/webgis/index.php/user/index';
		$config['total_rows'] = $this->Model->countAll();
		$config['per_page'] = 4;

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

		//initialize
		$this->pagination->initialize($config);

		$datacontent['url']='Maps User';
		$datacontent['title']='Maps User';
		$datacontent['pagination'] = $this->pagination->create_links();
		$datacontent['start'] = $this->uri->segment(3);
		$datacontent['datasatwa'] = $this->DatasatwaModel->getDeskripsi($config['per_page'],$datacontent['start'],$datacontent['keyword']);
		$datacontent['datapeta']=$this->Model->get();
		// $datacontent['datatable']=$this->Model->get();
		$data['content']=$this->load->view('peta/mapsUser',$datacontent,TRUE);
		$data['js']=$this->load->view('peta/js/mapjs',$datacontent,TRUE);
		$data['title']=$datacontent['title'];
		$this->load->view('layoutuser/userAfter',$data);
		
	}
	public function desk(){
		$datacontent['url']='Maps User';
		$datacontent['title']='Maps User';
		// $datacontent['pagination'] = $this->pagination->create_links();
		// $datacontent['start'] = $this->uri->segment(3);
		// $datacontent['datasatwa'] = $this->DatasatwaModel->getDeskripsi($config['per_page'],$datacontent['start'],$datacontent['keyword']);
		// $datacontent['datapeta']=$this->Model->get();
		$datacontent['datadesk']=$this->DatasatwaModel->findOne();
		$data['content']=$this->load->view('layoutuser/deskUser',$datacontent,TRUE);
		$data['title']=$datacontent['title'];
		$this->load->view('layoutuser/htmlDesk',$data);
	}
}