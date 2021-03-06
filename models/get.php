<?php

function getAllProducts(){
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://apistive.azurewebsites.net/API/controlers/Produit/obtenirTous.php',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'cache-control: no-cache'
        ),
));
    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    return $response;
}


function getThisProduct(){
    $id = $_GET['id'];
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://apistive.azurewebsites.net/API/controlers/Produit/obtenir.php?Pro_Id='.$id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'cache-control: no-cache'
        ),
));
    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    return $response;
}
