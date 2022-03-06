<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DatapetaModel extends CI_Model {
    function get(){
        $data=$this->db->get('m_peta');
        return $data;
    }
	function getbyId() {
		{
			$table = 'm_peta';
			return $this->db->get_where($this->$table, [$col => $val])->row();
		}
	}

    function insert($data=array()){
        $this->db->insert('m_peta',$data);
		$info='<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                <h4><i class="icon fa fa-check"></i> Sukses!</h4> Data Peta Berhasil Ditambah</div>';
        $this->session->set_flashdata('info',$info); 
	}
    function update($data=array(),$where=array()){
		foreach ($where as $key => $value) {
			$this->db->where($key,$value);
		}
		$this->db->update('m_peta',$data);
		$info='<div class="alert alert-success alert-dismissible">
		                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		                <h4><i class="icon fa fa-check"></i> Sukses!</h4> Data Sukses diubah </div>';
	    $this->session->set_flashdata('info',$info);
	}
	function delete($where=array()){
		foreach ($where as $key => $value) {
			$this->db->where($key,$value);
		}
		$this->db->delete('m_peta');
		$info='<div class="alert alert-success alert-dismissible">
		                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		                <h4><i class="icon fa fa-check"></i> Sukses!</h4> Data Sukses dihapus </div>';
	    $this->session->set_flashdata('info',$info);
	}
	public function getPeta($limit,$start, $keyword = null)
	{
		if ($keyword) {
			$this->db->like('nama_satwa',$keyword);
			}
		return $this->db->get('m_peta', $limit, $start);
	}
	public function countAll(){
		return $this->db->get('m_peta')->num_rows();
	}

	public function get_pdf($id_peta = '')
	
    {
		$this->db->select("*");
		$this->db->where('id_peta',$id_peta);
		return $this->db-> get('m_peta')->row();
	}
	
}

