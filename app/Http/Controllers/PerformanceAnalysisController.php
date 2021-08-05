<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ActualWbs;
use App\Models\PerformanceAnalysis;
use DB;

class PerformanceAnalysisController extends Controller
{
    public function index()
    {
        //
        return ActualWbs::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        PerformanceAnalysis::updateOrCreate([
            'itemID' => $request->itemID,
            'AC' => $request->AC,
            'PC' => $request->PC,
            'EV' => $request->EV,
            'CV' => $request->CV,
            'SV' => $request->SV,
            'CPI' => $request->CPI,
            'SPI' => $request->SPI,
            'EAC1' => $request->EAC1,
            'EAC2' => $request->EAC2,
            'EAC3' => $request->EAC3,
            'EAC4' => $request->EAC4,
            'docID' => $request->docID
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
    public function show(ActualWbs $ActualWbs, $id)
    {
        //
        $data = ActualWbs::where('id', $id)->get();
        return response($data);
    }

    public function getPerformance($projectId,$contractorId){
        return  DB::select("SELECT
        a.*,
        b.*,
        round(( a.ev / b.ACC_TOTAL_PLANNED_COST ),2) AS SPI,
	round(( a.EV - b.ACC_TOTAL_PLANNED_COST ),2) AS SV,
        ( SELECT sum( qty * price ) AS ACC_TOTAL_PLANNED_COST FROM actual_wbs WHERE parentItem IS NOT NULL AND ( ProjectID = ".$projectId." AND contractorID = ".$contractorId." ) ) AS BAC,
        (
            a.TOTAL_ACTUAL_COST +(
                b.ACC_TOTAL_PLANNED_COST - a.EV 
            )) AS EAC1,
        COALESCE ( round(( a.TOTAL_ACTUAL_COST +(( b.ACC_TOTAL_PLANNED_COST - a.EV )/ a.CPI )), 2 ), 0 ) AS EAC3,
        COALESCE (
            round(( a.TOTAL_ACTUAL_COST +(( b.ACC_TOTAL_PLANNED_COST - a.EV )/ a.CPI /( a.ev / b.ACC_TOTAL_PLANNED_COST ))), 2 ),
            0 
        ) AS EAC4 
    FROM
        (
        SELECT
            a.id,
            a.itemName,
            a.startDate,
            a.parentItem,
            a.endDate,
            a.hasChild,
            a.ProjectID,
            a.contractorID,
            b.estimatedQty,
            b.accumulatedLastMonthQty,
            b.accumulatedThisMonthQty,
            b.TOTAL_ACTUAL_COST,
            b.thisMonthQty,
            c.EV,
            ( c.EV - b.TOTAL_ACTUAL_COST ) AS CV,
            ( c.EV / b.TOTAL_ACTUAL_COST ) AS CPI 
        FROM
            actual_wbs a
            JOIN (
            SELECT
                a.parentItem,
                b.estimatedQty,
                b.accumulatedLastMonthQty,
                b.accumulatedThisMonthQty,
                b.thisMonthQty,
                SUM( a.amount ) AS TOTAL_ACTUAL_COST 
            FROM
                actual_wbs a
                JOIN progress_evaluation b ON b.ItemID = a.id 
            WHERE
                a.parentItem IS NOT NULL 
                AND ( a.ProjectID = ".$projectId." AND a.contractorID = ".$contractorId." ) 
            GROUP BY
                a.parentItem 
            ) b ON b.parentItem = a.id
            JOIN (
            SELECT
                a.parentItem,
                COALESCE ( SUM( b.amount ), 0 ) AS EV 
            FROM
                actual_wbs a
                LEFT JOIN progress_evaluation b ON b.ItemID = a.id 
                -- 		AND a.weight = b.weight 
            WHERE
                a.parentItem IS NOT NULL 
            GROUP BY
                a.parentItem 
            ) c ON c.parentItem = a.id 
        ) a
        LEFT JOIN (
        SELECT
            parentItem,-- 		sum( qty ) AS accTotalQty,
    -- 		sum( price ) AS accTotalPrice,
            sum( qty ) AS ESTIMATED_QTY,
            sum( qty * price ) AS ACC_TOTAL_PLANNED_COST 
        FROM
            baseline_wbs 
        WHERE
            parentItem IS NOT NULL 
            AND ( ProjectID = ".$projectId." AND contractorID = ".$contractorId." ) 
        GROUP BY
            parentItem 
        ) b ON b.parentItem = a.id 
    WHERE
        ( a.hasChild != '' OR a.hasChild != 0 ) 
        AND (
            a.ProjectID = ".$projectId." 
        AND a.contractorID = ".$contractorId." 
        )");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function edit(ActualWbs $ActualWbs)
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
        ActualWbs::where ('id',$id)->update($request->all());
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
        ActualWbs::where('id',$id)->delete();
        return response()->json(['status' => 'success'], 200);
    }
}
