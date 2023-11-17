<?php

namespace App\Livewire\Admin\Participants;

use Livewire\Component;
use App\Models\Participant;
use App\Models\Contest;
use App\Models\File;
use Illuminate\Support\Facades\Storage;

class Files extends Component
{
    public $participant, $contest;

    public function mount(Participant $participant): void
    {
        $this->participant = $participant;
        $this->contest = Contest::find($participant->contest_id);
    }

    public function preview($item): void 
    {
      dd('action');
    }

    public function download($item): void
    {
      $headers = ['Content-Description' => 'File Transfer', 'Content-Type' => Storage::mimeType($item['filename']),];
      return Storage::download($item['path'], $item['filename'], $headers);
    }

    public function render()
    {
        return view('livewire.pages.admin.participants.files');
    }
}
