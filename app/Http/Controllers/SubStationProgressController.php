<?php

namespace App\Http\Controllers;

use App\Models\SubStationProgress;
use Illuminate\Http\Request;
use DB;

class SubStationProgressController extends Controller
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
        SubStationProgress::updateOrCreate([
            'itemID'      => $request->itemID,
            'parentID'      => $request->parentID,
            'stationID'      => $request->stationID,
            'completedSatus'      => $request->completedSatus
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
    public function show(SubStationProgress $SubStationProgress, $id)
    {
        //
        return  DB::select("SELECT
        *
        FROM
            actual_wbs a
            JOIN sub_station_progress b ON b.ItemID = a.id 
        WHERE
             b.parentID  = ?", [$id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function edit(SubStationProgress $SubStationProgress)
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
        SubStationProgress::where('id', $id)->update($request->all());
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
        SubStationProgress::where('id', $id)->delete();
        return response()->json(['status' => 'success'], 200);
    }
}
