<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RequestsMedia;
use Session;
use Validator;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $pagination_num = 10;
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validation_arr = [
        "media_title"=>"required",
      ];
      if($request->media_type == "image")
      {
        $validation_arr["media_img"] = ['required','image','mimes:jpeg,png,jpg','max:5000'];
      }
      if($request->media_type == "vedio")
      {
        $validation_arr["youtube_link"] = "required";
      }

      $validator = Validator::make($request->all(), $validation_arr);
      if ($validator->fails())
        return json_encode(array("sucess"=>false ,"errors"=> $validator->errors()));
      $request_media = new RequestsMedia();
      $request_media->title = $request->media_title;
      $request_media->media_type = $request->media_type;
      $request_media->request_id = $request->request_val;
      if($request->media_type == "image")
      {
        if($request->media_img != null)
        {
          $photo = $request->media_img;
          $photo_name = md5(rand(1,1000).time()).'.'.$photo->getClientOriginalExtension();
          $photo->move(public_path('/img/media/'), $photo_name);
          $request_media->image = "/img/media/".$photo_name;
        }
      }
      if($request->media_type == "vedio")
       $request_media->vedio = $request->youtube_link;

      $request_media->save();
      return json_encode(array("sucess"=>true,"sucess_text"=>trans('site.add_sucessfully')));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $media = RequestsMedia::findOrFail($id);
      $media->delete();
      Session::put('message', trans('site.delete_sucessfully'));
      return json_encode(array("sucess"=>true));
    }
}
