<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//posts: post_category_id
class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $primaryKey = 'post_id';
    protected $guarded = [''];
    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo(Category::class,'post_category_id', 'cat_id');
    }
    

}
