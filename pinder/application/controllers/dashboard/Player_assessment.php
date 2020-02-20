<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Player_assessment extends CI_Controller {
	var $API = "";
	var $IP_SERVER = "";
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('assessment');

		$this->IP_SERVER = "http://" . $this->session->userdata('ip_server');
        $this->API = $this->IP_SERVER . "/pinder/index.php";
        $this->load->library('curl');

		if(!$this->session->has_userdata('logged_in')) {
			redirect('login');
		}
	}

	public function test() {
		// $data_kriteria = $this->db->get_where('tb_criteria', null, 1, 0)->result_array();

		// var_dump($data_kriteria);
		// $this->get_points('M');
	}

	public function index()
	{
		$query1 = $this->get_points('M');
		$query2 = $this->get_points('F');
		
		$parser['players1'] = $query1;
		$parser['players2'] = $query2;
		$this->load->view('Player_assessment/read', $parser);
	}

	public function proses_diterima($player_id)
	{
		$this->db->update('tb_player', array('player_status' => "diterima"), array('player_id' => $player_id));
		redirect('dashboard/player');
	}

	public function proses_ditolak($player_id)
	{
		$this->db->update('tb_player', array('player_status' => "ditolak"), array('player_id' => $player_id));
		redirect('dashboard/player');
	}
	
	public function confirmation($result_id, $assessment_id) {
		if($this->session->userdata('user_role') != '2') {
			redirect('dashboard/player');
		}

	    // Set N
	    // $this->crud->update('tb_result', array('result_confirmation' => 'N'), array('assessment_id' => $assessment_id));
	    
	    // Set Y
		// $this->crud->update('tb_result', array('result_confirmation' => 'Y'), array('result_id' => $result_id));
		
		$result = array(
			'assessment_id' => $assessment_id,
			'result_id' => $result_id
		);

		$this->curl->simple_put($this->API . '/api/result', $result, array(CURLOPT_BUFFERSIZE => 10));
	    
	    redirect('dashboard/player_assessment');
	}

	public function create() {
		if($this->session->userdata('user_role') != '1') {
			redirect('dashboard/player_assessment');
		}

		$this->load->view('player_assessment/create');
	}

	public function createbio() {
		if($this->session->userdata('user_role') != '1') {
			redirect('dashboard/player');
		}

		$this->load->view('player/createbio');
	}

	public function detail($assessment_id){
		$assessment=$this->crud->read('tb_assessment',array('assessment_id'=>$assessment_id))->row_array();
		$player=$this->crud->read('tb_player',array('player_id'=>$assessment['player_id']))->row_array();
		$data['assessment']=$assessment;
		$data['player']=$player;
		$this->load->view('assessment_value/readvalue',$data);
	}

	public function get_points($gender=""){
		// definisi alternatif sebagai array
		$alternatif = array();
		$result = array();

		$tahun_ini = date('Y', time());

		if($gender == '') {
			$semua_pemain = $this->db->query("SELECT * FROM v_assessment WHERE YEAR(assessment_date) = $tahun_ini")->result_array();
		} else {
			$semua_pemain = $this->db->query("SELECT * FROM v_assessment WHERE player_gender = '$gender' AND YEAR(assessment_date) = $tahun_ini")->result_array();
		}

		foreach($semua_pemain as $pemain) {
			$alternatif[] = $pemain['player_id'];
		}

		$jum_alternatif=count($alternatif);
		// definisi kriteria sebagai array
		$kriteria = array ("body balance","leap","running speed","agility","stamina","dribble","shooting accuracy","passing accuracy");
		$jum_kriteria=count($kriteria);
		// bobot kepentingan
		// C
		// $w = array(4,5,4,3,3,3,4,4);
		// // perbaikan bobot kepentingan
		// $totalW=4+5+4+3+3+3+4+4;

		$this->db->order_by('last_updated', 'DESC');
		$data_kriteria = $this->db->get_where('tb_criteria', null, 1, 0)->result_array();
		$totalW = 0;
		$w = array();
		
		foreach($data_kriteria as $kriteria) {
			$w[0] = (int)$kriteria['body_balance'];
			$w[1] = (int)$kriteria['leap'];
			$w[2] = (int)$kriteria['running_speed'];
			$w[3] = (int)$kriteria['agility'];
			$w[4] = (int)$kriteria['stamina'];
			$w[5] = (int)$kriteria['dribble'];
			$w[6] = (int)$kriteria['shooting_accuracy'];
			$w[7] = (int)$kriteria['passing_accuracy'];

			$totalW = $kriteria['body_balance'] + $kriteria['leap'] + $kriteria['running_speed'] + $kriteria['agility'] + $kriteria['stamina'] + $kriteria['dribble'] + $kriteria['shooting_accuracy'] + $kriteria['passing_accuracy'];
		}

		// W
		$wp[0]=$w[0]/$totalW;
		$wp[1]=$w[1]/$totalW;
		$wp[2]=$w[2]/$totalW;
		$wp[3]=$w[3]/$totalW;
		$wp[4]=$w[4]/$totalW;
		$wp[5]=$w[5]/$totalW;
		$wp[6]=$w[6]/$totalW;
		$wp[7]=$w[7]/$totalW;
		
		$i = 0;
		foreach($semua_pemain as $pemain) {
			for($j=0; $j<$jum_kriteria; $j++) {
				switch($j) {
					case 0:
						$A[$i][$j] = $pemain['body_balance'];
						break;
					case 1:
						$A[$i][$j] = $pemain['leap'];
						break;
					case 2:
						$A[$i][$j] = $pemain['running_speed'];
						break;
					case 3:
						$A[$i][$j] = $pemain['agility'];
						break;
					case 4:
						$A[$i][$j] = $pemain['stamina'];
						break;
					case 5:
						$A[$i][$j] = $pemain['dribble'];
						break;
					case 6:
						$A[$i][$j] = $pemain['shooting_accuracy'];
						break;
					case 7:
						$A[$i][$j] = $pemain['passing_accuracy'];
						break;	
					default:
						$A[$i][$j] = 0;
						break;
				}
			}

			$i++;
		}

		// definisi array untuk nilai alternatif tiap kriteria
		//A[x][y] -> x untuk alternatif, y untuk kriteria
		
		// $A[0][0]=19;
		// $A[0][1]=47;
		// $A[0][2]=9;
		// $A[0][3]=30;
		// $A[0][4]=2521;
		// $A[0][5]=5;
		// $A[0][6]=16;
		// $A[0][7]=40;

		// $A[1][0]=14;
		// $A[1][1]=7;
		// $A[1][2]=28;
		// $A[1][3]=43;
		// $A[1][4]=3380;
		// $A[1][5]=3;
		// $A[1][6]=14;
		// $A[1][7]=42;

		$arr_s = array();
		$total_vektor_s = 0;

		for($i=0; $i<$jum_alternatif; $i++) {
			$total_pangkat = 0;

			for($j=0; $j<$jum_kriteria; $j++) {
				$pangkat = pow($A[$i][$j], $wp[$j]);
				
				// echo $A[$i][$j] . " ";

				// echo $wp[$j] . " &mdash;";

				if($total_pangkat == 0) {
					$total_pangkat = $pangkat;
				} else {
					$total_pangkat = $total_pangkat * $pangkat;
				}
			}

			$arr_s[] = $total_pangkat;
		}

		for($i=0; $i<$jum_alternatif; $i++) {
			$total_vektor_s += $arr_s[$i];
		}

		// for($i=0; $i<$jum_alternatif; $i++) {
		// 	echo $alternatif[$i] . " mendapatkan " . ($arr_s[$i] / $total_vektor_s);
		// 	echo "<br />";
		// }

		foreach($semua_pemain as $pemain) {
			$point = 0;

			for($i=0; $i<$jum_alternatif; $i++) {
				if($alternatif[$i] == $pemain['player_id']) {
					$point = $arr_s[$i] / $total_vektor_s;
				}
			}

			$data = array(
				'assessment_id' => $pemain['assessment_id'],
				'assessment_date' => $pemain['assessment_date'],
				'body_balance' => $pemain['body_balance'],
				'leap' => $pemain['leap'],
				'running_speed' => $pemain['running_speed'],
				'agility' => $pemain['agility'],
				'stamina' => $pemain['stamina'],
				'dribble' => $pemain['dribble'],
				'shooting_accuracy' => $pemain['shooting_accuracy'],
				'passing_accuracy' => $pemain['passing_accuracy'],
				'user_id' => $pemain['user_id'],
				'player_id' => $pemain['player_id'],
				'player_fullname' => $pemain['player_fullname'],
				'player_gender' => $pemain['player_gender'],
				'player_origin' => $pemain['player_origin'],
				'player_weight' => $pemain['player_weight'],
				'player_height' => $pemain['player_height'],
				'player_avatar' => $pemain['player_avatar'],
				'player_note' => $pemain['player_note'],
				'born' => $pemain['born'],
				'player_status' => $pemain['player_status'],
				'point' => $point
			);

			array_push($result, $data);
		}

		return $result;

		// echo $total_vektor_s;
		// var_dump($arr_s);

// $totalS = 0;
// // perhitungan vektor S
// // C2 dan C4 nilai keuntungan bernilai +, C1,C3,C5 kriteria biaya bernilai -
// for ($i=0;$i<$jum_alternatif;$i++)
//      {
//     $S[$i]=1;
//      for($j=0;$j<$jum_kriteria;$j++)
//     {
//     if ($j==0 or $j==2 or $j==4) {$p=0-$wp[$j];} else {$p=$wp[$j];}   
//     $S[$i]=$S[$i]*pow($A[$i][$j],$p);
//     }
//     $totalS=$totalS+$S[$i];
//       }
// // perhitungan vektor V
// $rangkingawal=0;
// for ($i=0;$i<$jum_alternatif;$i++)
//      {
//     $V[$i]=$S[$i]/$totalS;
//     if ($V[$i]>$rangkingawal)
//             {
//                $rangkingawal=$V[$i]; $pilihan=$alternatif[$i];$hasil=$V[$i]; $urutan=$i;
//              }
   
//        }
// // Hasil Akhir
// echo "Hasil perangkingan yang di pilih adalah Vektor V ke-".$urutan." yaitu :<br><b>".$pilihan."</b> dengan nilai <b>".$hasil."</b>";

	}


	public function process_createbio() {
		if($this->session->userdata('user_role') != '1') {
			redirect('dashboard/player');
		}

		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = 2048;

		$this->load->library('upload', $config);

		if(!$this->upload->do_upload('player_avatar')) {
			$error = $this->upload->display_errors();

			echo $error;
		} else {
			$image = $this->upload->data();
			$uploadDir = './uploads/';
    		$uploadFile = $uploadDir . basename($image['file_name']);
		
			$player = array(
				'player_id' => '',
				'player_fullname' => $this->input->post('player_fullname'),
				'player_gender' => $this->input->post('player_gender'),
				'player_origin' => $this->input->post('player_origin'),
				'player_weight' => $this->input->post('player_weight'),
				'player_height' => $this->input->post('player_height'),
				'player_avatar' => $image['file_name'],
				'player_card' => $image['file_name'],
				'player_note' => $this->input->post('player_note'),
				'Born' => $this->input->post('player_age')
			);

			// var_dump($player);

			$player_id = $this->crud->create('tb_player', $player);

			// $player_id = $this->curl->simple_post($this->API . '/api/player', $player, array(CURLOPT_BUFFERSIZE => 10));

			
			// $assessment_id = $this->crud->create('tb_assessment', $assessment);

			

			// unlink($uploadFile);

			redirect('dashboard/player');
		}
	}

	public function process_create() {
		if($this->session->userdata('user_role') != '1') {
			redirect('dashboard/player');
		}

		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = 2048;

		$this->load->library('upload', $config);

		if(!$this->upload->do_upload('player_avatar')) {
			$error = $this->upload->display_errors();

			echo $error;
		} else {
			$image = $this->upload->data();
			$uploadDir = './uploads/';
    		$uploadFile = $uploadDir . basename($image['file_name']);
		
			// $player = array(
			// 	'player_id' => '',
			// 	'player_fullname' => $this->input->post('player_fullname'),
			// 	'player_gender' => $this->input->post('player_gender'),
			// 	'player_origin' => $this->input->post('player_origin'),
			// 	'player_weight' => $this->input->post('player_weight'),
			// 	'player_height' => $this->input->post('player_height'),
			// 	'player_avatar' => $image['file_name'],
			// 	'fileName' => basename($uploadFile),
   //          	'fileData' => base64_encode(file_get_contents($uploadFile)),
			// 	'player_note' => $this->input->post('player_note')
			// );

			// // $player_id = $this->crud->create('tb_player', $player);

			// $player_id = $this->curl->simple_post($this->API . '/api/player', $player, array(CURLOPT_BUFFERSIZE => 10));

			$assessment = array(
				'assessment_id' => '',
				'body_balance' => $this->input->post('body_balance'),
				'leap' => $this->input->post('leap'),
				'running_speed' => $this->input->post('running_speed'),
				'agility' => $this->input->post('agility'),
				'stamina' => $this->input->post('stamina'),
				'dribble' => $this->input->post('dribble'),
				'shooting_accuracy' => $this->input->post('shooting_accuracy'),
				'passing_accuracy' => $this->input->post('passing_accuracy'),
				'user_id' => $this->session->userdata('user_id'),
				'player_id' => $player_id
			);

			// $assessment_id = $this->crud->create('tb_assessment', $assessment);

			$assessment_id = $this->curl->simple_post($this->API . '/api/assessment', $assessment, array(CURLOPT_BUFFERSIZE => 10));

			unlink($uploadFile);

			redirect('dashboard/player');
		}
	}

	public function process_delete($player_id) {
		if($this->session->userdata('user_role') != '2') {
			redirect('dashboard/player');
		}

		// $this->crud->delete('tb_player', array('player_id' => $player_id));

		$params = array('player_id' => $player_id);
        $this->curl->simple_delete($this->API . '/api/player', $params, array(CURLOPT_BUFFERSIZE => 10));

		redirect('dashboard/player');
	}
}
