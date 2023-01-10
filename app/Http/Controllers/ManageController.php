<?php

namespace App\Http\Controllers;

use App\Models\Manage;
use Illuminate\Http\Request;

class ManageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Manage::get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $manage = Manage::create($request->all());
        return $manage;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Manage  $manage
     * @return \Illuminate\Http\Response
     */
    public function show(Manage $manage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Manage  $manage
     * @return \Illuminate\Http\Response
     */
    public function edit(Manage $manage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Manage  $manage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manage $manage)
    {
        $manage->update($request->all());
        return response()->json($manage);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Manage  $manage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manage $manage)
    {   
        // $manage=Manage::find($id);
        $manage->delete();
        return response()->json('success');
    }
}
