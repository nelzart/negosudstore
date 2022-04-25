
<div class="w-full h-full bg-black bg-opacity-90 top-0 overflow-y-auto overflow-x-hidden hidden fixed sticky-0" id="chec-div">
  <!--- more free and premium Tailwind CSS components at https://tailwinduikit.com/ --->
  <div class="w-full absolute z-10 right-0 h-full overflow-x-hidden transform translate-x-full transition ease-in-out duration-700 bg-[#350E12] " id="checkout">
    <div class="flex items-end lg:flex-row flex-col justify-end " id="cart">
      <div class="lg:w-1/2 md:w-8/12 w-full lg:px-8 lg:py-14 md:px-6 px-4 md:py-8 py-4 border-[#B98F50] border-l-4 shadow-2xl overflow-y-hidden overflow-x-hidden lg:h-screen h-auto bg-[#4F0F15]" id="scroll">
        <div class="flex items-center text-gray-500 hover:text-gray-600 cursor-pointer " onclick="checkoutHandler(false)">
        
          <p class="text-sm pl-2 leading-none text-[#B98F50]">&larr; Retour sur la page</p>
        </div>
        <p class="lg:text-4xl text-3xl font-black leading-10 text-[#B98F50] pt-3">Mon Panier</p>
        <div class="container-products">
          <div class="products">

          
          </div>        
        </div> 
        
      </div>
      <div class="lg:w-96 md:w-8/12 w-full bg-gray-100 h-full">
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
              <p class="text-2xl font-bold leading-normal text-right text-[#B98F50]"></p>
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

<script src="./public/affichePanier.js"></script>