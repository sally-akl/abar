<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard.home');
    }
    public function settings(Request $request)
    {
      $settings = \App\Settings::find(1);
      if(isset($request->update))
      {
        $validator = Validator::make($request->all(),[
          'done_projects_num' => ['required'],
          'customer_num'=>['required'],
          'countries_num' => ['required'],
          'befend_num' =>['required'],
          'phone' =>['required'],
          'email' =>'required|email',
          'facebook' =>['required'],
          'youtube' =>['required'],
          'instegrame' =>['required'],
          'twitter' =>['required'],
          'header_text'=>'required'
        ]);
        if ($validator->fails())
          return back()->withInput()->withErrors($validator->errors());
        $settings->done_projects_num = $request->done_projects_num;
        $settings->customer_num = $request->customer_num;
        $settings->countries_num = $request->countries_num;
        $settings->befend_num = $request->befend_num;
        $settings->phone = $request->phone;
        $settings->email = $request->email;
        $settings->facebook = $request->facebook;
        $settings->youtube = $request->youtube;
        $settings->instegrame = $request->instegrame;
        $settings->twitter = $request->twitter;
        $settings->header_text = $request->header_text;
        $settings->save();

        return redirect('dashboard/settings')->with("message","تم الحفظ بنجاح");

      }
      return view('dashboard.settings',compact('settings'));
    }
}
