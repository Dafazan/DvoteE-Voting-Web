<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class Voter extends Component
{
    public $showTable = true;
    public $showCreate = false;
    public $showUpdate = false;
    public $total;

    public $name;
    public $email;
    public $password;
    // public $image;

    public $search;

    public $voter_id;
    public $edit_name;
    public $edit_email;
    // public $old_image;
    // public $new_image;

    public function render()
    {
        if ($this->search != "") {
            $voters = User::orderBy('id', 'DESC')->where('name', 'LIKE', '%' . $this->search . '%')->get();
            return view('livewire.admin.voter', compact('voters'))->layout('layout.admin-app');
        }
        $this->total = User::count();
        $voters = User::orderBy('id', 'DESC')->get();
        return view('livewire.admin.voter', compact('voters'))->layout('layout.admin-app');
    }

    public function goBack()
    {
        $this->showTable = true;
        $this->showCreate = false;
        $this->showUpdate = false;
    }
    public function showForm()
    {
        $this->showTable = false;
        $this->showCreate = true;
    }
    use WithFileUploads;

    public function resetField()
    {
        $this->name = "";
        $this->email = "";
        $this->password = "";
        $this->image = "";
        $this->voter_id = "";
        $this->edit_name = "";
        $this->edit_email = "";
        // $this->old_image = "";
        // $this->new_image = "";
    }

    // genereta random id;

    public function generete($length)
    {
        $char = '1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $char_lenght = strlen($char);
        $str = "";

        for ($i = 0; $i < $length; $i++) {
            $str .= $char[rand(0, $char_lenght - 1)];
        }
        return $str;
    }

    public function create()
    {
        $users = new User();
        $this->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'password' => ['required'],
        ]);
        // $filename = "";
        // if ($this->image) {
        //     $filename = $this->image->store('users', 'public');
        // } else {
        //     $filename = "null";
        // }
        $users->name = $this->name;
        $users->email = $this->email;
        $users->password = Hash::make($this->password);
        $users->vote_id = $this->generete(20);
        // $users->image = $filename;
        $result = $users->save();
        if ($result) {
            session()->flash('success', 'Voter Add Successfully');
            $this->goBack();
            $this->resetField();
        }
    }

    public function edit($id)
    {
        $this->showTable = false;
        $this->showUpdate = true;
        $voters = User::findOrFail($id);
        $this->voter_id = $voters->id;
        $this->edit_name = $voters->name;
        $this->edit_email = $voters->email;
        // $this->old_image = $voters->image;
    }

    public function update($id)
    {
        $voters = User::findOrFail($id);
        $this->validate([
            'edit_name' => ['required', 'string'],
            'edit_email' => ['required', 'string', 'email'],
        ]);
        // $filename = "";
        // $destination = public_path("storage\\" . $voters->image);

        // if ($this->new_image) {
        //     if (File::exists($destination)) {
        //         File::delete($destination);
        //     }
        //     $filename = $this->new_image->store('users', 'public');
        // } else {
        //     $filename = $this->old_image;
        // }
        $voters->name = $this->edit_name;
        $voters->email = $this->edit_email;
        // $voters->image = $filename;
        $result = $voters->save();
        if ($result) {
            session()->flash('success', 'Voter Update Successfully');
            $this->goBack();
            $this->resetField();
        }
    }
    public function delete($id)
    {
        $condidates = User::findOrFail($id);
        // $destination = public_path("storage\\" . $condidates->image);
        // if (File::exists($destination)) {
        //     File::delete($destination);
        // }
        $result = $condidates->delete();
        if ($result) {
            session()->flash('success', "Voter Delete Successfully");
        } else {
            session()->flash('error', "Voter Not Delete Successfully");
        }
    }
}