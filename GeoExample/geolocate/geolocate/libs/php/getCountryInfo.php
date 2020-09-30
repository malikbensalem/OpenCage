<?php
    include('C:/wamp64/www/GeoExample/geolocate/geolocate/openCage/AbstractGeocoder.php');
    include('C:/wamp64/www/GeoExample/geolocate/geolocate/openCage/Geocoder.php'); //change dir to your relevant path
    $geocoder = new \OpenCage\Geocoder\Geocoder('ef9b0bca019946d7a6f618f8d59a3d99');

    $result = $geocoder->geocode($_REQUEST['country']);

    $JSON=json_encode($result,  JSON_PRETTY_PRINT |JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
    
    $fResult["continent"]=$result["results"][0]["components"]["continent"];
    $fResult["capital"]=$result["results"][0]["components"]["city"];
    $fResult["timezone"]=$result["results"][0]["annotations"]["timezone"]["short_name"]." (".$result["results"][0]["annotations"]["timezone"]["offset_string"].")";
    $fResult["currency"]=$result["results"][0]["annotations"]["currency"]["symbol"].". ".$result["results"][0]["annotations"]["currency"]["name"];
    $fResult["coordinates"]=$result["results"][0]["annotations"]["DMS"]["lat"]." : ".$result["results"][0]["annotations"]["DMS"]["lng"];
    $fResult["status"]=$result["status"]["message"];
    
    header('Content-Type: application/json; charset=UTF-8');
    echo json_encode($fResult,true);
    
?>