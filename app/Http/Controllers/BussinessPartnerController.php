<?php

namespace App\Http\Controllers;

use App\Models\BussinessPartner;
use Illuminate\Http\Request;

class BussinessPartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return BussinessPartner:: all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        BussinessPartner::create([
            
            'BussinessName'     => $request->BussinessName,
            'BussinessTypeID'   => $request->BussinessTypeID,
            'Address'           => $request->Address,
            'CountryID'         => $request->CountryID,
            'CityID'            => $request->CityID,
            'Phone'             => $request->Phone,
            'Fax'               => $request->Fax,
            'Web'               => $request->Web
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
     * @param  \App\Models\BussinessPartner  $bussinessPartner
     * @return \Illuminate\Http\Response
     */
    public function show(BussinessPartner $bussinessPartner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BussinessPartner  $bussinessPartner
     * @return \Illuminate\Http\Response
     */
    public function edit(BussinessPartner $bussinessPartner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BussinessPartner  $bussinessPartner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        BussinessPartner::where ('id',$id)->update($request->all());
        return response()->json('data sudah di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BussinessPartner  $bussinessPartner
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        //
        BussinessPartner::where('id',$id)->delete();
        return response()->json('data sudah di hapus');
    }
}
