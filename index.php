<?php
session_start();
?>
<script src="https://cdn.tailwindcss.com"></script>

<?php
require'controller/afficher.php';

try { // On essaie de faire des choses
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'AllProducts'){
            AllProducts();
        }
    }
    else {
        homeStore();
    }
}
catch(Exception $e) { // S'il y a eu une erreur, alors...
    echo 'Erreur : ' . $e->getMessage();
}