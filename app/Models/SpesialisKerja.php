<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpesialisKerja extends Model
{
    use HasFactory;

    protected $table = "spesialis_kerja";
    
    protected $fillable = [
        'name_sk',
    ];
    public function posts(){
        return $this->hasMany(Post::class);
    }
}
