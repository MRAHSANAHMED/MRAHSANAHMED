<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens,HasFactory,Notifiable;
    protected $table = 'users';
    protected $primaryKey = 'user_id';
    protected $guarded = [''];
    public $timestamps = false;

 
public function posts()
{
    
        return $this->belongsToMany(Post::class, 'post_user', 'user_id', 'post_id');
    
    
}

    public function isUserLikeThisPost($param_post_id)
    {
        $posts = $this->posts;
        if (!empty($posts)){
            if(count($posts)>0){
                foreach($posts as $key => $singlePost){
                    if($singlePost->post_id == $param_post_id){
                        return true;
                    } 
                }
            }
        }
        return false;
    }


}