<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Mail\sendCustomerEmail;
use Illuminate\Support\Facades\Mail;
use App\User;
use App\Project;
use Session;
use Validator;

class MarketerAreaController extends Controller
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
    public function projects()
    {
      $projects = Project::selectRaw("projects.*,requests.project_status,requests.user_id,requests.id as related_request_id")->join("requests","requests.project_id","projects.id")->where("requests.project_status",2)->orderBy("projects.id","desc")->paginate($this->pagination_num);
      return view('dashboard.marketerArea.projects',compact('projects'));
    }
    public function customers()
    {
      $customers = User::where("role_id",2)->orderBy("id","desc")->paginate($this->pagination_num);
      return view('dashboard.marketerArea.customers',compact('customers'));
    }
    public function sendCustomerEmail(Request $request)
    {
      $validator = Validator::make($request->all(), [
          'message' => ['required'],
          'email' => ['required', 'string', 'email', 'max:255'],
          'subject'=>'required'
      ]);
      if ($validator->fails())
        return json_encode(array("sucess"=>false ,"errors"=> $validator->errors()));

      $send_obj = new \stdClass();
      $send_obj->from = $request->email;
      $send_obj->to = User::findOrFail($request->customer_val)->email;
      $send_obj->subject = $request->subject;
      $send_obj->message = $request->message;
      Mail::send(new sendCustomerEmail($send_obj));
    }
}
