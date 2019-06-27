<?php 

class M_api_register extends CI_Model
{
	public function add($data){
		return $this->db->insert('tbl_pelanggan',$data); 
	}
}