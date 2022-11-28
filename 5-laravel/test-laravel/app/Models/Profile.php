<?php

namespace App\Models;
use App\Models\Skill;
use App\Models\Skill2;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $table = 'profiles';
    protected $guarded = [''];


    public function firstSkill()
    {
        return $this->hasOne(Skill::class,'id','skill');
    }
    public function secondSkill()
    {
        return $this->hasOne(Skill2::class,'id','skill2');
    }
}
