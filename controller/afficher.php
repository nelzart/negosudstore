<?php
require('models/get.php');

function homeStore(){
    require('./views/template.php');
}

function AllProducts(){
    $products = getAllProducts();
    // $images = getPictures();
    // $result = json_decode($images, true);
    $response = json_decode($products, true); //because of true, it's in an array
    
    require('./views/produits.php');
}
// Determine whether the sentiment of text is positive
// Use a web service

function thisProduct(){
    $product = getThisProduct($_GET['id']);
    $id = $_GET['id'];

    $response = json_decode($product, true);

    require('./views/produit.php');
}
function getMyCart(){
    require('./views/cart.php');
}