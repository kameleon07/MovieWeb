<?php
// this returns an array of the closest cinema id's

$n = $_REQUEST["nub"];

$api = 'cinemasNearby/?n='.$n;

include 'login.php';

function getCinemas($arrayToSearch){
	$array = array(); 
    foreach ($arrayToSearch['cinemas'] as $key => $value) {
        array_push($array,$value['cinema_id']); 
    }
    
    return $array; 
}

if($body != null){
	$arrayToSearch = json_decode($body, true);
	$dsa = getCinemas($arrayToSearch);
	echo json_encode($dsa); 
}else{
  echo 'EMPTY';
}