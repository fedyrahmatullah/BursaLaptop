<?php

defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;


class Api_Barang extends REST_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_barang','barang');
	}

	
	function index_get() 
{
	$data['brg'] = $this->barang->barang_get();
       
	echo json_encode($data);


        
    }
}