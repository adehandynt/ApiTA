<?php

namespace App\Http\Controllers;

use App\Models\ProjectNumber;
use Illuminate\Http\Request;

class ProjectNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return ProjectNumber:: all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        ProjectNumber::create([

            'ContracNumber'         => $request->ContracNumber,
            'ProjectID'             => $request->ProjectID,
            'BusinessPartnerID'     => $request->BusinessPartnerID,
            'StartDate'             => $request->StartDate,
            'EndDate'               => $request->EndDate,
            'Length'                => $request->Length,
            'TotalAmount'           => $request->TotalAmount,
            'ScopeOfWork'           => $request->ScopeOfWork,
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
     * @param  \App\Models\ProjectNumber  $projectNumber
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectNumber $projectNumber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectNumber  $projectNumber
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectNumber $projectNumber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjectNumber  $projectNumber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectNumber $projectNumber)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectNumber  $projectNumber
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectNumber $projectNumber)
    {
        //
    }
}
