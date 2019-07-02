<?php 

class M_api_update extends CI_Model
{
	public function update($data){
		return $this->db->insert('tbl_pelanggan',$data); 
	}
}