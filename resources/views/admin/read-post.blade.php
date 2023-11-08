@extends('layouts.dashboard')
@section('title', 'Dashboard')
@section('content')

    @if (session('success'))
        <x-alerts.success :success="session('success')" />
    @endif

    <div class="max-w-full mx-auto bg-gray-100 rounded-lg p-3">

        <table class="w-full rounded-lg">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-2 text-left">Image</th>
                    <th class="px-4 py-2 text-left">User</th>
                    <th class="px-4 py-2 text-left">Slug</th>
                    <th class="px-4 py-2 text-right">Content</th>
                    <th class="px-4 py-2 text-right">Date</th>
                    <th class="px-4 py-2 text-right">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $item)
                    <tr class="{{ $loop->odd ? 'bg-white' : 'bg-gray-100' }}">
                        <td class="px-4 py-2">
                            @if ($item->image)
                                <a class="underline text-blue-500" href="{{ asset('/storage/' . $item->image) }}"
                                    target="_blank">
                                    View
                                </a>
                            @endif
                        </td>
                        <td class="px-4 py-2">{{ $item->User->name }}</td>
                        <td class="px-4 py-2">
                            <a id="slug" @click='slug = !slug' href="#">Read</a>
                        </td>
                        <td class="px-4 py-2 text-right">
                            <a href="{{ route('view.content', $item->slug) }}" class="text-blue-400 underline">Read</a>
                        </td>
                        <td class="px-4 py-2 text-right">{{ $item->created_at->diffForHumans() }}</td>
                        <td class="relative flex items-center justify-end" x-data='{ open: false }'>
                            <img @click='open = !open'
                                src="https://api.iconify.design/mdi:dots-vertical.svg?color=%23000000" alt="">
                            <div x-show="open" x-cloak x-transition
                                class="absolute right-1 z-10 top-2 -translate-x-3 rounded-lg p-3 bg-black shadow-lg">
                                <form x-show="open" x-cloak action="{{ route('post.delete', $item->slug) }}"
                                    method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="w-full py-2 hover:bg-red-500 text-white bg-red-400 rounded-lg mb-1"
                                        type="submit">Delete</button>
                                </form>
                                <form x-show="open" x-cloak action="{{ route('post.toggle', $item->slug) }}"
                                    method="post">
                                    @csrf
                                    @method('PATCH')
                                    <button class="w-full py-2 hover:bg-blue-500 text-white bg-blue-400 rounded-lg mb-1"
                                        type="submit">{{ $item->is_active ? 'Disable' : 'Enable' }}</button>
                                </form>
                                <form x-show="open" x-cloak class="mb-1"
                                    action="{{ route('post.feature', $item->slug) }}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    <button
                                        class="w-full py-2 px-2 hover:bg-green-500 text-white bg-green-400 rounded-lg mb-1"
                                        type="submit">{{ $item->is_featured ? 'Featured' : 'Unfeatured' }}</button>
                                </form>
                                @if ($item->user->id == auth()->user()->id)
                                    <div x-show="open" x-cloak
                                        class="w-full px-2 text-center font-semibold py-2 hover:bg-indigo-500 text-white bg-indigo-400 rounded-lg mt-2">
                                        <a href="{{ route('post.update', $item->slug) }}">Edit</a>
                                    </div>
                                @else
                                    <span class="w-full py-2 rounded-lg mt-2">Unedit</span>
                                @endif
                            </div>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        
     


@endsection


