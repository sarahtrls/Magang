<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sebaransatwa extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// $this->load->model('HotspotModel','Model');
		$this->load->model('DatapetaModel','Model');
	}

	public function index()
	{
		$datacontent['url']='sebaransatwa';
		$datacontent['title']='Peta Sebaran Satwa';
		// $datacontent['datatable']=$this->Model->get();
		$data['content']=$this->load->view('peta/mapsView',$datacontent,TRUE);
		$data['js']=$this->load->view('peta/js/mapjs',$datacontent,TRUE);
		$data['title']=$datacontent['title'];
		$this->load->view('layout/html',$data);
	}
}
