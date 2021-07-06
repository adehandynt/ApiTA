<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;

class UserController extends Controller
{

    public function index()
    {
        //
        return Users::all();
    }

    public function create(Request $request)
    {
        //
        Users::updateOrCreate([
            
            'Userfullname'      => $request->Userfullname,
            'UserLogin'      => $request->UserLogin,
            'UserMail'      => $request->UserMail,
            'UserProfile'      => $request->UserProfile,
            'PrivilegedStatus'      => $request->PrivilegedStatus,
            'password'      => $request->password
            
            ]);

            return response()->json(['status' => 'success'], 200);
    }

    public function store(Request $request)
    {
        //
    }

    public function UserPrivilegedByid(Users $Users, $id)
    {
        $data = Users::where('user.id', $id)-> join('privilegedname', 'privilegedname.id', '=', 'user.UserProfile')
        ->join('userprivileged', 'userprivileged.PrivilegedNameID', '=', 'privilegedname.id')
        ->select('userprivileged.UserPrivileged','privilegedname.PrivilegedName','privilegedname.id')
        ->get();
        return response($data);
    }

    public function show(Users $Users, $id)
    {
        //
        $data = Users::where('user.id', $id)-> join('privilegedname', 'privilegedname.id', '=', 'user.UserProfile')
        ->join('userprivileged', 'userprivileged.PrivilegedNameID', '=', 'privilegedname.id')
        ->select('privilegedname.PrivilegedName', 'user.*')->groupBy('user.UserProfile')
        ->get();
        return response($data);
    }
    public function edit(Users $Users)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
        Users::where ('id',$id)->update($request->all());
        return response()->json(['status' => 'success'], 200);
    }
    public function destroy($id)
    {
        //
        Users::where('id',$id)->delete();
        return response()->json(['status' => 'success'], 200);
    }
}