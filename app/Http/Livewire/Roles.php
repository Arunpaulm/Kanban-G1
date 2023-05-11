<?php

namespace App\Http\Livewire;

use App\Traits\PermissionValidateTrait;
use Spatie\Permission\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;
use Stevebauman\Purify\Facades\Purify;

class Roles extends Component
{
    use WithPagination, PermissionValidateTrait;
    public $data;

    public function createRole()
    {
        $this->resetInputs();
        $this->emit('roleModal');
    }

    public function storeRole()
    {
        if(!$this->authorizePermission('role-create')) return;

        $this->data = Purify::clean($this->data);
        $this->validate([
            'data.name' => 'required|string|max:20',
        ]);

        $role = new Role();
        $role->name = $this->data['name'];
        $role->guard_name = 'web';
        $role->save();

        $message = 'New role has been added successfully';
        $this->emit('closeModal', $message);
    }

    public function editRole($id)
    {
        $this->resetInputs();
        $role = Role::where('id', $id)->first();
        $this->data['id'] = $id;
        $this->data['name'] = $role->name;

        $this->emit('roleModal');
    }

    public function updateRole()
    {
        if(!$this->authorizePermission('role-edit')) return;

        $this->data = Purify::clean($this->data);
        $this->validate([
            'data.name' => 'required|string|max:20',
        ]);

        $role = Role::where('id', $this->data['id'])->first();
        $role->name = $this->data['name'];
        $role->save();

        $message = 'Role has been updated successfully';
        $this->emit('closeModal', $message);
    }

    public function deleteRole($id)
    {
        Role::destroy($id);
        $this->dispatchBrowserEvent('contentChanged');
    }

    public function resetInputs()
    {
        $this->data = [];
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function render()
    {
        $roles = Role::with('permissions')->orderBy('id', 'DESC')->get();
        return view('livewire.roles', ['roles' => $roles])->extends('layout.admin');
    }
}
