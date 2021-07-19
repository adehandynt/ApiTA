<?php

namespace App\Http\Controllers;

use App\Models\StationProgress;
use Illuminate\Http\Request;
use DB;

class StationProgressController extends Controller
{
    public function index()
    {
        //
        return  DB::select("SELECT
        a.*,
        b.description,
        c.BussinessName 
    FROM
        actual_wbs a
        JOIN station_progress b ON b.itemID = a.id 
        JOIN bussinesspartner c ON c.id = a.contractorID
    WHERE
        b.ProjectID = 1 
        AND b.ContractorID = 1 
    GROUP BY
        a.itemName");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        StationProgress::updateOrCreate([
            'stationName'      => $request->stationName,
            'description'      => $request->description,
            'itemID'      => $request->itemID,
            'ProjectID'      => $request->ProjectID,
            'ContractorID'      => $request->ContractorID,
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
    public function show(StationProgress $StationProgress, $id)
    {
        //
        $data = StationProgress::where('id', $id)->get();
        return response($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function edit(StationProgress $StationProgress)
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
        StationProgress::where('id', $id)->update($request->all());
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
        StationProgress::where('id', $id)->delete();
        return response()->json(['status' => 'success'], 200);
    }
}
