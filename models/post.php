<?php

function postThisProduct($sendmytab){
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://apistive.azurewebsites.net/API/controlers/CommandeClient/ajouter.php',
        CURLOPT_POST => 1,
        CURLOPT_POSTFIELDS => $sendmytab,
        CURLOPT_RETURNTRANSFER => 1, 
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        )   
    ),
);
    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    return $response;
}
