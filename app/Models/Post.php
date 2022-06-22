<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use HasFactory,Searchable;

    protected $fillable = [
        'title',
        'content',
        'post_type',
        'meta_data',
        'category_id',
        'jeniskerja_id',
        'kualifikasilulus_id',
        'pengalamankerja_id',
        'spesialiskerja_id',
        'tingkatkerja_id',
        'province_id',
        'location_id',
        'author_id',
        'email',
        'wa',
    ];

    public function author(){
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function likes_comment(){
        return $this->belongsTo(LikesComment::class, 'id', 'id_post');
    }

    public function comments(){
        return $this->hasMany(Comment::class)->with(['author', 'likes_comment']);
    }

    public function perusahaan(){
        return $this->hasMany(Perusahaan::class, 'owner_id','author_id')->with(['author']);
    }

    public function images(){
        return $this->hasMany(Image::class);
    }

    public function videos(){
        return $this->hasMany(Video::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
    public function postsave(){
        return $this->hasMany(User::class);
    }

    public function jeniskerja(){
        return $this->belongsTo(JenisKerja::class);
    }
    
    public function jobcategory(){
        return $this->belongsTo(JobCategory::class);
    }
    
    public function kualifikasilulus(){
        return $this->belongsTo(KualifikasiLulus::class);
    }
    
    public function pengalamankerja(){
        return $this->belongsTo(PengalamanKerja::class);
    }
    
    public function tingkatkerja(){
        return $this->belongsTo(TingkatKerja::class);
    }

    public function spesialiskerja(){
        return $this->belongsTo(SpesialisKerja::class);
    }
    public function province(){
        return $this->belongsTo(Province::class, 'location_id', 'id');
    }
    public function regency(){
        return $this->belongsTo(Regency::class, 'location_id', 'id');
    }
}
