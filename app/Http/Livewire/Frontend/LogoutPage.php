<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class LogoutPage extends Component
{
    public function render()
    {
        return view('livewire.frontend.logout-page')->layout('layout.app');
    }
    public function logout()
    {
        Auth::logout();
        return redirect(route('front.login'));
    }
}
