<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Result extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        // $this->load->database();
    }

    //Memperbarui data result yang telah ada
	function index_put() {
        $assessment_id = $this->put('assessment_id');
        $result_id = $this->put('result_id');

        // Set N
        $this->db->where('assessment_id', $assessment_id);
        $update = $this->db->update('tb_result', array('result_confirmation' => 'N'));

        // Set Y
        $this->db->where('result_id', $result_id);
        $update = $this->db->update('tb_result', array('result_confirmation' => 'Y'));
        if ($update) {
            $this->response(array('status' => 'ok'), 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Masukan function selanjutnya disini
}
?>