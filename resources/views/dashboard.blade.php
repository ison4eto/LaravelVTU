@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-full bg-white p-6 rounded-lg ml-16 mr-16">
            <h1 class="font-bold text-2xl pb-6 text-center">Dashboard</h1>
            @if($posts->count())
                <table class="table-fixed border-separate border mb-10">
                    <thead>
                        <tr>
                            <th class="w-1/4 border pl-2 pr-2 pt-0.5 pb-0.5">Title</th>
                            <th class="w-1/4 border pl-2 pr-2 pt-0.5 pb-0.5">Authors</th>
                            <th class="w-1/8 border pl-2 pr-2 pt-0.5 pb-0.5">Category</th>
                            <th class="w-1/6 border pl-2 pr-2 pt-0.5 pb-0.5">Filename</th>
                            <th class="w-1/6 border pl-2 pr-2 pt-0.5 pb-0.5">Added on</th>
                            <th class="w-1/6 border pl-2 pr-2 pt-0.5 pb-0.5">Added by</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                    <tr class="text-center">
                        <td class="border pl-2 pr-2 pb-0.5 pt-0.5">{{ $post -> title }}</td>
                        <td class="border pl-2 pr-2 pb-0.5 pt-0.5">{{ $post -> authors }}</td>
                        <td class="border pl-2 pr-2 pb-0.5 pt-0.5">{{ ucwords($post -> category) }}</td>
                        <td class="border pl-2 pr-2 pb-0.5 pt-0.5">{{ $post -> file }}</td>
                        <td class="border pl-2 pr-2 pb-0.5 pt-0.5">{{ $post -> created_at->diffForHumans() }}</td>
                        <td class="border pl-2 pr-2 pb-0.5 pt-0.5">{{ $post -> user -> name }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $posts->links() }}
            @else
            <div class="text-m font-bold text-center">
                <p class="m-6">There are no posts available.</p>
                <button class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">
                    <a href="{{ route('posts') }}">Add a new post</a>
                </button>
            </div>
            @endif
        </div>
    </div>
@endsection
