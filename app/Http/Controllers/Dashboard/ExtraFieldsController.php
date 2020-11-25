<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Extrafields;
use Session;
use Validator;

class ExtraFieldsController extends Controller
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
       $extra_fields = Extrafields::orderBy("id","desc")->paginate($this->pagination_num);
       return view('dashboard.extra.index',compact('extra_fields'));
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
      $validator = Validator::make($request->all(), [
             'title' => 'required|max:255',
             'form_title' => 'required|max:255|unique:extra_fields,field_form_name',
             'form_type' => 'required|max:255',
             'form_is_require'=>'required',
             'form_project_cat'=>'required'
      ]);
      if ($validator->fails())
        return json_encode(array("sucess"=>false ,"errors"=> $validator->errors()));
      $extra = new Extrafields();
      $extra->field_label_title = $request->title;
      $extra->field_form_name = $request->form_title;
      $extra->field_form_type = $request->form_type;
      $extra->is_require = $request->form_is_require;
      $extra->project_category = $request->form_project_cat;
      $extra->save();
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
        $extra = Extrafields::findOrFail($id);
        return $extra;
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
      $validator = Validator::make($request->all(), [
             'title' => 'required|max:255',
             'form_title' => 'required|max:255',
             'form_type' => 'required|max:255',
             'form_is_require'=>'required',
             'form_project_cat'=>'required'
      ]);
      if ($validator->fails())
        return json_encode(array("sucess"=>false ,"errors"=> $validator->errors()));
      $extra = Extrafields::findOrFail($id);
      $extra->field_label_title = $request->title;
      $extra->field_form_name = $request->form_title;
      $extra->field_form_type = $request->form_type;
      $extra->is_require = $request->form_is_require;
      $extra->project_category = $request->form_project_cat;
      $extra->save();
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
      $extra = Extrafields::findOrFail($id);
      $extra->delete();
      Session::put('message', trans('site.delete_sucessfully'));
      return json_encode(array("sucess"=>true));
    }
}
