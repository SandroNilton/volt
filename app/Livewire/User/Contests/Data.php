<?php

namespace App\Livewire\User\Contests;

use Livewire\Component;
use App\Models\Contest;

class Data extends Component
{
    public $contest;

    public function mount(Contest $contest)
    {
        $this->contest = $contest;
    }

    public function render()
    {
        return view('livewire.pages.user.contests.data');
    }
}
