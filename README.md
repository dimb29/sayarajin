# Laravel News API with Admin Panel
Laravel 8 Admin Panel with API using Jetstream, Livewire, Sanctum, and Tailwind.

1. `git clone https://github.com/dimb29/web-loker.git`
2. `cd web-loker`
3. `composer install`
4. `cp .env.example .env`
5. `cd public`
6. `rm storage && cd..`
7. `php artisan key:generate`
8. Set your database credentials in `.env` file
9. `php artisan migrate:fresh --seed`
10. `php artisan storage:link`
11. `npm install && npm run dev`
12. `php artisan serve`
13. Visit `localhost:8000/login` in your browser
14. Choose one `email` id from `users` table. Password is `password`.

### Code explanation

**All tutorial links**
* [Visit mditech.net](https://mditech.net/laravel-resource/)

*Part 1:* **Create Migration, Model, and Factory to start with the project**
* [Read on medium.com](https://madhavendra-dutt.medium.com/how-to-seed-test-data-into-a-database-in-laravel-ec1b7defe552)

*Part 2:* **Establish Relationships**
* [Read on medium.com](https://madhavendra-dutt.medium.com/database-relationship-6780f4eab72a)

*Part 3:* **API Resources, API Controllers, and API Routes**
* [Read on medium.com](https://madhavendra-dutt.medium.com/creating-and-consuming-restful-api-in-laravel-7dc116430b3)

*Part 4:* **Front End for Admin Dashboard on Web inteface**
* [Read on medium.com](https://madhavendra-dutt.medium.com/creating-the-front-end-in-laravel-using-jetstream-livewire-72d140c6c946)

Do check [Laravel Documentation](https://laravel.com/docs/8.x) if you have any doubt.

Twitter: [kotagin](https://twitter.com/kotagin)
E-mail: [m.dutt@mditech.net](mailto:m.dutt@mditech.net)
Website: [mditech.net](https://mditech.net)

### How to host Laravel Project on DO

Thanks to [Nathan Mwamba Musonda](https://www.facebook.com/nathan.mwamba.9638) for contributing steps to follw:

[Google Doc Link](https://drive.google.com/file/d/1xzfwTVkJ0c6VhMSYqO8Q1Oh95KctCwse/view?fbclid=IwAR09pKJKwLaEkHCKs8scx-W-_Wmje7Th4I4Ff6ae0MdXICPMM7EGKAauPjM)

So here is the clue on how you can host a laravel project
on digital ocean using database and spaces as your file
storage. you can do this by creating an APP, DATABASE and SPACE
without using a droplet.

// install laravel on you computer
```
$ composer create-project --prefer-dist laravel/laravel:^7.0 project
```
// create the migrations
```
php artisan make:model Image -m
```
//make tables
```
Schema::create('advances', function (Blueprint $table) {
       $table->id();
       $table->string('image')->nullable();
       $table->longText('image_name')->nullable();
       $table->timestamps();
});
```
//migrate the tables
```
php artisan migrate
```
//Create a view (resources/views/image/upload.blade.php)
```
<div class="comment_form_container">
    <div class="section_title">Information</div>
      <form action="/image/upload" method="POST" enctype="multipart/form-data" class="comment_form">
                        @csrf
                        <div><input type="text" name="image_name" class="comment_input" placeholder="Image Name"></div>
                        <div class="row">
                        <div class="col-md-6">
                          <input type="file" name="image" class="comment_input" placeholder="Image">
                       </div>
                 </div>
             <button class="comment_button button_fill">Upload</button>
         </form>
      </div>
</div>
```
//create controller
```
php artisan make:controller ImageController
```
//setup the controller
```
<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeatsController extends Controller
{
    public function index()
    {
        $images = Image::all();
        return view('images', [
            'images' => $images,
        ]);
    }

    public function create()
    {
        return view('image.upload', [
        ]);
    }

    public function store(Request $request)
    {
        $image = new Image();
        $image->image_name = $request->image_name;
        if ($request-> hasfile('image')){
            $filenamewithext = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenamewithext,PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filenametostore = '1_'.$filename.'_'.time().'.'.$extension;
            $image->image = $request->image->store('/beats', 'spaces', $filenametostore);
        }
        $image->save();
        return redirect()->back();
    }

}
```
//setup the route
```
Route::get('/', 'ImageController@index');
Route::get('/upload', 'ImageController@create');
Route::post('/image/upload', 'ImageController@store');
```

//setup the filesystem Driver for digital ocean spaces/ In Config/Filesystem Driver
```
'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
        ],

        'spaces' => [
            'driver' => 's3',
            'key' => env('DO_SPACES_KEY'),
            'secret' => env('DO_SPACES_SECRET'),
            'region' => env('DO_SPACES_REGION'),
            'bucket' => env('DO_SPACES_BUCKET'),
            'endpoint' => env('DO_SPACES_ENDPOINT'),
        ],

    ],
```
//Returning a view (resources/views/images.blade.php)
```
@foreach ($images as $image)
<div class="blog_post d-flex flex-md-row flex-column align-items-start justify-content-start">
  <div class="blog_post_image">
	<img src="{{ Storage::disk('spaces')->url($music->image) }}">
	    <div class="blog_post_date"><p> {{ $image->image_name }} </p>
        </div>		
 </div>
@endforeach
```
//In your env include these
```
DO_SPACES_KEY=your key
DO_SPACES_SECRET=your secret
DO_SPACES_ENDPOINT=endpoint
DO_SPACES_REGION=ams3
DO_SPACES_BUCKET=your bucket
DO_URL=your url
```
// remember the variable will be provided by digital ocean when you create space
