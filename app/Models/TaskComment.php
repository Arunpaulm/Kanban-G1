<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskComment extends Model
{
    use HasFactory;

    public function logUser()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
