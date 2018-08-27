<?php

//trail api
//https://www.hikingproject.com/data
$hikingKey = "200268377-cde4c55edebe88cc791e1144e56ba2f4";
$lat = "40";
$lon = "-105";
$hikingURL = "https://www.hikingproject.com/data/get-trails?lat=".$lat."&lon=".$lon."&key=".$hikingKey;

//load hiking api data
function getHikingAPI($hikingURL){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_URL, $hikingURL);
    $result = curl_exec($curl);
    curl_close($curl);
    $obj = json_decode($result);
    
    return $obj;
    
}

$hikeAPI = getHikingAPI($hikingURL);

//get outputed html page of images 

function getPage($url){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($curl);
    curl_close($curl);

    return $output;
}



?>