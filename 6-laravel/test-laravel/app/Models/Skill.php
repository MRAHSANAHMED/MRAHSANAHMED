<?php

namespace App\Models;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    protected $table = 'skills';
    protected $guarded =[''];


    public function profile()
    {
        return $this->belongsTo(Profile::class,'skill','id');
        // return $this->hasMany(Profile::class,'skill','id');
    }










}
