<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikesComment extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_post',
        'id_comment',
        'user_id',
        'fill',

    ];

    public function comments(){
        return $this->hasMany(Comment::class, 'id', 'id_comment');
    }

    public function posts(){
        return $this->hasMany(Post::class, 'id', 'id_post');
    }
}
