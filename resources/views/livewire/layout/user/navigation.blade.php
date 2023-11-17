<?php

use App\Livewire\Actions\Logout;
use App\Livewire\Forms\LogoutForm;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/login', navigate: true);
    }
}; 

?>

@php
  $links =  [
    [
      'title' => 'Panel',
      'url' => route('user.dashboard'),
      'active' => request()->routeIs('user.dashboard'),
    ],
    [
      'title' => 'Concursos',
      'url' => route('user.contests.index'),
      'active' => request()->routeIs('user.contests.index'),
    ],
    [
      'title' => 'Espacio',
      'url' => route('user.spaces.index'),
      'active' => request()->routeIs('user.spaces.index'),
    ],
  ];
@endphp

<header x-data="{ isOpen: false }" class="bg-white border-b border-[#EBEFF1] sticky top-0">
  <nav class="px-2 py-1 mx-auto md:px-6">
    <div class="flex flex-col mt-1 md:flex-row md:justify-between md:items-center">
      <div class="flex items-center justify-between">
        <div class="flex items-center">
          <a class="text-lg font-bold text-[#424c57]" href="{{ route('user.dashboard') }}">Voltage</a>
          <div class="hidden mx-10 md:block">
            <!-- Search input -->
            <div class="relative">
              <div class="absolute inset-y-0 left-0 flex items-center pl-2 pointer-events-none">
                <ion-icon name="search-outline" class="w-4 h-4 text-[#B0B5BB]"></ion-icon>
              </div>
              <x-text-input placeholder="Buscar" class="pl-8"></x-text-input>
            </div>
          </div>
        </div>
        <!-- Mobile menu button -->
        <div class="flex md:hidden">
          <button @click="isOpen = !isOpen" type="button" class="flex items-center justify-center border border-[#EBEFF1] rounded-full w-7 h-7 text-[13px] text-[#3A4551]">
            <ion-icon name="reorder-two-outline" class="w-4 h-4 fill-current"></ion-icon>
          </button>
        </div>
      </div>
      <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
      <div class="items-center md:flex" :class="isOpen ? 'block' : 'hidden'">
        <div class="flex flex-row items-center justify-between mt-2 space-x-3 md:mt-0 md:mx-1">
          <div class="flex space-x-1.5">
            <button class="flex items-center justify-center border border-[#EBEFF1] rounded-full w-8 h-8 text-[13px] text-[#3A4551]"><ion-icon name="grid-outline"></ion-icon></button>
            <button class="flex items-center justify-center border border-[#EBEFF1] rounded-full w-8 h-8 text-[13px] text-[#3A4551]"><ion-icon name="help-outline"></ion-icon></button>
            <button class="flex items-center justify-center border border-[#EBEFF1] rounded-full w-8 h-8 text-[13px] text-[#3A4551]"><ion-icon name="notifications-outline"></ion-icon></button>
          </div>
          <x-dropdown align="right" width="48">
            <x-slot name="trigger">
              <button type="button" data-dropdown-toggle="language-dropdown-menu" class="flex items-center cursor-pointer text-[13px] leading-4 space-x-2 border border-[#EBEFF1] pl-0.5 pr-1.5 rounded-full text-[#3A4551]">
                <div class="overflow-hidden rounded-full w-8 h-8 p-0.5">
                  <img src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?q=80&w=1000&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Mnx8dXNlcnxlbnwwfHwwfHx8MA%3D%3D" class="rounded-full" alt="">
                </div>
                <div x-data="{ name: '{{ auth()->user()->name }}' }" x-text="name" x-on:profile-updated.window="name = $event.detail.name"></div>
              </button>
            </x-slot>
            <x-slot name="content">
              <x-dropdown-link :href="route('user.profile')" wire:navigate>
                {{ __('Perfil') }}
              </x-dropdown-link>
              <button wire:click="logout" class="w-full text-left">
                <x-dropdown-link>
                  {{ __('Cerrar sesión') }}
                </x-dropdown-link>
              </button>
            </x-slot>
          </x-dropdown>
        </div>
        <!-- Search input on mobile screen -->
        <div class="mt-3 md:hidden">
          <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-2 pointer-events-none">
              <ion-icon name="search-outline" class="w-4 h-4 text-[#B0B5BB]"></ion-icon>
            </div>
            <x-text-input placeholder="Buscar" class="pl-8"></x-text-input>
          </div>
        </div>
      </div>
    </div>
    <div class="flex py-1.5 mt-1.5 -mx-3 overflow-y-auto whitespace-no-wrap scroll-hidden">
      @foreach ($links as $link)
        <a class="mx-3 text-[13px] leading-4 md:my-0 {{ $link['active'] ? 'text-[#0064FB]' : 'text-[#3A4551]' }}" href="{{ $link['url'] }}" wire:navigate>{{ $link['title'] }}</a>
      @endforeach
    </div>
  </nav>
</header>




