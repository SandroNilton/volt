<?php

namespace App\Livewire\Admin\Contests;

use Livewire\Component;
use App\Models\Contest;
use App\Models\Folder;

class FolderRequirement extends Component
{
    public $contest, $folder, $name;

    protected $rules = [
        'folder.name' => 'required|unique:folders'
    ];

    public function mount(Contest $contest): void
    {
        $this->contest = $contest;
        $this->folder = new Folder();
    }

    public function edit(Folder $folder): void
    {
        $this->folder = $folder;
    }

    public function update(): void
    {
        $this->validate();
        $this->folder->save();
        $this->folder = new Folder();
        $this->contest = Contest::find($this->contest->id);
    }

    public function store(): void
    {
        $this->validate(['name' => 'required']);
        Folder::create([
          'name' => $this->name,
          'contest_id' => $this->contest->id
        ]);
        $this->reset('name');
        $this->contest = Contest::find($this->contest->id);
    }

    public function destroy(Folder $folder): void
    {
        $folder->delete();
        $this->contest = Contest::find($this->contest->id);
    }

    public function render()
    {
        return view('livewire.pages.admin.contests.folder-requirement');
    }
}
