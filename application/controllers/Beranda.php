<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	// public function index()
	// {
	// 	$datacontent['title']='Halaman Beranda';
	// 	$data['content']=$this->load->view('berandaView.php',$datacontent,TRUE);
	// 	$data['title']='Dashboard | admin';	
	// 	$this->load->view('layout/html',$data);
	// }

	public function index()
	{
		$datacontent['title']='Selamat Datang';
		$data['content']=$this->load->view('berandaUser.php',$datacontent,TRUE);
		$data['title']='Selamat Datang di SIGSESAL';	
		$this->load->view('layoutuser/htmlUser',$data);
		
	}
	public function after()
	{
		$datacontent['title']='Selamat Datang';
		$data['content']=$this->load->view('berandaUserAf.php',$datacontent,TRUE);
		$data['title']='Selamat Datang di SIGSESAL';	
		$this->load->view('layoutuser/htmlUserAf',$data);
		
	}
	public function ihwal()
	{
		$datacontent['title']='Tentang Website';
		$data['content']=$this->load->view('ihwalUser.php',$datacontent,TRUE);
		$data['title']='Tentang Website';	
		$this->load->view('layoutuser/htmlIhwal',$data);
		
	}
	public function ihwalAf()
	{
		$datacontent['title']='Tentang Website';
		$data['content']=$this->load->view('ihwalUserAf.php',$datacontent,TRUE);
		$data['title']='Tentang Website';	
		$this->load->view('layoutuser/htmlIhwalAf',$data);
		
	}

	// public function index()
	// {
	// 	$datacontent['title']='Halaman Login';
	// 	$data['content']=$this->load->view('loginView.php',$datacontent,TRUE);
	// 	$data['title']='Login';	
	// 	$this->load->view('layoutuser/htmlLogin',$data);
	// }

}
