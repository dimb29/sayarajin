<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

class Search extends Component
{
    protected $updatesQueryString = ['searchtitle', 'searchloc', 'searchjob'];
    public $searchtitle, $searchloc, $searchjob;
    public function render()
    {
        
        $posts = Post::join('images', 'posts.id', '=', 'images.post_id')
            ->select('posts.id', 'posts.title', 'posts.content', 'posts.views', 'images.url')
            ->orderBy('posts.id', 'desc')->paginate(5);

        if($this->searchtitle !== null){
            $posts = Post::join('images', 'posts.id', '=', 'images.post_id')
                            ->select('posts.id', 'posts.title', 'posts.content', 'posts.views', 'images.url')
                            ->where('posts.title', 'like', '%' . $this->searchtitle . '%')
                            ->orderBy('posts.id', 'desc')->paginate(5);
        }

        return view('livewire.search',['posts' => $posts]);
    }
}
