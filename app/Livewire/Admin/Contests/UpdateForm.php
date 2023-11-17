<?php

namespace App\Livewire\Admin\Contests;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Sleep;
use Livewire\Attributes\Rule;
use App\Models\Contest;

class UpdateForm extends Component
{
    use WithFileUploads;

    public $contest, $cover, $old_cover, $title, $description, $state = 0;

    protected function rules()
    {
      return [
        'title' => 'required|unique:contests,title,'.$this->contest->id,
        'description' => 'string',
      ];
    }

    public function mount(Contest $contest)
    {
        $this->old_cover = $contest->image;
        $this->title = $contest->title;
        $this->subtitle = $contest->subtitle;
        $this->description = $contest->description;
        $this->state = $contest->state;
        $this->contest = $contest;
    }

    public function update(): void
    {
      $this->validate();

      if($this->cover != null){
        $filename = $this->cover->getClientOriginalName();
        $path = $this->cover->storeAs('cover', $filename);
        Storage::delete($this->old_cover);
        $this->contest->update([
          'cover_image' => $path,
          'title' => $this->title,
          'description' => $this->description,
          'state' => $this->state
        ]);
      }else{
        $this->contest->update([
          'title' => $this->title,
          'description' => $this->description,
          'state' => $this->state
        ]);
      }
    }

    public function render()
    {
        return view('livewire.pages.admin.contests.update-form');
    }
}
