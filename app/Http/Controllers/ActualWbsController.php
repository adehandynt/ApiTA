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
         return  DB::select('SELECT a.*,c.UnitName,d.currencyName
         FROM baselineboq a
         left JOIN unit c on c.id=a.unitID
         left JOIN currency d on d.id = a.CurrencyID
         where a.hasChild IS NOT NULL AND (a.hasChild != "" OR a.hasChild != 0)
         ORDER BY COALESCE(a.parentItem, a.id), a.id');
    }

    public function getAllDataActualWbs()
    {
    return  ActualWbs::all();
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
            
            'itemName'      => $request->itemName,
            'parentItem'      => $request->parentItem,
            'hasChild'      => $request->hasChild,
            'qty'      => $request->qty,
            'price'      => $request->price,
            'amount'      => $request->amount,
            'weight'      => $request->weight,
            'ProjectID'      => $request->ProjectID,
            'unitID'      => $request->unitID,
            'contractorID'      => $request->contractorID,
            'CurrencyID'      => $request->CurrencyID,
            'Created_By'    => $request->Created_By

            ]);

            return response()->json(['status' => 'success','last_insert_id' => $data->id], 200);
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
        where a.id=?',[$id]);
    }

    public function DataDataActualWbschild(ActualWbs $ActualWbs, $id){
        return  DB::select('SELECT a.*,c.UnitName,d.currencyName
         FROM baselineboq a
         left JOIN unit c on c.id=a.unitID
         left JOIN currency d on d.id = a.CurrencyID
         where a.parentItem = ? and (a.hasChild IS NULL or a.hasChild = 0)
         ORDER BY COALESCE(a.parentItem, a.id), a.id', [$id]);
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
        DB::delete('DELETE
         FROM baselineboq
         WHERE parentItem IN
         (
             SELECT parentItem
             FROM baselineboq
             WHERE parentItem = ?
         )',[$id]);
        return response()->json(['status' => 'success'], 200);
    }
}
