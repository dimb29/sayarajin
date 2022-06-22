<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengalamanKerja extends Model
{
    use HasFactory;
    
    protected $table = "pengalaman_kerja";

    protected $fillable = [
        'name_pk',
    ];
    public function posts(){
        return $this->hasMany(Post::class);
    }
}
