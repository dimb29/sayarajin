<?php

namespace App\Http\Livewire\Profile;

use App\Models\Post;
use App\Models\PostSave;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class SimpanLoker extends Component
{
    public function render()
    {
        $posts = Post::rightJoin('post_save', 'posts.id','post_save.post_id')
        ->leftJoin('images', 'posts.id', '=', 'images.post_id',)
        ->leftJoin('perusahaan as b','author_id','=','b.owner_id') 
        ->leftJoin('regencies', 'posts.location_id', 'regencies.id')
        ->orderBy('posts.id', 'desc')->paginate();
        // dd($posts);
        return view('livewire.profile.simpan-loker',['posts'=>$posts]);
    }
    public function delSaveJob($id){
        DB::table('post_save')->where('post_id', $id)->delete();
    }
}
