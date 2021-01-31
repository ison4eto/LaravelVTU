@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-white p-6 rounded-lg">
            <h1 class="font-bold text-3xl pb-6 text-center">{{ $post->title }}</h1>
            <div class="mb-4 flex text-sm">
                <p class="font-bold mr-7">Authors:</p>
                <p>{{ $post->authors }}</p>
            </div>
            <div class="mb-4 flex text-sm">
                <p class="font-bold mr-5">Category:</p>
                <p>{{ ucwords($post -> category) }}</p>
            </div>
            <div class="mb-4 flex  text-sm">
                <p class="font-bold mr-14">File:</p>
                <form action="{{ route('download', ['filename' =>  $post->file])}}" method="post" class="inline">
                    @csrf
                    <button type="submit" class="underline">{{ $post -> file }}</button>
                </form>
            </div>
            <div class="mb-4 flex  text-sm">
                <p class="font-bold mr-9">Added:</p>
                <p>{{ $post -> created_at->diffForHumans() }}</p>
            </div>
            <div class="mb-4 flex  text-sm">
                <p class="font-bold mr-4">Added by:</p>
                <p>{{ $post -> user -> name }}</p>
            </div>
            <div class="mb-4 flex  text-sm">
                <p class="font-bold mr-6">Updated:</p>
                <p>{{ $post -> updated_at->diffForHumans() }}</p>
            </div>
            <div class="flex justify-around text-xl font-bold my-8">
                <p class="border-2 border-black p-2 px-3"><a href="{{ route('dashboard') }}">Go Back</a></p>
                <p class="border-2 border-black p-2 px-8"><a href="{{ route('posts.edit', ['id' => $post->id]) }}">Edit</a></p>
                <p class="border-2 border-red-500 p-2 px-6"><a href="{{ route('posts.delete', ['id' => $post->id]) }}" class="text-red-500">Delete</a></p>
            </div>
        </div>
    </div>
@endsection
