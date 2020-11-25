<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts;
use Session;
use Validator;

class ContractsController extends Controller
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
       $contracts = Contracts::orderBy("id","desc")->paginate($this->pagination_num);
       return view('dashboard.contracts.index',compact('contracts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }
    public function add($request_id)
    {
       $contract_exist = Contracts::where("request_id",$request_id)->get();
       if(count($contract_exist) > 0)
       {
            return redirect('/dashboard/requests')->with("message",trans('site.already_added_contract'));
       }
       return view('dashboard.contracts.create',compact('request_id'));
    }
    public function sendCustomerToSign($id)
    {
       $contract = Contracts::findOrFail($id);
       $contract->send_to_customer = 1;
       $contract->save();
       return redirect('dashboard/customercontracts')->with("message",trans('site.send_to_customer_to_sign'));
    }





    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validation_arr = [
             'contract_name' => 'required|max:255',
             'contract_begin_date'=>'required|date',
             'contract_end_date'=>'required|date',
             'contract_request'=>'required',
      ];
      if(!empty($request->contract_type) && $request->contract_type == "ready")
      {
          $validation_arr["contract_pdf"]  = "required|mimes:pdf|max:10000";
      }
    /*  else if(!empty($request->contract_type) && $request->contract_type == "manually")
      {
          $validation_arr["contract_content"]  = "required";
      }
      */
      $this->validate($request, $validation_arr);



      $contract = new Contracts();
      $contract->title = $request->contract_name;
      $contract->contract_type = "ready";
      $contract->begin_date = $request->contract_begin_date;
      $contract->end_date = $request->contract_end_date;
      $contract->request_id = $request->contract_request;
      if($contract->contract_type == "ready")
      {
        if($request->contract_pdf != null)
         {
            $pdfName = time().'.'.$request->contract_pdf->getClientOriginalExtension();
            $request->contract_pdf->move(public_path('pdf'), $pdfName);
            $contract->contract_pdf_name = $pdfName;
         }
      }
      else if($request->contract_type == "manually")
      {
        $contract->content = $request->contract_content;
        $contract->contract_signiture =  $request->sign_one;
        $contract->contract_signiture_two =  $request->sign_two;
      }

      $contract->save();
      return redirect('/dashboard/customercontracts')->with("message",trans('site.add_sucessfully'));
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
      $contract = Contracts::findOrFail($id);
      return view('dashboard.contracts.update',compact('contract'));
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
      $contract = Contracts::findOrFail($id);
      $validation_arr = [
             'contract_name' => 'required|max:255',
             'contract_begin_date'=>'required|date',
             'contract_end_date'=>'required|date',
             'contract_request'=>'required',
      ];

      if(!empty($request->contract_type) && $request->contract_type == "ready")
      {
          if(empty($contract->contract_pdf_name))
          {
            $validation_arr["contract_pdf"]  = "required|mimes:pdf|max:10000";
          }
          else
          {
            $validation_arr["contract_pdf"]  = "mimes:pdf|max:10000";
          }

      }
    /*  else if(!empty($request->contract_type) && $request->contract_type == "manually")
      {
          $validation_arr["contract_content"]  = "required";
      }
      */
      $this->validate($request, $validation_arr);

      $contract->title = $request->contract_name;
      $contract->contract_type = "ready";
      $contract->begin_date = $request->contract_begin_date;
      $contract->end_date = $request->contract_end_date;
      $contract->request_id = $request->contract_request;
      if( $contract->contract_type == "ready")
      {
        $pdfName = $contract->contract_pdf_name;
        if($request->contract_pdf != null)
         {
            $pdfName = time().'.'.$request->contract_pdf->getClientOriginalExtension();
            $request->contract_pdf->move(public_path('pdf'), $pdfName);

         }
         $contract->contract_pdf_name = $pdfName;
      }
      else if($request->contract_type == "manually")
      {
        $contract->content = $request->contract_content;
        $contract->contract_signiture =  $request->sign_one;
        $contract->contract_signiture_two =  $request->sign_two;
      }

      $contract->save();
      return redirect('/dashboard/customercontracts')->with("message",trans('site.update_sucessfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $contract = Contracts::findOrFail($id);
      if(!empty($contract->contract_pdf_name))
      {
        unlink(public_path('pdf')."/".$contract->contract_pdf_name);
      }
      $contract->delete();
      Session::put('message', trans('site.delete_sucessfully'));
      return json_encode(array("sucess"=>true));
    }
}
