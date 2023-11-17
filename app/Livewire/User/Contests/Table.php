<?php

namespace App\Livewire\User\Contests;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Contest;

class Table extends Component
{
    use WithPagination;

    public function mount()
    {
    }

    public function render()
    {
        return view('livewire.pages.user.contests.table', ['contests' => Contest::where('state', 1)->orderBy('created_at', 'asc')->paginate(10),]);
    }
}
