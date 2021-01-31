@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-8/12 bg-white p-6 rounded-lg text-xl text-center">
            <h1 class="font-bold text-2xl pb-6">Welcome to posty!</h1>
            <p>Posty is a system for storing scientific publications. </p>
            <p>Here you can find a great variety of articles, books and papers.</p>
            <a href="{{ route('dashboard') }}" class="font-bold underline">See all publications</a>
        </div>
    </div>
@endsection
