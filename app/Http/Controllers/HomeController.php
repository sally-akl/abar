<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Session;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
      if(isset($request->code))
      {
        $market_code = $request->code;
        Session::put('market_code', $market_code);
      }
      return view('home');
    }
    public function aboutus($text , Request $request)
    {
      if(isset($request->code))
      {
        $market_code = $request->code;
        Session::put('market_code', $market_code);
      }
      return view('aboutus');
    }
    public function profolio($text , Request $request)
    {
      if(isset($request->code))
      {
        $market_code = $request->code;
        Session::put('market_code', $market_code);
      }
      return view('profolio');
    }
    public function blog($text , Request $request)
    {
      if(isset($request->code))
      {
        $market_code = $request->code;
        Session::put('market_code', $market_code);
      }
      $articles = \App\blog::where("publish_date","<=",date("Y-m-d"))->where("is_active",1)->orderby("id","desc")->paginate(9);
      return view('blog',compact('articles'));
    }
    public function blog_details($id,$text,Request $request)
    {
      $market_code = "";
      if(isset($request->code))
      {
        $market_code = $request->code;
        Session::put('market_code', $market_code);
      }

      if(isset($request->search))
      {
        $query = \App\blog::where("publish_date","<=",date("Y-m-d"))->where("is_active",1);
        if(isset($request->title))
          $query = $query->where('blog_title', 'LIKE', '%'.$request->title.'%');

        $articles = $query->orderby("id","desc")->paginate(9);
        return view('blog',compact('articles'));
      }
      else{
        $blog = \App\blog::find($id);
        return view('blog_details',compact('blog','market_code'));
      }
    }

    public function add_blog_comment(Request $request)
    {
      $messages = [
          'comment_name.required' => 'لابد من ادخال الاسم ',
          'comment_text.required' => 'لابد من ادخال نص التعليق',
          'comment_name.max' => 'لا يزيد عدد الحروف عن 100 حرف ',
          'comment_text.max' => 'لا يزيد عدد الحروف عن 250 حرف',
      ];
      $validator = Validator::make($request->all(), [
             'comment_name' => 'required|max:100',
             'comment_text' => 'required|max:250',
      ],$messages);
      if ($validator->fails())
        return json_encode(array("sucess"=>false ,"errors"=> $validator->errors()));
      $comment = new \App\Comments();
      $comment->name = $request->comment_name;
      $comment->email = $request->comment_email;
      $comment->comment_text = $request->comment_text;
      $comment->is_published = 0;
      $comment->blog_id = $request->which_blog;
      $comment->save();
      return json_encode(array("sucess"=>true,"sucess_text"=>'تم اضافة تعليقك بنجاح'));
    }

    public function store(Request $request)
    {
      if(isset($request->code))
      {
        $market_code = $request->code;
        Session::put('market_code', $market_code);
      }
      return view('store');
    }

    public function store_by_category($type,Request $request)
    {
      if(isset($request->code))
      {
        $market_code = $request->code;
        Session::put('market_code', $market_code);
      }
      return view('store_by_category',compact('type'));
    }
    public function project_details($id,$title,Request $request)
    {
      if(isset($request->code))
      {
        $market_code = $request->code;
        Session::put('market_code', $market_code);
      }
      $project = \App\Project::find($id);
      return view('project_details',compact('project'));
    }
    public function request_project($type , $id)
    {
      return view('request_project_form',compact('type','id'));
    }
}
