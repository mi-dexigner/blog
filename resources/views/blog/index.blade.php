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