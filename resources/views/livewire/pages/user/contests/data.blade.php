<div>
  <div class="w-full overflow-hidden rounded-md border border-[#EBEFF1]">
    <div class="relative">
      <div class="text-center bg-center bg-cover h-72 ov6rflow-hidden" style="background-image: url('{{ Storage::url($contest->image) }}')"></div>
      <div class="absolute top-3 right-3">
        <label class="bg-white px-2 py-1.5 rounded-full text-[13px] leading-4 items-center flex">
          <ion-icon name="people-outline" class="w-4 h-4 mr-2" wire:ignore></ion-icon>
          Participantes: <p class="px-2">{{ $contest->participants_count }}</p> 
        </label>
      </div>
    </div>
    <div class="flex flex-col leading-normal bg-white">
      <div class="px-5 py-3">
        <p class="mb-2 text-md font-semibold text-[#3A4551]">{{ $contest->title ?? 'No tiene titulo' }}</p>
        <p class="mt-2 text-[13px] leading-4 text-[#3A4551]">{{ $contest->description ?? 'No tiene descripción' }}</p>
      </div>
      <div class="px-5 py-3">
        <p class="mb-2 text-md font-semibold text-[#3A4551]">Archivos adjuntos</p>
        <div class="flex space-x-3 py-1.5 mt-1.5 -mx-3 overflow-y-auto whitespace-no-wrap scroll-hidden">
          <div class="border border-[#EBEFF1] rounded-full flex items-center px-2 py-1">
            <ion-icon name="attach-outline" class="mr-1"></ion-icon>
            <span class="text-[13px] leading-4 text-[#3A4551]">Pantilla</span>
          </div>
          <div class="border border-[#EBEFF1] rounded-full flex items-center px-2 py-1">
            <ion-icon name="attach-outline" class="mr-1"></ion-icon>
            <span class="text-[13px] leading-4 text-[#3A4551]">Pantilla</span>
          </div>
          <div class="border border-[#EBEFF1] rounded-full flex items-center px-2 py-1">
            <ion-icon name="attach-outline" class="mr-1"></ion-icon>
            <span class="text-[13px] leading-4 text-[#3A4551]">Pantilla</span>
          </div>
          <div class="border border-[#EBEFF1] rounded-full flex items-center px-2 py-1">
            <ion-icon name="attach-outline" class="mr-1"></ion-icon>
            <span class="text-[13px] leading-4 text-[#3A4551]">Pantilla</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
