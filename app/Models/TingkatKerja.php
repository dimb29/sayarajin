<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TingkatKerja extends Model
{
    use HasFactory;

    protected $table = "tingkat_kerja";

    protected $fillable = [
        'name_tk',
    ];
    public function posts(){
        return $this->hasMany(Post::class);
    }
}
