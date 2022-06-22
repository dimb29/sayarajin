<?php
namespace App\Http\Livewire\Posts;

use App\Models\Category;
use App\Models\Image;
use App\Models\Post;
use App\Models\Tag;
use App\Models\JenisKerja;
use App\Models\KualifikasiLulus;
use App\Models\PengalamanKerja;
use App\Models\SpesialisKerja;
use App\Models\TingkatKerja;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;


class Posts extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $title, $content, $category, $post_id, $views, $email, $wa;
    public $location, $jenker, $kualif, $pengkerja, $spesialis, $tingker;
    public $tagids = array();
    public $photos = [];
    public $isOpen = 0;


    public function render()
    {
        $posts = Post::with('author')->orderBy('id', 'desc')->paginate();
        // dd($posts);
        return view('livewire.posts.posts', [
            'posts' =>  $posts,
            'categories' => Category::all(),
            'tags' => Tag::all(),
            'jenkers' => JenisKerja::all(),
            'kualifs' => KualifikasiLulus::all(),
            'pengkerjas' => PengalamanKerja::all(),
            'spesialises' => SpesialisKerja::all(),
            'tingkers' => TingkatKerja::all(),
        ]);
    }

    public function store()
    {
        $this->validate([
            'title' => 'required',
            'content' => 'required',
            'category' => 'required',
            'photos.*' => 'image|max:4000',
            'jenker'    => 'required',
            'kualif'    => 'required',
            'pengkerja' => 'required',
            'spesialis' => 'required',
            'tingker'   => 'required',
            'location'  => 'required',
            'email'     => 'required',
            'wa'        => 'required',
        ]);
        // dd($this->location);
        // Update or Insert Post
        $post = Post::updateOrCreate(['id' => $this->post_id], [
            'title' => $this->title,
            'content' => $this->content,
            'email' => $this->email,
            'wa' => $this->wa,
            'category_id' => intVal($this->category),
            'jeniskerja_id' => intVal($this->jenker),
            'kualifikasilulus_id' => intVal($this->kualif),
            'pengalamankerja_id' => intVal($this->pengkerja),
            'spesialiskerja_id' => intVal($this->spesialis),
            'tingkatkerja_id' => intVal($this->tingker),
            'location_id' => intVal($this->location),
            'author_id' => Auth::user()->id,
        ]);

        // Image upload and store name in db
        if($this->photos != null){
            if (count($this->photos) > 0) {
                Image::where('post_id', $post->id)->delete();
                $counter = 0;
                foreach ($this->photos as $photo) {

                    $storedImage = $photo->store('public/photos');

                    $featured = false;
                    if($counter == 0 ){
                        $featured = true;
                    }
                    Image::create([
                        'url' => url('storage'. Str::substr($storedImage, 6)),
                        'title' => $this->title,
                        'post_id' => $post->id,
                        'featured' => $featured
                    ]);
                    $counter++;
                }
            }
        }

        // Post Tag mapping
        if (count($this->tagids) > 0) {
            DB::table('post_tag')->where('post_id', $post->id)->delete();

            foreach ($this->tagids as $tagid) {
                DB::table('post_tag')->insert([
                    'post_id' => $post->id,
                    'tag_id' => intVal($tagid),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        session()->flash(
            'message',
            $this->post_id ? 'Post Updated Successfully.' : 'Post Created Successfully.'
        );

        $this->closeModal();
        $this->resetInputFields();
    }

    public function delete($id)
    {
        Post::find($id)->delete();
        DB::table('post_tag')->where('post_id', $id)->delete();

        session()->flash('message', 'Post Deleted Successfully.');
    }

    public function edit($id)
    {
        $post = Post::with('tags')->findOrFail($id);

        $this->post_id = $id;
        $this->title = $post->title;
        $this->content = $post->content;
        $this->category = $post->category_id;
        $this->location = $post->location_id;
        $this->jenker = $post->jeniskerja_id;
        $this->kualif = $post->kualifikasilulus_id;
        $this->spesialis = $post->spesialiskerja_id;
        $this->pengkerja = $post->pengalamankerja_id;
        $this->tingker = $post->tingkatkerja_id;
        $this->tagids = $post->tags->pluck('id');
        $this->wa = $post->wa;
        $this->email = $post->email;

        $this->openModal();
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields()
    {
        $this->title = null;
        $this->content = null;
        $this->category = null;
        $this->tagids = null;
        $this->photos = null;
        $this->post_id = null;
    }
}
