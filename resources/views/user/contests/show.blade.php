<x-app-layout>
  <div class="grid grid-cols-1 gap-3 lg:grid-cols-2 xl:grid-cols-3">
    <div class="lg:col-span-2">
      <livewire:user.contests.data :contest="$contest">
    </div>
    <div>
      <livewire:user.contests.apply :contest="$contest">
    </div>
  </div>
</x-app-layout>