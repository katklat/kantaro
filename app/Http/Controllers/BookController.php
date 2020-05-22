<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($filter = 'all')
    {
        $filters = ['all', 'travel', 'festival', 'other'];
        $orderBy = 'created_at';
        if ($filter !== 'all') {
            $books =  Book::all()->where('occasion', $filter)->sortByDesc($orderBy);
        } else {
            $books =  Book::all()->sortByDesc($orderBy);
        }

        return view('books/index', [
            'books' => $books,
            'filters' => $filters,
            'selectedFilter' => $filter

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validateData();

        return redirect()->route('books.show', ['book' => Book::create($data)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        $songs = $book->songs()->get();
        return view('books.show', ['book' => $book, 'songs' => $songs]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('books.edit', ['book' => $book]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $data = $this->validateData();
        if ($request->has('image')) {
            $path = $request->file('image')->store('/books/images', 'public');
            $data['image'] = $path;
        }
        $book->update($data);

        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->route('books.index');
    }

    public function tools(Book $book)
    {
        return view('books/tools', [
            'book' => $book
        ]);
    }

    private function validateData()
    {
        return request()->validate([
            'name' => 'required',
            'occasion' => 'nullable',
            'entry' => 'nullable',
            'month' => 'nullable',
            'year' => 'nullable|integer',
            'location' => 'nullable',
            'emoji' => 'nullable',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'playlist_id' => 'nullable',
            'user_id' => 'nullable'
        ]);
    }
}
