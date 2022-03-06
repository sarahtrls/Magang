<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DatasatwaModel extends CI_Model {
    function get(){
        $data=$this->db->get('m_deskripsi');
        return $data;
    }
    function insert($data=array()){
        $this->db->insert('m_deskripsi',$data);
		$info='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                <h4><i class="icon fa fa-check"></i> Sukses!</h4> Data Peta Berhasil Ditambah</div>';
        $this->session->set_flashdata('info',$info); 
	}
    function update($data=array(),$where=array()){
		foreach ($where as $key => $value) {
			$this->db->where($key,$value);
		}
		$this->db->update('m_deskripsi',$data);
		$info='<div class="alert alert-success alert-dismissible">
		                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		                <h4><i class="icon fa fa-check"></i> Sukses!</h4> Data Sukses diubah </div>';
	    $this->session->set_flashdata('info',$info);
	}
	function delete($where=array()){
		foreach ($where as $key => $value) {
			$this->db->where($key,$value);
		}
		$this->db->delete('m_deskripsi');
		$info='<div class="alert alert-success alert-dismissible">
		                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		                <h4><i class="icon fa fa-check"></i> Sukses!</h4> Data Sukses dihapus </div>';
	    $this->session->set_flashdata('info',$info);
	}
	public function getDeskripsi($limit,$start, $keyword = null){
		{
			if ($keyword) {
				$this->db->like('nama_satwa',$keyword);
				$this->db->or_like('nama_latin',$keyword);
				$this->db->or_like('nama_lain',$keyword);
				$this->db->or_like('rujukan_peta',$keyword);
				$this->db->or_like('status_IUCN',$keyword);
				$this->db->or_like('kontak',$keyword);
			}
			return $this->db->get('m_deskripsi', $limit, $start);
		}
	}
	public function countAll(){
		return $this->db->get('m_deskripsi')->num_rows();
	}
	function findOne(){
		return $this->db->get_where('m_deskripsi')->row();
	}
}