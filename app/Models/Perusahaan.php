<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;

    protected $table = 'perusahaan';
    protected $fillable = [
        'per_nama',
        'per_type',
        'per_telp',
        'per_email',
        'per_alamat',
        'per_prov',
        'per_kota',
        'owner_id',
    ];

    public function author(){
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }

    public function post(){
        return $this->belongsTo(Post::class, 'owner_id','author_id');
    }
}
