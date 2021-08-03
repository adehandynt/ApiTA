<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\ActualWbs;

class ActualWbsController extends Controller
{
    public function index()
    {
        //
        //return  DB::select('SELECT * FROM baselineboq ORDER BY COALESCE(parentItem, id), id');
        return  DB::select("SELECT
        b.*,
c.periode,
c.progressName,
c.estimatedQty,
c.accumulatedLastMonthQty,
c.thisMonthQty,
c.accumulatedThisMonthQty,
c.amount as actualAmount,
c.weight as actualProgress,
(SELECT sum(qty*price) from actual_wbs) as totalEstimated 
FROM
    projects a
    LEFT JOIN actual_wbs b ON b.ProjectID = a.ProjectID
    LEFT JOIN progress_evaluation c ON c.ItemID = b.id 
WHERE
    (a.ProjectID = '1' 
    AND b.contractorID = '1')
   --  AND
   --  b.hasChild IS NOT NULL 
   --  AND ( b.hasChild != '' OR b.hasChild != 0 ) 
           GROUP BY b.id
   ORDER BY b.parentlevel, COALESCE(b.parentItem, b.id), b.level");
    }

    public function DataActualWbsDetail($docID)
    {
       return DB::select("SELECT
        b.*,
        c.periode,
        c.progressName,
        c.estimatedQty,
        c.accumulatedLastMonthQty,
        c.thisMonthQty,
        c.accumulatedThisMonthQty,
        c.amount AS actualAmount,
        c.weight AS actualProgress,
        (
        SELECT
            sum( c.amount ) 
        FROM
            projects a
            LEFT JOIN wbs_history b ON b.ProjectID = a.ProjectID
            LEFT JOIN progress_evaluation c ON c.ItemID = b.actualWbsID 
        WHERE
        ( a.ProjectID = '1' AND b.contractorID = '1' AND c.docID = ? )) AS totalThisMonth,
        (
        SELECT
            sum( c.accumulatedLastMonthQty * b.price ) 
        FROM
            projects a
            LEFT JOIN wbs_history b ON b.ProjectID = a.ProjectID
            LEFT JOIN progress_evaluation c ON c.ItemID = b.actualWbsID 
        WHERE
        ( a.ProjectID = '1' AND b.contractorID = '1' AND c.docID = ? )) AS totalLastMonth,
        ( SELECT sum( qty * price ) FROM wbs_history ) AS totalEstimated 
    FROM
        projects a
        LEFT JOIN wbs_history b ON b.ProjectID = a.ProjectID
        LEFT JOIN progress_evaluation c ON c.ItemID = b.actualWbsID 
    WHERE
        ( a.ProjectID = '1' AND b.contractorID = '1' AND c.docID = ? ) --  AND
    --  b.hasChild IS NOT NULL
    --  AND ( b.hasChild != '' OR b.hasChild != 0 )
        
    GROUP BY
        b.id ", [$docID,$docID,$docID]);
    }

    public function getAllDataActualWbs($contractorID,$projectID)
    {
         $data = ActualWbs::where([
            ['contractorID', '=',  $contractorID],['ProjectID', '=',  $projectID]])->get();
        return response($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $data = ActualWbs::updateOrCreate([
            
            'ProjectID'      => $request->ProjectID,
            'contractorID'      => $request->contractorID
        
        ],[
            'itemName'      => $request->itemName,
            'parentItem'      => $request->parentItem,
            'hasChild'      => $request->hasChild,
            'unitID'      => $request->unitID,
            'qty'      => $request->qty,
            'price'      => $request->price,
            'startDate'      => $request->startDate,
            'endDate'      => $request->endDate,
            'amount'      => $request->amount,
            'weight'      => $request->weight,
            'CurrencyID'      => $request->CurrencyID,
            'level' => $request->level,
            'parentlevel' => $request->parentlevel,
            'Created_By'    => $request->Created_By
        ]);

        return response()->json(['status' => 'success', 'last_insert_id' => $data->id], 200);
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
        return DB::select('SELECT a.*,c.UnitName,d.currencyName
        FROM baselineboq a
        left JOIN unit c on c.id=a.unitID
        left JOIN currency d on d.id = a.CurrencyID
        where a.id=?', [$id]);
    }

    public function DataActualWbschild(ActualWbs $ActualWbs, $id)
    {
        return  DB::select('SELECT
        b.*,
        c.periode,
        c.progressName,
        c.estimatedQty,
        c.accumulatedLastMonthQty,
        c.thisMonthQty,
        c.accumulatedThisMonthQty,
        c.amount as actualAmount,
        c.weight as actualProgress 
        FROM
        projects a
        LEFT JOIN actual_wbs b ON b.ProjectID = a.ProjectID
        LEFT JOIN progress_evaluation c ON c.ProjectID = a.ProjectID
         where  (a.ProjectID = "1"
         AND b.contractorID = "1") and b.parentItem = ? and (b.hasChild IS NULL or b.hasChild = 0)
         ORDER BY COALESCE(b.parentItem, b.id), b.id', [$id]);
    }

    public function DataDetailActualWbsByid(ActualWbs $ActualWbs, $id)
    {
        return  DB::select('SELECT
        b.*,
        c.periode,
        c.progressName,
        c.estimatedQty,
        c.accumulatedLastMonthQty,
        c.thisMonthQty,
        c.accumulatedThisMonthQty,
        c.amount as actualAmount,
        c.weight as actualProgress,
        (SELECT sum(qty*price) from actual_wbs) as totalEstimated
        FROM
        projects a
        LEFT JOIN actual_wbs b ON b.ProjectID = a.ProjectID
        LEFT JOIN progress_evaluation c ON c.ProjectID = a.ProjectID
         where  b.id = ? ', [$id]);
    }

    public function GetActualParentItem(ActualWbs $ActualWbs, $projectID, $consultantID)
    {
        return  DB::select("SELECT
        * from actual_wbs
        where (hasChild != '' OR hasChild != 0) AND (ProjectID=? AND contractorID=?)",[$projectID, $consultantID]);
    }

    public function GetActualChildItem(ActualWbs $ActualWbs, $projectID, $consultantID, $itemID)
    {
        return  DB::select("SELECT
        * from actual_wbs
        where (ProjectID=? AND contractorID=? AND parentItem=?)",[$projectID, $consultantID, $itemID]);
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
        ActualWbs::where('id', $id)->update($request->all());
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
        ActualWbs::where('id', $id)->delete();
        DB::delete('DELETE
         FROM baselineboq
         WHERE parentItem IN
         (
             SELECT parentItem
             FROM baselineboq
             WHERE parentItem = ?
         )', [$id]);
        return response()->json(['status' => 'success'], 200);
    }
}
