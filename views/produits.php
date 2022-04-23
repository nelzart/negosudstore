<?php 
$title = "Nos Produits";
?>
<body class="bg-[#4F0F15]">
    
    
    <div class="bg-[#4F0F15] h-max bg-fixed flex">
        <button class="h-[100%] absolute bg-[#B98F50] shadow-lg sm:flex lg:hidden ">
            <span class="material-icons text-[#7B5F35]">&#xe5e1;</span>
        </button>
        <div class="w-[20%] bg-fixed flex justify-around">
            <div id="filter" class=" flex m-6 flex-col hidden lg:flex">
            <img src='./public/logo_negosud.svg' alt='' width={350} min-width={250} class="mb-8"/>
            
            <h3 class="text-2xl text-[#B98F50] mb-6">Filtrer les produits</h3>
            <?php 
                $tab = [];
                foreach($response as $type) {
                    if (($type['Pro_IsWeb'] == 1) 
                    && (!in_array($type['Typ_Libelle'], $tab))){
                        array_push($tab, $type['Typ_Libelle']);
                    }
                }
                foreach($tab as $checkbox) {
                    echo "<div><input class='form-check-input appearance-none h-4 w-4 m-4 border border-white rounded-xl bg-white checked:bg-[#B98F50] checked:shadow-inner checked:border-2 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer' type='checkbox' name='produits' value='".str_replace(' ', '', $checkbox)."' id='".str_replace(' ', '', $checkbox)."'><label class='form-check-label inline-block text-[#B98F50]' for='".str_replace(' ', '', $checkbox)."'> $checkbox</label></div>";
                }
                
                ?>
            
            <button onclick="checkoutHandler(false)" class="p-2 pl-5 pr-5 mt-10 bg-transparent border-2 border-[#B98F50] text-[#B98F50] text-lg rounded-lg transition-colors duration-700 transform hover:bg-[#B98F50] hover:text-[#4F0F15]">
                <span class="material-icons">&#xe8cc;</span> Mon panier
            </button> 
        </div> 
    </div>

    <div class="w-[75%]">
        <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
            <?php
                    foreach($response as $value) {
                        if ($value['Pro_IsWeb'] == 1){
                            
                            echo '                                
                            <div id="'.$value['Pro_Id'].'" class="w-full max-w-sm mx-auto rounded-md shadow-black overflow-hidden bg-white hover:shadow-2xl transition-shadow ease-in duration-300 produit '.str_replace(' ', '', $value['Typ_Libelle']).'"> <a href="?action=getThisProduct&id='.$value['Pro_Id'].'">
                            <div class="flex items-end justify-end "> 
                            <div class="h-56 w-full bg-cover object-cover bg-center"> 
                            <img class="h-56 w-full object-cover" src="https://daxueconseil.fr/wp-content/uploads/2016/09/Daxue-Conseil-Les-produits-du-terroir-fran%C3%A7ais-en-Chine.jpg"/>
                            </div>
                            <button id="addToCart" class="absolute p-2 rounded-full bg-[#4F0F15] border-4 border-white text-white mx-5 -my-5 hover:bg-[#9D1D2B]">
                            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">                                            
                            </path>
                            </svg>
                            </button>                            
                            </div>
                            <div class="px-5 py-3">
                            <h3 class="text-gray-700 uppercase">'
                            .$value['Pro_Nom'].
                            '</h3>
                            <div class="flex justify-between">
                            
                            <span class="text-gray-500 mt-2">'
                            .$value['Pro_Prix']. ' € 
                            </span>
                            <span
                            class="px-4 py-2 rounded-full border border-[#4F0F15] text-[#4F0F15] font-semibold text-sm flex align-center w-max ">
                            ' .$value['Typ_Libelle'].'
                            </span>
                            </div>                                            
                            </div> 
                            </a>
                            </div>
                            ';
                        }
                    }
                    ?>
            </div>   
        </div> 
    </div> 
</div>

<script>
    add 
</script>

</body>

<?php
require('cart.php');