<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $fillable = ['title', 'slug', 'author_id', 'body', 'image'];

    function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
