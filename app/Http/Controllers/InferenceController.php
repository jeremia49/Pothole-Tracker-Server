<?php

namespace App\Http\Controllers;

use App\Models\InferenceModel;
use Exception;
use Illuminate\Http\Request;

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
        $requests = $request->all();
        try{

    //         $png_url = "product-".time().".png";
    // $path = public_path().'img/designs/' . $png_url;

    // Image::make(file_get_contents($data->base64_image))->save($path); 

            foreach ($requests as $r) {
                $inference = new InferenceModel();
                $inference->userid=$r['userid'];
                $inference->path_image=$r['path_image'];
                $inference->latitude=$r['latitude'];
                $inference->longitude=$r['longitude'];
                $inference->status=$r['status'];
                $inference->save();
            }
            
            return [
                "status"=>"Berhasil"
            ];

        }catch(Exception $e){
            return [
                "status"=>"Gagal",
                "pesan"=>$e->getMessage()
            ];
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
