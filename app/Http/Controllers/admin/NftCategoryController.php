<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\NftCategory;
use Illuminate\Http\Request;

class NftCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard.nft_category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.nft_category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|integer',
            'profit' => 'required|numeric',
            'duration' => 'required|integer',
            'stock' => 'required|integer',
            'nft' => 'required',
        ]);

        // getting a picture from request
        $image = $request->file('nft');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('assets/nft/categories'), $imageName);

        // adding new nft to database
        $nft = new NftCategory();
        $nft->name = $validatedData['name'];
        $nft->price = $validatedData['price'];
        $nft->profit = $validatedData['profit'];
        $nft->duration = $validatedData['duration'];
        $nft->stock = $validatedData['stock'];
        $nft->picture = $imageName;
        $nft->save();

        return redirect()->route('admin.nft_category.index')->with('success', 'NFT added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
