<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $primaryKey ='comment_id';
    protected $guarded =[''];
    // public $timestamps = false;
    
    
    public function post()
    {
        //first primary key is in your comment table which is post_id
        //second primary key is in your post table which is also post_id
        return $this->belongsTo(Post::class,'post_id','post_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','user_id');
    } 
}
