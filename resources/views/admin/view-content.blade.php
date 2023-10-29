@extends('layouts.app')
@section('title','Content Page')
@section('content')
    <div class="max-w-lg m-auto">
        <article>
            {{ $post->content }}
        </article>
    </div>
@endsection