<?php
session_start();
?>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lodash.js/4.17.4/lodash.min.js"></script>
<div id="output"></div>
<!-- Load Babel -->
<script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
<script>// not exactly vanilla as there is one lodash function

</script><!-- Your custom script here -->
<script type="text/babel">
var allCheckboxes = document.querySelectorAll('input[type=checkbox]');
var allProducts = Array.from(document.querySelectorAll('.produit'));
var checked = {};

getChecked('produits');

Array.prototype.forEach.call(allCheckboxes, function (el) {
  el.addEventListener('change', toggleCheckbox);
});

function toggleCheckbox(e) {
  getChecked(e.target.name);
  setVisibility();
}

function getChecked(name) {
  checked[name] = Array.from(document.querySelectorAll('input[name=' + name + ']:checked')).map(function (el) {
    return el.value;
  });
}

function setVisibility() {
  allProducts.map(function (el) {
    var startingReserves = checked.produits.length ? _.intersection(Array.from(el.classList), checked.produits).length : true;
    if (startingReserves ) {
      el.style.display = 'block';
    } else {
      el.style.display = 'none';
    }
  });
}
</script>

<?php
require'controller/afficher.php';
require'controller/envoyer.php';

try { // On essaie de faire des choses
    if (isset($_GET['action'])) {
      if ($_GET['action'] == 'AllProducts'){
          AllProducts();
      }
      elseif ($_GET['action'] == 'getThisProduct'){
        if (isset($_GET['id'])){
          thisProduct();
        }
      }
      elseif ($_GET['action'] == 'sendCommand'){
        if(!empty($_POST['prenom']) 
        && !empty($_POST['Nom']) 
        && !empty($_POST['email']) 
        && !empty($_POST['phone']) 
        && !empty($_POST['mdp']) 
        && !empty($_POST['pays']) 
        && !empty($_POST['codepostal']) 
        && !empty($_POST['ville']) 
        && !empty($_POST['adresse']))
        {
          
          // $idProdTab = [];
          // $inCartTab = [];
          // $myBool = true;
          // $i = 0 ;

          // while ($myBool == true) {

          //   if (!empty($_POST['incart-'.$i]) 
          //   && !empty($_POST['idprod-'.$i])) {
          //     array_push($inCartTab, $_POST['incart-'.$i]);

          //     array_push($idProdTab, $_POST['idprod-'.$i]);
          //     $i++ ;

          //   } else {
          //     $myBool == false;

          //   }      
            
          // }
          // var_dump($i);
          // var_dump($inCartTab);
          // var_dump($idProdTab);

            $finalTab = [];
            $i = 0;
            $bool = true;
            while ($bool == true)
            {
              if (!empty($_POST['incart-'.$i]))
              {

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
                $Pro_Id =  Intval($_POST['idprod-'.$i]) ;
                $Pro_Quantite = Intval($_POST['incart-'.$i]);

                $Products = array(
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

                array_push($finalTab, $Products);

                $i++;

              } else {
              $bool = false;
            }
          }
          sendCommand($finalTab);                         
        }
      }
    }
    else {
        homeStore();
    }
}
catch(Exception $e) { // S'il y a eu une erreur, alors...
    echo 'Erreur : ' . $e->getMessage();
}