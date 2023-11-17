<div>
  <div class="sm:flex sm:items-center sm:justify-between">
    <div>
      <div class="flex items-center gap-x-3">
        <span class="text-[#3A4551] font-semibold text-sm">Concursos</span>
        <span class="px-2 py-0.5 text-[13px] leading-4 text-white bg-[#0064FB] rounded-full">N° {{ $contests->count() }}</span>
      </div>
      <p class="mt-1 text-[13px] leading-4 text-[#3A4551]">Filtros</p>
    </div>
    <div class="flex items-center mt-4 gap-x-3">
      <button href="{{ route('admin.contests.create') }}" wire:navigate class="flex items-center justify-center w-1/2 px-2 py-1 text-[13px] leading-4 text-[#3A4551] transition-colors duration-200 bg-white border border-[#EBEFF1] rounded-md gap-x-2 sm:w-auto hover:bg-gray-100">
        <ion-icon name="add-circle-outline" class="w-[18px] h-[18px]" wire:ignore></ion-icon>
        <span>Nuevo</span>
      </button>
      <button wire:click="$refresh" class="flex items-center justify-center w-1/2 px-2 py-1 text-[13px] leading-4 text-[#3A4551] transition-colors duration-200 bg-white border border-[#EBEFF1] rounded-md gap-x-2 sm:w-auto hover:bg-gray-100">
        <ion-icon name="refresh-outline" class="w-[18px] h-[18px]" wire:ignore></ion-icon>
        <span>Recargar</span>
      </button>
    </div>
  </div>
  <div class="mt-2">
    <x-table-responsive>
      <x-slot name="heading">
      </x-slot>
      <table class="w-full divide-y divide-[#EBEFF1] border border-[#EBEFF1]">
        <thead class="text-left bg-gray-50 text-[13px] leading-4 font-normal">
          <tr>
            <th scope="col" class="px-6 py-2 text-[#3A4551]">Titulo</th>
            <th scope="col" class="px-6 py-2 text-[#3A4551]">Participantes</th>
            <th scope="col" class="px-6 py-2 text-[#3A4551]">Estado</th>
            <th scope="col" class="px-6 py-2 text-[#3A4551]">Creador</th>
            <th scope="col" class="px-6 py-2"></th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-[#EBEFF1]">
          @forelse ($contests as $contest)
            <tr>
              <td class="px-6 py-2 whitespace-nowrap">
                <div class="flex items-center gap-x-2">
                  <img class="object-cover w-8 h-8 rounded-md" src="{{ Storage::url($contest->image) }}">
                  <p class="text-[13px] font-semibold leading-4 text-[#3A4551]">{{ $contest->title }}</p>
                </div>
              </td>
              <td class="px-6 whitespace-nowrap">
                <div class="flex items-center gap-x-2">
                  <ion-icon name="people-outline" class="w-[18px] h-[18px] text-[#3A4551]" wire:ignore></ion-icon>
                  <p class="text-[13px] leading-4 text-[#3A4551]">{{ $contest->participants_count }}</p>
                </div>
              </td>
              <td class="px-6 whitespace-nowrap">
                <div class="flex items-center">
                  <p class="text-[13px] leading-4 text-[#3A4551]">{{ $contest->status }}</p>
                </div>
              </td>
              <td class="px-6 whitespace-nowrap">
                <div class="flex items-center">
                  <p class="text-[13px] leading-4 text-[#3A4551]">{{ $contest->user->name ?? 'null' }}</p>
                </div>
              </td>
              <td class="px-6 whitespace-nowrap">
                <button href="{{ route('admin.contests.edit', $contest) }}" wire:navigate class="text-[13px] gap-x-2 leading-4 text-[#3A4551] py-1 px-2 bg-white border border-[#EBEFF1] rounded-md hover:bg-gray-100 focus:outline-none items-center flex">
                  <ion-icon name="settings-outline" class="w-[16px] h-[16px]" wire:ignore></ion-icon>
                  <span>Configurar</span>
                </button>
              </td>
            </tr>
          @empty
            <tr class="border-b border-gray-100 hover:bg-gray-50">
              <th colspan="5" class="flex items-center col-span-5 px-4 py-2 font-medium text-center text-gray-500 whitespace-nowrap">
              </th>
            </tr>
          @endforelse
        </tbody>
      </table>
      <x-slot name="footer">
        {{ $contests->links() }}
      </x-slot>
    </x-table-responsive>
  </div>
</div>
