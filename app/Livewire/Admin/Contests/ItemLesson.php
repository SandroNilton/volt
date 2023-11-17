<?php

namespace App\Livewire\Admin\Contests;

use Livewire\Component;
use App\Models\Section;
use App\Models\Lesson;

class ItemLesson extends Component
{
    public $section, $lesson, $name, $min, $max;

    protected $rules = [
      'lesson.name' => 'required',
      'lesson.min' => 'required',
      'lesson.max' => 'required'
    ];

    public function mount(Section $section): void
    {
        $this->section = $section;
        $this->lesson = new Lesson();
    }

    public function edit(Lesson $lesson): void
    {
      $this->resetValidation();
      $this->lesson = $lesson;
    }

    public function store(): void
    {
      $this->validate([
        'name' => 'required',
        'min' => 'required|numeric',
        'max' => 'required|numeric',
      ]);

      Lesson::create([
        'name' => $this->name,
        'min' => $this->min,
        'max' => $this->max,
        'section_id' => $this->section->id
      ]);

      $this->reset(['name', 'min', 'max']);
      $this->section = Section::find($this->section->id);
    }

    public function update(): void
    {
        $this->validate();
        $this->lesson->save();
        $this->lesson = new Lesson();
        $this->section = Section::find($this->section->id);
    }

    public function cancel(): void
    {
        $this->lesson = new Lesson();
    }

    public function destroy(Lesson $lesson): void
    {
        $lesson->delete();
        $this->section = Section::find($this->section->id);
    } 

    public function render()
    {
        return view('livewire.pages.admin.contests.item-lesson');
    }
}
