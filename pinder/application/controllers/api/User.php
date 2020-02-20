<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class User extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        // $this->load->database();
    }

    //Menampilkan data user
    function index_get() {
        $user_id = $this->get('user_id');
        if ($user_id == '') {
            $user = $this->db->get('tb_user')->result();
        } else {
            $this->db->where('user_id', $user_id);
            $user = $this->db->get('tb_user')->result();
        }
        $this->response($user, 200);
    }

    //Mengirim atau menambah data user baru
	function index_post() {
        $user_password = $this->post('user_password');
        
        $data = array(
            'user_id' => $this->post('user_id'),
            'user_fullname' => $this->post('user_fullname'),
            'user_title' => $this->post('user_title'),
            'user_email' => $this->post('user_email'),
            'user_password' => md5($user_password),
            'user_role' => $this->post('user_role')
        );
        $insert = $this->db->insert('tb_user', $data);
        if ($insert) {
            $this->response($this->db->insert_id(), 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Memperbarui data user yang telah ada
	function index_put() {
        $user_id = $this->put('user_id');
        $user_password = $this->put('user_password');

        if($user_password != '') {
            $data = array(
                'user_id' => $this->put('user_id'),
                'user_fullname' => $this->put('user_fullname'),
                'user_title' => $this->put('user_title'),
                'user_email' => $this->put('user_email'),
                'user_password' => md5($user_password),
                'user_role' => $this->put('user_role'),
            );
        } else {
            $data = array(
                'user_id' => $this->put('user_id'),
                'user_fullname' => $this->put('user_fullname'),
                'user_title' => $this->put('user_title'),
                'user_email' => $this->put('user_email'),
                'user_role' => $this->put('user_role'),
            );
        }
        
        $this->db->where('user_id', $user_id);
        $update = $this->db->update('tb_user', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Menghapus salah satu data user
	function index_delete() {
        $user_id = $this->delete('user_id');
        $this->db->where('user_id', $user_id);
        $delete = $this->db->delete('tb_user');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Masukan function selanjutnya disini
}
?>