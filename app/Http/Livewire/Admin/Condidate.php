<?php

namespace App\Http\Livewire\Admin;

use App\Models\Condidate as ModelsCondidate;
use App\Models\Position;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class Condidate extends Component
{
    public $showTable = true;
    public $showCreate = false;
    public $showUpdate = false;
    public $total;
    public $fname;
    public $lname;
    public $email;
    public $image;
    // public $detail;
    public $pos_id;
    public $positions;

    public $condidate_id;
    public $edit_fname;
    public $edit_lname;
    public $edit_email;
    public $old_image;
    public $new_image;
    // public $new_detail;
    public $edit_pos_id;

    public $search;
    public function render()
    {
        $this->total = ModelsCondidate::count();
        if ($this->search != "") {
            $condidates = ModelsCondidate::orderBy('id', 'DESC')->where('email', 'LIKE', '%' . $this->search . '%')->get();
            return view('livewire.admin.condidate', compact('condidates'))->layout('layout.admin-app');
        }
        $this->positions = Position::all();
        $condidates = ModelsCondidate::orderBy('id', 'DESC')->get();
        return view('livewire.admin.condidate', compact('condidates'))->layout('layout.admin-app');
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

    public function resetField()
    {
        $this->fname = "";
        $this->lname = "";
        $this->email = "";
        $this->image = "";
        // $this->detail = "";
        $this->pos_id = "";

        $this->condidate_id = "";
        $this->edit_fname = "";
        $this->edit_lname = "";
        $this->edit_email = "";
        $this->old_image = "";
        $this->new_image = "";
        // $this->edit_detail = "";
        $this->edit_pos_id = "";
    }

    use WithFileUploads;
    public function store()
    {
        $condidates = new ModelsCondidate();
        $this->validate([
            'fname' => ['required', 'string'],
            'lname' => ['required', 'string'],
            'email' => ['required', 'string'],
            'pos_id' => ['required', 'string'],
            'image' => ['required']
        ]);
        $filename = "";
        if ($this->image != "") {
            $filename = $this->image->store('condidate', 'public');
        } else {
            $filename = "null";
        }
        $condidates->fname = $this->fname;
        $condidates->lname = $this->lname;
        $condidates->email = $this->email;
        $condidates->pos_id = $this->pos_id;
        // $condidates->detail = $this->detail;
        $condidates->image = $filename;
        $condidates->points = 1;
        $result = $condidates->save();
        if ($result) {
            session()->flash('success', "Condidates Add Successfully");
            $this->resetField();
            $this->goBack();
        } else {
            session()->flash('error', "Condidates Not Add Successfully");
        }
    }

    public function edit($id)
    {
        $this->showTable = false;
        $this->showUpdate = true;
        $condidates = ModelsCondidate::findOrFail($id);
        $this->condidate_id = $condidates->id;
        $this->edit_fname = $condidates->fname;
        $this->edit_lname = $condidates->lname;
        $this->edit_email = $condidates->email;
        $this->old_image = $condidates->image;
        // $this->edit_detail = $condidates->detail;
        $this->edit_pos_id = $condidates->pos_id;
    }

    public function update($id)
    {
        $condidates = ModelsCondidate::findOrFail($id);
        $this->validate([
            'edit_fname' => ['required', 'string'],
            'edit_lname' => ['required', 'string'],
            'edit_email' => ['required', 'string'],
            'edit_pos_id' => ['required', 'string'],
        ]);
        $filename = "";
        $destination = public_path("storage\\" . $condidates->image);

        if ($this->new_image != "") {
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $filename = $this->new_image->store('condidate', 'public');
        } else {
            $filename = $this->old_image;
        }
        $condidates->fname = $this->edit_fname;
        $condidates->lname = $this->edit_lname;
        $condidates->email = $this->edit_email;
        // $condidates->detail = $this->edit_detail;
        $condidates->pos_id = $this->edit_pos_id;
        $condidates->image = $filename;
        $result = $condidates->save();
        if ($result) {
            session()->flash('success', "Condidates Update Successfully");
            $this->resetField();
            $this->goBack();
        } else {
            session()->flash('error', "Condidates Not Update Successfully");
        }
    }

    public function delete($id)
    {
        $condidates = ModelsCondidate::findOrFail($id);
        $destination = public_path("storage\\" . $condidates->image);
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $result = $condidates->delete();
        if ($result) {
            session()->flash('success', "Condidates Delete Successfully");
        } else {
            session()->flash('error', "Condidates Not Delete Successfully");
        }
    }
}
