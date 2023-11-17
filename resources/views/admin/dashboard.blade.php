<x-admin-layout>
  <div>
    <div class="flex flex-col gap-2 text-center sm:flex-row sm:items-center sm:justify-between sm:text-start">
      <div class="grow">
        <h1 class="mb-1 font-semibold text-md text-[#3A4551]">Bienvenido {{ auth()->user()->name }}</h1>
        <h2 class="text-[13px] leading-4 text-[#3A4551]">
          {{ auth()->user()->email }}
        </h2>
      </div>
      <div class="flex items-center justify-center flex-none gap-2 px-2 rounded sm:justify-end sm:bg-transparent sm:px-0">
      </div>
    </div>
    <hr class="mt-3 border-[#EBEFF1] lg:mt-3" />
    <div class="grid grid-cols-1 gap-3 mt-3 sm:grid-cols-2 lg:grid-cols-3">
      
    </div>
  </div>
</x-admin-layout>