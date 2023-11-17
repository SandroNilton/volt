<div>
  @forelse ($contest->folders as $item)
    <article class="mb-2 bg-white" wire:key="{{ $item->id }}" x-data="{open: false}">
      <div class="border-[#EBEFF1] border rounded py-1.5 px-2">
        @if ($folder->id == $item->id)
          <form wire:submit.prevent="update">
            <x-input-label for="folder.name" :value="__('Nombre')" />
            <x-text-input wire:model="folder.name" id="folder.name" class="block w-full mt-1" type="text" name="folder.name" autofocus/>
            <x-input-error :messages="$errors->get('folder.name')" class="mt-2" />
          </form>
        @else
          <header class="flex justify-between item-center text-[13px] leading-4 items-center">
            <p class="cursor-pointer" x-on:click="open = !open"><span class="text-[#2F303C] mr-2">Folder:</span>{{ $item->name }}</p>
            <div wire:ignore class="flex space-x-3 py-0.5">
              <ion-icon name="create-outline" class="w-[18px] h-[18px] text-[#3A4551] cursor-pointer" wire:click="edit({{ $item }})"></ion-icon>
              <ion-icon name="trash-outline" class="w-[18px] h-[18px] text-[#3A4551] cursor-pointer" wire:click="destroy({{ $item }})"></ion-icon>
            </div>
          </header>
          <div x-show="open">
            <livewire:admin.contests.item-requirement :folder="$item" :key="$item->id">
          </div>
        @endif
      </div>
    </article>
  @empty
    <div class="border border-[#EBEFF1] border-dashed rounded py-2 text-center mb-2">
      <p class="text-[13px] leading-4 text-[#3A4551] px-2 w-full">No hay secciones</p>
    </div>
  @endforelse

  <div x-data="{open: false}" class="mt-3">
    <a x-show="!open" x-on:click="open = true" class="flex items-center cursor-pointer">
      <ion-icon name="add-circle-outline" class="mr-2 w-[18px] h-[18px] text-[#3A4551]" wire:ignore></ion-icon>
      <p class="text-[13px] leading-4">
        Agregar nuevo folder
      </p>
    </a>
    <article class="border border-[#F0F1F2] shadow-sm p-3 rounded" x-show="open">
      <p class="mb-3 text-[13px] leading-4 text-[#3A4551] font-medium text-center">Agregar nuevo folder</p>
      <div class="mb-3">
        <x-input-label for="name" :value="__('Nombre')" />
        <x-text-input wire:model="name"/>
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
      </div>
      <div class="flex justify-end space-x-4">
        <x-secondary-button class="py-1.5" x-on:click="open = false">Cancelar</x-secondary-button>
        <x-primary-button type="button" class="py-1.5" wire:click="store">Agregar</x-primary-button>
      </div>
    </article>
  </div>
</div>
