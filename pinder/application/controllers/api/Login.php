<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Login extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        // $this->load->database();
    }

    //Menampilkan data user
    function index_get() {
        $where = array(
            'user_email' => $this->get('user_email'),
            'user_password' => md5($this->get('user_password'))
        );

        $user = $this->db->where($where);
        $user = $this->db->get('tb_user')->result();
        
        $this->response($user, 200);
    }

    //Masukan function selanjutnya disini
}
?>