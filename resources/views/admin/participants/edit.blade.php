<x-admin-layout>
  <div>
    <div class="grid grid-cols-1 gap-3 bg-white lg:grid-cols-4 md:grid-cols-3">
      <livewire:admin.participants.update-form :participant="$participant">
      <livewire:admin.participants.files :participant="$participant">
    </div>
  </div>
</x-admin-layout>