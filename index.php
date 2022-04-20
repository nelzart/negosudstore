<?php
session_start();
?>
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