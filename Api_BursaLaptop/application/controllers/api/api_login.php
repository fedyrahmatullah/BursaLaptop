<?php

defined('BASEPATH') OR exit('No direct script access allowed');


require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;


class api_login extends REST_Controller {

    function __construct($config = 'rest')
    {
        parent::__construct($config);
        $this->load->model('M_apilogin');
    }

function index_post() 
{
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $result = $this->M_apilogin->login_api($email, $password);
        
        if (empty($result)) 
        {    

            $data['login'] = [];
            $data['gagal'] = "0";
            $data['message'] = "username salah";
            echo json_encode($data);
        }
        else
        {

                if (password_verify($password, $result[0]['password']))
                {

            $data['login'] = $result;
            $data['success'] = "1";
            $data['message'] = "success";
            echo json_encode($data);

                }
                else{
            $data['login'] = [];
            $data['gagal'] = "2";
            $data['message'] = "password salah";
            echo json_encode($data);

                }


        }
    }
}


// <?php

// defined('BASEPATH') OR exit('No direct script access allowed');


// require APPPATH . '/libraries/REST_Controller.php';
// use Restserver\Libraries\REST_Controller;


// class api_login extends REST_Controller {

//     function __construct($config = 'rest')
//     {
//         parent::__construct($config);
//         $this->load->model('M_apilogin');
//     }

//     public function index_post()
//     {
//             $email = $this->input->post('email', TRUE);
//             $pass = $this->input->post('password', TRUE);

//             $cek = $this->M_apilogin->get_where('tbl_pelanggan', array('email' => $email ));

//             if ($cek->num_rows() > 0) {
//                 $data_ = $cek->result_array();

//                 if (password_verify($pass, $data_[0]['password']))
//                 {
//                     $datauser = array (
//                         'id_pelanggan' => $data_[0]['id_pelanggan'],
//                         'nama_pelanggan' => $data_[0]['nama_pelanggan'],
//                         'alamat' => $data_[0]['alamat'],
//                         'email' => $data_[0]['email'],
//                         'jenis_kelamin' => $data_[0]['jenis_kelamin'],
//                         'no_hp' => $data_[0]['no_hp'],
//                         'password' => $data_[0]['password'],
//                         'foto' => $data_[0]['foto'],
//                         'status' => 1,
//                         'login' => TRUE
//                     );


//                     // $this->db->where(['id_pelanggan' =>$data_[0]['id_pelanggan'] ]);
//                     // $this->db->update('tbl_pelanggan', ['last_login' => date("Y-m-d H:i:s")]);



//                     $this->response(['data' => $datauser,'pesan' => 'success login'], REST_Controller::HTTP_OK);


//                 } else {


//                     $this->response(['login' => FALSE,'pesan' => 'Password Anda Salah'],REST_Controller::HTTP_BAD_REQUEST);


//                 }
                

//             } else {
//                 $this->response(['login' => FALSE, 'pesan' => 'Username Tidak Terdaftar'],REST_Controller::HTTP_BAD_REQUEST);

//             }

        
//     }
// }

    // public function index_post()
    // {
    //  $username = $this->input->post('username');
    //  $password = $this->input->post('password');
    //  $result = $this->m_apilogin->login_api($username, $password);

    //  if (empty($result)) {
            
    //      $data['login'] = "Tidak Di Temukan";
    //      $data['pesan'] = "Gagal ";
    //      echo json_encode($data);

    //  }else {
    //      $data['login'] = $result;
    //      $data['pesan'] = "success";
    //      echo json_encode($data);
    //  }


    // }
