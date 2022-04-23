
<div class="w-full h-full bg-black bg-opacity-90 top-0 overflow-y-auto overflow-x-hidden hidden fixed sticky-0" id="chec-div">
  <!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->
  <div class="w-full absolute z-10 right-0 h-full overflow-x-hidden transform translate-x-full transition ease-in-out duration-700 bg-[#350E12] " id="checkout">
    <div class="flex items-end lg:flex-row flex-col justify-end " id="cart">
      <div class="lg:w-1/2 md:w-8/12 w-full lg:px-8 lg:py-14 md:px-6 px-4 md:py-8 py-4 border-[#B98F50] border-l-4 shadow-2xl overflow-y-hidden overflow-x-hidden lg:h-screen h-auto bg-[#4F0F15]" id="scroll">
        <div class="flex items-center text-gray-500 hover:text-gray-600 cursor-pointer " onclick="checkoutHandler(false)">
        
          <p class="text-sm pl-2 leading-none text-[#B98F50]">&larr; Retour sur la page</p>
        </div>
        <p class="lg:text-4xl text-3xl font-black leading-10 text-[#B98F50] pt-3">Mon Panier</p>
        <div class="md:flex items-strech py-8 md:py-10 lg:py-8 border-t border-[#B98F50]">
          <div class="md:w-4/12 2xl:w-1/4 w-full">
            <img src="https://daxueconseil.fr/wp-content/uploads/2016/09/Daxue-Conseil-Les-produits-du-terroir-fran%C3%A7ais-en-Chine.jpg" alt="Black Leather Bag" class="h-full object-center object-cover md:block hidden" />
            <img src="https://daxueconseil.fr/wp-content/uploads/2016/09/Daxue-Conseil-Les-produits-du-terroir-fran%C3%A7ais-en-Chine.jpg" alt="Black Leather Bag" class="md:hidden w-full h-full object-center object-cover" />
          </div>
          <div class="md:pl-3 md:w-8/12 2xl:w-3/4 flex flex-col  justify-center">
            <p class="text-xs leading-3 md:pt-0 pt-4 text-[#B98F50]"><?=$value['Fou_NomDomaine']?></p>
            <div class="flex items-center justify-between w-full pt-1">
              <p class="text-base font-black leading-none text-[#B98F50] uppercase"><?=$value['Pro_Nom']?></p>
              <input aria-label="Select quantity" class="py-2 px-1 border border-gray-200 mr-6 focus:outline-none "/>
               
            </div>
            <p class="text-xs leading-3 text-[#B98F50] pt-2"><?= $value['Typ_Libelle'] ?></p>
            <?php
            if ((!$value['Pro_Cepage'] == NULL) OR (!$value['Pro_Cepage'] == 0)) {
            echo '<p class="text-xs leading-3 text-[#B98F50] py-4">
            '.$value['Pro_Cepage'].'
            </p>' ;
          } else  {
            echo '';
          } 
          if ((!$value['Pro_Annee'] == NULL) OR (!$value['Pro_Annee'] == 0)) {
            echo '<p class="w-96 text-xs leading-3 text-[#B98F50] pt-2">
            - '.$value['Pro_Annee'].' -
            </p>' ;
          } else  {
            echo '';
          } ?>
            
            <div class="flex items-center justify-between pt-5">
              <div class="flex items-center">
                <p class="text-xs leading-3 underline text-amber-500 pl-5 cursor-pointer">Retirer du panier</p>
              </div>
              <p class="text-base font-black leading-none text-amber-500"><?php echo $value['Pro_Prix'] ?> €</p>
            </div>
          </div>
        </div>
        
        
      </div>
      <div class="lg:w-96 md:w-8/12 w-full bg-gray-100  h-full">
        <div class="flex flex-col lg:h-screen h-auto lg:px-8 md:px-7 px-4 lg:py-20 md:py-10 py-6 justify-between overflow-y-auto bg-[#350E12]">
          <div>
            <p class="lg:text-4xl text-3xl font-black leading-9 text-[#B98F50]">Facture</p>
            <div class="flex items-center justify-between pt-16">
              <p class="text-base leading-none text-[#B98F50]">Total</p>
              <p class="text-base leading-none text-[#B98F50]">XXX</p>
            </div>
            <div class="flex items-center justify-between pt-5">
              <p class="text-base leading-none text-[#B98F50]">frais d'envoi</p>
              <p class="text-base leading-none text-[#B98F50]"></p>
            </div>
            <div class="flex items-center justify-between pt-5">
              <p class="text-base leading-none text-[#B98F50]">Taxe</p>
              <p class="text-base leading-none text-[#B98F50]"></p>
            </div>
          </div>
          <div>
            <div class="flex items-center pb-6 justify-between lg:pt-5 pt-20">
              <p class="text-2xl leading-normal text-[#B98F50]">Total</p>
              <p class="text-2xl font-bold leading-normal text-right text-[#B98F50]">XXX</p>
            </div>
            <button onclick="checkoutHandler1(true)" class="text-lg antialiased font-bold leading-none w-full py-5 rounded-sm  border-[#B98F50] border-2 text-[#B98F50] uppercase bold">Valider le panier</button>
          </div>
        </div>
      </div>
    </div>

  <style>
    /* width */
    #scroll::-webkit-scrollbar {
      width: 1px;
    }

    /* Track */
    #scroll::-webkit-scrollbar-track {
      background: #f1f1f1;
    }

    /* Handle */
    #scroll::-webkit-scrollbar-thumb {
      background: rgb(133, 132, 132);
    }
  </style>
</div>

<script src="./public/affichePanier.js">

</script>