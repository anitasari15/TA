<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assessment extends CI_Model {
    public function body_balance($value) {
        $return = "";

        if($value >= 1 && $value <= 5) {
            $return = 1;
        } else if($value >= 6 && $value <= 10) {
            $return = 2;
        } else if($value >= 11 && $value <= 15) {
            $return = 3;
        } else if($value >= 16 && $value <= 20) {
            $return = 4;
        } else if($value >= 21) {
            $return = 5;
        }

        return $return;
    }

    public function leap($value) {
        $return = "";

        if($value > 0 && $value <= 40) {
            $return = 1;
        } else if($value >= 41 && $value <= 80) {
            $return = 2;
        } else if($value >= 81 && $value <= 120) {
            $return = 3;
        } else if($value >= 121 && $value <= 150) {
            $return = 4;
        } else if($value > 150) {
            $return = 5;
        }

        return $return;
    }

    public function running_speed($value) {
        $return = "";

        if($value < 8) {
            $return = 1;
        } else if ($value >= 8 && $value <= 10) {
            $return = 2;
        } else if ($value >= 11 && $value <= 13) {
            $return = 3;
        } else if ($value >= 14 && $value <= 16) {
            $return = 4;
        } else if($value > 16) {
            $return = 5;
        }

        return $return;
    }

    public function agility($value) {
        $return = "";

        if($value < 10) {
            $return = 1;
        } else if($value >= 11 && $value <= 15) {
            $return = 2;
        } else if($value >= 16 && $value <= 20) {
            $return = 3;
        } else if($value >= 21 && $value <= 25) {
            $return = 4;
        } else if($value >= 26) {
            $return = 5;
        }

        return $return;
    }

    public function stamina($value) {
        $return = "";

        if($value >= 0 && $value <= 1026) {
            $return = 1;
        } else if($value >= 1027 && $value <= 2099) {
            $return = 2;
        } else if($value >= 2100 && $value <= 2519) {
            $return = 3;
        } else if($value >= 2520 && $value <= 3359) {
            $return = 4;
        } else if($value >= 3360) {
            $return = 5;
        }

        return $return;
    }

    public function dribble($value) {
        $return = "";

        if($value <= 4) {
            $return = 1;
        } else if($value == 5) {
            $return = 2;
        } else if($value == 6) {
            $return = 3;
        } else if($value == 7) {
            $return = 4;
        } else if($value > 7) {
            $return = 5;
        }

        return $return;
    }

    public function shooting_accuracy($value) {
        $return = "";

        if($value >= 0 && $value <= 5) {
            $return = 1;
        } else if($value >= 5 && $value <= 7) {
            $return = 2;
        } else if($value >= 8 && $value <= 11) {
            $return = 3;
        } else if($value >= 12 && $value <= 17) {
            $return = 4;
        } else if($value > 17) {
            $return = 5;
        }

        return $return;
    }

    public function passing_accuracy($value) {
        $return = "";

        if($value > 0 && $value <= 9) {
            $return = 1;
        } else if($value >= 10 && $value <= 19) {
            $return = 2;
        } else if($value >= 20 && $value <= 29) {
            $return = 3;
        } else if($value >= 30 && $value <= 39) {
            $return = 4;
        } else if($value >= 40) {
            $return = 5;
        }

        return $return;
    }

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
            $sg = array(
                'result_id' => '',
                'result_point' => $point,
                'result_position' => 'SG',
                'assessment_id' => $data['assessment_id']
            );

            $this->db->insert('tb_result', $sg);
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
                    $positions .= "<a href='" . base_url() . "index.php/dashboard/player_assessment/confirmation/" . $row['result_id'] . "/" . $row['assessment_id'] . "'>" . $row['result_position'] . "</a>" . ($i == $query->num_rows() ? '' : ',');
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