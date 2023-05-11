<?php

namespace App\Http\Livewire;

use App\Traits\PermissionTrait;
use App\Traits\PermissionValidateTrait;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class Permissions extends Component
{
    use PermissionTrait, PermissionValidateTrait;
    public $roles = [], $role_id;

    public function savePermission()
    {
        if(!$this->authorizePermission('update-role-permission')) return;

        $this->validate([
            'role_id'	=> 'required|exists:roles,id'
        ]);

        if(count($this->permissionList) > 0)
        {
            $role = Role::where('id', $this->role_id)->first();
            $role->syncPermissions(array_keys($this->permissionList));
            $message = 'Permission assigned to role successfully.';
            $this->emit('flashMessage', $message);
            return;
        }
        $message = 'Nothing to update.';
        $this->emit('failedMessage', $message);
    }

    public function changeRole($role_id)
    {
        $this->permissionList = [];
        $this->role_id = $role_id;
        if($role_id)
        {
            $role = Role::where('id', $this->role_id)->first();
            $permissions = $role->permissions()->get();
            foreach($permissions as $permission)
            {
                $this->setSinglePermission($permission->id, $permission->name);
            }

            $this->checkAllPermission($permissions);
            $this->groupList = [];
            $this->checkGroupPermission($this->permissionList);
        }
    }

    public function mount()
    {
        $this->roles = Role::get();
        $this->permissions = Permission::get();
    }

    public function render()
    {
        return view('livewire.permissions')->extends('layout.admin');
    }
}
