@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-6/12 bg-white p-6 rounded-lg">
            <h1 class="font-bold text-3xl pb-6 text-center">Post</h1>
            <form action="{{ route('posts') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="title" class="font-bold text-sm">Title</label>
                    <input type="text" name="title" id="title" placeholder="Enter title"
                           class="bg-gray-100 border-2 w-full p-3 rounded-lg mt-2
                                  @error('title') border-red-500 @enderror "
                           value="{{ old('title') }}">
                    @error('title')
                    <div class="text-red-500 mt-2 text-m">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="authors" class="font-bold text-sm">Authors</label>
                    <textarea name="authors" id="authors" placeholder="Enter authors"
                              rows="2"
                              class="bg-gray-100 border-2 w-full p-3 rounded-lg mt-2
                                     @error('authors') border-red-500 @enderror ">{{old('authors')}}</textarea>
                    @error('authors')
                    <div class="text-red-500 mt-2 text-m">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="category" class="font-bold text-sm">Category</label>
                    <select name="category" id="category"
                            class="bg-gray-100 border-2 w-full p-3 rounded-lg mt-2
                                  @error('category') border-red-500 @enderror ">
                        <option value="article" @if(old('category') == 'article') selected @endif>Article</option>
                        <option value="book" @if(old('category') == 'book') selected @endif>Book</option>
                        <option value="paper" @if(old('category') == 'paper') selected @endif>Paper/Report</option>
                    </select>
                    @error('category')
                    <div class="text-red-500 mt-2 text-m">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="file" class="font-bold text-sm">Upload file</label>
                    <input type="file" name="file" id="file" placeholder="Upload file" value="{{ old('file') }}"
                           accept="application/msword, application/vnd.ms-powerpoint, text/plain, application/pdf,
                                   application/vnd.openxmlformats-officedocument.wordprocessingml.
                                   application/vnd.openxmlformats-officedocument.presentationml.presentation"
                           class="bg-gray-100 border-2 w-full p-3 rounded-lg mt-2
                                  @error('file') border-red-500 @enderror " />
                    @error('file')
                    <div class="text-red-500 mt-2 text-m">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="stayOnPage" class="font-bold text-sm">Create another post</label>
                    <input type="checkbox"
                           name="stayOnPage" id="stayOnPage"
                           class="bg-gray-100 border-2 p-3 rounded-lg align-middle m-2"/>
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">
                        Post
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
