<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Country;
use App\Governate;
use App\Region;
use Session;
use Validator;

class RegionController extends Controller
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
       $regions = Region::orderBy("id","desc")->paginate($this->pagination_num);
       $countries = Country::all();
       return view('dashboard.region.index',compact('regions','countries'));
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
             'title' => 'required',
             'gov'=>'required',
      ]);
      if ($validator->fails())
        return json_encode(array("sucess"=>false ,"errors"=> $validator->errors()));
      $gov = new Region();
      $gov->title = $request->title;
      $gov->gov_id = $request->gov;
      $gov->save();
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
        $reg = Region::findOrFail($id);
        return json_encode(array("reg"=>$reg , "governates"=>$this->getGovCommon($reg->gov->country->id)));
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
        'title' => 'required',
        'gov'=>'required',
      ]);
      if ($validator->fails())
        return json_encode(array("sucess"=>false ,"errors"=> $validator->errors()));
      $gov = Region::findOrFail($id);
      $gov->title = $request->title;
      $gov->gov_id = $request->gov;
      $gov->save();
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
      $reg = Region::findOrFail($id);
      $reg->delete();
      Session::put('message', trans('site.delete_sucessfully'));
      return json_encode(array("sucess"=>true));
    }
    public function getGovsUnderCountry($id)
    {
      return json_encode(array("data"=>$this->getGovCommon($id)));
    }

    private function getGovCommon($id)
    {
      $governates = Governate::where("country_id",$id)->get();
      $options = "<option value=''>اختر</option>";
      foreach($governates as $gov)
      {
        $options .= "<option value='".$gov->id."'>".$gov->title."</option>";
      }
      return $options;
    }
}
