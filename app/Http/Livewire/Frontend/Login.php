<?php

namespace App\Http\Livewire\Frontend;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $vote_id;
    public $password;
    public function render()
    {
        return view('livewire.frontend.login')->layout('layout.app');
    }

    public function login()
    {
        $this->validate([
            'vote_id' => ['required'],
            'password' => ['required'],
        ]);
        $user = Auth::attempt(['vote_id' => $this->vote_id, 'password' => $this->password]);

        if ($user) {
            if (Auth::user()->vote_limit == 0) {
                return redirect('/logout');
            } else {
                return redirect(route('front.home'));
            }

            session()->flash('success', 'Login successfully');
            return redirect(route('front.home'));
        } else {
            session()->flash('error', 'Invalid vote id and password');
        }
    }
}
