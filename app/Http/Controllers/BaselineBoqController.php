<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BaselineBoq;

class BaselineBoqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         return BaselineBoq::leftjoin('unit', 'baselineboq.unitID', '=', 'unit.id')
        ->leftjoin('currency', 'baselineboq.CurrencyID', '=', 'currency.id')
        ->select('baselineboq.*','currency.currencyName','unit.UnitName')
        ->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        BaselineBoq::updateOrCreate([
            
            'itemName'      => $request->itemName,
            'parentItem'      => $request->parentItem,
            'hasChild'      => $request->hasChild,
            'qty'      => $request->qty,
            'price'      => $request->price,
            'amount'      => $request->amount,
            'weight'      => $request->weight,
            'ProjectID'      => $request->ProjectID,
            'unitID'      => $request->unitID,
            'contractorID'      => $request->contractorID

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
    public function show(BaselineBoq $unit, $id)
    {
        //
        $data = BaselineBoq::where('id', $id)->get();
        return response($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function edit(BaselineBoq $unit)
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
        BaselineBoq::where ('id',$id)->update($request->all());
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
        BaselineBoq::where('id',$id)->delete();
        return response()->json(['status' => 'success'], 200);
    }
}
