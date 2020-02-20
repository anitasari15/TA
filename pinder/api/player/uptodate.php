<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// connect database
require_once('../config.php');

// clean images
// $dir = "../../uploads/";

// if(is_dir($dir)) {
//     if($dh = opendir($dir)) {
//         while(($file = readdir($dh)) !== false) {
//             $check_file = "http://pinder.fumukaba.com/uploads/" . $file;
    
//             $cquery = "SELECT * FROM tb_player WHERE player_avatar = '$check_file'";
//             $check = mysqli_query($connect, $cquery);
//             $count = mysqli_num_rows($check);
            
//             if($count == 0) {
//                 unlink("../../uploads/" . $file);
//             }
//         }
        
//         closedir($dh);
//     }
// }

$query = "SELECT * FROM v_result ORDER BY result_point DESC";
$result = mysqli_query($connect, $query);

$array = array();

while($row = mysqli_fetch_assoc($result)) {
    $array[] = array(
      'result_id' => $row['result_id'],
      'result_date' => $row['result_date'],
      'result_point' => $row['result_point'],
      'result_position' => $row['result_position'],
      'assessment_id' => $row['assessment_id'],
      'assessment_date' => $row['assessment_date'],
      'body_balance' => $row['body_balance'],
      'leap' => $row['leap'],
      'running_speed' => $row['running_speed'],
      'agility' => $row['agility'],
      'stamina' => $row['stamina'],
      'dribble' => $row['dribble'],
      'shooting_accuracy' => $row['shooting_accuracy'],
      'passing_accuracy' => $row['passing_accuracy'],
      'user_id' => $row['user_id'],
      'player_id' => $row['player_id'],
      'player_fullname' => $row['player_fullname'],
      'player_gender' => $row['player_gender'],
      'player_origin' => $row['player_origin'],
      'player_weight' => $row['player_weight'],
      'player_height' => $row['player_height'],
      'player_avatar' => $row['player_avatar'],
      'player_note' => $row['player_note']
    );
}

echo ($result) ? json_encode($array) : '';