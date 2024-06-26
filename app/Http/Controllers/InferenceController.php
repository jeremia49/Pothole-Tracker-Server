<?php

namespace App\Http\Controllers;

use App\Models\InferenceModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class InferenceController extends Controller
{
    // Route::get("/paginateInferences",[InferenceController::class,"paginateInferences"]);
    public function paginateInferences(Request $request){
        $inferences = InferenceModel::where("isVerified",1)->paginate(1000);
        return [
            'status' => 'ok',
            'message' => "Berhasil",
            "reason"=>null,
            "data"=>$inferences,
        ];
    }


    public function getInferencesWithMaxAndMin(Request $request){
        $minid = $request->get("min");
        $maxid = $request->get("max");

        $inferences = DB::table('inference')
        ->join('users', 'inference.userid', '=', 'users.id')
        ->select(DB::raw("`inference`.*, `users`.`name` AS `username`"))
        ->whereBetween("inference.id", [$minid, $maxid])
        ->get();

        return response()->json([
            'status' => 'ok',
            'message' => "Berhasil",
            "reason"=>null,
            "data"=>$inferences,
        ]);

    }


    public function storeImage(Request $request){
        if ($request->hasFile('photo')) {
            try{
                
                $path = $request->file('photo')->storePublicly('user_generated_content', 's3');
                if(!$path){
                    return response()->json([
                        'status' => 'error',
                        'message'=> "Error uploading file",
                        'reason' => null,
                    ],500);
                }
                
                return response()->json([
                    'status' => 'ok',
                    'message'=> "Sukses",
                    'reason' => null,
                    'data'=>Storage::cloud()->url($path)
                ]);

            }catch(Exception $e){
                return response()->json([
                    'status' => 'error',
                    'message'=> "Error uploading file",
                    'reason' => $e->getMessage(),
                ],500);
            }

        }else{
            return response()->json([
                'status' => 'error',
                'message'=> "photo not exist",
                'reason' => null,
            ],400);
        }

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = $request->user();

        $validator = Validator::make($request->all(), [
            '*.latitude'=>'required',
            '*.longitude'=>'required',
            '*.status'=>'required',
            '*.confidence'=>'nullable',
            '*.url'=>'required',
            '*.timestamp'=>'required',
        ]);


        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message'=> "Validation Error!",
                'reason' => $validator->errors()->messages(),
            ],400);
        }

        try{
            foreach ($validator->validated() as $r) {
                $inference = new InferenceModel();
                $inference->userid=$user->id;
                $inference->url=$r['url'];
                $inference->latitude=$r['latitude'];
                $inference->longitude=$r['longitude'];
                $inference->status=$r['status'];
                $inference->timestamp=$r['timestamp'];
                $inference->save();
            }
            
            return response()->json([
                'status' => 'ok',
                'message' => "Berhasil",
                "reason"=>null,
            ]);

        }catch(Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                "reason"=>null,
            ]);
        }
       
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $inferences = InferenceModel::paginate(1000);
        return [
            "status"=>"Berhasil",
            "data"=>$inferences,
        ];
    }

    public function showAll()
    {
        $inferences = DB::table('inference')
        ->join('users', 'inference.userid', '=', 'users.id')
        ->select(DB::raw("`inference`.*, `users`.`name` AS `username`"))
        ->get();

        return response()->json([
            'status' => 'ok',
            'message' => "Berhasil",
            "reason"=>null,
            "data"=>$inferences,
        ]);
    }

    public function getAllPotholes()
    {
        $inferences = DB::table('inference')
        ->join('users', 'inference.userid', '=', 'users.id')
        ->select(DB::raw("`inference`.*, `users`.`name` AS `username`"))
        ->where("status","=","berlubang")
        ->get();

        return response()->json([
            'status' => 'ok',
            'message' => "Berhasil",
            "reason"=>null,
            "data"=>$inferences,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InferenceModel $inferenceModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InferenceModel $inferenceModel)
    {
        //
    }
}
