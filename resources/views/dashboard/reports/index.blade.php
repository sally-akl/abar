@extends('dashboard.layouts.master')
@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title">@lang('site.sales_report')</h3>
    <div class="search">
         <button type="button" class="btn search_btn"><i class="fa fa-search" aria-hidden="true"></i> {{ __('site.search') }} </button>
    </div>
  </div>
  <div class="card-body border-bottom py-3">
    <div class="row">
      <div class="col-sm-4">
        <div class="card">
          <div class="card-body p-2 text-center">
            <div class="text-right text-green">

            </div>
            <div class="h1 m-0">{{$abar_num}}</div>
            <div class="text-muted mb-4">@lang('site.abar_sales_num')</div>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="card">
          <div class="card-body p-2 text-center">
            <div class="text-right text-green">

            </div>
            <div class="h1 m-0">{{$masged_num}}</div>
            <div class="text-muted mb-4">@lang('site.masged_sales_num')</div>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="card">
          <div class="card-body p-2 text-center">
            <div class="text-right text-green">

            </div>
            <div class="h1 m-0">{{$school_num}}</div>
            <div class="text-muted mb-4">@lang('site.school_sales_num')</div>
          </div>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      @include("dashboard.utility.sucess_message")
      <table class="table card-table table-vcenter text-nowrap datatable">
        <thead>
          <tr>
            <th>
               @lang('site.transaction_num')
            </th>
            <th>
               @lang('site.which_project')
            </th>
            <th>
               @lang('site.transfer_date')
            </th>
            <th>
               @lang('site.is_payable')
            </th>
            <th>
               @lang('site.transfer_payment_type')
            </th>
            <th>
               @lang('site.paymentToken')
            </th>

            <th>
               @lang('site.amount')
            </th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          	@foreach ($transactions as $key => $transaction)
          <tr>
            <td>{{$transaction->transaction_num}}</td>
            <td>{{$transaction->project->project_name}}</td>
            <td>{{$transaction->transfer_date }}</td>
            @if($transaction->is_payable == 0)
              <td><span class="badge bg-red">@lang('site.no')</span>    </td>
            @else
              <td> <span class="badge bg-green"> @lang('site.yes')</span>    </td>
            @endif
            <td>{{$transaction->transfer_payment_type}}</td>
            <td>{{$transaction->paymentToken}}</td>
            <td>{{$transaction->amount}}</td>

          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="card-footer d-flex align-items-center">
      {{$transactions->links('dashboard.vendor.pagination.default')}}
    </div>
  </div>

</div>

<div class="modal modal-blur fade" id="serach_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">@lang('site.search')</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><line x1="18" y1="6" x2="6" y2="18" /><line x1="6" y1="6" x2="18" y2="18" /></svg>
        </button>
      </div>
      <form method="GET" action="{{ url('dashboard/reports') }}" >
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">@lang('site.from')</label>
            <input type="date" class="form-control" name="from">
          </div>
          <div class="mb-3">
            <label class="form-label">@lang('site.to')</label>
            <input type="date" class="form-control" name="to">
          </div>

        </div>
        <input type="hidden" name="search" value="search" />
        <div class="modal-footer">
          <a href="#" class="btn btn-link link-secondary" data-dismiss="modal">
            @lang('site.cancel')
          </a>
          <button type="submit" class="btn btn-primary">{{ __('site.search') }} </button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
@section('footerjscontent')
<script type="text/javascript">
  $(".search_btn").on("click",function(){
      $('#serach_modal').modal('show');
      return false;
  });
</script>
@endsection
