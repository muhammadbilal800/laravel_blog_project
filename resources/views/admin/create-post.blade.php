@extends('layouts.dashboard')
@section('title','Create Post')
@section('content')
<div class="max-w-lg m-auto bg-slate-300 p-4">
    <h1 class="text-2xl mb-1 font-bold text-center"> {{ $name }}</h1>
    <form action="{{ route('create.post.upload') }}" method="post" enctype="multipart/form-data">
        @csrf
        @if (session('success'))
        <x-alerts.success :success="session('success')" />
        @endif
        <x-input-field type="text" name="title" placeholder="Title"  />
        @error('title') <x-alerts.error :$message />  @enderror
        <x-custom-area name="content" placeholder="Write Content here..." id="editor"  />
        @error('content') <x-alerts.error :$message />  @enderror
        <x-input-field type="file" name="image" placeholder="image" accept="image/*" />
        @error('image') <x-alerts.error :$message />  @enderror
        <button class="bg-indigo-600 rounded-lg text-white py-2 px-4" type="submit">Create Post</button>
    </form>
</div>

@endsection