<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profiles extends Model
{
    use HasFactory;

    protected $table = 'profiles';
    protected $primaryKey = 'profile_id';
    protected $guarded = [''];
}