<?php

namespace App\Http\Controllers\Api\V1\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImageRequest;
use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ImageRequest $request)
    {
//            for($i = 1; $i <= 4; $i++) {
//        $image= Image::create([
//                if(isset($request->image[$i])) {
//                    $image->name = $request->image[$i];
//                    $image->product_id = 1;
//                }
//            }
//        ]);
//        $image->image = $request->image;
//        $image->image2 = $request->image2;
//        $image->image3 = $request->image3;
//        $image->product_id = $request->product_id;
//        $image->save();
//        return $image;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $show =Image::findOrFail($id);
        return $show;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ImageRequest $request, $id)
    {
        $image=Image::findOrFail($id);
        $image->name = $request->name;
        $image->product_id = $request->product_id;
        $image->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Image::findOrFail($id)->delete();
        return "Successfully deleted";
    }
}
