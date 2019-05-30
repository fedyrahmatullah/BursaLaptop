<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class android extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_loginandroid');
    }

    public function index()
    {
        echo 'bursalaptop api';
    }

    public function LoginApi()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $result = $this->dbandroid->LoginApi($username, $password);
        echo json_encode($result);
    }
}