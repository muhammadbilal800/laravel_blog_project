@extends('layouts.app')
@section('title','Update Post')
@section('content')
    <div class="max-w-lg m-auto bg-gray-300 p-4">
        <h1 class="text-center font-bold text-xl mb-2">Update Post</h1>
        <form action="{{ route('post.update.now',$post->slug) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <x-input-field  placeholder="Title" type="text" name="title" value="{{ $post->title}}"  />
            @error('title') <x-alerts.error :$message /> @enderror
            <x-input-field type="text" name="slug" placeholder="Slug" value="{{ $post->slug }}"  />
            @error('slug') <x-alerts.error :$message /> @enderror
            <x-custom-area myvalue="{{ $post->content }}" value="{{ $post->content }}" name="content" placeholder="Write here....." />
            @error('content') <x-alerts.error :$message /> @enderror
            <x-input-field type="file" name="image" accept="image/*" />
            @error('image') <x-alerts.error :$message /> @enderror
            <button class="bg-indigo-600 text-white rounded-lg px-4 py-2 font-bold" type="submit">Update Post</button>
        </form>
    </div>
@endsection