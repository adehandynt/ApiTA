<?php

namespace App\Http\Controllers;

use App\Models\PositionCategory;
use Illuminate\Http\Request;

class PositionCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return PositionCategory:: all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        PositionCategory::create([
            
            'CategoryName'       => $request->CategoryName
            ]);

        return response()->json('Data Berhasil Dimasukan');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PositionCategory  $positionCategory
     * @return \Illuminate\Http\Response
     */
    public function show(PositionCategory $positionCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PositionCategory  $positionCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(PositionCategory $positionCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PositionCategory  $positionCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        PositionCategory::where ('ProjectID',$id)->update($request->all());
        return response()->json('data sudah di update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PositionCategory  $positionCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        PositionCategory::where('id',$id)->delete();
        return response()->json('data sudah di hapus');
        
    }
}
