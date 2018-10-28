<?php

$flmTxt = $_REQUEST["t"];
$release = $_REQUEST["d"];

function toSearchable($text){
	if(strpos($text, ' ') !== false){
		$text = str_replace(" ", "+", $text); 
	}
	return $text;
}


$flmTxt = toSearchable($flmTxt); 

$api = 'filmLiveSearch/?query='.$flmTxt.'&n=10';

include 'login.php';


function getValidID($arrayToSearch){

    foreach ($arrayToSearch['films'] as $key => $value) {
        if ($value['release_dates']['release_date'] == $release){
        	return $value['film_id']; 
        }
    }
    
    return 0; 
}

if($body != null){
	$arrayToSearch = json_decode($body, true);
	$dsa = getValidID($arrayToSearch);
	echo $dsa; 
}else{
  echo 'EMPTY';
}

/*
$headers = explode("\r\n", $headers);
$headers = array_filter($headers);

//Output Headers

$allHeaders = '';
foreach ($headers as $value) {
    $allHeaders .= '<li>' . $value . '</li>';
}
$allHeaders = '<ul>' . $allHeaders . '</ul>';

echo $allHeaders;

$response = json_decode($body, true);

  if($http_code == 200){
      echo "<pre>" . json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . "</pre>";
  }elseif($http_code == 204){
      echo 'No results for request';
      echo "<pre>" . json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . "</pre>";
  }else{
      exit();
  }


*/
?>

