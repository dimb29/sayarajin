<?php



namespace App\Providers;



use App\Models\Post;

use App\Models\JenisKerja;

use App\Models\KualifikasiLulus;

use App\Models\PengalamanKerja;

use App\Models\SpesialisKerja;

use App\Models\TingkatKerja;

use App\Models\Province;

use App\Models\Regency;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;

use Illuminate\Support\Facades\Http;

use Illuminate\Http\Client\Response;

//use Illuminate\Http\Resources\Json\JsonResource;



class AppServiceProvider extends ServiceProvider

{

    /**

     * Register any application services.

     *

     * @return void

     */

    public function register()

    {

        //

    }



    /**

     * Bootstrap any application services.

     *

     * @return void

     */

    public function boot()

    {

        //JsonResource::withoutWrapping();

        $posts = Post::join('images', 'posts.id', '=', 'images.post_id')

        ->select('posts.id', 'posts.title', 'posts.content', 'posts.views', 'images.url', 'posts.created_at')

        ->latest()

        ->get();






        View::share([

            'postsearch' => $posts,

            'jenkers' => JenisKerja::all(),

            'kualifs' => KualifikasiLulus::all(),

            'pengkerjas' => PengalamanKerja::all(),

            'spesialises' => SpesialisKerja::all(),

            'tingkers' => TingkatKerja::all(),

            'provinces' => Province::all(),

            'cities'    => Regency::all(),

        ]);

    }

}

