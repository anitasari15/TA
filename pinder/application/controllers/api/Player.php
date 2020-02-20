<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Player extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        // $this->load->database();
    }

    //Menampilkan data player
    function index_get() {
        $player_id = $this->get('player_id');
        if ($player_id == '') {
            $user = $this->db->get('tb_player')->result();
        } else {
            $this->db->where('player_id', $player_id);
            $user = $this->db->get('tb_player')->result();
        }
        $this->response($user, 200);
    }

    //Mengirim atau menambah data player baru
	function index_post() {
        $uploadDir = './uploads/';
        file_put_contents($uploadDir . $this->post('fileName'), base64_decode($this->post('fileData')));

        $data = array(
            'player_id' => $this->post('player_id'),
            'player_fullname' => $this->post('player_fullname'),
            'player_gender' => $this->post('player_gender'),
            'player_origin' => $this->post('player_origin'),
            'player_weight' => $this->post('player_weight'),
            'player_height' => $this->post('player_height'),
            'player_avatar' => $this->post('player_avatar'),
            'player_note' => $this->post('player_note')
        );
        $insert = $this->db->insert('tb_player', $data);
        if ($insert) {
            $this->response($this->db->insert_id(), 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Menghapus salah satu data player
	function index_delete() {
        $player_id = $this->delete('player_id');
        $this->db->where('player_id', $player_id);
        $delete = $this->db->delete('tb_player');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Masukan function selanjutnya disini
}
?>