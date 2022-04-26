<?php
require('models/post.php');


// "Uti_Adresse": "hh" ;
// "Uti_CompAdresse": "",
// "Uti_Cp": "30000",
// "Uti_Ville": "Nimes",
// "Uti_Pays": "France",
// "Uti_TelContact": "101214201",
// "Uti_Mdp": "$2y$10$nsIRUCGJIXFTsdWl3lKgi.5CF2YcAjhTlp.y38ZRR95vZ0dUlZafO",
// "Uti_MailContact": "qq@tt.fr",
// "Cli_Nom": "Dupont",
// "Cli_Prenom": "lolo",
// "Coc_Eta_Id": 2,
// "Pro_Id": 10,
// "Pro_Quantite": 1


function sendCommand(){
    
//  traitement des données
    $Uti_Adresse = $_POST['adresse'];
    $Uti_CompAdress = $_POST['adressecomp'];
    $Uti_Cp = $_POST['codepostal'];
    $Uti_Ville = $_POST['ville'];
    $Uti_Pays = $_POST['pays'];
    $Uti_TelContact = $_POST['phone'];
    $Uti_Mdp  = $_POST['mdp'];
    $Uti_MailContact = $_POST['email'];
    $Cli_Nom = $_POST['Nom'];
    $Cli_Prenom = $_POST['prenom'];
    $Coc_Eta_Id = 2;
    $Pro_Id =  2;
    $Pro_Quantite = 5 ;
    // $Pro_Id =  $_POST['idprod'.$i];
    // $Pro_Quantite = $_POST['incart'.$j] ;    
    
    $tab = [];
    $sendToJson = array(
        'Uti_Adresse' => $Uti_Adresse, 
        'Uti_CompAdresse' => $Uti_CompAdress, 
        'Uti_Cp' => $Uti_Cp, 
        'Uti_Ville' => $Uti_Ville, 
        'Uti_Pays' => $Uti_Pays,
        'Uti_TelContact' => $Uti_TelContact,
        'Uti_Mdp' => $Uti_Mdp,
        'Uti_MailContact' => $Uti_MailContact,
        'Cli_Nom' => $Cli_Nom,
        'Cli_Prenom' => $Cli_Prenom,
        'Coc_Eta_Id' => $Coc_Eta_Id,
        'Pro_Id' => $Pro_Id,
        'Pro_Quantite' => $Pro_Quantite
    );

    array_push($tab, $sendToJson);

    $sendmytab = json_encode($tab);

    var_dump($sendmytab);
    return $sendmytab;

}
