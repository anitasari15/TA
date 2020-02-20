<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once('config.php');

$response = array();
$sql = "SELECT * FROM tb_mhs";

if(isset($_GET['limit']) && $_GET['limit'] !== '') {
    $sql .= " LIMIT " . $_GET['limit'];
}

$query = mysqli_query($conn, $sql);

while($row = mysqli_fetch_array($query)) {
    array_push($response, array('id' => $row['id'], 'text_id' => $row['text_id'], 'text_en' => $row['text_en']));
}

http_response_code(200);

echo json_encode($response);