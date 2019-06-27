<?php

defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;


class Api_register extends REST_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('M_api_register','register');
	}

	public function index_post(){
		$input = $this->input->post();

		if(!isset($input['nama_pelanggan']) 
			|| !isset($input['alamat']) 
			|| !isset($input['email']) 
			|| !isset($input['jenis_kelamin'])
			|| !isset($input['no_hp'])
			|| !isset($input['password'])
			|| !isset($input['foto'])

		){

				$this->response([
				'gagal' => false,
				'pesan' => 'form harus diisi semua'
			],REST_Controller::HTTP_BAD_REQUEST);
		} else {
			$data = [
			'nama_pelanggan' => $input['nama_pelanggan'],
			'alamat' => $input['alamat'],
			'email' => $input['email'],
			'jenis_kelamin' => $input['jenis_kelamin'],
			'no_hp' => $input['no_hp'],
			'password' => password_hash($input['password'],PASSWORD_DEFAULT),
			'foto' => $input['foto']

			];

			// $this->db->set('created', 'NOW()', FALSE);
			$tambah = $this->register->add($data);

			if($tambah){
				$this->response([
					'sukses' => true,
					'pesan' => 'register berhasil'
				],REST_Controller::HTTP_CREATED);
			} else {
				$this->response([
					'sukses' => false,
					'pesan' => 'register gagal'
				],REST_Controller::HTTP_BAD_REQUEST);
			}
		}
	}

}

