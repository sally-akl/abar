<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Visits;
use Session;
use Validator;

class VisitsController extends Controller
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
      $validator = Validator::make($request->all(), [
             'visit_date' => 'required|date',
             'visit_time' => 'required',
      ]);
      if ($validator->fails())
        return json_encode(array("sucess"=>false ,"errors"=> $validator->errors()));
      $visits = new Visits();
      $visits->visit_date = $request->visit_date;
      $visits->visit_time = $request->visit_time;
      $visits->visit_time_type = $request->time_type;
      $visits->request_id  = $request->request_val;
      $visits->visite_admin_status = 2;
      $visits->save();
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
        $visits = Visits::findOrFail($id);
        return $visits;
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
             'visit_date' => 'required|date',
             'visit_time' => 'required',
      ]);
      if ($validator->fails())
        return json_encode(array("sucess"=>false ,"errors"=> $validator->errors()));
      $visits = Visits::findOrFail($id);
      $visits->visit_date = $request->visit_date;
      $visits->visit_time = $request->visit_time;
      $visits->visit_time_type = $request->time_type;
      $visits->save();
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
      $visits = Visits::findOrFail($id);
      $visits->delete();
      Session::put('message', trans('site.delete_sucessfully'));
      return json_encode(array("sucess"=>true));
    }
    public function acceptVisit($id)
    {
      $visits = Visits::findOrFail($id);
      $visits->visite_admin_status = 1;
      $visits->save();
      Session::put('message', trans('site.update_sucessfully'));
      return json_encode(array("sucess"=>true));
    }
    public function rejectVisit(Request $request , $id)
    {
      $validator = Validator::make($request->all(), [
             'reason' => 'required',
      ]);
      if ($validator->fails())
        return json_encode(array("sucess"=>false ,"errors"=> $validator->errors()));
      $visits = Visits::findOrFail($id);
      $visits->visite_admin_status = 0;
      $visits->reason = $request->reason;
      $visits->save();
      return json_encode(array("sucess"=>true,"sucess_text"=>trans('site.update_sucessfully')));
    }
}
