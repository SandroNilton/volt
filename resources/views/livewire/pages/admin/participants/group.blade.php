<div>
  <x-table-responsive>
    <x-slot name="heading">
      {{ $participants->links() }}
    </x-slot>
    <table class="w-full divide-y divide-[#EBEFF1] border border-[#EBEFF1]">
      <thead class="text-left bg-gray-50 text-[13px] leading-4 font-normal">
        <tr>
          <th scope="col" class="px-6 py-2 text-[#3A4551]">Nombre</th>
          <th scope="col" class="px-6 py-2 text-[#3A4551]">Email</th>
          <th scope="col" class="px-6 py-2 text-[#3A4551]">Estado</th>
          <th scope="col" class="px-6 py-2"></th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-[#EBEFF1]">
        @forelse ($participants as $participant)
          <tr tabindex="0" class="focus:outline-none h-14 border border-[#EBEFF1] bg-white shadow-sm">
            <td class="px-6 py-2 whitespace-nowrap">
              <div class="flex items-center gap-x-2">
                <div class="overflow-hidden rounded-full w-7 h-7 p-0.5">
                  <img src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?q=80&amp;w=1000&amp;auto=format&amp;fit=crop&amp;ixlib=rb-4.0.3&amp;ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8dXNlcnxlbnwwfHwwfHx8MA%3D%3D" class="rounded-full " alt="">
                </div>
                <p class="text-[13px] font-semibold leading-4 text-[#3A4551]">{{ $participant->user->name }}</p>
              </div>
            </td>
            <td class="px-6 py-2 whitespace-nowrap">
              <div class="flex items-center gap-x-2">
                <ion-icon name="mail-outline" class="w-[18px] h-[18px] text-[#3A4551]" wire:ignore></ion-icon>
                <p class="text-[13px] leading-4 text-[#3A4551]">{{ $participant->user->email }}</p>
              </div>
            </td>
            <td class="px-6 py-2 whitespace-nowrap">
              <div class="flex items-center">
                <p class="text-[13px] leading-4 text-[#3A4551]">{{ $participant->status }}</p>
              </div>
            </td>
            <td class="px-6 whitespace-nowrap">
              <button href="{{ route('admin.participants.edit', $participant) }}" wire:navigate class="text-[13px] gap-x-2 leading-4 text-[#3A4551] py-1 px-2 bg-white border border-[#EBEFF1] rounded-md hover:bg-gray-100 focus:outline-none items-center flex">
                <ion-icon name="color-wand-outline" class="w-[16px] h-[16px]" wire:ignore></ion-icon>
                <span>Evaluar</span>
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
    </x-slot>
  </x-table-responsive>
</div>