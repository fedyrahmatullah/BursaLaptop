<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Servicedikerjakan extends CI_Controller {
    function __construct() {
		parent:: __construct();
										$this->load->model('M_service');
										$this->load->model('M_inventory');
    }
    
public function index() {
	if($this->session->has_userdata('username')) {
	$data = array(
	'sidebar'   => "Service dikerjakan",
	'service' => $this->M_service->tampil_all()->result(),
	'menu'	    => "active",
	);
	$this->load->view('template/header');
	$this->load->view('template/sidebar',$data);
	$this->load->view('servicedikerjakan',$data);
	$this->load->view('template/footer');
} else {
	$this->load->view('login');
}
}

public function delete($id_coba) {
	$where = array('id_coba' => $id_coba);
	$this->M_service->delpes($where,'coba');
	redirect('servicedikerjakan');
}

// public function delete($id_pelanggan) {
// 	$where = array('id_pelanggan' => $id_pelanggan);
// 	$this->M_pelanggan->delcust($where,'tbl_pelanggan');
// 	redirect('pelanggan');
// }

}    