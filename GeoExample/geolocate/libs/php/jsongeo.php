<?php
  include('openCage\AbstractGeocoder.php');
  include('openCage\Geocoder.php'); 
  $geocoder = new \OpenCage\Geocoder\Geocoder('ef9b0bca019946d7a6f618f8d59a3d99');

  $result = $geocoder->geocode('England');
  $JSON=json_encode($result,  JSON_PRETTY_PRINT |JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
  
  echo "<pre>";
      print $JSON;
  echo "</pre>";

?>
