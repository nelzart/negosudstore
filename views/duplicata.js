
    let carts = document.querySelectorAll('.add-cart');
    console.log(carts);
    

    let products = <?php echo json_encode($response) ;?>
    // console.log(products)
    
    // if (products.Pro_IsWeb) 
    // alert(carts)
    // console.log(products)
    
    let isWeb = [];

    for(let i = 0; i <= carts.length; i++) {
        if (products[i].Pro_IsWeb !== 0) {
            isWeb.push(products[i])
        }
    }            
        for(let j = 0; j <= carts.length; j++) { 
            const obj = Object.assign({}, isWeb)  
            // console.log(obj[1]['Pro_IsWeb'])
             
            console.log( obj[j] );
            break;
            if (obj['Pro_IsWeb'] == 1) {
                // alert(isWeb[i].Pro_Nom)
                carts.addEventListener('click', () => {
                    alert(obj[j]['Pro_Nom']); 
                    // cartNumbers(products[j]);
                    // totalCost(products[j]);
                })
            }
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
                    <p class="text-xs leading-3 md:pt-0 pt-4 text-[#B98F50]"><?= $response[$index]['Fou_NomDomaine']?></p>
                        <div class="flex items-center justify-between w-full pt-1">
                            <p class="text-base font-black leading-none text-[#B98F50] uppercase"><?= $response[$index]['Pro_Nom'] ?></p>
                            <input aria-label="Select quantity" class="py-2 px-1 border border-gray-200 mr-6 focus:outline-none "/>
                        </div>
                        <p class="text-xs leading-3 text-[#B98F50] pt-2"><?= $response[$index]['Typ_Libelle'] ?></p>
                        <?php
                            if ((!$response[$index]['Pro_Cepage'] == NULL) OR (!$response[$index]['Pro_Cepage'] == 0)) {
                                echo '<p class="text-xs leading-3 text-[#B98F50] py-4">
                                        '.$response[$index]['Pro_Cepage'].'
                                </p>' ;
                            } else  {
                                echo '';
                            } 
                            if ((!$response[$index]['Pro_Annee'] == NULL) OR (!$response[$index]['Pro_Annee'] == 0)) {
                                echo '<p class="w-96 text-xs leading-3 text-[#B98F50] pt-2">
                                    - '.$response[$index]['Pro_Annee'].' -
                                </p>' ;
                            } else  {
                                echo '';
                            } ?>
            
                            <div class="flex items-center justify-between pt-5">
                                <div class="flex items-center">
                                    <p class="text-xs leading-3 underline text-amber-500 pl-5 cursor-pointer">Retirer du panier</p>
                                </div>
                                <p class="text-base font-black leading-none text-amber-500"><?php echo $response[$index]['Pro_Prix'] ?> €</p>
                                <input type="hidden" value="<?php echo $response[$index]['Pro_Prix'] ?>" />
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



<div class="product md:flex items-strech py-8 md:py-10 lg:py-8 border-t border-[#B98F50]">coucou
                 <div class="md:w-4/12 2xl:w-1/4 w-full">
                     <img src="https://daxueconseil.fr/wp-content/uploads/2016/09/Daxue-Conseil-Les-produits-du-terroir-fran%C3%A7ais-en-Chine.jpg" class="h-full object-center object-cover md:block hidden" />
                     <img src="https://daxueconseil.fr/wp-content/uploads/2016/09/Daxue-Conseil-Les-produits-du-terroir-fran%C3%A7ais-en-Chine.jpg" class="md:hidden w-full h-full object-center object-cover" />
                 </div>
                 <div class="md:pl-3 md:w-8/12 2xl:w-3/4 flex flex-col justify-center">
                     <span class="text-xs leading-3 md:span-0 pt-4 text-[#B98F50]">${item.Fou_NomDomaine}</span>
                         <div class="flex items-center justify-between w-full pt-1">
                             <span class="text-base font-black leading-none text-[#B98F50] uppercase">${item.Pro_Nom}</span>
                             <input aria-label="Select quantity" class="py-2 px-1 border border-gray-200 mr-6 focus:outline-none "/>
                         </div>
                         <span class="text-xs leading-3 text-[#B98F50] pt-2">${item.Typ_Libelle}</span>
                          <?php
                              if ((!$response[$index]['Pro_Cepage'] == NULL) OR (!$response[$index]['Pro_Cepage'] == 0)) {
                                  echo '<p class="text-xs leading-3 text-[#B98F50] py-4">
                                          '.$response[$index]['Pro_Cepage'].'
                                  </p>' ;
                              } else  {
                                  echo '';
                              } 
                              if ((!$response[$index]['Pro_Annee'] == NULL) OR (!$response[$index]['Pro_Annee'] == 0)) {
                                  echo '<p class="w-96 text-xs leading-3 text-[#B98F50] pt-2">
                                      - '.$response[$index]['Pro_Annee'].' -
                                  </p>' ;
                              } else  {
                                  echo '';
                              } ?>

                             <div class="flex items-center justify-between pt-5">
                                 <div class="flex items-center">
                                     <p class="text-xs leading-3 underline text-amber-500 pl-5 cursor-pointer">Retirer du panier</p>
                                 </div>
                                 <p class="price text-base font-black leading-none text-amber-500">${item.Pro_Prix} €</p>
                                 <input type="hidden" value=${item.Pro_Prix} />
                                 <div class="quantity">
                                     <ion-icon class="decrease " name="arrow-dropleft-circle"></ion-icon>
                                         <span>${item.inCart}</span>
                                     <ion-icon class="increase" name="arrow-dropright-circle"></ion-icon>   
                                 </div>
                                 <div class="total">$${item.inCart * item.Pro_Prix},00</div>
                             </div>
                         </div>
                     </div>`; console.log(item.inCart);
                 });







                 <div class="product md:flex items-strech py-8 md:py-10 lg:py-8 border-t border-[#B98F50] text-[#B98F50] justify-center items-center">
                    <ion-icon class="material-icons cursor-pointer hover:text-[#7B5F35]">&#xe92e;</ion-icon>
                    <div class="md:w-4/12 2xl:w-1/4 w-full">
                        <img src="https://daxueconseil.fr/wp-content/uploads/2016/09/Daxue-Conseil-Les-produits-du-terroir-fran%C3%A7ais-en-Chine.jpg" class="h-full object-center object-cover md:block hidden" />
                        <img src="https://daxueconseil.fr/wp-content/uploads/2016/09/Daxue-Conseil-Les-produits-du-terroir-fran%C3%A7ais-en-Chine.jpg" class="md:hidden w-full h-full object-center object-cover" />
                    </div>
                    <div class="md:pl-3 md:w-8/12 2xl:w-3/4 flex flex-col justify-center">
                        <span class="sm-hide text-xs leading-3 md:pt-0 pt-4 text-[#B98F50]">
                            ${item.Fou_NomDomaine}
                        </span>
                        <span class="sm-hide flex items-center justify-between w-full pt-1">
                            <span class="text-base font-black leading-none text-[#B98F50] uppercase">
                                ${item.Pro_Nom}
                            </span>
                        </span>
                        <div class="price sm-hide text-base font-black leading-none text-amber-500">
                            ${item.Pro_Prix} €
                        </div>
                    </div>
                    <div class="quantity float-right flex flex-col items-center">
                        <ion-icon class="increase material-icons cursor-pointer hover:text-[#7B5F35]" name="arrow-dropright-circle"> &#xe148; </ion-icon>  
                            <span>${item.inCart}</span>
                        <ion-icon class="decrease material-icons cursor-pointer cursor-pointer hover:text-[#7B5F35]" name="arrow-dropleft-circle"> &#xe15d; </ion-icon>
                    </div>
                </div>