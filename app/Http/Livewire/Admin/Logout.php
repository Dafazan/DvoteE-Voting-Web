<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Logout extends Component
{
    public function render()
    {
        return view('livewire.admin.logout');
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('admin.login'));
    }
}
