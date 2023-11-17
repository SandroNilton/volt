<?php

namespace App\Livewire\User\Contests;

use Livewire\Component;
use App\Models\Contest;
use App\Models\Participant;
use App\Models\Folder;
use App\Models\File;
use App\Models\Requirement;
use Livewire\WithFileUploads;

class Apply extends Component
{
    use WithFileUploads;

    public $contest, $folder, $items = [];

    public function mount(Contest $contest): void
    {
        $this->contest = $contest;
        $this->folder = new Folder();

        foreach ($this->contest->requirements as $key => $value) {
          $this->items[$value->id]['requirement_id'] = $value->id;
        }
    }


    public function participate(): void
    {
      $this->resetValidation();

      $participant = Participant::create([
        'user_id' => auth()->user()->id,
        'contest_id' => $this->contest->id
      ]);

      if ($this->contest->requirements != null) {

        $this->validate([
          'items.*.file' => 'required',
          'items.*.requirement_id' => 'required',
        ]);

        foreach ($this->items as $item) {
          $requirement = Requirement::find($item['requirement_id']);
          $filename = $requirement->id.'-'.$item['file']->getClientOriginalName();
          $folder = "".$this->contest->id.'/'.auth()->user()->name.'/'. $requirement->folder->name;
          $path = $item['file']->storeAs($folder, $filename);
  
          File::create([
            'user_id' => auth()->user()->id,
            'participant_id' => $participant->id,
            'requirement_id' => $item['requirement_id'],
            'filename' => $item['file']->getClientOriginalName(),
            'path' => $path
          ]);
        }
      }

      $this->dispatch('participate');
    }

    #[On('participate')]
    public function render()
    {
        return view('livewire.pages.user.contests.apply');
    }
}
