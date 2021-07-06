<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documents;

class DocumentsController extends Controller
{
    public function index()
    {
        //
        return Documents::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        Documents::Create([

            'documentName'      => $request->documentName,
            'documentType'      => $request->documentType,
            'size'      => $request->size,
            'author'      => $request->author,
            'status'      => $request->status,
            'desc'      => $request->desc,
            'projectID'      => $request->projectID

        ]);

        return response()->json(['status' => 'success'], 200);
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
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function show(Documents $Documents, $id)
    {
        //
        $data = Documents::where('id', $id)->get();
        return response($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function edit(Documents $Documents)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        Documents::where('id', $id)->update($request->all());
        return response()->json(['status' => 'success'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Documents::where('id', $id)->delete();
        return response()->json(['status' => 'success'], 200);
    }
}
