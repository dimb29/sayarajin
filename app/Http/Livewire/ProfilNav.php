<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;
use App\Models\Regency;
use Carbon\Carbon;

class ProfilNav extends Component
{
    public $locations;



    public function render()
    {
        $regency = Regency::where('name', 'like',$this->locations . '%')->first();

        $posttrend = Post::join('images', 'posts.id', '=', 'images.post_id',)
                        ->leftJoin('users as b','author_id','=','b.id') 
                        ->leftJoin('regencies', 'posts.location_id', 'regencies.id')
                        // ->select('posts.id', 'posts.title', 'posts.content', 'posts.views', 'images.url','b.first_name', 'last_name', 'posts.created_at','posts.updated_at', 'regencies.name')
                        ->orderBy('posts.views', 'desc')->get();
        $now = Carbon::now();



        return view('livewire.profil-nav', [
            'trend' => $posttrend,
            'thistime' => $now,
        ]);
    }
}
 