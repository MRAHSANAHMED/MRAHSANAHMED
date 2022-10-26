<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//categories:cat_id
class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $primaryKey = 'cat_id';

    public function posts()
    {
        return $this->hasMany(Post::class, 'post_category_id','cat_id');
    }

}
