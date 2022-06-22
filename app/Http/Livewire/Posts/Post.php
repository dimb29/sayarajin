<?php

namespace App\Http\Livewire\Posts;

use App\Models\Post as PostModel;
use App\Models\Comment;
use App\Models\LikesComment;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Post extends Component
{

    public $post;
    public $comment, $category, $post_id;

    public function mount($id)
    {
        $this->post = PostModel::with([
            'author', 
            'category', 
            'images', 
            'videos', 
            'tags', 
            'jeniskerja', 
            'kualifikasilulus',
            'pengalamankerja',
            'spesialiskerja',
            'tingkatkerja',
            'perusahaan',
            ])->find($id);
        // dd($this);
        
    }

    public function render()
    {
        return view('livewire.posts.post');
    }

    public function comment_store(){
        
        $data = $this->validate([
            'comment' => 'required',
            
        ]);
        // Update or Insert Post
        Comment::create([
            'comment' => $this->comment,
            'post_id' => $this->post['id'],
            'author_id' => Auth::user()->id,
        ]);
    }

    public function comment_like($id, $fill, $id_like){
        // dd($id);
        // $getLike = LikesComment::where('id_like', '=', $id_like)->first();
        if($fill == 0){
            LikesComment::create([
                'id_post' => $this->post['id'],
                'id_comment' => $id,
                'user_id' => Auth::user()->id,
                'fill' => '1',
            ]);
        }else{
            if($fill == 1){
                $fill = 2;
            }else{
                $fill = 1;
            }
            LikesComment::where('id_like', $id_like)->update([
                'fill' => $fill,
            ]);
        }
    }
}
