<?php 

class M_barang extends CI_Model
{
	public function barang_get(){
		$brg = $this->db->get('tbl_barang'); 

		return $brg->result();
	}
}