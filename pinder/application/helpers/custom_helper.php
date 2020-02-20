<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('sortByPoint')) {
    function sortByPoint($a, $b) {
        $a = $a['point'];
        $b = $b['point'];

        if ($a == $b) return 0;
        return ($a > $b) ? -1 : 1;
    }
}

if(!function_exists('checkAssessment')) {
    function checkAssessment() {
        $CI =& get_instance();

        $query = $CI->db->get_where('tb_setting', array('setting_name' => 'assessment_status'));
        $value = $query->result_array();

        if(count($value) > 0) {
        	if($value[0]['setting_value'] == 'true'){
        		return true;
        	} else
        	{
        		return false;
        	}
            
        } else {
            return false;
        }

    }
}