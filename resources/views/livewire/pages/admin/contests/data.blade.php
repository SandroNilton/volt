<div>
  <div class="space-y-2">
    <div class="relative flex justify-center p-1 border border-[#EBEFF1] border-dashed rounded">
      <figure>
        <img src="{{ Storage::url($this->cover) }}" class="object-center w-full rounded">
      </figure>
    </div>
    <div class="flex items-center gap-x-3">
      <span class="text-[13px] font-semibold leading-4 text-[#3A4551]">Titulo</span>
      <p class="text-[13px] leading-4 text-[#3A4551]">{{ $this->contest->status }}</p>
    </div>
    <div class="flex items-center gap-x-3">
      <span class="text-[13px] font-semibold leading-4 text-[#3A4551]">Descripción</span>
      <p class="text-[13px] leading-4 text-[#3A4551]">{{ $this->description }}</p>
    </div>
  </div>
</div>