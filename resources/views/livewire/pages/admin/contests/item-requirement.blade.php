<div>
  @forelse ($folder->requirements as $item)
    <article class="py-1" wire:key="{{ $item->id }}">
      <div>
        @if ($requirement->id == $item->id)
          <form wire:submit.prevent="update">
            <div class="flex-col items-center space-y-1.5 border border-[#EBEFF1] p-2 rounded">
              <div>
                <x-input-label for="requirement.name" :value="__('Nombre')" />
                <x-text-input wire:model="requirement.name" id="requirement.name" class="block w-full mt-1" type="text" name="requirement.name"/>
                <x-input-error :messages="$errors->get('requirement.name')" class="mt-2" />
              </div>
              <div class="flex justify-end space-x-3">
                <x-secondary-button type="submit" class="py-1.5">Actualizar</x-secondary-button>
                <x-danger-button type="button" class="py-1.5" wire:click="cancel">Cancelar</x-danger-button>
              </div>
            </div>
          </form>
        @else
          <div class="border border-[#EBEFF1] px-3 p-2 text-[13px] leading-4 space-y-1.5 rounded">
            <p><span class="text-[#3A4551] mr-2">Requisito:</span>{{ $item->name }}</p>
            <div class="mt-2 space-x-2 py-1">
              <x-secondary-button wire:click="edit({{ $item }})">Editar</x-secondary-button>
              <x-danger-button wire:click="destroy({{ $item }})">Eliminar</x-danger-button>
            </div>
          </div>
        @endif
      </div>
    </article>
  @empty
    <div class="border border-[#EBEFF1] border-dashed rounded py-2 text-center mb-3 mt-3">
      <p class="text-[13px] leading-4 text-[#3A4551] px-2 w-full">No hay secciones</p>
    </div>
  @endforelse

  <div x-data="{open: false}" class="mt-4 mb-4">
    <a x-show="!open" x-on:click="open = true" class="flex items-center cursor-pointer">
      <ion-icon name="add-circle-outline" class="mr-2 w-[18px] h-[18px] text-[#3A4551]" wire:ignore></ion-icon>
      <p class="text-[13px] leading-4">
        Agregar nuevo requisito
      </p>
    </a>
    <article class="border border-[#EBEFF1] p-3 rounded" x-show="open">
      <p class="mb-3 text-[13px] leading-4 text-[#3A4551] font-medium text-center">Agregar nuevo requisito</p>
      <div class="mb-3">
        <div>
          <x-input-label for="name" :value="__('Nombre')" />
          <x-text-input wire:model="name" id="name" class="block w-full mt-1" type="text" name="name"/>
          <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
      </div>
      <div class="flex justify-end space-x-4">
        <x-secondary-button class="py-1.5" x-on:click="open = false">Cancelar</x-secondary-button>
        <x-primary-button type="button" class="py-1.5" wire:click="store">Agregar</x-primary-button>
      </div>
    </article>
  </div>

</div>
