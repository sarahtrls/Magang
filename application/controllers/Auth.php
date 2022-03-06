<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('userModel','Model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->form_validation->set_rules('username','Username','trim|required');
		$this->form_validation->set_rules('password','Password','trim|required');
		
		if($this->form_validation->run() == false){

			$datacontent['url']='Silahkan Login Terlebih Dahulu';
			$datacontent['title']='Laman Masuk';
			// $datacontent['datatable']=$this->Model->get();
			$data['content']=$this->load->view('layoutuser/loginView',$datacontent,TRUE);
			$data['title']=$datacontent['title'];
			$this->load->view('layoutuser/htmlLogin',$data);
		} else {
			$this->_login();
		}
	}
	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user=$this->db->get_where('m_user', ['username'=> $username])->row_array();

		if($user){
			if($user['is_active']== 1){
				if(password_verify($password, $user['password']))
				{
					$data = [
						'user' =>$user['username'],
						'role' =>$user['role']
					];
					$this->session->set_userdata($data);

					if($user['role'] == 1) {
						redirect('datapeta');
					} else {
						redirect('beranda/after');
					}

				} else {
				$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
				Password salah </div>');
				redirect('auth');
				}
			}
		}else{
			$this->session->set_flashdata('message','<div class="alert alert-danger" role="alert">
			Akun belum terdaftar</div>');
			redirect('auth');
			}
	}
	public function register()
	{
		$this->form_validation->set_rules('username','Username','required|trim|is_unique[m_user.username]',[
		 'is_unique' =>'Username sudah digunakan']);
		$this->form_validation->set_rules('password','Password','required|trim|min_length[3]');
		$this->form_validation->set_rules('nip','Nip','trim|is_unique[m_user.nip]',[
		 'is_unique' =>'NIP sudah digunakan']);
		$this->form_validation->set_rules('email','Email','required|trim|valid_email');

		if($this->form_validation->run() == false){

			$datacontent['url']='Register | User';
			$datacontent['title']='Register | User';
			// $datacontent['datatable']=$this->Model->get();
			$data['content']=$this->load->view('layoutuser/registerView',$datacontent,TRUE);
			$data['title']=$datacontent['title'];
			$this->load->view('layoutuser/htmlRegister',$data);
		} else {
			$data = [
				'username' => $this->input->post('username'),
				'password' => password_hash($this->input->post('password'),PASSWORD_DEFAULT),
				'email' => $this->input->post('email'),
				'status' => $this->input->post('status'),
				'nip' => $this->input->post('nip'),
				'nama_instansi' => $this->input->post('nama_instansi'),
				'role' =>2,
				'is_active' =>1,
				'date_created' =>date()
			];
			$this->db->insert('m_user',$data);
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
			Akun telah berhasil dibuat, silahkan masuk</div>');
			redirect('auth');
	    }
	}
	public function logout ()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">
			Anda berhasil keluar </div>');
			redirect('auth');
	}
}
