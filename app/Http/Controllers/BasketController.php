<?php

namespace App\Http\Controllers;

use App\Basket;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderBy = 'created_at';
        return view('baskets/index', [
            'baskets' => Basket::all()->sortByDesc($orderBy)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('baskets/create');
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

        return redirect()->route('baskets.show', ['basket' => Basket::create($data)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Basket  $basket
     * @return \Illuminate\Http\Response
     */
    public function show(Basket $basket)
    {
        $songs = $basket->songs()->get();
        return view('baskets.show', ['basket' => $basket, 'songs' => $songs]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Basket  $basket
     * @return \Illuminate\Http\Response
     */
    public function edit(Basket $basket)
    {
        return view('baskets.edit', ['basket' => $basket]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Basket  $basket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Basket $basket)
    {
        $data = $this->validateData();
        if ($request->has('image')) {
            $path = $request->file('image')->store('/songs/images', 'public');
            $data['image'] = $path;
        }
        $basket->update($data);

        return redirect()->route('baskets.index');
    }

    public function tools(Basket $basket)
    {
        return view('baskets/tools', [
            'basket' => $basket
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Basket  $basket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Basket $basket)
    {
        $basket->delete();

        return redirect()->route('baskets.index');
    }

    private function validateData()
    {
        return request()->validate([
            'name' => 'required',
            'occasion' => 'nullable',
            'month' => 'nullable',
            'year' => 'nullable',
            'location' => 'nullable',
            'emoji' => 'nullable',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    }
}
