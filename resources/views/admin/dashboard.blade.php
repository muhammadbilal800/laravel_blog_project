@extends('layouts.dashboard')
@section('title','Dashboard')
@section('content')
<script>
    CKEDITOR.replace('editor');
</script>
     <div class="max-w-[95%] m-auto bg-gray-100 rounded-lg py-6 px-4">
        @if (count($users))
            <table class="w-full rounded-lg overflow-hidden mb-4">
                <tr class="bg-gray-800 text-white">
                    <th class="text-start p-3">User</th>
                    <th class="text-start">Email</th>
                    <th class="text-end p-3">Date</th>
                </tr>
            @foreach ($users as $user)
                <tr class="odd:bg-white text-sm">
                    <td class="text-start p-2">{{ $user->name }}</td>
                    <td class="text-start">{{ $user->email }}</td>
                    <td class="text-end p-2">{{ $user->created_at->diffForHumans() }}
                    {{ $user->created_at->format('D d/m/y H:i:s A') }}</td>
                </tr>
            @endforeach
            </table>
            @if($users->hasPages())
                <div class="mt-3 rounded-lg bg-white py-2 px-3">
                    {{ $users->links() }}
                </div>
            @endif
        @else
            <p class="py-4 text-center">No Users Data found!</p>
        @endif
      </div>
@endsection