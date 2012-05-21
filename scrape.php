<?php
header('Content-type: application/json');

$url = $_GET['url'];
$result = get_data($url);
$result = explode('data-sc-track="', $result );
$result = explode( '"', $result[1]);

$json = array( "trackID" => $result[0] );
echo json_encode($json);

function get_data($url) {
  $ch = curl_init();
  $timeout = 5;
  curl_setopt($ch,CURLOPT_URL,$url);
  curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
  curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout);
  $data = curl_exec($ch);
  curl_close($ch);
  return $data;
}
?>