<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Transactions;
use Session;
use Validator;

class ReportController extends Controller
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
          $query = Transactions::join("projects","projects.id","transactions.project_id")->orderBy("id","desc");
          if(!empty($request->from) && !empty($request->to))
          {
            $query = $query->whereRaw("transfer_date between '.$request->from.' and '.$request->to.'");
          }
          $transactions = $query->paginate($this->pagination_num);
       }
       else
       {
         $transactions = Transactions::join("projects","projects.id","transactions.project_id")->orderBy("transactions.id","desc")->paginate($this->pagination_num);
       }
       $abar_num = Transactions::join("projects","projects.id","transactions.project_id")->where("projects.project_category",trans('site.abar'))->count();
       $masged_num = Transactions::join("projects","projects.id","transactions.project_id")->where("projects.project_category",trans('site.masged'))->count();
       $school_num = Transactions::join("projects","projects.id","transactions.project_id")->where("projects.project_category",trans('site.schools'))->count();
       return view('dashboard.reports.index',compact('transactions','abar_num','masged_num','school_num'));
    }
    public function sellProjects(Request $request)
    {
       if(isset($request->search))
       {
          $query = Transactions::join("projects","projects.id","transactions.project_id")->orderBy("id","desc");
          if(!empty($request->from) && !empty($request->to))
          {
            $query = $query->whereRaw("transfer_date between '.$request->from.' and '.$request->to.'");
          }
          if(!empty($request->project_cat))
            $query = $query->where("projects.project_category",$request->project_cat);
          $transactions = $query->paginate($this->pagination_num);
       }
       else
         $transactions = Transactions::join("projects","projects.id","transactions.project_id")->where("is_payable",1)->orderBy("transactions.id","desc")->paginate($this->pagination_num);
       return view('dashboard.reports.sell',compact('transactions'));
    }



}
