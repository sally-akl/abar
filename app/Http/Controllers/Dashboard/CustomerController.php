<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;
use Session;
use Validator;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $pagination_num = 10;
    protected $role_num = 2;
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
       $customers = User::where("role_id",$this->role_num)->orderBy("id","desc")->paginate($this->pagination_num);
       return view('dashboard.customer.index',compact('customers'));
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
          'name' => ['required', 'string', 'max:255'],
          'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
          'password' => ['required', 'string', 'min:8', 'confirmed'],
          'identity_num'=>'required',
          'mobile'=>'required'
      ]);
      if ($validator->fails())
        return json_encode(array("sucess"=>false ,"errors"=> $validator->errors()));
      $user = new User();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = Hash::make($request->password) ;
      $user->role_id = $this->role_num;
      $user->identity_num = $request->identity_num;
      $user->mobile = $request->mobile;
      $user->save();
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
        $user = User::findOrFail($id);
        return $user;
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
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],
        'identity_num'=>'required',
        'mobile'=>'required'
      ]);
      if ($validator->fails())
        return json_encode(array("sucess"=>false ,"errors"=> $validator->errors()));
      $user = User::findOrFail($id);
      $user->name = $request->name;
      $user->email = $request->email;
      $user->role_id = $this->role_num;
      $user->identity_num = $request->identity_num;
      $user->mobile = $request->mobile;
      $user->save();
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
      $user = User::findOrFail($id);
      $user->delete();
      Session::put('message', trans('site.delete_sucessfully'));
      return json_encode(array("sucess"=>true));
    }
    public function profile()
    {
        $user = User::findOrFail(Auth::id());
        return view('dashboard.customerArea.profile',compact('user'));
    }
    public function updateProfile(Request $request , $id)
    {
      $validation_arr = [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],
        'identity_num'=>'required',
        'mobile'=>'required'
      ];
      $this->validate($request, $validation_arr);
      $user = User::findOrFail($id);
      $user->name = $request->name;
      $user->email = $request->email;
      $user->identity_num = $request->identity_num;
      $user->mobile = $request->mobile;
      $user->save();
      return redirect('/dashboard/customers')->with("message",trans('site.update_sucessfully'));
    }
}
