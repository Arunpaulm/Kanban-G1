<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Traits\FileUploadTrait;
use App\Traits\PasswordStrengthTrait;
use App\Traits\PasswordUpdateTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Livewire\Component;
use Stevebauman\Purify\Facades\Purify;

class Profile extends Component
{
    use WithFileUploads, PasswordUpdateTrait;

    public $data, $user;

    public function updateUser()
    {
        $this->purifyData();
        $id = Auth::id();
        $this->validate([
            'data.name' => 'required|string|max:20',
            'data.email' => "required|email|unique:users,email,$id",
            'data.phone' => "nullable|unique:users,phone,$id",
            'data.profile_photo' => "nullable|mimes:jpg,png,jpeg|max:" . config('setting.avatar_image.size'),
        ]);

        if (isset($this->data['profile_photo'])) {
            $this->user->profile_photo = Storage::disk('public')->putFile('profile_photo', $this->data['profile_photo'], 'public');
        }

        $this->user->name = $this->data['name'];
        $this->user->email = $this->data['email'];
        $this->user->phone = $this->data['phone'];

        if ($this->user->isClean()) {
            $this->emit('failedMessage', 'Noting to change');
            return;
        }

        $this->user->save();
        $message = 'Profile has been Updated successfully';
        $this->emit('flashMessage', $message);
    }

    public function updatePassword()
    {
        $update = $this->updateNewPassword($this->data, $this->user);
        if ($update['status']) {
            $this->resetInputs();
            $this->emit('flashMessage', $update['message']);
        } else {
            $this->emit('failedMessage', $update['message']);
        }
    }

    public function purifyData()
    {
        $this->data['name'] = Purify::clean($this->data['name']);
        $this->data['email'] = Purify::clean($this->data['email']);
        $this->data['phone'] = Purify::clean($this->data['phone']);
    }

    public function resetInputs()
    {
        $this->data = [];
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function getProfileDetails($user)
    {
//        if (Auth::guard('web')->check()) {
//            $this->type = config('setting.user.type.admin');
//        }
        $this->user = $user;

        $this->data['name'] = $this->user->name;
        $this->data['email'] = $this->user->email;
        $this->data['phone'] = $this->user->phone;
        $this->data['profile_photo'] = null;
        $this->data['pre_set_profile_picture'] = getImage($this->user->profile_photo);
    }

    public function render()
    {
        $user = User::with('roles')->where('id', Auth::id())->first();
        $this->getProfileDetails($user);
        return view('livewire.profile', ['user' => $user])->extends('layout.admin');
    }
}
