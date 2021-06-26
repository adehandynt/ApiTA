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

         //response()->json(['error' => 'invalid'], 401);
         return response()->json(['status' => 'success'], 200);
         //return response()->setStatusCode()->json;

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
    public function show(Project $project, $id)
    {
        //
        $data = Project::where('ProjectID', $id)->get();
        return response($data);
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
        Project::where ('ProjectID',$id)->update($request->all());
        return response()->json(['status' => 'success'], 200);

        
    }

    public function updateSetDefault(Request $request, $id)
    {
        //
        Project::where ('setDefault','1')->update(array('setDefault'=>'0'));
        Project::where ('ProjectID',$id)->update(array('setDefault'=>'1'));
        return response()->json(['status' => 'success'], 200);

        
    }

    public function GetProjectsetDefault(Request $request)
    {
        //
        $data = Project::where('SetDefault','1')
        ->select('ProjectID')
        ->get();
        return response($data);

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Project::where('ProjectID',$id)->delete();
        response()->json(['status' => 'success'], 200);
        
    }
}
