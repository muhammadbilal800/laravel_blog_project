@extends('layouts.app')
@section('title','Forgot Password')
@section('content')
<div class="max-w-lg m-auto bg-slate-300 p-4">
    <h1>{{ $name }}</h1>
    <p>You will receive an email after submiting your email!</p>
    <form action="{{ route('password.email') }}" method="post">
        @if(session('success')){
            {{ session('success') }}
        }
        @endif
        @csrf
        <x-input-field  placeholder="Email" type="email" name="email"  />
        @error('email') <x-alerts.error :$message /> @enderror
        <button type="submit" class="bg-blue-600 rounded-lg text-white font-semibold px-4 py-2" >Reset</button>
    </form>
   </div>
@endsection
