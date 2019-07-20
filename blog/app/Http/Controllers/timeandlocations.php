<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use App\timeandlocation;
use DB;
use Illuminate\Support\Facades\Hash;

class timeandlocations extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $userId = $request->get('uid');
        $data = DB::table('timeandlocations')->where("userid",$userId)->get();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return timeandlocation::create([
            'userid' => $request->get('userid'),
            'checkIn' =>$request->get('checkIn'),
            'checkOut' =>$request->get('checkOut'),
            'lat1' => $request->get('lat1'),
            'lon1' =>$request->get('lon1'),
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
        $user=DB::table('timeandlocations')->where("userid",$id)
            ->latest('created_at')->first();
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
        //
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
        $user = timeandlocation::find($id);
////        return $user ->update([
//            'name' => $request->get('name'),
//            'lname' =>$request->get('lname'),
//            'phone' =>$request->get('phone'),
//            'email' => $request->get('email'),
//            'password' => Hash::make($request->get('password'))
//        ]);
        $user->userid =$request ->get('userid');
        $user->checkIn =$request ->get('checkIn');
        $user->checkOut =$request ->get('checkOut');
        $user->lat1 =$request ->get('lat1');
        $user->lon1 =$request ->get('lon1');
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
        //
    }
}
