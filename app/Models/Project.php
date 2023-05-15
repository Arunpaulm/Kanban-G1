<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'bg_image',
        'avatar_image',
        'start_date',
        'end_date',
        'status',
        'user_id',
        'created_at',
        'updated_at',
    ];
}
