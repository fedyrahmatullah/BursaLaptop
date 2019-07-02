<?php

defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;


class Api_update extends REST_Controller {
    function __construct(){
        parent::__construct();
        $this->load->model('M_api_update','update');
    }

    public function index_put(){
        $input = $this->input->put();

        if(!isset($input['nama_pelanggan']) 
            || !isset($input['alamat']) 
            || !isset($input['email']) 
            || !isset($input['jenis_kelamin'])
            || !isset($input['no_hp'])
            || !isset($input['password'])

        )} else {
            $data = [
            'nama_pelanggan' => $input['nama_pelanggan'],
            'alamat' => $input['alamat'],
            'email' => $input['email'],
            'jenis_kelamin' => $input['jenis_kelamin'],
            'no_hp' => $input['no_hp'],
            'password' => password_hash($input['password'],PASSWORD_DEFAULT),
            ];

            // $this->db->set('created', 'NOW()', FALSE);
            $update = $this->update->update($data);

            if($update){
                $this->response([
                    'sukses' => true,
                    'pesan' => 'update berhasil'
                ],REST_Controller::HTTP_CREATED);
            } else {
                $this->response([
                    'sukses' => false,
                    'pesan' => 'update gagal'
                ],REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

}

