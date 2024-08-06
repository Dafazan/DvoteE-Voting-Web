<?php

namespace App\Http\Controllers;

use App\Models\Condidate;
use App\Models\Position;
use App\Models\User;
use App\Models\Votes;
use Illuminate\Http\Request;
use PDF;

class ReportController extends Controller
{
    // public $totalCandidates;
    // public $totalPositions;
    // public $totalVoter;
    // public $totalVotes;
    // public $candidates;
    // public $isVotedUser;
    // public $notVotedUser;
    public function index()
    {
        $candidates = Condidate::all();
        $totalVotes = Votes::count();
        $totalVoter = User::count();
        $totalUnvote = User::where('voted',0)->count();  
        $totalVote = User::where('voted',1)->count();  
        $totalCandidates = Condidate::count();
        // $user = User::count();
        // $this->candidates = Condidate::orderBy('id', 'DESC')->get();
        // $this->totalCandidates = Condidate::count();
        // $this->totalPositions = Position::count();
        // $this->totalVoter = User::count();
        // $this->totalVotes = Votes::count();
        // $this->isVotedUser = User::where('voted', 1)->orderBy('Id', 'DESC')->get();
        // $this->notVotedUser = User::where('voted', 0)->orderBy('Id', 'DESC')->get();
        
        return view('pages.report', [
            'candidates' => $candidates,
            'totalvotes' => $totalVotes,
            'totalvoter' => $totalVoter,
            'totalunvote' => $totalUnvote,
            'totalvote' => $totalVote,
            'totalcandidate' => $totalCandidates
        ]);
        // return view('pages.report');
    }

    public function generatepdf()
    {
        $candidates = Condidate::all();
        $totalVotes = Votes::count();
        $totalVoter = User::count();
        $totalUnvote = User::where('voted', 0)->count();
        $totalVote = User::where('voted', 1)->count();
        $totalCandidates = Condidate::count();

        $pdf = PDF::
        loadView('pages.report', [
            'candidates' => $candidates,
            'totalvotes' => $totalVotes,
            'totalvoter' => $totalVoter,
            'totalunvote' => $totalUnvote,
            'totalvote' => $totalVote,
            'totalcandidate' => $totalCandidates
        ]);

        return $pdf->download('voteresult.pdf');
    }
}