<div>
  <div class="grid grid-cols-1 gap-3 sm:grid-cols-2 lg:grid-cols-4 xl:grid-cols-5">
    @forelse ($contests as $contest)
      <div class="w-full max-w-sm overflow-hidden rounded-md border border-[#EBEFF1]">
        <div class="flex items-end justify-end w-full h-48 bg-center bg-cover" style="background-image: url('{{ Storage::url($contest->image) }}')">
          @can('participating', $contest) 
            <div class="p-1.5 mx-[187px] mb-[152px] leading-3 text-white bg-teal-500 rounded-full focus:outline-none">
              <ion-icon name="radio-button-on-outline" class="w-[16px] h-[16px]"></ion-icon>
            </div>
          @else 
            <div class="p-1.5 mx-[187px] mb-[152px] leading-3 text-white bg-red-500 rounded-full focus:outline-none">
              <ion-icon name="radio-button-off-outline" class="w-[16px] h-[16px]"></ion-icon>
            </div>
          @endcan
          <button href="{{ route('user.contests.show', $contest) }}" wire:navigate class="p-1.5 mx-5 -mb-4 leading-3 text-white bg-[#0064FB] rounded-full hover:bg-blue-500 focus:outline-none focus:bg-red-500">
            <ion-icon name="eye-outline"></ion-icon>
          </button>
        </div>
        <div class="px-5 py-3">
          <h3 class="text-[#3A4551] uppercase font-semibold text-sm">{{ $contest->title }}</h3>
        </div>
      </div>
    @empty 
      <div class="grid col-span-5 text-lg border border-[#EBEFF1] border-dashed rounded-md h-28 place-items-center">
        <div class="text-center text-[#3A4551]">
          <ion-icon name="sad-outline" class="w-8 h-8"></ion-icon>
          <p class="text-[13px] leading-4 ">No hay concursos</p>
        </div>
      </div>
    @endforelse
  </div>
  <div class="flex justify-center">
    <div class="flex mt-8 rounded-md">
      {{ $contests->links() }}
    </div>
  </div>
</div>
