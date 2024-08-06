<?php

namespace App\Http\Livewire\Admin;

use App\Models\Condidate;
use App\Models\Position;
use App\Models\User;
use App\Models\Votes;
use Livewire\Component;
use PDF;

class GetReport extends Component
{
    public $candidates;
    public function render (){
        $this->candidates = Condidate::orderBy('id', 'DESC')->get();
        return view('livewire.admin.report')->layout('layout.report');
    }

    public function generatepdf(){
        
        $candidates = Condidate::all();
        
        $pdf = PDF::loadView('livewire.admin.report', ['data' => $candidates]);

        return $pdf->download('VoteReport.pdf');
    }
}