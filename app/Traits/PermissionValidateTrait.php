<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait PermissionValidateTrait
{
    public function authorizePermission($permission): bool
    {
        if (Auth::guard('web')->check() && !Auth::user()->hasPermissionTo($permission)) {
            $this->emit('failedMessage', config('permission.permissionDeniedMessage'));
            return false;
        }
        return true;
    }
}
