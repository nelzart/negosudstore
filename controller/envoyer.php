<?php
require('models/post.php');

function sendCommand($finalTab){
    
    $sendmytab = json_encode($finalTab);

    postThisProduct($sendmytab);

    $message = '<script> localStorage.clear();</script> ';


    header('Location: https://negosud.digitaldilemma.fr');
    exit();

}
