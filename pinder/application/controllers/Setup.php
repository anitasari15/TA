<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setup extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
	}
		
	public function index()
	{
		$this->load->view('setup/index');
    }

    public function save_setting() {
        $session = array(
            'ip_server' => $this->input->post('ip_server')
        );
        
        $this->session->set_userdata($session);

        echo json_encode(array('status' => 'OK'));
    }
}
