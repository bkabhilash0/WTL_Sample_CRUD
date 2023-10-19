<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $user = Auth::user()->id;
        // $books = DB::table("books")->where("user_id", '=', $user)->get();
        $books = DB::table("books")->get();
        return view("books.index", compact("books"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("books.add");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            "name" => ['required', 'min:5'],
            "desc" => ['required'],
            "author" => ['required'],
            "edition" => ['numeric'],
        ]);

        $user = Auth::user();

        // Book::create([
        //     "name" => $request->input("name"),
        //     "desc" => $request->input("desc"),
        //     "author" => $request->input("author"),
        //     "edition" => $request->input("edition"),
        //     "user_id" => $user->id
        // ]);

        DB::table("books")->insert([
            "name" => $request->input("name"),
            "desc" => $request->input("desc"),
            "author" => $request->input("author"),
            "edition" => $request->input("edition"),
            "user_id" => $user->id
        ]);

        return redirect()->route("books.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table("books")->where("id", "=", $id)->delete();
        return redirect()->back();
    }
}
