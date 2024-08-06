<?php

namespace App\Http\Livewire\Admin;

use App\Models\Position as ModelsPosition;
use Livewire\Component;

class Position extends Component
{
    public $showTable = true;
    public $showCreate = false;
    public $showUpdate = false;

    public $positions;
    public $position_id;
    public $edit_position;

    public $search;
    public $total;
    public function render()
    {
        if ($this->search != '') {
            $positiones = ModelsPosition::orderBy('id', 'DESC')->where('positions', 'LIKE', '%' . $this->search . '%')->get();
            return view('livewire.admin.position', compact('positiones'))->layout('layout.admin-app');
        }
        $this->total = ModelsPosition::count();
        $positiones = ModelsPosition::orderBy('id', 'DESC')->get();
        return view('livewire.admin.position', compact('positiones'))->layout('layout.admin-app');
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

    public function store()
    {
        $validate = $this->validate([
            'positions' => ['required', 'string', 'unique:positions']
        ]);

        $result = ModelsPosition::create($validate);

        if ($result) {
            session()->flash('success', 'Position Add Successfully');
            $this->goBack();
            $this->positions = "";
        } else {
            session()->flash('error', 'Position Not Add Successfully');
        }
    }

    public function delete($id)
    {
        $result = ModelsPosition::findOrFail($id)->delete();
        if ($result) {
            session()->flash('success', 'Position Delete Successfully');
        } else {
            session()->flash('error', 'Position Not Delete Successfully');
        }
    }

    public function edit($id)
    {
        $this->showTable = false;
        $this->showUpdate = true;
        $positions = ModelsPosition::findOrFail($id);
        $this->position_id = $positions->id;
        $this->edit_position = $positions->positions;
    }

    public function update($id)
    {
        $positions = ModelsPosition::findOrFail($id);

        $this->validate([
            'edit_position' => ['required', 'string']
        ]);

        $positions->positions = $this->edit_position;
        $result = $positions->save();

        if ($result) {
            session()->flash('success', 'Position Update Successfully');
            $this->goBack();
            $this->edit_position = "";
        } else {
            session()->flash('error', 'Position Not Update Successfully');
        }
    }
}
