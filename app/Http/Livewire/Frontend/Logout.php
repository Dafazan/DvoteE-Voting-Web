<?php

namespace App\Http\Livewire\Frontend;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Logout extends Component
{
    public function render()
    {
        return view('livewire.frontend.logout');
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('front.login'));
    }
}
