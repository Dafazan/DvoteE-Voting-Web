<?php

namespace App\Http\Livewire\Admin;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class ChangePassword extends Component
{

    public $username;
    public $password;
    public function render()
    {
        return view('livewire.admin.change-password')->layout("layout.admin-app");
    }

    public function changePassword()
    {
        $admin = Admin::where('username', $this->username)->first();
        $this->validate(
            [
                "username" => ["required"],
                "password" => ["required"]
            ]
        );
        if ($admin) {
            $admin->password = Hash::make($this->password);
            $result = $admin->save();
            if ($result) {
                session()->flash("success", "password change successfully");
            }
        } else {
            session()->flash("error", "Invalid username");
        }
    }
}
