<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Banner;
use Session;
use Validator;

class BannerController extends Controller
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
       $banners = Banner::orderBy("id","desc")->paginate($this->pagination_num);
       return view('dashboard.banners.index',compact('banners'));
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
      $validator_arr =  [
             'title' => 'required',
             'photo'=> ['required','image','mimes:jpeg,png,jpg','max:5000'],
             'link'=>'required|url',
             'size'=>'required',
      ];

      $validator = Validator::make($request->all(),$validator_arr);
      if ($validator->fails())
        return json_encode(array("sucess"=>false ,"errors"=> $validator->errors()));

      $photo = $request->photo;
      $photo_name = md5(rand(1,1000).time()).'.'.$photo->getClientOriginalExtension();
      $photo->move(public_path('/img/banner/'), $photo_name);
      $photo_name  = "/img/banner/".$photo_name;

      $banner = new Banner();
      $banner->title = $request->title;
      $banner->link = $request->link;
      $banner->banner_img = $photo_name;
      $banner->banner_size = $request->size;
      $banner->is_enable = $request->enable;
    //  $banner->user_id  = Auth::user()->id;
      $banner->save();
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
        $banner = Banner::findOrFail($id);
        return $banner;
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
      $validator_arr =  [
             'title' => 'required',
             'link'=>'required|url',
             'size'=>'required',
      ];
      $validator = Validator::make($request->all(),$validator_arr);
      if ($validator->fails())
        return json_encode(array("sucess"=>false ,"errors"=> $validator->errors()));

      $banner = Banner::findOrFail($id);
      $photo_name = $banner->banner_img;
      if($request->photo != null)
      {
        $photo = $request->photo;
        $photo_name = md5(rand(1,1000).time()).'.'.$photo->getClientOriginalExtension();
        $photo->move(public_path('/img/banner/'), $photo_name);
        $photo_name = "/img/banner/".$photo_name;
      }
      $banner->title = $request->title;
      $banner->link = $request->link;
      $banner->banner_size = $request->size;
      $banner->is_enable = $request->enable;
      $banner->save();
      return json_encode(array("sucess"=>true,"sucess_text"=>trans('site.update_sucessfully')));
    }
    public function uploadImage(Request $request, $id)
   {
      $banner = Banner::findOrFail($id);
      $validator = Validator::make($request->all(), [
         'photo'=> ['image','mimes:jpeg,png,jpg','max:5000'],
      ]);
      if ($validator->fails())
        return json_encode(array("sucess"=>false ,"errors"=> $validator->errors()));
      $photo_name = $banner->banner_img;
      if($request->photo != null)
      {
        $photo = $request->photo;
        $photo_name = md5(rand(1,1000).time()).'.'.$photo->getClientOriginalExtension();
        $photo->move(public_path('/img/banner/'), $photo_name);
        $photo_name = "/img/banner/".$photo_name;
      }
      $banner->banner_img = $photo_name;
      $banner->save();
      return json_encode(array("sucess"=>true,"sucess_text"=>trans('site.update_sucessfully')));
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $banner = Banner::findOrFail($id);
      $banner->delete();
      Session::put('message', trans('site.delete_sucessfully'));
      return json_encode(array("sucess"=>true));
    }




}
