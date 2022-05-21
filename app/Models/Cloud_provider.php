<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cloud_provider extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'api_token',
        'user_id',
    ];
    
}
