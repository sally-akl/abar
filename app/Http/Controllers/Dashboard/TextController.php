<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Text;
use Session;
use Validator;

class TextController extends Controller
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
       $texts = Text::orderBy("id","desc")->paginate($this->pagination_num);
       return view('dashboard.texts.index',compact('texts'));
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
             'content'=>'required',
             'border_color'=>'required',
             'text_size'=>'required',
             'text_color'=>'required',
             'background_color'=>'required',
      ];

      $validator = Validator::make($request->all(),$validator_arr);
      if ($validator->fails())
        return json_encode(array("sucess"=>false ,"errors"=> $validator->errors()));


      $text = new Text();
      $text->title = $request->title;
      $text->link = $request->link;
      $text->content = $request->content;
      $text->border_color = $request->border_color;
      $text->text_size = $request->text_size;
      $text->text_color = $request->text_color;
      $text->background_color = $request->background_color;
      $text->is_enable = $request->enable;
      //$text->user_id  = Auth::user()->id;
      $text->save();
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
        $text = Text::findOrFail($id);
        return $text;
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
             'content'=>'required',
             'border_color'=>'required',
             'text_size'=>'required',
             'text_color'=>'required',
             'background_color'=>'required',
      ];
      $validator = Validator::make($request->all(),$validator_arr);
      if ($validator->fails())
        return json_encode(array("sucess"=>false ,"errors"=> $validator->errors()));

      $text = Text::findOrFail($id);
      $text->title = $request->title;
      $text->link = $request->link;
      $text->content = $request->content;
      $text->border_color = $request->border_color;
      $text->text_size = $request->text_size;
      $text->text_color = $request->text_color;
      $text->background_color = $request->background_color;
      $text->is_enable = $request->enable;
      $text->save();
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
      $text = Text::findOrFail($id);
      $text->delete();
      Session::put('message', trans('site.delete_sucessfully'));
      return json_encode(array("sucess"=>true));
    }
}
