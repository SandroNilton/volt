<x-admin-layout>
  <div>
    <div class="grid gap-3 grid-cols-1 md:grid-cols-3 lg:grid-cols-4">
      <div class="sticky">
        <livewire:admin.contests.data :contest="$contest">
      </div>
      <div class="lg:col-span-3">
        <livewire:admin.participants.group :contest="$contest">
      </div>
    </div>
  </div>
</x-admin-layout>