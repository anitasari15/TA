<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

class Assessment extends REST_Controller {

    function __construct($config = 'rest') {
        parent::__construct($config);
        // $this->load->database();
    }

    //Menampilkan data assessment
    function index_get() {
        $user_id = $this->get('user_id');
        if ($user_id == '') {
            $user = $this->db->get('v_assessment')->result();
        } else {
            $this->db->where('user_id', $user_id);
            $user = $this->db->get('v_assessment')->result();
        }
        $this->response($user, 200);
    }

    //Mengirim atau menambah data assessment baru
	function index_post() {
        $data = array(
            'assessment_id' => $this->post('assessment_id'),
            'body_balance' => $this->post('body_balance'),
            'leap' => $this->post('leap'),
            'running_speed' => $this->post('running_speed'),
            'agility' => $this->post('agility'),
            'stamina' => $this->post('stamina'),
            'dribble' => $this->post('dribble'),
            'shooting_accuracy' => $this->post('shooting_accuracy'),
            'passing_accuracy' => $this->post('passing_accuracy'),
            'user_id' => $this->post('user_id'),
            'player_id' => $this->post('player_id')
        );
        $insert = $this->db->insert('tb_assessment', $data);
        if ($insert) {
            $data = array(
				'assessment_id' => $this->db->insert_id(),
				'body_balance' => $this->post('body_balance'),
				'leap' => $this->post('leap'),
				'running_speed' => $this->post('running_speed'),
				'agility' => $this->post('agility'),
				'stamina' => $this->post('stamina'),
				'dribble' => $this->post('dribble'),
				'shooting_accuracy' => $this->post('shooting_accuracy'),
				'passing_accuracy' => $this->post('passing_accuracy')
			);

			$this->check_pg($data);
			$this->check_sg($data);
			$this->check_sf($data);
			$this->check_pf($data);
            $this->check_c($data);
            
            $this->response($this->db->insert_id(), 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }

    //Masukan function selanjutnya disini
    // PG
    public function check_pg($data) {
        $point = 0;
        $status = 0;

        if($data['body_balance'] < 3) {
            $status += 1;
        } else {
            $point += $data['body_balance'] - 3;
        }

        if($data['leap'] < 3) {
            $status += 1;
        } else {
            $point += $data['leap'] - 3;
        }

        if($data['running_speed'] < 5) {
            $status += 1;
        } else {
            $point += $data['running_speed'] - 5;
        }

        if($data['agility'] < 5) {
            $status += 1;
        } else {
            $point += $data['agility'] - 5;
        }

        if($data['stamina'] < 5) {
            $status += 1;
        } else {
            $point += $data['stamina'] - 5;
        }

        if($data['dribble'] < 5) {
            $status += 1;
        } else {
            $point += $data['dribble'] - 5;
        }

        if($data['shooting_accuracy'] < 3) {
            $status += 1;
        } else {
            $point += $data['shooting_accuracy'] - 3;
        }

        if($data['passing_accuracy'] < 5) {
            $status += 1;
        } else {
            $point += $data['passing_accuracy'] - 5;
        }

        if($status == 0) {
            $pg = array(
                'result_id' => '',
                'result_point' => $point,
                'result_position' => 'PG',
                'assessment_id' => $data['assessment_id']
            );

            $this->db->insert('tb_result', $pg);
        }
    }

    // SG
    public function check_sg($data) {
        $point = 0;
        $status = 0;

        if($data['body_balance'] < 3) {
            $status += 1;
        } else {
            $point += $data['body_balance'] - 3;
        }

        if($data['leap'] < 3) {
            $status += 1;
        } else {
            $point += $data['leap'] - 3;
        }

        if($data['running_speed'] < 5) {
            $status += 1;
        } else {
            $point += $data['running_speed'] - 5;
        }

        if($data['agility'] < 5) {
            $status += 1;
        } else {
            $point += $data['agility'] - 5;
        }

        if($data['stamina'] < 5) {
            $status += 1;
        } else {
            $point += $data['stamina'] - 5;
        }

        if($data['dribble'] < 5) {
            $status += 1;
        } else {
            $point += $data['dribble'] - 5;
        }

        if($data['shooting_accuracy'] < 4) {
            $status += 1;
        } else {
            $point += $data['shooting_accuracy'] - 4;
        }

        if($data['passing_accuracy'] < 4) {
            $status += 1;
        } else {
            $point += $data['passing_accuracy'] - 4;
        }

        if($status == 0) {
            $pg = array(
                'result_id' => '',
                'result_point' => $point,
                'result_position' => 'SG',
                'assessment_id' => $data['assessment_id']
            );

            $this->db->insert('tb_result', $pg);
        }
    }

    // SF
    public function check_sf($data) {
        $point = 0;
        $status = 0;

        if($data['body_balance'] < 3) {
            $status += 1;
        } else {
            $point += $data['body_balance'] - 3;
        }

        if($data['leap'] < 4) {
            $status += 1;
        } else {
            $point += $data['leap'] - 4;
        }

        if($data['running_speed'] < 4) {
            $status += 1;
        } else {
            $point += $data['running_speed'] - 4;
        }

        if($data['agility'] < 5) {
            $status += 1;
        } else {
            $point += $data['agility'] - 5;
        }

        if($data['stamina'] < 4) {
            $status += 1;
        } else {
            $point += $data['stamina'] - 4;
        }

        if($data['dribble'] < 4) {
            $status += 1;
        } else {
            $point += $data['dribble'] - 4;
        }

        if($data['shooting_accuracy'] < 5) {
            $status += 1;
        } else {
            $point += $data['shooting_accuracy'] - 5;
        }

        if($data['passing_accuracy'] < 4) {
            $status += 1;
        } else {
            $point += $data['passing_accuracy'] - 4;
        }

        if($status == 0) {
            $pg = array(
                'result_id' => '',
                'result_point' => $point,
                'result_position' => 'SF',
                'assessment_id' => $data['assessment_id']
            );

            $this->db->insert('tb_result', $pg);
        }
    }

    // PF
    public function check_pf($data) {
        $point = 0;
        $status = 0;

        if($data['body_balance'] < 4) {
            $status += 1;
        } else {
            $point += $data['body_balance'] - 4;
        }

        if($data['leap'] < 4) {
            $status += 1;
        } else {
            $point += $data['leap'] - 4;
        }

        if($data['running_speed'] < 4) {
            $status += 1;
        } else {
            $point += $data['running_speed'] - 4;
        }

        if($data['agility'] < 3) {
            $status += 1;
        } else {
            $point += $data['agility'] - 3;
        }

        if($data['stamina'] < 4) {
            $status += 1;
        } else {
            $point += $data['stamina'] - 4;
        }

        if($data['dribble'] < 3) {
            $status += 1;
        } else {
            $point += $data['dribble'] - 3;
        }

        if($data['shooting_accuracy'] < 3) {
            $status += 1;
        } else {
            $point += $data['shooting_accuracy'] - 3;
        }

        if($data['passing_accuracy'] < 3) {
            $status += 1;
        } else {
            $point += $data['passing_accuracy'] - 3;
        }

        if($status == 0) {
            $pg = array(
                'result_id' => '',
                'result_point' => $point,
                'result_position' => 'PF',
                'assessment_id' => $data['assessment_id']
            );

            $this->db->insert('tb_result', $pg);
        }
    }

    // C
    public function check_c($data) {
        $point = 0;
        $status = 0;

        if($data['body_balance'] < 5) {
            $status += 1;
        } else {
            $point += $data['body_balance'] - 5;
        }

        if($data['leap'] < 5) {
            $status += 1;
        } else {
            $point += $data['leap'] - 5;
        }

        if($data['running_speed'] < 2) {
            $status += 1;
        } else {
            $point += $data['running_speed'] - 2;
        }

        if($data['agility'] < 2) {
            $status += 1;
        } else {
            $point += $data['agility'] - 2;
        }

        if($data['stamina'] < 3) {
            $status += 1;
        } else {
            $point += $data['stamina'] - 3;
        }

        if($data['dribble'] < 2) {
            $status += 1;
        } else {
            $point += $data['dribble'] - 2;
        }

        if($data['shooting_accuracy'] < 3) {
            $status += 1;
        } else {
            $point += $data['shooting_accuracy'] - 3;
        }

        if($data['passing_accuracy'] < 3) {
            $status += 1;
        } else {
            $point += $data['passing_accuracy'] - 3;
        }

        if($status == 0) {
            $pg = array(
                'result_id' => '',
                'result_point' => $point,
                'result_position' => 'C',
                'assessment_id' => $data['assessment_id']
            );

            $this->db->insert('tb_result', $pg);
        }
    }

    public function get_positions($assessment_id) {
        $query = $this->db->query("SELECT * FROM tb_result WHERE assessment_id = $assessment_id");
        
        if($query->num_rows() > 0) {
            $i = 1;
            $positions = "";
            
            foreach($query->result_array() as $row) {
                if($this->session->userdata('user_role') == '1' || $this->session->userdata('user_role') == '0') {
                    $positions .= $row['result_position'] . ($i == $query->num_rows() ? '' : ',');
                } else if($this->session->userdata('user_role') == '2') {
                    $positions .= "<a href='" . base_url() . "index.php/dashboard/player/confirmation/" . $row['result_id'] . "/" . $row['assessment_id'] . "'>" . $row['result_position'] . "</a>" . ($i == $query->num_rows() ? '' : ',');
                }
                $i++;
            }

            return $positions;
        } else {
            return "-";
        }
    }
    
    public function get_position($assessment_id) {
        $query = $this->db->query("SELECT * FROM v_result WHERE assessment_id = $assessment_id AND result_confirmation = 'Y'");
        
        if($query->num_rows() > 0) {
            $position = "";
            
            foreach($query->result_array() as $row) {
                $position .= $row['result_position'];
            }

            return $position;
        } else {
            return "-";
        }
    }
}
?>