<?php

namespace App\Livewire\Admin\Contests;

use Livewire\Component;
use App\Models\Folder;
use App\Models\Requirement;

class ItemRequirement extends Component
{
    public $folder, $requirement, $name;

    protected $rules = [
      'requirement.name' => 'required',
    ];

    public function mount(Folder $folder): void
    {
        $this->folder = $folder;
        $this->requirement = new Requirement();
    }

    public function edit(Requirement $requirement): void
    {
        $this->resetValidation();
        $this->requirement = $requirement;
    }

    public function store(): void
    {
      $this->validate([
        'name' => 'required',
      ]);

      Requirement::create([
        'name' => $this->name,
        'position' => 0,
        'folder_id' => $this->folder->id
      ]);

      $this->reset(['name']);
      $this->folder = Folder::find($this->folder->id);
    }

    public function update(): void
    {
        $this->validate();
        $this->requirement->save();
        $this->requirement = new Requirement();
        $this->folder = Folder::find($this->folder->id);
    }

    public function cancel(): void
    {
        $this->requirement = new Requirement();
    }

    public function destroy(Requirement $requirement): void
    {
        $requirement->delete();
        $this->folder = Folder::find($this->folder->id);
    } 

    public function render()
    {
        return view('livewire.pages.admin.contests.item-requirement');
    }
}
