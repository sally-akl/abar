<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Project;
use App\ProjectPrices;
use App\Specialize;
use App\CustomerRequests;
use Session;
use Validator;

class ProjectController extends Controller
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
       $projects = Project::orderBy("id","desc")->paginate($this->pagination_num);
       return view('dashboard.project.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('dashboard.project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validator_arr =  [
             'proj_name' => 'required',
             'proj_photo'=> ['image','mimes:jpeg,png,jpg','max:5000'],
             'proj_status'=>'required',
             'proj_av_for_request'=>'required',
             'from'=>'required',
             'to'=>'required',
             'period_type'=>'required',
             'proj_exist_in_store'=>'required',
             'proj_country'=>'required',
             'project_category'=>'required',
      ];
      if($request->project_category == trans('site.abar'))
      {
         $validator_arr["proj_deep"] = "required";
         $validator_arr["proj_price"] = "required";
         $validator_arr["characters1"] = "required";
      }
      else if($request->project_category == trans('site.schools'))
      {
         $validator_arr["proj_price"] = "required";
         $validator_arr["characters1"] = "required";
      }
      else
      {
         $validator_arr["pro_details"] = "required";
         $validator_arr["msgd_characters1"] = "required";
         $validator_arr["msgd_prayer_num1"] = "required";
         $validator_arr["ceil_num1"] = "required";
         $validator_arr["area_num1"] = "required";
         $validator_arr["price_num1"] = "required";
      }

      $validator = Validator::make($request->all(),$validator_arr);
      if ($validator->fails())
        return json_encode(array("sucess"=>false ,"errors"=> $validator->errors()));

      $photo = $request->proj_photo;
      $photo_name = md5(rand(1,1000).time()).'.'.$photo->getClientOriginalExtension();
      $photo->move(public_path('/img/project/'), $photo_name);

      $project = new Project();
      $project->project_num  = $this->getCode(10);
      $project->project_name = $request->proj_name;
      $project->project_status = $request->proj_status;
      $project->project_photo = "/img/project/".$photo_name;
      $project->is_require_for_request = $request->proj_av_for_request;
      $project->from = $request->from;
      $project->to = $request->to;
      $project->period_type = $request->period_type;
      $project->add_to_store = $request->proj_exist_in_store;
      $project->category_id  = $request->proj_country;
      $project->project_category  = $request->project_category;
      if($request->project_category == trans('site.abar'))
      {
        $project->deep  = $request->proj_deep;
        $project->first_price  = $request->proj_price;
      }
      else if($request->project_category == trans('site.schools'))
      {
        $project->first_price  = $request->proj_price;
      }
      else
      {
        $project->details  = $request->pro_details;
      }
      $project->save();
      if($request->project_category == trans('site.abar') || $request->project_category == trans('site.schools'))
      {
        for($i=1;$i<=$request->character_num;$i++)
        {
            $n = "characters".$i;
            if(isset($request->$n))
            {
              $sp = new Specialize();
              $sp->title = $request->$n;
              $sp->spec_type = "character";
              $sp->project_id  = $project->id;
              $sp->save();
            }
        }
      }
      else
      {
        for($i=1;$i<=$request->character_num;$i++)
        {

            $d = "msgd_characters".$i;
            $n = "msgd_prayer_num".$i;
            $c = "ceil_num".$i;
            $a = "area_num".$i;
            $p = "price_num".$i;
            if(isset($request->$d) && isset($request->$n) && isset($request->$c) && isset($request->$a) && isset($request->$p))
            {
              $sp = new ProjectPrices();
              $sp->project_details = $request->$d;
              $sp->prayer_num =$request->$n;
              $sp->ceil_type =$request->$c;
              $sp->area =$request->$a;
              $sp->price =$request->$p;
              $sp->project_id= $project->id;
              $sp->save();
            }
        }
      }
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
        $product = Project::findOrFail($id);
        $specializes = Specialize::where("project_id",$product->id)->get();
        $sp_prices = ProjectPrices::where("project_id",$product->id)->get();
        return view('dashboard.project.update',compact('product','specializes','sp_prices'));
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
      $validator_arr =  [
             'proj_name' => 'required',
             'proj_photo'=> ['image','mimes:jpeg,png,jpg','max:5000'],
             'proj_status'=>'required',
             'proj_av_for_request'=>'required',
             'from'=>'required',
             'to'=>'required',
             'period_type'=>'required',
             'proj_exist_in_store'=>'required',
             'proj_country'=>'required',
             'project_category'=>'required',
      ];
      if($request->project_category == trans('site.abar'))
      {
         $validator_arr["proj_deep"] = "required";
         $validator_arr["proj_price"] = "required";
         $validator_arr["characters1"] = "required";
      }
      else if($request->project_category == trans('site.schools'))
      {
         $validator_arr["proj_price"] = "required";
         $validator_arr["characters1"] = "required";
      }
      else
      {
         $validator_arr["pro_details"] = "required";
         $validator_arr["msgd_characters1"] = "required";
         $validator_arr["msgd_prayer_num1"] = "required";
         $validator_arr["ceil_num1"] = "required";
         $validator_arr["area_num1"] = "required";
         $validator_arr["price_num1"] = "required";
      }

      $validator = Validator::make($request->all(),$validator_arr);
      if ($validator->fails())
        return json_encode(array("sucess"=>false ,"errors"=> $validator->errors()));

        $project = Project::findOrFail($id);
        $photo_name = $project->project_photo;
        if($request->proj_photo != null)
        {
            $photo = $request->proj_photo;
            $photo_name = md5(rand(1,1000).time()).'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path('/img/project/'), $photo_name);
            $photo_name = "/img/project/".$photo_name;
        }
        $project->project_num  = $this->getCode(10);
        $project->project_name = $request->proj_name;
        $project->project_status = $request->proj_status;
        $project->project_photo = $photo_name;
        $project->is_require_for_request = $request->proj_av_for_request;
        $project->from = $request->from;
        $project->to = $request->to;
        $project->period_type = $request->period_type;
        $project->add_to_store = $request->proj_exist_in_store;
        $project->category_id  = $request->proj_country;
        $project->project_category  = $request->project_category;
        if($request->project_category == trans('site.abar'))
        {
          $project->deep  = $request->proj_deep;
          $project->first_price  = $request->proj_price;
        }
        else if($request->project_category == trans('site.schools'))
        {
          $project->first_price  = $request->proj_price;
        }
        else
        {
          $project->details  = $request->pro_details;
        }
        $project->save();


        if($request->project_category == trans('site.abar') || $request->project_category == trans('site.schools'))
        {
          $specializes = Specialize::where("project_id",$project->id)->delete();
          for($i=1;$i<=$request->character_num;$i++)
          {

              $n = "characters".$i;
              if(isset($request->$n))
              {
                $sp = new Specialize();
                $sp->title = $request->$n;
                $sp->spec_type = "character";
                $sp->project_id= $project->id;
                $sp->save();
              }

          }
        }
        else
        {
          $sp_prices = ProjectPrices::where("project_id",$project->id)->delete();
          for($i=1;$i<=$request->character_num;$i++)
          {

              $d = "msgd_characters".$i;
              $n = "msgd_prayer_num".$i;
              $c = "ceil_num".$i;
              $a = "area_num".$i;
              $p = "price_num".$i;
              if(isset($request->$d) && isset($request->$n) && isset($request->$c) && isset($request->$a) && isset($request->$p))
              {
                $sp = new ProjectPrices();
                $sp->project_details = $request->$d;
                $sp->prayer_num =$request->$n;
                $sp->ceil_type =$request->$c;
                $sp->area =$request->$a;
                $sp->price =$request->$p;
                $sp->project_id= $project->id;
                $sp->save();
              }

          }
        }
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
      $project = Project::findOrFail($id);
      $project->delete();
      Session::put('message', trans('site.delete_sucessfully'));
      return json_encode(array("sucess"=>true));
    }

    public function projectByStatus($status_id)
    {
      $projects = Project::selectRaw("projects.*,requests.project_status,requests.user_id,requests.id as related_request_id")->join("requests","requests.project_id","projects.id")->where("requests.project_status",$status_id)->orderBy("projects.id","desc")->paginate($this->pagination_num);
      return view('dashboard.project.project_by_status',compact('projects','status_id'));
    }
    public function projectsNotHasContracts()
    {
      $projects = Project::selectRaw("projects.*,requests.project_status,requests.id as related_request_id")->join("requests","requests.project_id","projects.id")->leftjoin("contracts","requests.id","contracts.request_id")->whereRaw("contracts.request_id is NULL")->orderBy("projects.id","desc")->paginate($this->pagination_num);
      return view('dashboard.project.without_contracts',compact('projects'));
    }
    public function customerFavProjects()
    {
      $projects = Project::join("project_user_fav","project_user_fav.project_id","projects.id")->where("project_user_fav.user_id",Auth::id())->orderBy("projects.id","desc")->paginate($this->pagination_num);
      return view('dashboard.customerArea.fav_projects',compact('projects'));
    }
    public function customerprojects()
    {
      $projects = Project::selectRaw("projects.*,requests.project_status,requests.user_id,requests.id as related_request_id")->join("requests","requests.project_id","projects.id")->where("requests.user_id",Auth::id())->orderBy("projects.id","desc")->paginate($this->pagination_num);
      return view('dashboard.customerArea.customer_projects',compact('projects'));
    }
    public function showProjectDetails($id)
    {
        $crequest = CustomerRequests::findOrFail($id);
        return view('dashboard.customerArea.showRequest',compact('crequest'));
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
