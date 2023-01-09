<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $primaryKey = 'cat_id';
    protected $guarded = [''];
    public $timestamps = false;

    public function posts()
    {
        return $this->hasMany(Post::class, 'post_category_id', 'cat_id');
    }
}