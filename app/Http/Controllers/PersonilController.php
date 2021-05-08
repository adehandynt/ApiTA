<?php

namespace App\Http\Controllers;

use App\Models\Personil;
use Illuminate\Http\Request;

class PersonilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Personil:: all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        Personil::create([
            
            'BussinessPartnerID'       => $request->BussinessPartnerID,
            'PersonilName'             => $request->PersonilName,
            'Address'                  => $request->Address,
            'Postzip'                  => $request->Postzip,
            'CountryID'                => $request->CountryID,
            'CityID'                   => $request->CityID,
            'Phone'                    => $request->Phone,
            'Hp'                       => $request->Hp,
            'Email'                    => $request->Email,
            'PositionID'               => $request->PositionID
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
     * @param  \App\Models\Personil  $personil
     * @return \Illuminate\Http\Response
     */
    public function show(Personil $personil)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Personil  $personil
     * @return \Illuminate\Http\Response
     */
    public function edit(Personil $personil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Personil  $personil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        Personil::where ('id',$id)->update($request->all());
        return response()->json('data sudah di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Personil  $personil
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Personil::where('id',$id)->delete();
        return response()->json('data sudah di hapus');
    }
}
