<?php
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);
    
    include('C:/wamp64/www/phpdemo/geolocate/geolocate/openCage/AbstractGeocoder.php');
    include('C:/wamp64/www/phpdemo/geolocate/geolocate/openCage/Geocoder.php');
    $geocoder = new \OpenCage\Geocoder\Geocoder('ef9b0bca019946d7a6f618f8d59a3d99');

    print_r($_POST)
    
    //$result = $geocoder->geocode('London');
    //^^it works when I do this
    $result = $geocoder->geocode($_REQUEST[country]);
    //^^this doesn't, how do i make it depend on the option in html? thanks
    $JSON=json_encode($result,  JSON_PRETTY_PRINT |JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    
    $fResult["continent"]=$result["results"][0]["components"]["continent"];
    $fResult["capital"]=$result["results"][0]["components"]["city"];
    $fResult["timezone"]=$result["results"][0]["annotations"]["timezone"]["short_name"]." (".$result["results"][0]["annotations"]["timezone"]["offset_string"].")";
    $fResult["currency"]=$result["results"][0]["annotations"]["currency"]["symbol"].". ".$result["results"][0]["annotations"]["currency"]["name"];
    $fResult["coordinates"]=$result["results"][0]["annotations"]["DMS"]["lat"]." : ".$result["results"][0]["annotations"]["DMS"]["lng"];
    $fResult["status"]=$result["status"]["message"];
    
    //print $JSON['results'][0]['formatted'];
    
    //$decode = json_decode($result,true);	
	
	// header('Content-Type: application/json; charset=UTF-8');
    echo json_encode($fResult,true);
    
?>