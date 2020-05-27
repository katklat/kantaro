<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($filter = 'all')
    {
        $user = Auth::user()->id;
        $filters = ['all', 'travel', 'festival', 'other'];
        $orderBy = 'created_at';
        if ($filter !== 'all') {
            $books =  Book::all()
                ->where('occasion', $filter)
                ->where('user_id', $user)
                ->sortByDesc($orderBy);
        } else {
            $books =  Book::all()
                ->where('user_id', $user)
                ->sortByDesc($orderBy);
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
        $data['user_id'] = Auth::user()->id;

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
        if (Gate::allows('bookCRUD', $book)) {
            $songs = $book->songs()->get();
            return view('books.show', ['book' => $book, 'songs' => $songs]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        if (Gate::allows('bookCRUD', $book)) {
            return view('books.edit', ['book' => $book]);
        }
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

    public function updateImage(Request $request, Book $book)
    {
        if ($request->has('delete')) {
            $data['image'] = '';
            $book->update($data);
        } else {
            if (strlen($_FILES['image']['name']) > 0) {
                $path = $request->file('image')->store('/books/images', 'public');
                $data['image'] = $path;
                $book->update($data);
            }
        }

        return redirect()->route('books.show', ['book' => $book]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        if (Gate::allows('bookCRUD', $book)) {
            $book->delete();
            return redirect()->route('books.index');
        }
    }

    public function tools(Book $book)
    {
        if (Gate::allows('bookCRUD', $book)) {
            return view('books/tools', [
                'book' => $book
            ]);
        }
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'playlist_id' => 'nullable',
            'user_id' => 'nullable'
        ]);
    }
}
