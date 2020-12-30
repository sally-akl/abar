<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Vedio;
use Session;
use Validator;

class VedioController extends Controller
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
       $vedios = Vedio::orderBy("id","desc")->paginate($this->pagination_num);
       return view('dashboard.vedios.index',compact('vedios'));
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
             'link'=>'required|url',
             'vedio_link'=>'required|url',
             'width'=>'required',
             'height'=>'required',
             'button_txt'=>'required',
      ];

      $validator = Validator::make($request->all(),$validator_arr);
      if ($validator->fails())
        return json_encode(array("sucess"=>false ,"errors"=> $validator->errors()));


      $vedio = new Vedio();
      $vedio->title = $request->title;
      $vedio->link = $request->link;
      $vedio->vedio_link = $request->vedio_link;
      $vedio->is_enable = $request->enable;
      $vedio->width = $request->width;
      $vedio->height = $request->height;
      $vedio->button_txt = $request->button_txt;
      //$vedio->user_id  = Auth::user()->id;
      $vedio->save();
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
        $vedio = Vedio::findOrFail($id);
        return $vedio;
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
             'vedio_link'=>'required|url',
             'width'=>'required',
             'height'=>'required',
             'button_txt'=>'required',
      ];
      $validator = Validator::make($request->all(),$validator_arr);
      if ($validator->fails())
        return json_encode(array("sucess"=>false ,"errors"=> $validator->errors()));

      $vedio = Vedio::findOrFail($id);
      $vedio->title = $request->title;
      $vedio->link = $request->link;
      $vedio->vedio_link = $request->vedio_link;
      $vedio->is_enable = $request->enable;
      $vedio->width = $request->width;
      $vedio->height = $request->height;
      $vedio->button_txt = $request->button_txt;
      $vedio->save();
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
      $vedio = Vedio::findOrFail($id);
      $vedio->delete();
      Session::put('message', trans('site.delete_sucessfully'));
      return json_encode(array("sucess"=>true));
    }
}
