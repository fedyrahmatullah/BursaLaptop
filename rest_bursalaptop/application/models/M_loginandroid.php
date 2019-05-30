<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class dbandroid extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function LoginApi($email, $password)
    {
        $result = $this->db->query("SELECT id_pelanggan, nama_pelanggan, alamat, email, photo 
                                    FROM tbl_pelanggan
                                    WHERE email = '$email' AND password = '$password'");
        return $result->result();
    }
}