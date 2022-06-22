<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KualifikasiLulus extends Model
{
    use HasFactory;

    protected $table = 'kualifikasi_lulus';
    protected $fillable = [
        'name_kl',
    ];
    public function posts(){
        return $this->hasMany(Post::class);
    }
}
