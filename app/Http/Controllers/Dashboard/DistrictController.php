<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Country;
use App\Governate;
use App\Region;
use App\Districts;
use Session;
use Validator;

class DistrictController extends Controller
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
       $districts = Districts::orderBy("id","desc")->paginate($this->pagination_num);
       $countries = Country::all();
       return view('dashboard.district.index',compact('districts','countries'));
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
             'reg'=>'required',
      ]);
      if ($validator->fails())
        return json_encode(array("sucess"=>false ,"errors"=> $validator->errors()));
      $reg = new Districts();
      $reg->title = $request->title;
      $reg->region_id = $request->reg;
      $reg->save();
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
        $dis = Districts::findOrFail($id);
        return json_encode(array("dis"=>$dis , "governates"=>$this->getGovCommon($dis->region->gov->country->id),"reg"=>$this->getRegCommon($dis->region->gov->id)));
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
        'reg'=>'required',
      ]);
      if ($validator->fails())
        return json_encode(array("sucess"=>false ,"errors"=> $validator->errors()));
      $reg = Districts::findOrFail($id);
      $reg->title = $request->title;
      $reg->region_id = $request->reg;
      $reg->save();
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
      $reg =Districts::findOrFail($id);
      $reg->delete();
      Session::put('message', trans('site.delete_sucessfully'));
      return json_encode(array("sucess"=>true));
    }
    public function getRegUnderGovernate($id)
    {
      return json_encode(array("data"=>$this->getRegCommon($id)));
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
    private function getRegCommon($id)
    {
      $regions = Region::where("gov_id",$id)->get();
      $options = "<option value=''>اختر</option>";
      foreach($regions as $reg)
      {
        $options .= "<option value='".$reg->id."'>".$reg->title."</option>";
      }
      return $options;
    }
}
