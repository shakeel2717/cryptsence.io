<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Nft;
use Illuminate\Http\Request;

class NftController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard.nft.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.nft.create');
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
            'title' => 'required|max:255',
            'price' => 'required|integer',
            'profit' => 'required|integer',
            'duration' => 'required|integer',
            'stock' => 'required|integer',
            'nft' => 'required|max:255',
        ]);

        // getting a picture from request
        $image = $request->file('nft');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('assets/nft'), $imageName);

        // adding new nft to database
        $nft = new Nft();
        $nft->name = $validatedData['name'];
        $nft->title = $validatedData['title'];
        $nft->price = $validatedData['price'];
        $nft->profit = $validatedData['profit'];
        $nft->duration = $validatedData['duration'];
        $nft->stock = $validatedData['stock'];
        $nft->nft = $imageName;
        $nft->save();

        return redirect()->route('admin.nft.index')->with('success', 'NFT added successfully');
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
