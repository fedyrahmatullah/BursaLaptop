<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Servicedikerjakan extends CI_Controller {
    function __construct() {
		parent:: __construct();
	
    }
    
public function index() {
	if($this->session->has_userdata('username')) {
	$data = array(
	'sidebar'   => "Service dikerjakan",
	'menu'	    => "active",
	);
	$this->load->view('template/header');
	$this->load->view('template/sidebar',$data);
	$this->load->view('bag_service',$data);
	$this->load->view('template/footer');
} else {
	$this->load->view('login');
}
}
}    