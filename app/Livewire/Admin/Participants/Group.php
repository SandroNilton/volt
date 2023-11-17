<?php

namespace App\Livewire\Admin\Participants;

use Livewire\WithPagination;
use App\Models\Contest;
use App\Models\Participant;
use Livewire\Component;

class Group extends Component
{
    use WithPagination;

    public $contest;

    public function mount(Contest $contest): void
    {
        $this->contest = $contest;
    }

    public function render()
    {
        return view('livewire.pages.admin.participants.group', ['participants' => Participant::where('contest_id', $this->contest->id)->orderBy('created_at', 'desc')->paginate(10)]);
    }
}


