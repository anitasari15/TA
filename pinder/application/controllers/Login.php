<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    var $API = "";
    var $IP_SERVER = "";

	public function __construct()
	{
        parent::__construct();

        $session = array(
            'ip_server' => "localhost:81"
        );
        
        $this->session->set_userdata($session);
        
        $this->IP_SERVER = "http://" . $this->session->userdata('ip_server');
        $this->API = $this->IP_SERVER . "/pinder/index.php";
        $this->load->library('curl');

        if(!$this->session->has_userdata('ip_server')) {
            redirect('setup');
        }
	}
		
	public function index()
	{
		$this->load->view('login/read');
    }
    
    public function do_login() {
        header('Content-Type: application/json');

        $return = array();
        
        $params = array(
            'user_email' => $this->input->post('user_email'),
            'user_password' => $this->input->post('user_password')
        );

        // $query = $this->crud->read('tb_user', $data);

        $query = json_decode($this->curl->simple_get($this->API . '/api/login', $params));

        if(count($query) > 0) {
            $return['status'] = 200;
            $return['message'] = "";

            $session = array(
                'logged_in' => TRUE,
                'user_id' => $query[0]->user_id,
                'user_fullname' => $query[0]->user_fullname,
                'user_title' => $query[0]->user_title,
                'user_email' => $query[0]->user_email,
                'user_role' => $query[0]->user_role,
                'user_registered' => $query[0]->user_registered,
                'user_avatar' => $query[0]->user_avatar
            );
            
            $this->session->set_userdata($session);
        } else {
            $return['status'] = 500;
            $return['message'] = "Email atau kata sandi kamu tidak terdaftar.";
        }

        echo json_encode($return);
    }

    public function do_logout() {
        $this->session->sess_destroy();

        redirect('login');
    }

    public function create() {
        $this->load->view('login/createlogin');
    }
    
    public function process_create() {
        $user = array(
            'user_id' => '',
            'user_fullname' => $this->input->post('user_fullname'),
            'user_title' => $this->input->post('user_title'),
            'user_email' => $this->input->post('user_email'),
            'user_password' => $this->input->post('user_password'),
            'user_role' => $this->input->post('user_role'),
        );

        // $user_id = $this->crud->create('tb_user', $user);

        $user_id = $this->curl->simple_post($this->API . '/api/user', $user, array(CURLOPT_BUFFERSIZE => 10));

        redirect('login');
    }

}
