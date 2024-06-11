<?php

namespace App\Http\Controllers;

use App\Models\InferenceModel;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{
    public function switchstatus(Int $id){
        $inference = InferenceModel::where('id','=', $id)->first();
        if($inference === "normal"){
            $inference['status'] = "berlubang";
        }else{
            $inference['status'] = "normal";
        }
        $inference->save();
        return redirect()->back();
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'=>'required|email',
            'password'=>'required'
        ]);
 
        $validated = $validator->validated();
        
        if(Auth::attempt([
            'email'=>$validated['email'],
            'password'=>$validated['password'],
            'isAdmin'=>1,
        ])) {
            $request->session()->regenerate();
            return redirect()->route('settinginference');
        } 
        
        return back()->withErrors([
            'email' => 'Email / Password salah/tidak ditemukan',
        ]);
    }

    public function settinginference(){
        $inferences = DB::table('inference')
                    ->join('users', 'inference.userid', '=', 'users.id')
                    ->select(DB::raw("`inference`.*, `users`.`name` AS `username`"))
                    ->get();
        return view('inference',[
            'inferences'=>$inferences
        ]);
    }

    public function verifypothole(){
        $inferences = DB::table('inference')
                    ->join('users', 'inference.userid', '=', 'users.id')
                    ->select(DB::raw("`inference`.*, `users`.`name` AS `username`"))
                    ->where("inference.isVerified","=",0)
                    ->where("inference.isRejected","=",0)
                    ->where("inference.status","=","berlubang")
                    ->get();
        return view('verify',[
            'inferences'=>$inferences
        ]);
    }

    public function setPotholeVerified(Int $id){
        $inference = InferenceModel::where('id','=', $id)->first();
        $inference['isVerified'] = true;
        $inference->save();
        return redirect()->back();
    }

    public function setPotholeRejected(Int $id){
        $inference = InferenceModel::where('id','=', $id)->first();
        $inference['isRejected'] = true;
        $inference->save();
        return redirect()->back();
    }

    public function adminmaps(){
        return view('adminmaps');
    }

    public function deleteInference(Int $id){
        $inference = InferenceModel::where('id','=', $id)->first();
        $inference->delete();
        return redirect()->back();  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
