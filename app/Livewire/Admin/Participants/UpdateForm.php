<?php

namespace App\Livewire\Admin\Participants;

use Livewire\Component;
use App\Models\Participant;
use App\Models\Contest;
use Livewire\Attributes\Rule;
use App\Models\Section;

class UpdateForm extends Component
{
    #[Rule('required', message: 'Please provide a post title')]
    public $items = [];

    public $participant, $contest, $section;

    public function mount(Participant $participant): void
    {
        $this->participant = $participant;
        $this->section = new Section();

        $this->contest = Contest::find($participant->contest_id);

        foreach ($this->contest->lessons as $key => $value) {
          $this->items[$value->id]['lesson_id'] = $value->id;
        }
    }

    public function evaluate(): void
    {
      $this->resetValidation();

      $this->validate([
        'items.*.score' => 'required|numeric',
        'items.*.lesson_id' => 'required',
      ]);

      dd($this->items);
    }

    public function render()
    {
        return view('livewire.pages.admin.participants.update-form');
    }
}
