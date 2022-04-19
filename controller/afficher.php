<?php
require('models/get.php');

function homeStore(){
    require('./views/template.php');
}

function AllProducts(){
    $products = getAllProducts();
    $response = json_decode($products, true); //because of true, it's in an array
    
    require('./views/produits.php');
}
// Determine whether the sentiment of text is positive
// Use a web service
