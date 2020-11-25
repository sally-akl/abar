<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CustomerRequests;
use Session;
use Validator;

class RequestsController extends Controller
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
    public function index(Request $request)
    {
       if(isset($request->search))
       {
          $query = CustomerRequests::orderBy("id","desc");
          if(!empty($request->customer))
           $query = $query->where('user_id',$request->customer);
          if(!empty($request->project))
           $query = $query->where('project_id',$request->project);
          if(!empty($request->re_date))
           $query = $query->where('request_date',$request->re_date);
          if(!empty($request->status_search))
           $query = $query->where('request_status',$request->status_search);
          $customer_requests = $query->paginate($this->pagination_num);
       }
       else
        $customer_requests = CustomerRequests::orderBy("id","desc")->paginate($this->pagination_num);
       return view('dashboard.requests.index',compact('customer_requests'));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $crequest = CustomerRequests::findOrFail($id);
      return view('dashboard.requests.show',compact('crequest'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $requests = CustomerRequests::findOrFail($id);
       return $requests;
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
      $vald_arr = [];
      if($request->type_update == "status")
        $vald_arr["request_status"] = 'required';
      else if($request->type_update == "project_status")
        $vald_arr["project_status"] = 'required';


      $validator = Validator::make($request->all(),$vald_arr);
      if ($validator->fails())
        return json_encode(array("sucess"=>false ,"errors"=> $validator->errors()));
      $customer_request = CustomerRequests::findOrFail($id);
      if($request->type_update == "status")
         $customer_request->request_status = $request->request_status;
      else if($request->type_update == "project_status")
         $customer_request->project_status = $request->project_status;
      else if($request->type_update == "latlng")
          $customer_request->location = $request->latlng;

      $customer_request->save();
      if($request->type_update == "status")
         return json_encode(array("sucess"=>true,"sucess_text"=>trans('site.update_sucessfully')));
      else if($request->type_update == "project_status")
       return redirect('/dashboard/requests')->with("message",trans('site.update_sucessfully'));
      else
       return redirect('/dashboard/requests/'.$id)->with("message",trans('site.update_sucessfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $requests = CustomerRequests::findOrFail($id);
      $requests->delete();
      Session::put('message', trans('site.delete_sucessfully'));
      return json_encode(array("sucess"=>true));
    }

    public function updateCustomerRequest($id)
    {
       $requests = CustomerRequests::findOrFail($id);
       $requests->location_request = 1;
       $requests->save();
       return json_encode(array("sucess"=>true));
    }
}
