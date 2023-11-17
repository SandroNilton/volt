@push('css')
  <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
  <div id="fb-root"></div>
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v16.0" nonce="e09pDDgt"></script>
@endpush

<x-app-layout>
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
      <div class="border border-[#EBEFF1] rounded-md">
        <embed src="https://bialima.org/" style="width:100%; height: 479px;" class="scrollbar">
      </div>
      <div class="border border-[#EBEFF1] rounded-md">
        <iframe class="w-full" height="479" src="https://www.instagram.com/lima_cap/embed" frameborder="0" scrolling="no" allowtransparency="true"></iframe>
      </div>
      <div class="border border-[#EBEFF1] rounded-md">
        <div class="rounded-md fb-page" data-href="https://www.facebook.com/caplimaperu" data-tabs="timeline" data-width="1000" data-height="479" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
          <blockquote cite="https://www.facebook.com/caplimaperu" class="fb-xfbml-parse-ignore">
          </blockquote>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>