<div>
  <form wire:submit.prevent="evaluate" class="space-y-2">
    @forelse ($contest->sections as $item)
      <article class="mb-2 bg-white" wire:key="{{ $item->id }}">
        <div class="border-[#EBEFF1] border rounded py-1.5 px-2 space-y-2">
          <header class="flex justify-between item-center text-[13px] leading-4 py-0.5">
            <p><span class="text-[#3A4551] mr-2">Seccion:</span>{{ $item->name }}</p>
          </header>
          <div>
            @forelse ($item->lessons as $key => $item)
              <article class="py-0.5" wire:key="{{ $item->id }}">
                <div class="px-1 py-1 text-[13px] leading-4 space-y-2">
                  <div class="flex items-center justify-between">
                    <div>
                      <p><span class="text-[#2F303C] mr-2 font-medium">Clase:</span>{{ $item->name }}</p>
                    </div>
                    <div class="flex">
                      <span class="inline-flex items-center px-3 text-[13px] leading-4 text-white bg-[#1B243E] rounded-l">
                        {{ $item->min }}
                      </span>
                      <input type="hidden" wire:model="items.{{ $item->id }}.lesson_id" >
                      <x-text-input type="number" min="{{ $item->min }}" max="{{ $item->max }}" wire:model="items.{{ $item->id }}.score" class="rounded-none"/>
                      <span class="inline-flex items-center px-3 text-[13px] leading-4 text-white bg-[#1B243E] rounded-r">
                        {{ $item->max }}
                      </span>
                    </div>
                  </div>
                  <x-input-error :messages="$errors->get('items.'.$item->id.'.score')" class="mt-2" />
                </div>
              </article>
            @empty
              <div class="border border-[#EBEFF1] border-dashed rounded py-1.5 text-center mb-3 mt-3">
                <p class="text-[13px] leading-4 text-[#2F303C]"> No hay clases</p>
              </div>
            @endforelse
          </div>
        </div>
      </article>
    @empty
      <div class="border border-gray-300 border-dashed rounded-[2.5px] py-1.5 text-center mb-2">
        <p class="text-[13px] leading-4 text-gray-500"> No hay secciones</p>
      </div>
    @endforelse
    <x-input-error :messages="$errors->get('items')" class="mt-2" />
    <x-primary-button type="submit">Evaluar <div wire:loading><ion-icon name="sync-outline" class="w-[18px] h-[18px] ml-2 animate-spin" wire:ignore></ion-icon></div> </x-primary-button>
  </form>
</div>
  