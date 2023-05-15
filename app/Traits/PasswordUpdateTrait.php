<?php

namespace App\Traits;
use Illuminate\Support\Facades\Hash;
use Stevebauman\Purify\Facades\Purify;

trait PasswordUpdateTrait
{
    public function updateNewPassword($data, $user)
	{
        $data = Purify::clean($data);

        if(isset($data['old_password']))
        {
            $this->validate([
                'data.old_password'		=> 'required|string|min:5|max:30',
                'data.password'			=> 'required|confirmed|string|min:8|max:30'
            ]);

            if (!Hash::check($data['old_password'], $user->password))
            {
                return ['status' => false, 'message' => 'Old password not matched.'];
            }
        }
        else
        {
            $this->validate([
                'data.password'			=> 'required|confirmed|string|min:8|max:30'
            ]);
        }

		return $this->update($data, $user);
    }

	private function update($data, $user)
	{
		$tempPass = Hash::make($data['password']);
        $user->password = $tempPass;
		$user->save();
		return ['status' => true, 'data' => '', 'message' => 'Password has been updated successfully'];
	}
}
