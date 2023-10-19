@extends('layouts.my-layout')

@section('title', 'My Books')

@section('mainContent')
    <h1 class="text-3xl font-bold text-center">All My Books</h1>
    @if ($books->count() == 0)
        <h1>No Books Found</h1>
    @else
        <div class="flex gap-5">
            @foreach ($books as $book)
                <div class="w-24 h-24 bg-blue-500 rounded-md text-white">
                    {{ $book->name }}
                    <a href="{{ route('books.delete', $book->id) }}" class="bg-red-500 rounded text-white px-3 py-1">Delete</a>
                </div>
                {{-- <p>{{$book->user()->name}}</p> --}}
            @endforeach
        </div>
    @endif

@endsection
