<?php



namespace App\Http\Livewire\Posts;



use App\Models\Category;

use App\Models\Image;

use App\Models\Regency;

use App\Models\Post;

use App\Models\Tag;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;

use Livewire\Component;

use Livewire\WithFileUploads;

use Livewire\WithPagination;

use Carbon\Carbon;







class Berita extends Component

{ use WithPagination;

    use WithFileUploads;



    public $title, $content, $category, $post_id;

    public $tagids = array();

    public $photos = [];

    public $isOpen = 0;

    public $limitPerPage = 3;

    public $searchjob,$kualif_lulus,$jenis_kerja,$spes_kerja,$peng_kerja,$ting_kerja;

    public $minrange,$maxrange;

    public $sj_split,$loc_split,$kl_split,$jk_split;

    public $locations = "";

    // public $posts;

    protected $listeners = [

        'post-data' => 'postScroll',

        'post-detail' => 'postDetail',

        'searchJobs',



    ];



    public $myid = 0;

    public function postDetail($id){

        $this->myid = $id;

        // dd($id);

    }



    public function postScroll(){

        $this->limitPerPage = $this->limitPerPage + 1;

    }

    public function searchJobs($search){

        $this->searchjob = $search[0];

        if($search[1] == null){

            $search[1] = "";

        }

        $this->locations = $search[1];

        $this->kualif_lulus = $search[2];

        $this->jenis_kerja = $search[3];

        $this->minrange = $search[4];

        $this->maxrange = $search[5];

        $this->myid = "";

        // dd($search);

        // dd($this->locations);



    }



    public function mount($id){

        $split = explode('&', $id);

        // dd(count($split));

        if(count($split) > 1){

            $sj_split = str_replace('+',' ',explode('=', $split[0]));

            $loc_split = str_replace('+',' ',explode('=', $split[1]));

            $kl_split = str_replace('+',' ',explode('=', $split[2]));

            $jk_split = str_replace('+',' ',explode('=', $split[3]));

            $minr_split = str_replace('+',' ',explode('=', $split[4]));

            $maxr_split = str_replace('+',' ',explode('=', $split[5]));

            $regencies = Regency::where('name', 'like','%' . $loc_split[1] . '%')->first();

            if($regencies == null){
            
                $regency_split = $regencies;
            
            }else{
            
                $regency_split = $regencies->name;
            
            }
            
            // dd($regency_split);

            // dd($sj_split);

            if($sj_split[1] != '' || $loc_split[1] != '' || $kl_split[1] != '' || $jk_split[1] != '' || $maxr_split[1] != '' || $minr_split[1] != ''){

                if($this->searchjob != '' || $this->locations != '' || $this->kualif_lulus != '' || $this->jenis_kerja != '' || $this->maxrange != '' || $this->minrange != ''){

    

                }else{

                    $this->searchjob = $sj_split[1];

                    $this->locations = $regency_split;

                    $this->kualif_lulus = $kl_split[1];

                    $this->jenis_kerja = $jk_split[1];

                    $this->minrange = $kl_split[1];

                    $this->maxrange = $jk_split[1];

                }

            }

        }elseif(count($split) == 1){

            $fil_split = str_replace('+',' ',explode('=', $split[0]));

            // dd($fil_split[0]);

            if($fil_split[0] == 'sj_send'){

                $this->searchjob = $fil_split[1];

            }elseif($fil_split[0] == 'jk_send'){

                $this->jenis_kerja = $fil_split[1];

            }elseif($fil_split[0] == 'loc_send'){

                $this->locations = $fil_split[1];

            }elseif($fil_split[0] == 'kl_send'){

                $this->kualif_lulus = $fil_split[1];

            }elseif($fil_split[0] == 'pk_send'){

                $this->peng_kerja = $fil_split[1];

            }elseif($fil_split[0] == 'sk_send'){

                $this->spes_kerja = $fil_split[1];

            }elseif($fil_split[0] == 'tk_send'){

                $this->ting_kerja = $fil_split[1];

            }elseif($fil_split[0] == 'minrange'){

                $this->minrange = $fil_split[1];

            }elseif($fil_split[0] == 'maxrange'){

                $this->maxrange = $fil_split[1];

            }

        }

    } 



    public function render()

    {

        $now = Carbon::now();

        $regency = Regency::where('name', 'like',$this->locations . '%')->first();

        // dd($this->minrange);

            $posts = Post::search($this->searchjob);

            if($this->locations != null){

                if(strlen($regency->id) > 2){

                    $posts->where('location_id',$regency->id);

                }else{

                    $posts->where('province_id',$regency->id);

                }

            }

            if($this->jenis_kerja != null){

                $posts->where('jeniskerja_id',$this->jenis_kerja);

            }

            if($this->kualif_lulus != null){

                $posts->where('kualifikasilulus_id',$this->kualif_lulus);

            }

            if($this->peng_kerja != null){

                $posts->where('pengalamankerja_id',$this->peng_kerja);

            }

            if($this->spes_kerja != null){

                $posts->where('spesialiskerja_id',$this->spes_kerja);

            }

            if($this->ting_kerja != null){

                $posts->where('tingkatkerja_id',$this->ting_kerja);

            }

            if($this->minrange != null){

                $posts->where('salary_start','>=',$this->minrange);

            }

            if($this->maxrange != null){

                $posts->where('salary_end','<=',$this->maxrange);

            }

            $post = $posts->paginate($this->limitPerPage);

            // dd($post);

// dd($posts);

        $no = 1;



        if($this->myid != 0){

            $post_detail = Post::with([

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

                ])->find($this->myid);

            // $post_detail = $post->firstorfail()->toArray();

        }else{

            $post_detail = null;

        }

        $jobsave = Post::rightJoin('post_save', 'posts.id', 'post_save.post_id')->get();

        // dd($jobsave);



                        

        return view('livewire.posts.berita', [

            'posts' => $post,

            'categories' => Category::all(),

            'tags' => Tag::all(),

            'no' => $no,

            'thistime' => $now,

            'post_detail' => $post_detail,

            'simpan_job' => $jobsave,



        ]);

    }



    public function saveJob($id){

        DB::table('post_save')->insert([

            'user_id' => Auth::user()->id,

            'post_id' => $id,

            'created_at' => now(),

            'updated_at' => now(),

        ]);

    }



    public function delSaveJob($id){

        DB::table('post_save')->where('post_id', $id)->delete();

    }



    public function countview($id)

    {

        $getdata = Post::select('views')

                        ->where('id', $id)

                        ->firstorfail()->toArray();

        $count = $getdata['views'] + '1';



        Post::where('id', $id)->update(['views' => $count]);

    }



}

