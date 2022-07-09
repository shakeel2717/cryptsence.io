<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Nft;
use App\Models\NftCategory;
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
        $nftCategories = NftCategory::where('status', true)->get();
        return view('admin.dashboard.nft.create',compact('nftCategories'));
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
            'title' => 'required|max:255',
            'nft' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nft_category_id' => 'required|integer',
        ]);

        // getting a picture from request
        $image = $request->file('nft');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('assets/nft'), $imageName);

        // adding new nft to database
        $nft = new Nft();
        $nft->title = $validatedData['title'];
        $nft->nft_category_id = $validatedData['nft_category_id'];
        $nft->nft = $imageName;
        $nft->save();

        return redirect()->back()->with('success', 'NFT added successfully');
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
