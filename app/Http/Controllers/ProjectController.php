<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = Project:: all();
        return Project:: all();
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //

        Project::create([
            
            'ProjectName'       => $request->ProjectName,
            'ProjectOwner'      => $request->ProjectOwner,
            'ProjectDesc'       => $request->ProjectDesc,
            'ProjectManager'    => $request->ProjectManager,
            'ContractAmount'    => $request->ContractAmount,
            'Length'            => $request->Length,
            'CommencementDate'  => $request->CommencementDate,
            'CompletionDate'    => $request->CompletionDate,
            'ProjectDuration'   => $request->ProjectDuration,
            'CurrencyType'      => $request->CurrencyType
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
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
        return response()->json("ini adalah show $project");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        Project::where ('id',$id)->update($request->all());
        return response()->json('data sudah di update');

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Project::where('id',$id)->delete();
        return response()->json('data sudah di hapus');
        
    }
}
