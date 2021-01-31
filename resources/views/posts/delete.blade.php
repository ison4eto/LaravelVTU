@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-6/12 bg-white p-6 rounded-lg">
            <h1 class="font-bold text-3xl pb-6 text-center">Delete</h1>
            <form action="{{ route('posts.delete', ['id' => $post->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="title" class="font-bold text-sm">Title</label>
                    <input type="text" name="title" id="title" readonly
                           class="bg-gray-100 border-2 w-full p-3 rounded-lg mt-2"
                           value="{{ $post->title }}">
                </div>
                <div class="mb-4">
                    <label for="authors" class="font-bold text-sm">Authors</label>
                    <textarea name="authors" id="authors" rows="2" readonly
                              class="bg-gray-100 border-2 w-full p-3 rounded-lg mt-2"
                    >{{ $post->authors }}</textarea>
                </div>
                <div class="mb-4">
                    <label for="category" class="font-bold text-sm">Category</label>
                    <select name="category" id="category" disabled
                            class="bg-gray-100 border-2 w-full p-3 rounded-lg mt-2">
                            <option value="article" @if($post->category == 'article') selected @endif>Article</option>
                            <option value="book" @if($post->category == 'book') selected @endif>Book</option>
                            <option value="paper" @if($post->category == 'paper') selected @endif>Paper/Report</option>
                    </select>
                </div>

                <div class="flex justify-around">
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded font-medium">
                        Delete
                    </button>
                    <button class="bg-blue-500 text-white px-4 py-2 rounded font-medium">
                        <a href="{{  route('posts.edit', ['id' => $post->id]) }} }}">
                            Edit instead
                        </a>
                    </button>
                </div>
            </form>

            <div class="mb-4 flex text-sm mt-4">
                <p class="mr-4">Uploaded file:</p>
                <form action="{{ route('download', ['filename' =>  $post->file])}}" method="post" class="inline">
                    @csrf
                    <button type="submit" class="underline">{{ $post -> file }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
