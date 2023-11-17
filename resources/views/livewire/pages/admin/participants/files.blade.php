<div>
  @forelse ($this->participant->files as $item)
    <article class="mb-2 bg-white" wire:key="{{ $item->id }}">
      <div class="border-[#EBEFF1] border rounded py-2 px-2 space-y-2">
        <div class="flex justify-between item-center text-[13px] leading-4 py-0.5 space-x-3">
          <p class="overflow-hidden text-ellipsis">{{ $item->filename }}</p>
          <div wire:ignore class="flex space-x-3">
            <ion-icon name="link-outline" class="w-[18px] h-[18px] text-[#3A4551] cursor-pointer" wire:click="download({{ $item }})"></ion-icon>
            <ion-icon name="cloud-download-outline" class="w-[18px] h-[18px] text-[#3A4551] cursor-pointer" wire:click="download({{ $item }})"></ion-icon>
            <div wire:loading><ion-icon name="sync-outline" class="w-[18px] h-[18px] ml-2 animate-spin" wire:ignore></ion-icon></div>
          </div>
        </div>
      </div>
    </article>
  @empty
    <div class="border border-gray-300 border-dashed rounded-[2.5px] py-1.5 text-center mb-2">
      <p class="text-[13px] leading-4 text-gray-500"> No hay archivos</p>
    </div>
  @endforelse
</div>
