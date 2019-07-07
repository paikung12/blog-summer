<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return response()->json($user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return User::create([
            'name' => $request->get('name'),
            'lname' =>$request->get('lname'),
            'phone' =>$request->get('phone'),
            'email' => $request->get('email'),
            'role' =>$request->get('role'),
            'password' => Hash::make($request->get('password'))

        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user=User:: find($id);
        return response() ->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User:: find($id);
        return view('edit',compact('id'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
             $user = User::find($id);
////        return $user ->update([
//            'name' => $request->get('name'),
//            'lname' =>$request->get('lname'),
//            'phone' =>$request->get('phone'),
//            'email' => $request->get('email'),
//            'password' => Hash::make($request->get('password'))
//        ]);
           $user->name =$request ->get('name');
           $user->lname =$request ->get('lname');
           $user->phone =$request ->get('phone');
//           $user->email =$request ->get('email');
           $user->password = Hash::make($request->get('password'));
            $user -> save();
            return response() -> json($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user ->delete();
        return response()->json($user);
    }
}
