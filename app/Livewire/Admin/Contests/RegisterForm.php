<?php

namespace App\Livewire\Admin\Contests;

use Livewire\Component;
use App\Models\Contest;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;

class RegisterForm extends Component
{ 
    use WithFileUploads;

    #[Rule('required|string|unique:contests')] 
    public $title = '';

    #[Rule('string')] 
    public $description = '' ;

    public $cover;

    public function register(): void
    {
        $this->validate();

        if($this->cover == null){
          $path = null;
        }else{
          $filename = $this->cover->getClientOriginalName();
          $path = $this->cover->storeAs('cover', $filename);
        }

        $contest = Contest::create([
          'cover_image' => $path,
          'title' => $this->title,
          'user_id' => auth()->user()->id,
          'description' => $this->description
        ]);

        $this->redirect(route('admin.contests.edit', $contest), navigate: true);
    }

    public function render()
    {
        return view('livewire.pages.admin.contests.register-form');
    }
}