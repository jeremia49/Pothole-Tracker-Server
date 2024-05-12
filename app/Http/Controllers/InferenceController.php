<?php

namespace App\Http\Controllers;

use App\Models\InferenceModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InferenceController extends Controller
{
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

        $requests = $request->all();

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

    //         $png_url = "product-".time().".png";
    // $path = public_path().'img/designs/' . $png_url;

    // Image::make(file_get_contents($data->base64_image))->save($path); 

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
    public function show(InferenceModel $inferenceModel)
    {
        $inferences = InferenceModel::paginate(1000);
        return [
            "status"=>"Berhasil",
            "data"=>$inferences,
        ];
    }

    public function showAll(InferenceModel $inferenceModel)
    {
        $inferences = InferenceModel::all();
        return [
            "status"=>"Berhasil",
            "data"=>$inferences,
        ];
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
