<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    var $API = "";
    var $IP_SERVER = "";

	public function __construct()
	{
		parent::__construct();

        $this->IP_SERVER = "http://" . $this->session->userdata('ip_server');
        $this->API = $this->IP_SERVER . "/pinder/index.php";
        $this->load->library('curl');

		if(!$this->session->has_userdata('logged_in')) {
			redirect('login');
		} else {
            if($this->session->userdata('user_role') != '0') {
                redirect('dashboard/player');
            }
        }
	}

	public function index()
	{
        // $query = $this->crud->read('tb_user');
		
        // $parser['users'] = $query->result_array();

        $parser['users'] = json_decode($this->curl->simple_get($this->API . '/api/user'));
		$this->load->view('user/read', $parser);
    }
    
    public function create() {
		$this->load->view('user/create');
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

        redirect('dashboard/user');
    }
        
    public function process_delete($user_id) {
		// $this->crud->delete('tb_user', array('user_id' => $user_id));

        $params = array('user_id' => $user_id);
        $this->curl->simple_delete($this->API . '/api/user', $params, array(CURLOPT_BUFFERSIZE => 10));

		redirect('dashboard/user');
    }
    
    public function update($user_id) {
        // $query = $this->crud->read('tb_user', array('user_id' => $user_id));

        // $parser['user'] = $query->result_array();

        $params = array('user_id' => $user_id);
        $parser['user'] = json_decode($this->curl->simple_get($this->API . '/api/user', $params));

		$this->load->view('user/update', $parser);
    }

    public function process_update() {
        $user = array();

        if($this->input->post('user_password') != '') {
            $user = array(
                'user_id' => $this->input->post('user_id'),
                'user_fullname' => $this->input->post('user_fullname'),
                'user_title' => $this->input->post('user_title'),
                'user_email' => $this->input->post('user_email'),
                'user_password' => $this->input->post('user_password'),
                'user_role' => $this->input->post('user_role'),
            );
        } else {
            $user = array(
                'user_id' => $this->input->post('user_id'),
                'user_fullname' => $this->input->post('user_fullname'),
                'user_title' => $this->input->post('user_title'),
                'user_email' => $this->input->post('user_email'),
                'user_role' => $this->input->post('user_role'),
            );
        }

        // $user_id = $this->input->post('user_id');

        // $this->crud->update('tb_user', $user, array('user_id' => $user_id));

        $this->curl->simple_put($this->API . '/api/user', $user, array(CURLOPT_BUFFERSIZE => 10));

        redirect('dashboard/user');
    }
}
