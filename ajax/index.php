<?php
echo $service_url = 'http://api.openweathermap.org/data/2.5/weather?lat=4.809603&lon=-74.3487062&appid=0abd3be5b561798eed2e2de0a7288782';

$response = file_get_contents($service_url);

if(false !== $response) {
    $gists = json_decode($response, true);
}
echo '<pre>';
print_r($gists);