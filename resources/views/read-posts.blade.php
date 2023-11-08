@extends('layouts.app')

@section('title', 'Post')

@section('content')
    <x-home.navbar />

    <div class="max-w-screen-md mx-auto p-4">
        <div class="bg-white p-4 shadow-lg rounded-lg">
            @if ($post->image)
                <img class="w-full rounded-lg" src="{{ asset('/storage/' . $post->image) }}" alt="Post Image">
            @endif

            <div class="mt-4">
                <h1 class="text-2xl font-bold">{{ $post->title }}</h1>
                <p class="text-gray-500">By {{ $post->user->name }} · {{ $post->created_at->diffForHumans() }}</p>
                <article class="mt-4 text-gray-700 leading-relaxed">
                    {!! $post->content !!}
                </article>
            </div>
        </div>

        @auth
        <div class="bg-gray-100 p-4 mt-4 rounded-lg shadow-md">
            <form class="space-y-4" action="{{ route('comments.store', $post->slug) }}" method="post">
                @csrf
                <textarea id="comment" name="content" rows="2" placeholder="Leave a constructive comment..."
                    class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500"
                    required></textarea>
                @error('content')
                    <x-alerts.error :message="$message" />
                @enderror
                <button type="submit"
                    class="w-full py-2 px-4 bg-indigo-600 text-white font-medium rounded hover:bg-indigo-700 transition duration-300">
                    Submit
                </button>
            </form>
        </div>
        @endauth

        <div class="mt-8">
            @foreach ($post->comments as $key => $comment)
            <div class="bg-white p-4 rounded shadow-md mb-4"  id="{{ $comment->comment_num }}">
                <div class="flex justify-between items-center">
                    <div>
                        <p class="font-semibold">{{ $comment->user->name }}</p>
                        <p class="text-gray-500">{{ $comment->created_at->diffForHumans() }}</p>
                    </div>
                    @if (auth()->check() && $comment->user_id == auth()->user()->id)
                    <div x-data="{ open: false }">
                        <div x-cloak x-show="!open">
                            <p class="mt-2">{{ $comment->content }}</p>

                            <button @click="open = true"
                                class="text-red-600 underline mt-2 hover:text-red-800 transition duration-300">
                                Edit
                            </button>
                        </div>
                        <div x-data="{ message: false }"  x-show="open" x-cloak>
                            <form class="mt-2" action="{{ route('comments.update', [$comment->comment_num, $post->slug]) }}"
                                method="post">
                                @csrf
                                @method('PATCH')
                                <textarea id="comment" name="content" rows="2" placeholder="Update your comment"
                                    class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:border-indigo-500">{{ $comment->content }}</textarea>
                                @error('content')
                                    <x-alerts.error :$message />
                                @enderror
                                <button  @click="message = true" type="submit"
                                    class="w-full py-2 px-4 bg-indigo-600 text-white font-medium rounded hover:bg-indigo-700 transition duration-300">
                                    Update
                                </button>
                            </form>
                            <div x-show="message" x-cloak class="bg-black flex items-center py-5 px-6 font-semibold text-lg fixed bottom-3 left-3 rounded-lg text-white">
                                <img src="https://api.iconify.design/material-symbols:check-circle-outline-rounded.svg?color=%2337d82c" alt="Check Icon" width="30">
                                <p class="ml-4">Comment has been Updated!</p>
                            </div>
                        </div>
                    </div>
                    @else
                    <p class="mt-2">{{ $comment->content }}</p>
                    @endif
                </div>
            </div>
            @endforeach
        </div>

        

        @guest
        <div class="bg-gray-100 p-4 rounded-lg mt-6">
            <p class="font-semibold text-center">Join the community to comment!</p>
            <div class="flex items-center justify-center mt-2">
                <a href="/signup"
                    class="py-2 px-4 bg-indigo-600 text-white text-center rounded-lg hover:bg-indigo-700 transition duration-300">
                    Signup
                </a>
            </div>
        </div>
        @endguest
    </div>
@endsection  



 



