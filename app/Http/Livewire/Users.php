<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Traits\PasswordUpdateTrait;
use App\Traits\PermissionValidateTrait;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Stevebauman\Purify\Facades\Purify;

class Users extends Component
{
    use WithPagination, PermissionValidateTrait, PasswordUpdateTrait;
    public $user, $data = [], $roles = [], $search = [];

    public function createUser()
    {
        $this->resetInputs();
        $this->roles = Role::all();
        $this->emit('createUserModal');
    }

    public function storeUser()
    {
        if(!$this->authorizePermission('user-create')) return;
        $this->data = Purify::clean($this->data);
        $this->validate([
            'data.name'		        => 'required|string|max:20',
            'data.email'			=> 'required|email|unique:users,email',
            'data.phone'			=> 'required|unique:users,phone',
            'data.password'			=> 'required|confirmed|string|min:8|max:30',
            'data.role'				=> 'required|exists:roles,name',
        ]);

        $user = new User();
        $tempPass = bcrypt($this->data['password']);
        $user->name = $this->data['name'];
        $user->email = $this->data['email'];
        $user->phone = $this->data['phone'];
        $user->password = $tempPass;
        $user->is_active = config('setting.status.active');
        $user->save();
        $user->assignRole($this->data['role']);

        $message = 'User has been created successfully';
        $this->emit('closeModal', $message);
    }

    public function editUser($id)
    {
        $this->resetInputs();
        $this->roles = Role::all();
        $user = User::where('id', $id)->first();
        $this->data['id'] = $id;
        $this->data['name'] = $user->name;
        $this->data['email'] = $user->email;
        $this->data['phone'] = $user->phone;
        $this->data['role'] = $user->roles[0]->name ?? '';

        $this->emit('editUserModal');
    }

    public function updateUser()
    {
        if(!$this->authorizePermission('user-edit')) return;
        $this->data = Purify::clean($this->data);
        $userId = $this->data['id'];
        $this->validate([
            'data.name'			        => 'required|string|max:20',
            'data.email'				=> "required|email|unique:users,email,$userId",
            'data.phone'			    => "nullable|unique:users,phone,$userId",
            'data.role'				    => 'required|exists:roles,name',
        ]);

        $user = User::where('id', $this->data['id'])->first();
        $user->name = $this->data['name'];
        $user->email = $this->data['email'];
        $user->phone = $this->data['phone'];
        $user->save();

        if(isset($user->roles[0]->name) && ($user->roles[0]->name != $this->data['role']))
        {
            $user->removeRole($user->roles->first());
        }
        $user->assignRole($this->data['role']);

        $message = 'User has been updated successfully';
        $this->emit('closeModal', $message);
    }

    public function changeStatus($id)
    {
        if(!$this->authorizePermission('user-status-update')) return;

        $user = User::where('id', $id)->first();
        if($user->is_active)
            $user->is_active = config('setting.status.inactive');
        else
            $user->is_active = config('setting.status.active');
        $user->save();
    }

    public function changePassword($id)
    {
        $this->resetInputs();
        $this->user = User::where('id', $id)->first();
        $this->emit('editPasswordModal');
    }

    public function updatePassword()
    {
        if(!$this->authorizePermission('users-password-reset')) return;

        $update = $this->updateNewPassword($this->data, $this->user);
        if($update['status'])
        {
            $this->resetInputs();
            $message = 'Password has been updated successfully';
            $this->emit('closeModal', $message);
        }
        else{
            $this->emit('failedMessage', $update['message']);
        }
    }

    public function resetInputs()
    {
        $this->data = [];
        $this->user = '';
        $this->type = '';
        $this->resetErrorBag();
        $this->resetValidation();
    }
    public function render()
    {
        $users = User::orderBy('id', 'DESC')->paginate(config('system.pagination'));
        return view('livewire.users', ['users' => $users])->extends('layout.admin');
    }
}
