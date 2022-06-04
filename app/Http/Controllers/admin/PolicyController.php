<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BonusPolicy;
use Illuminate\Http\Request;

class PolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard.policy.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dashboard.policy.create');
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
            'description' => 'nullable',
            'st_date' => 'required|string',
            'end_date' => 'required|string',
            'bonus' => 'required|numeric',
        ]);

        // change date format
        $validatedData['st_date'] = date('Y-m-d', strtotime($validatedData['st_date']));
        $validatedData['end_date'] = date('Y-m-d', strtotime($validatedData['end_date']));

        // adding a new policy
        $policy = new BonusPolicy();
        $policy->title = $validatedData['title'];
        $policy->description = $validatedData['description'];
        $policy->start_date = $validatedData['st_date'];
        $policy->end_date = $validatedData['end_date'];
        $policy->bonus = $validatedData['bonus'];
        $policy->save();

        return redirect()->back()->with('success', 'Policy added successfully');
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
        $policy = BonusPolicy::find($id);

        return view('admin.dashboard.policy.create', compact('policy'));
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
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
            'st_date' => 'required|string',
            'end_date' => 'required|string',
            'bonus' => 'required|numeric',
        ]);

        // change date format
        $validatedData['st_date'] = date('Y-m-d', strtotime($validatedData['st_date']));
        $validatedData['end_date'] = date('Y-m-d', strtotime($validatedData['end_date']));

        // adding a new policy
        $policy = BonusPolicy::findOrFail($id);
        $policy->title = $validatedData['title'];
        $policy->description = $validatedData['description'];
        $policy->start_date = $validatedData['st_date'];
        $policy->end_date = $validatedData['end_date'];
        $policy->bonus = $validatedData['bonus'];
        $policy->save();

        return redirect()->back()->with('success', 'Policy Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
    }
}
