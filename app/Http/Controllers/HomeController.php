<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Mail\contactusEmail;
use Illuminate\Support\Facades\Mail;
use App\CustomerFav;
use Validator;
use Session;
use Auth;
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
    public function store_by_city(Request $request)
    {
      $price = "";
      if(isset($request->code))
      {
        $market_code = $request->code;
        Session::put('market_code', $market_code);
      }
      if(isset($request->search))
      {
        $price = $request->amount;
      }
      return view('store_by_city',compact('price'));
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
    public function add_to_fav(Request $request)
    {
       $project_id = $request->id;
       if(Auth::user())
       {
          $user_id = Auth::user()->id;
          $already_fav = CustomerFav::where("project_id",$project_id)->where("user_id",$user_id)->get();
          if(count($already_fav) == 0)
          {
            if(Auth::user()->role->name=="customer")
            {
              $customer_fav = new CustomerFav();
              $customer_fav->project_id  = $project_id;
              $customer_fav->user_id   = $user_id;
              $customer_fav->save();
            }
            else{
              return json_encode(array("errors"=>array("not_login"=>"العملاء فقط هم الذين يستطيعوا ان يضيفوا الى المفضلة")));
            }

          }
        return  json_encode(array("sucess"=>true,"sucess_text"=>'تم الاضافة الى المفضلة'));
       }
       return json_encode(array("errors"=>array("not_login"=>"لابد من تسجيل الدخول اولا لاضافته الى المفضلة")));
    }

    public function add_customer_request(Request $request)
    {
      $messages = [
          'name.required' => 'قم بادخال الاسم الثلاثى',
          'email.required' => 'قم بادخال البريد الالكترونى',
          'hawaya.required' => 'قم بادخال رقم الهوية',
          'phone.required' => 'قم بادخال رقم الجوال',
          'name_in_board.required' => 'قم بادخال اسمك على اللوحة',
          'agree_to.required' => 'لابد من الموافقة على الشروط والاحكام',
          'email.unique' =>'البريد الالكترونى موجود مسبقا ارجو ادخال بريد الالكترونى اخر',
      ];

      $validator_arr =  [
             'name' => 'required|max:100',
             'hawaya'=>'required',
             'phone'=>'required',
             'name_in_board'=>'required',
             'agree_to'=>'required',
      ];
      if(Auth::user())
      {
        $validator_arr["email"] = 'required|email|unique:users,email,'.Auth::user()->id;
      }
      else{
        $validator_arr["email"] = 'required|email|unique:users';
      }
      $validator = Validator::make($request->all(),$validator_arr,$messages);
      if ($validator->fails())
        return json_encode(array("sucess"=>false ,"errors"=> $validator->errors()));

      $user_id = "";
      if(Auth::user())
      {
        $user_id = Auth::user()->id;
      }
      else{

        $user = new \App\User();
        $user->name = $request->name;
        $user->email = $request->email;
        $password_is = $this->getCode(8);
        $user->password = Hash::make($password_is);
        $user->role_id  = 2;
        $user->identity_num = $request->hawaya;
        $user->mobile = $request->phone;
        $user->save();
        auth()->login($user);
        $user_id = Auth::user()->id;

        // send email with login data in email
        $send_obj = new \stdClass();
        $send_obj->from = \App\Settings::find(1)->email;
        $send_obj->to = $request->email;
        $send_obj->subject = "بيانات دخولك الى لوحة التحكم الخاصة بك";
        $send_obj->email = $request->email;
        $send_obj->password = $password_is;

        dispatch(new \App\Jobs\SendEmailPasswordJob($send_obj));
      }

      $type = $request->project_type;
      if($type == "ابار" || $type == "مراكز ومدارس"){
        $project_id  = $request->project_d;
        $price = \App\Project::find($project_id)->first_price;
      }
      else{
        $extra = \App\ProjectPrices::find($request->project_d);
        $project_id  = $extra->project->id;
        $sub_id  = $request->project_d;
        $price = $extra->price;
      }

      // create request and transaction
      $request_customer = new \App\CustomerRequests();
      $request_customer->user_id  = $user_id;


      if($type == "ابار" || $type == "مراكز ومدارس"){
        $request_customer->project_id  = $project_id;
      }
      else{
        $request_customer->project_id  = $project_id;
        $request_customer->sub_project  = $sub_id;
      }

      $request_customer->how_know_me = $request->how_to_know_us;
      $request_customer->request_date = date("Y-m-d");
      $request_customer->request_num = $user_id."_".$this->getCode(10);
      $request_customer->request_status = "طلب";
      $request_customer->project_status= 3;
      $request_customer->board_name = $request->name_in_board;
      $request_customer->save();

      $transaction = new \App\Transactions();
      $transaction->transaction_num ="#".$this->getCode(10);
      $transaction->project_id   = $project_id;
      $transaction->request_id = $request_customer->id;
      $transaction->transfer_date = date("Y-m-d");
      $transaction->is_payable = 0;
      $transaction->transfer_payment_type = $request->select_payment_method;
      $transaction->amount =$price;
      $bank_values = explode("-",$request->bank_transfer_val);
      $transaction->bank_name = $bank_values[0];
      $transaction->bank_account_number =$bank_values[1];
      $transaction->bank_ibn =$bank_values[2];
      if(Session::get('market_code') != null)
         $transaction->mareter_code = Session::get('market_code');
      $transaction->save();
      return  json_encode(array("sucess"=>true));
    }
    public function done()
    {
      return view('request_done');
    }
    public function contactus()
    {
      return view('contactus');
    }
    public function questions()
    {
      return view('questions');
    }
    public function auth_customer()
    {
      return view('auth_customer');
    }
    public function send_contact_us(Request $request)
    {
      $messages = [
          'name.required' => 'لابد من ادخال الاسم الثلاثى',
          'email.required' => 'لابد من ادخال البريد الالكترونى',
          'message.required' => 'لابد من ادخال محتوى الرسالة',
          'email.email' => 'تم ادخال البريد الالكترونى بطريقة غير صحيحة',
      ];
      $validator = Validator::make($request->all(), [
             'name' => 'required|max:100',
             'email' => 'required|email',
             'message' => 'required',
      ],$messages);
      if ($validator->fails())
        return json_encode(array("sucess"=>false ,"errors"=> $validator->errors()));
      $send_obj = new \stdClass();
      $send_obj->name = $request->name;
      $send_obj->from = $request->email;
      $send_obj->to =\App\Settings::find(1)->email;
      $send_obj->subject = "اتصل بنا";
      $send_obj->message = $request->message;
      Mail::send(new contactusEmail($send_obj));
      return json_encode(array("sucess"=>true,"sucess_text"=>'تم ارسال رسالتك بنجاح'));
    }
    public function sign_in(Request $request)
    {
      $messages = [
          'email.required' => 'لابد من ادخال البريد الالكترونى',
          'password.required' => 'لابد من ادخال الرقم السرى',
      ];
      $validator = Validator::make($request->all(), [
             'password' => 'required',
             'email' => 'required|email',
      ],$messages);
      if ($validator->fails())
        return json_encode(array("sucess"=>false ,"errors"=> $validator->errors()));

      if (\Auth::attempt([
         'email' => $request->email,
         'password' => $request->password])
        ){
          return json_encode(array("sucess"=>true));
        }
       return json_encode(array("errors"=>array("not_login"=>"البريد الالكترونى او الرقم السرى غير صحيح")));

    }
    public function sign_out(Request $request)
    {
      if(\Auth::check())
      {
        \Auth::logout();
        $request->session()->invalidate();
      }
      return  redirect('/');
    }
    public function signup(Request $request)
    {
      $messages = [
          'name.required' => 'لابد من ادخال الاسم الثلاثى',
          'name.string' => 'لابد ان يحتوى الاسم الثلاثى على حروف',
          'name.max'=>'لابد ان يكون عدد حروف الاسم الثلاثى لا تزيد عن 250 حرف',
          'email.required' => 'لابد من ادخال البريد الالكترونى ',
          'email.string' => 'لابد ان يحتوى البريد الالكترونى على حروف',
          'email.max'=>'لابد ان لايزيد البريد الالكترونى عن 250 حرف',
          'password.required'=>'لابد من ادخال الرقم السرى ',
          'password.string'=>'لابد ان يحتوى الرقم السرى على حروف وارقام ',
          'password.min'=>'لابد ان لا يقل طول الرقم السرى عن 8 ارقام او حروف',
          'password.confirmed'=>'لابد ان يكون كل من الرقم السرى وتكرار الرقم السرى متماثلتين',
          'identity.required' => 'لابد من ادخال رقم الهوية',
          'mobile.required' => 'لابد من ادخال رقم الجوال',
          'email.unique'=>'البريد الالكترونى موجود مسبقا',

      ];
      $validator = Validator::make($request->all(), [
          'name' => ['required', 'string', 'max:255'],
          'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
          'password' => ['required', 'string', 'min:8', 'confirmed'],
          'identity' => ['required'],
          'mobile' => ['required'],
      ],$messages);
      if ($validator->fails())
        return json_encode(array("sucess"=>false ,"errors"=> $validator->errors()));

      $user = new \App\User();
      $user->name = $request->name;
      $user->email = $request->email;
      $user->password = Hash::make($request->password);
      $user->role_id = 2;
      $user->identity_num = $request->identity;
      $user->mobile = $request->mobile;
      $user->save();
      auth()->login($user);
      return json_encode(array("sucess"=>true));
    }
    private  function getCode($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;

    }
}
