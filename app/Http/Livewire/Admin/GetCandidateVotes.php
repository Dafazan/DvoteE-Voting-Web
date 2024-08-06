<?php

namespace App\Http\Livewire\Admin;

use App\Models\Condidate;
use Livewire\Component;

class GetCandidateVotes extends Component
{
    public $candidates;
    public function render()
    {
        $this->candidates = Condidate::orderBy('id', 'DESC')->get();
        return view('livewire.admin.get-candidate-votes')->layout("layout.admin-app");
    }
}