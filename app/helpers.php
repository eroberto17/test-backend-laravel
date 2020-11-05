<?php

function saveCobros($request)
{
 
    $json = array(
        'date' => $request['date'],
        'client_number' => $request['client_number'],
        'service' => $request['service'],
        'price' => '10.25',
    );

    $ch = curl_init(URL::to('/').'/api/cobros');
    $post = json_encode($json);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
    curl_setopt($ch, CURLOPT_TIMEOUT, 3);
    curl_exec($ch);
    curl_close($ch);

}


?>