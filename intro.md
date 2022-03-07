- https://www.amazon.com/LG-34WN650-W-34-Inch-UltraWide-DisplayHDR/dp/B087JB656Q?crid=1WV7C6AGNW875&keywords=LG+34WN650-W&qid=1642951440&sprefix=lg+34wn650-w,aps,243&sr=8-1&linkCode=sl1&tag=codewithdar04-20&linkId=dcd5c9c169e30b134461201a94d3023c&language=en_US&ref_=as_li_ss_tl
- https://www.amazon.com/Apple-Magic-Trackpad-MJ2R2LL-Refurbished/dp/B07F7DR541?crid=2AXNIFK7ZAV4M&keywords=magic+trackpad&qid=1642951474&sprefix=magic+trackpa,aps,144&sr=8-3&linkCode=sl1&tag=codewithdar04-20&linkId=00d92e4e29d9b981b9627df3d4c08b17&language=en_US&ref_=as_li_ss_tl
- https://www.amazon.com/Apple-Magic-Mouse-Wireless-Rechargeable/dp/B08PL57CBR?crid=34JJJ7Z6NNH4L&keywords=magic+mouse&qid=1642951545&sprefix=magic+mous,aps,165&sr=8-4&linkCode=sl1&tag=codewithdar04-20&linkId=63100b2be91bf38f51cd9af721f293ea&language=en_US&ref_=as_li_ss_tl
- https://www.amazon.com/12TB-Elements-Desktop-Drive-WDBWLG0120HBK-NESN/dp/B07X4V2M3B?crid=1UXHAT92U7QG6&keywords=Western+Digital&qid=1642951579&sprefix=western+digital,aps,138&sr=8-6&linkCode=sl1&tag=codewithdar04-20&linkId=47483f94245ffef3488ed218dcd32bfb&language=en_US&ref_=as_li_ss_tl
- https://www.amazon.com/SanDisk-1TB-Extreme-Portable-SDSSDE81-1T00-G25/dp/B08GV9M64L?crid=AC8OZQOY5JVE&keywords=sandisk+extreme+pro+1tb&qid=1642951618&sprefix=sandisk+extreme+pro+1tb,aps,129&sr=8-3&linkCode=sl1&tag=codewithdar04-20&linkId=fb34f6b6802224cc0873c98cde03ae4c&language=en_US&ref_=as_li_ss_tl
- https://www.amazon.com/Apple-Keyboard-Numeric-Wireless-Rechargable/dp/B071ZZTNBM/ref=sr_1_5?crid=3NCXWDW7VQ4ET&keywords=magic+keyboard&qid=1644161609&s=electronics&sprefix=magic+keyboar%2Celectronics%2C128&sr=1-5
- https://9to5mac.com/
- https://jstris.jezevec10.com/
- https://jisho.org/
- https://www.lazada.com/en/
- php artisan --version
- php -v
- node -v
- composer require laravel-frontend-presets/tailwindcss --dev
- php artisan ui tailwindcss --auth
- npm remove laravel-mix
- npm install laravel-mix
- npm install cross-env --save-dev
- npm run watch
- php artisan make:controller PagesController
- open PagesController.php add this line
```php

 public function index(){
        return view('index');
    }
```
- php artisan route:list
- goto routes folder open web.php

```php
use App\Http\Controllers\PagesController;

Route::get('/',[PagesController::class,'index']);

```
- php artisan serve
- php artisan make:controller PostsController --resource
- php artisan make:model Post
- php artisan make:migration posts

- goto routes folder open web.php
booking_date
```php
use App\Http\Controllers\PostsController;

Route::resource('/blog', PostsController::class);
```
- open database/migration folder `post` file
```php
 Schema::create('posts',function(Blueprint $table){
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->longText('description');
            $table->string('image_path');
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
        });
```
- php artisan migrate
- open postController file
```php
use App\Models\Post;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$post = Post::all();
        //dd($post);
        return view('blog.index')->with('posts',Post::orderBy('updated_at','DESC')->get());
    }
}
```
- open view folder blog/index.blade.php
```php
@extends('layouts.app')

@section('content')

<div class="w-4/5 m-auto text-center">
    <div class="py-15 border-b border-gray-200">
        <h1 class="text-6xl">Blog</h1>
    </div>
</div>
@if(Auth::check())
<div class="pt-15 w-4/5 m-auto">
    <a href="/blog/create"
    class="uppercase bg-blue-500 text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl"
    >
        Create a Post
    </a>
</div>
@endif
{{ $posts }}
@foreach ($posts as $post)
<br/>
{{ $post->user }}
<div class="sm:grid grid-cols-2 gap-20 w-4/5 m-auto py-15 border-b border-gray-200">
<div>
        <img src="https://cdn.pixabay.com/photo/2016/04/04/14/12/monitor-1307227_960_720.jpg" alt="">
    </div>
    <div>
        <h2 class="text-gray-700 font-bold text-5xl pb-4">{{$post->title}}</h2>
        <span class="text-gray-500">
        By <span class="font-bold italic text-gray-800">{{$post->user->name}}</span>, Created on {{date('jS M Y')}}
        </span>
        <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
        {{$post->description}}
        </p>
        <a href="/blog/{{$post->slug}}" class="uppercase bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl">Keep Reading</a>
    </div>
</div>

@endforeach

@endsection
```
- https://www.youtube.com/watch?v=HKJDLXsTr8A&ab_channel=CodeWithDary 
- 52:00 / 1:30:26