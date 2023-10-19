@extends('layouts.my-layout')

@section('title', 'Add a Book')

@section('mainContent')
    <h1 class="text-3xl font-bold text-center">Add New Books</h1>
    <form class="flex gap-5 flex-col gap-y-3 max-w-sm mx-auto bg-zinc-300" action="{{ route('books.store') }}" method="POST">
        @csrf
        <div class="">
            <label for="name">Book Name</label>
            <input type="text" id="name" name="name" value="{{old('name')}}">
        </div>
        @error('name')
            <p class="text-red-600 bg-red-200 py-1">{{ $message }}</p>
        @enderror

        <div class="">
            <label for="desc">Book Description</label>
            <input type="text" id="desc" name="desc" value="{{old('desc')}}">
        </div>
        @error('desc')
            <p class="text-red-600 bg-red-200 py-1">{{ $message }}</p>
        @enderror

        <div class="">
            <label for="author">Book Author</label>
            <input type="text" id="author" name="author" value="{{old('author')}}">
        </div>
        @error('author')
            <p class="text-red-600 bg-red-200 py-1">{{ $message }}</p>
        @enderror

        <div class="">
            <label for="edition">Book Edition</label>
            <input type="number" id="edition" name="edition" value="{{old('edition')}}">
        </div>
        @error('edition')
            <p class="text-red-600 bg-red-200 py-1">{{ $message }}</p>
        @enderror
        <button type="submit">Submit</button>
    </form>
@endsection
