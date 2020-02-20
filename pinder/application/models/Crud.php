<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Model {
    public function create($table, $data) {
        $this->db->insert($table, $data);

        return $this->db->insert_id();
    }

    // public function read($table, $where = array()) {
    //     $query = $this->db->where($where);
    //     $query = $this->db->get($table);

    //     return $query;
    // }

    public function read($table, $where=null, $limit='', $offset='', $order_column='', $order_method='') {
        if($order_column != '' && $order_method != '') {
            $this->db->order_by($order_column, $order_method);
        }

        $query = $this->db->get_where($table, $where, $limit, $offset);

        if($query) {
            return $query;
        } else {
            return '';
        }
    }

    public function update($table, $data, $where) {
        $this->db->update($table, $data, $where);

        return "OK";
    }

    public function delete($table, $where) {
        $this->db->delete($table, $where);

        return "OK";
    }

    public function rekap()
    {
        $tahun = $this->input->post('tahun');

        
       $query = $this->db->query( "SELECT * FROM tb_player where periode='$tahun' ");
        return $query->result();
    }

    public function data(){
        $tahun = $this->input->post('tahun');

        $query = $this->db->query("SELECT * FROM v_assessment WHERE YEAR(assessment_date) = $tahun");
        return $query->result();
    }

}