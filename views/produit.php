<?php 

// var_dump($id) ;
// var_dump($response['Pro_Nom']) ;


?>

<div class="bg-[#350E12] p-8 h-full">

<a href="?action=AllProducts" class="px-6 pt-6 pb-4  pt-8 text-[#B98F50] hover:text-[#7B5F35]">&larr; Retourner sur la page </a>

<div class="relative bg-[#4F0F15] border-4 border-[#B98F50] px-6 pt-6 pb-4 shadow-xl ring-1 ring-gray-900/5 sm:mx-auto sm:max-w-lg sm:rounded-lg sm:px-10">
  <div class="mx-auto max-w-md">
    <div class="h-56 w-full bg-cover object-cover bg-center"> 
      <img class="h-56 w-full object-cover" src="https://via.placeholder.com/550"/>
    </div>
    
    <div class="divide-y divide-[#B98F50]">
      <div class="text-[#B98F50] pt-8 text-base font-semibold leading-7 uppercase flex justify-between">
        <p> <?=$response['Pro_Nom']?> </p>
        <p><?=$response['Pro_Prix']?> €</p>
</div>
      <p class="text-[#7B5F35] text-base font-semibold uppercase">
        <?=$response['Fou_NomDomaine']?>
      </p>
    </div>
      <div class="space-y-6 py-4 text-base leading-7 text-[#A17C45]">
          <p><?=$response['Pro_Description']?></p>
          <div class="flex">
          <span class="px-4 py-2 mr-2 rounded-full border border-[#B98F50] text-[#B98F50] font-semibold text-sm flex align-center w-max ">
          <?=$response['Typ_Libelle']?>
          </span>
          <span class="px-4 py-2 mr-2 rounded-full border border-[#B98F50] text-[#B98F50] font-semibold text-sm flex align-center w-max ">
          <?=$response['Pro_Cepage']?>
          </span>
          <span class="px-4 py-2 mr-2 rounded-full border border-[#B98F50] text-[#B98F50] font-semibold text-sm flex align-center w-max ">
          <?=$response['Pro_Annee']?>
          </span>
        </div>
      </div>
    
    </div>
  </div>
  </div>
