<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {
    public function __construct()
	{
		parent::__construct();

        if(!$this->session->has_userdata('logged_in')) {
			redirect('login');
		}
	}

	public function index()
	{
        $kriteria = $this->db->get('tb_criteria')->result_array();

        $parser['kriteria'] = (count($kriteria) > 0 ? $kriteria : array());

        $this->load->view('setting/index', $parser);
    }

    public function save_setting() {
        $session = array(
            'ip_server' => $this->input->post('ip_server')
        );
        
        $this->session->set_userdata($session);

        redirect('dashboard/setting');
    }

    public function nyalakan(){
        $this->crud->update('tb_setting', array('setting_value' => 'true'), array('setting_name' => 'assessment_status'));

        redirect('dashboard/setting');
    }

    public function hentikan(){
        $this->crud->update('tb_setting', array('setting_value' => 'false'), array('setting_name' => 'assessment_status'));

        redirect('dashboard/setting');
    }

    public function save_criteria() {
        $body_balance = $this->input->post('body_balance');
        $leap = $this->input->post('leap');
        $running_speed = $this->input->post('running_speed');
        $agility = $this->input->post('agility');
        $stamina = $this->input->post('stamina');
        $dribble = $this->input->post('dribble');
        $shooting_accuracy = $this->input->post('shooting_accuracy');
        $passing_accuracy = $this->input->post('passing_accuracy');

        $cek_kriteria = $this->db->get('tb_criteria')->result_array();

        $data = array(
            'body_balance' => $body_balance,
            'leap' => $leap,
            'running_speed' => $running_speed,
            'agility' => $agility,
            'stamina' => $stamina,
            'dribble' => $dribble,
            'shooting_accuracy' => $shooting_accuracy,
            'passing_accuracy' => $passing_accuracy
        );

        if(count($cek_kriteria) > 0) {
            $this->db->update('tb_criteria', $data, null);
        } else {
            $this->db->insert('tb_criteria', $data);
        }

        redirect('dashboard/setting');
    }
}
