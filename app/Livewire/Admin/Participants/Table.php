<?php

namespace App\Livewire\Admin\Participants;

use Livewire\WithPagination;
use App\Models\Contest;
use Livewire\Component;

class Table extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.pages.admin.participants.table', ['contests' => Contest::where('state', 1)->orderBy('created_at', 'desc')->paginate(10)]);
    }
}
