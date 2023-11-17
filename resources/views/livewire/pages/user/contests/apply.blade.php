<div>
  @can('participating', $contest)
    <div class="relative flex flex-col rounded border border-[#EBEFF1] p-3">
      <div class="relative self-center m-0 overflow-hidden text-gray-700 bg-transparent shadow-none">
        <img class="h-20" src="https://cdn.metro-online.com/-/media/Project/MCW/ES_Makro/Info-y-servicios/gracias-por-participar/Banner-landing-confirmacin-encuesta.png?h=464&iar=0&w=1392&rev=f1e6348042a84b188dec85c780c9e104&sc_lang=es-ES&hash=F4314DC743B6EEEC38F688F930DC9822"/>
      </div>
      <div class="p-3 text-center">
        <h4 class="text-xl antialiased font-semibold">
          Ya estas participando
        </h4>
        <p class="block mt-3 font-sans text-xl antialiased font-normal leading-relaxed text-gray-700">
          Te mantendremos informados al correo: {{ auth()->user()->email }}
        </p>
      </div>
    </div>
  @else
    <div class="relative flex flex-col rounded border border-[#EBEFF1] p-3">
      <form wire:submit.prevent="participate" enctype="multipart/form-data" class="space-y-2">
        @forelse ($contest->requirements as $key => $item)
          <div class="border border-[#F0F1F2] px-3 py-1.5 text-[13px] leading-4 rounded" wire:key='{{ $item->id }}'>
            <p><span class="text-[#2F303C] mr-2 font-medium">Requisito:</span>{{ $item->name }}</p>
            <div class="my-2">
              <div class="mt-2">
                <input type="hidden" wire:model="items.{{ $item->id }}.requirement_id">
                <input type="file" wire:model="items.{{ $item->id }}.file" required/>
                <x-input-error :messages="$errors->get('items.'.$item->id.'.file')" class="mt-2" />
                  <x-input-error :messages="$errors->get('items.'.$item->id.'.requirement_id')" class="mt-2" />
              </div>
            </div>
          </div>
        @empty
          <div class="border border-gray-400 border-dashed rounded-[2.5px] py-1.5 text-center mb-3 mt-3">
            <p class="text-[13px] leading-4 text-gray-500"> No hay requisitos</p>
          </div>
        @endforelse
        <x-input-error :messages="$errors->get('items')" class="mt-2" />
  
        <x-primary-button>Participar <div wire:loading><ion-icon name="sync-outline" class="w-[18px] h-[18px] ml-2 animate-spin" wire:ignore></ion-icon></div></x-primary-button>
      </form>
    </div>
  @endcan
</div>
