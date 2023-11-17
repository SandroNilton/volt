<div>
  <form wire:submit.prevent="update" class="space-y-2" enctype="multipart/form-data">
    <div class="relative flex justify-center p-1 border border-[#EBEFF1] border-dashed rounded" x-data="previewImage()">
      <figure>
        <img id="preview" x-show="imageUrl" :src="imageUrl" alt="" class="object-center w-full rounded">
        <img x-show="!imageUrl" src="https://drkamalpashafoundation.com/wp-content/uploads/2022/07/noimage.jpg" alt="" class="aspect-[11/5] object-cover object-center w-full rounded">
      </figure>
      <div class="absolute top-3 right-3">
        <label class="bg-white px-2 py-1.5 rounded text-[13px] leading-4 items-center flex cursor-pointer gap-2 border border-[#EBEFF1]">
          <ion-icon name="camera-outline" class="w-4 h-4" wire:ignore></ion-icon>
          Cambiar imagen
          <input wire:model="cover" type="file" accept="image/*" class="hidden" @change="fileChosen">
        </label>
      </div>
      <div class="absolute top-3 left-3" wire:loading wire:target="cover">
        <label class="bg-white px-2 py-1.5 rounded text-[13px] leading-4 items-center flex cursor-pointer gap-2 border border-[#EBEFF1]">
          <ion-icon name="sync-outline" class="w-4 h-4 animate-spin" wire:ignore></ion-icon>
          Cargando imagen espere
        </label>
      </div>
    </div>
    <div>
      <x-input-label for="state" :value="__('Estado')" />
      <select wire:model="state" name="state" id="state" class="bg-white border border-[#ECEFF1] placeholder-[#989FA6] text-[#3A4551] text-[13px] leading-4 rounded-[4px] focus:ring-0 focus:border-[#ECEFF1] block w-full py-1.5 px-2">
        <option value="0" selected>Privado</option>
        <option value="1" selected>Publico</option>
      </select>
      <x-input-error :messages="$errors->get('state')" class="mt-2" />
    </div>
    <div>
      <x-input-label for="title" :value="__('Titulo')" />
      <x-text-input wire:model="title" id="title" class="block w-full mt-1" type="text" name="title"/>
      <x-input-error :messages="$errors->get('title')" class="mt-2" />
    </div>
    <div>
      <x-input-label for="email" :value="__('Descripción')" />
      <x-textarea-input rows="7" wire:model="description" id="description" name="description"/>
      <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>
    <div class="flex justify-end mt-5 space-x-4">
      <x-secondary-button type="button" href="{{ route('admin.contests.index') }}" wire:navigate>Cancelar</x-secondary-button>
      <x-primary-button>Modificar</x-primary-button>
    </div>
  </form>
</div>

<script>
  function previewImage() {
    return {
      imageUrl: '{{ Storage::url($this->old_cover) }}',
      fileChosen(event) {
          this.fileToDataUrl(event, (src) => (this.imageUrl = src));
      },
      fileToDataUrl(event, callback) {
          if (!event.target.files.length) return;
          let file = event.target.files[0],
              reader = new FileReader();
          reader.readAsDataURL(file);
          reader.onload = (e) => callback(e.target.result);
      },
    };
  }
</script>