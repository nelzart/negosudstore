<?php 
$title = "Nos Produits";
var_dump($response)
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
                <span class="material-icons">&#xe8cc;</span> Mon panier <span class="cart ml-4 text-sm font-thin text-[#7B5F35]"> 0 </span>
            </button> 
        </div> 
    </div>

    <div class="w-[75%]">
        <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
            <?php
                    foreach($response as $value) {
                        if ($value['Pro_IsWeb'] == 1){
                            
                            echo '                                
                                <div id="'.$value['Pro_Id'].'"  class="w-full prendlui max-w-sm mx-auto rounded-md shadow-black overflow-hidden bg-white hover:shadow-2xl transition-shadow ease-in duration-300 produit '.str_replace(' ', '', $value['Typ_Libelle']).'"> 
                                    <dza href="?action=getThisProduct&id='.$value['Pro_Id'].'">
                                        <div class="flex items-end justify-end "> 
                                            <div class="h-56 w-full bg-cover object-cover bg-center"> 
                                                <img class="h-56 w-full object-cover" src="https://daxueconseil.fr/wp-content/uploads/2016/09/Daxue-Conseil-Les-produits-du-terroir-fran%C3%A7ais-en-Chine.jpg"/>
                                            </div>
                                            <button id="add-cart" class="add-cart absolute p-2 rounded-full bg-[#4F0F15] border-4 border-white text-white mx-5 -my-5 hover:bg-[#9D1D2B]">
                                                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">                                            
                                                    </path>
                                                </svg>
                                            </button>
                                            <input type="hidden" value="'.$value['Pro_Prix']. '" />                            
                                        </div>
                                        <div class="px-5 py-3">
                                            <h3 class="text-gray-700 uppercase">'
                                                .$value['Pro_Nom'].
                                            '</h3>
                                            <div class="flex justify-between">
                                        
                                                <span class="text-gray-500 mt-2">'
                                                    .$value['Pro_Prix']. ' € 
                                                </span>
                                                <span class="px-4 py-2 rounded-full border border-[#4F0F15] text-[#4F0F15] font-semibold text-sm flex align-center w-max ">
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
    let carts = document.querySelectorAll('.add-cart');

    let products = <?php echo json_encode($response); ?>;
                    
    
for(let i=0; i< carts.length; i++) {
    carts[i].addEventListener('click', () => {
        cartNumbers(products[i]);
        totalCost(products[i]);
    });
}

function onLoadCartNumbers() {
    let productNumbers = localStorage.getItem('cartNumbers');
    if( productNumbers ) {
        document.querySelector('.cart span').textContent = productNumbers;
    }
}

function cartNumbers(product, action) {
    let productNumbers = localStorage.getItem('cartNumbers');
    productNumbers = parseInt(productNumbers);

    let cartItems = localStorage.getItem('productsInCart');
    cartItems = JSON.parse(cartItems);

    if( action ) {
        localStorage.setItem("cartNumbers", productNumbers - 1);
        document.querySelector('.cart span').textContent = productNumbers - 1;
        console.log("action running");
    } else if( productNumbers ) {
        localStorage.setItem("cartNumbers", productNumbers + 1);
        document.querySelector('.cart span').textContent = productNumbers + 1;
    } else {
        localStorage.setItem("cartNumbers", 1);
        document.querySelector('.cart span').textContent = 1;
    }
    setItems(product);
}

function setItems(product) {
    // let productNumbers = localStorage.getItem('cartNumbers');
    // productNumbers = parseInt(productNumbers);
    let cartItems = localStorage.getItem('productsInCart');
    cartItems = JSON.parse(cartItems);

    if(cartItems != null) {
        let currentProduct = product.tag;
    
        if( cartItems[currentProduct] == undefined ) {
            cartItems = {
                ...cartItems,
                [currentProduct]: product
            }
        } 
        cartItems[currentProduct].inCart += 1;

    } else {
        product.inCart = 1;
        cartItems = { 
            [product.tag]: product
        };
    }

    localStorage.setItem('productsInCart', JSON.stringify(cartItems));
}

function totalCost( product, action ) {
    let cart = localStorage.getItem("totalCost");

    if( action) {
        cart = parseInt(cart);

        localStorage.setItem("totalCost", cart - product.price);
    } else if(cart != null) {
        
        cart = parseInt(cart);
        localStorage.setItem("totalCost", cart + product.price);
    
    } else {
        localStorage.setItem("totalCost", product.price);
    }
}

function displayCart() {
    let cartItems = localStorage.getItem('productsInCart');
    cartItems = JSON.parse(cartItems);

    let cart = localStorage.getItem("totalCost");
    cart = parseInt(cart);

    let productContainer = document.querySelector('.products');
    
    if( cartItems && productContainer ) {
        productContainer.innerHTML = '';
        Object.values(cartItems).map( (item, index) => {
            productContainer.innerHTML += 
            `<div class="md:flex items-strech py-8 md:py-10 lg:py-8 border-t border-[#B98F50]">
                <div class="md:w-4/12 2xl:w-1/4 w-full">
                    <img src="https://daxueconseil.fr/wp-content/uploads/2016/09/Daxue-Conseil-Les-produits-du-terroir-fran%C3%A7ais-en-Chine.jpg" class="h-full object-center object-cover md:block hidden" />
                    <img src="https://daxueconseil.fr/wp-content/uploads/2016/09/Daxue-Conseil-Les-produits-du-terroir-fran%C3%A7ais-en-Chine.jpg" class="md:hidden w-full h-full object-center object-cover" />
                </div>
                <div class="md:pl-3 md:w-8/12 2xl:w-3/4 flex flex-col  justify-center">
                    <p class="text-xs leading-3 md:pt-0 pt-4 text-[#B98F50]">`<?=$response['Fou_NomDomaine']?>`</p>
                        <div class="flex items-center justify-between w-full pt-1">
                            <p class="text-base font-black leading-none text-[#B98F50] uppercase">`<?=$response['Pro_Nom']?>`</p>
                            <input aria-label="Select quantity" class="py-2 px-1 border border-gray-200 mr-6 focus:outline-none "/>
                        </div>
                        <p class="text-xs leading-3 text-[#B98F50] pt-2">`<?= $response['Typ_Libelle'] ?>`</p>`
                        <?php
                            if ((!$response['Pro_Cepage'] == NULL) OR (!$response['Pro_Cepage'] == 0)) {
                                echo '<p class="text-xs leading-3 text-[#B98F50] py-4">
                                        '.$response['Pro_Cepage'].'
                                </p>' ;
                            } else  {
                                echo '';
                            } 
                            if ((!$response['Pro_Annee'] == NULL) OR (!$response['Pro_Annee'] == 0)) {
                                echo '<p class="w-96 text-xs leading-3 text-[#B98F50] pt-2">
                                    - '.$response['Pro_Annee'].' -
                                </p>' ;
                            } else  {
                                echo '';
                            } ?>`
            
                            <div class="flex items-center justify-between pt-5">
                                <div class="flex items-center">
                                    <p class="text-xs leading-3 underline text-amber-500 pl-5 cursor-pointer">Retirer du panier</p>
                                </div>
                                <p class="text-base font-black leading-none text-amber-500">`<?php echo $response['Pro_Prix'] ?>` €</p>
                                <input type="hidden" value="`<?php echo $response['Pro_Prix'] ?>`" />
                            </div>
                        </div>
                    </div>`;
                });

        productContainer.innerHTML += `
            <div class="basketTotalContainer">
                <h4 class="basketTotalTitle">Basket Total</h4>
                <h4 class="basketTotal">$${cart},00</h4>
            </div>`

        deleteButtons();
        manageQuantity();
    }
}

function manageQuantity() {
    let decreaseButtons = document.querySelectorAll('.decrease');
    let increaseButtons = document.querySelectorAll('.increase');
    let currentQuantity = 0;
    let currentProduct = '';
    let cartItems = localStorage.getItem('productsInCart');
    cartItems = JSON.parse(cartItems);

    for(let i=0; i < increaseButtons.length; i++) {
        decreaseButtons[i].addEventListener('click', () => {
            console.log(cartItems);
            currentQuantity = decreaseButtons[i].parentElement.querySelector('span').textContent;
            console.log(currentQuantity);
            currentProduct = decreaseButtons[i].parentElement.previousElementSibling.previousElementSibling.querySelector('span').textContent.toLocaleLowerCase().replace(/ /g,'').trim();
            console.log(currentProduct);

            if( cartItems[currentProduct].inCart > 1 ) {
                cartItems[currentProduct].inCart -= 1;
                cartNumbers(cartItems[currentProduct], "decrease");
                totalCost(cartItems[currentProduct], "decrease");
                localStorage.setItem('productsInCart', JSON.stringify(cartItems));
                displayCart();
            }
        });

        increaseButtons[i].addEventListener('click', () => {
            console.log(cartItems);
            currentQuantity = increaseButtons[i].parentElement.querySelector('span').textContent;
            console.log(currentQuantity);
            currentProduct = increaseButtons[i].parentElement.previousElementSibling.previousElementSibling.querySelector('span').textContent.toLocaleLowerCase().replace(/ /g,'').trim();
            console.log(currentProduct);

            cartItems[currentProduct].inCart += 1;
            cartNumbers(cartItems[currentProduct]);
            totalCost(cartItems[currentProduct]);
            localStorage.setItem('productsInCart', JSON.stringify(cartItems));
            displayCart();
        });
    }
}

function deleteButtons() {
    let deleteButtons = document.querySelectorAll('.product ion-icon');
    let productNumbers = localStorage.getItem('cartNumbers');
    let cartCost = localStorage.getItem("totalCost");
    let cartItems = localStorage.getItem('productsInCart');
    cartItems = JSON.parse(cartItems);
    let productName;
    console.log(cartItems);

    for(let i=0; i < deleteButtons.length; i++) {
        deleteButtons[i].addEventListener('click', () => {
            productName = deleteButtons[i].parentElement.textContent.toLocaleLowerCase().replace(/ /g,'').trim();
            
            localStorage.setItem('cartNumbers', productNumbers - cartItems[productName].inCart);
            localStorage.setItem('totalCost', cartCost - ( cartItems[productName].price * cartItems[productName].inCart));

            delete cartItems[productName];
            localStorage.setItem('productsInCart', JSON.stringify(cartItems));

            displayCart();
            onLoadCartNumbers();
        })
    }
}

onLoadCartNumbers();
displayCart();

</script>

</body>

<?php
require('cart.php');