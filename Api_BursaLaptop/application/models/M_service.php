<?php
class M_service extends CI_Model {
    function tampil_all() 	{
		return $this->db->get('coba');
    }
		
		function delpes($where) {
			$this->db->where($where);
			$this->db->delete('coba');
		}
}

