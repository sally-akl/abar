<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\blog;
use Session;
use Validator;

class BlogController extends Controller
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
       $blogs = blog::orderBy("id","desc")->paginate($this->pagination_num);
       return view('dashboard.blogs.index',compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      return view('dashboard.blogs.create');
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
             'blog_title' => 'required',
             'blog_img'=> ['image','mimes:jpeg,png,jpg','max:5000'],
             'category_name' => 'required',
             'publish_date' => 'required|date',
             'is_active' => 'required',
             'blog_desc' => 'required',
      ]);
      if ($validator->fails())
        return json_encode(array("sucess"=>false ,"errors"=> $validator->errors()));

      $photo = $request->blog_img;
      $photo_name = md5(rand(1,1000).time()).'.'.$photo->getClientOriginalExtension();
      $photo->move(public_path('/img/project/'), $photo_name);

      $blog = new blog();
      $blog->blog_title = $request->blog_title;
      $blog->blog_img = "/img/project/".$photo_name;
      $blog->category_name = $request->category_name;
      $blog->publish_date = $request->publish_date;
      $blog->is_active = $request->is_active;
      $blog->blog_desc = $request->blog_desc;
      $blog->save();
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
        $blog = blog::findOrFail($id);
        return view('dashboard.blogs.update',compact('blog'));
    }

    public function comments($id)
    {
      $blog = blog::findOrFail($id);
      return view('dashboard.blogs.comments',compact('blog','id'));
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
          'blog_title' => 'required',
          'blog_img'=> ['image','mimes:jpeg,png,jpg','max:5000'],
          'category_name' => 'required',
          'publish_date' => 'required|date',
          'is_active' => 'required',
          'blog_desc' => 'required',
      ]);
      if ($validator->fails())
        return json_encode(array("sucess"=>false ,"errors"=> $validator->errors()));
      $blog = blog::findOrFail($id);
      $blog->blog_title = $request->blog_title;
      if($request->blog_img != null)
      {
        $photo = $request->blog_img;
        $photo_name = md5(rand(1,1000).time()).'.'.$photo->getClientOriginalExtension();
        $photo->move(public_path('/img/project/'), $photo_name);
        $blog->blog_img = "/img/project/".$photo_name;
      }
      $blog->category_name = $request->category_name;
      $blog->publish_date = $request->publish_date;
      $blog->is_active = $request->is_active;
      $blog->blog_desc = $request->blog_desc;
      $blog->save();
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
      $blog = blog::findOrFail($id);
      $blog->delete();
      Session::put('message', trans('site.delete_sucessfully'));
      return json_encode(array("sucess"=>true));
    }
    public function delete_comments($id)
    {
      $comment = \App\Comments::findOrFail($id);
      $comment->delete();
      Session::put('message', trans('site.delete_sucessfully'));
      return json_encode(array("sucess"=>true));
    }
    public function update_comment(Request $request , $id)
    {
      $comment = \App\Comments::findOrFail($id);
      $comment->is_published = $request->comment_status;
      $comment->save();
      return redirect('dashboard/blogs/comments/'.$request->id)->with("message","تم تعديل حالة التعليق");
    }
}
