<x-admin-layout>
  <div class="grid lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-1 gap-3">
    <livewire:admin.contests.update-form :contest="$contest">
    <livewire:admin.contests.upload-files>
    <livewire:admin.contests.section-lesson :contest="$contest">
    <livewire:admin.contests.folder-requirement :contest="$contest">
  </div>
</x-admin-layout>

 