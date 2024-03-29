@extends('dashboard.layouts.master')
@section('content')
<!-- Page title -->
<div class="page-header">
  <div class="row align-items-center">
    <div class="col-auto">
      <!-- Page pre-title -->

      <h2 class="page-title">
        لوحة التحكم
      </h2>
    </div>
    <!-- Page title actions -->
    <div class="col-auto ml-auto d-print-none">

    </div>
  </div>
</div>
<div class="row row-deck row-cards">
  <div class="col-sm-6 col-lg-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-center">
          <div class="subheader">مبيعات الشهر</div>
          @php
            $sales_ths_month_sum = \App\Transactions::where("mareter_code",Auth::user()->mareter_code)->where("is_payable",1)->whereraw("month(transfer_date) = ".date("n")." and year(transfer_date)= ".date("Y"))->sum("amount");
            $sales_last_month_sum  = \App\Transactions::where("mareter_code",Auth::user()->mareter_code)->where("is_payable",1)->whereraw("month(transfer_date) = ".date('n', strtotime('-1 month'))." and year(transfer_date)= ".date("Y"))->sum("amount");
            $sales_sum_chart   = [$sales_ths_month_sum , $sales_last_month_sum];
          @endphp

        </div>
        <div class="h1 mb-3">{{$sales_ths_month_sum}}</div>
        <div id="chart-total-sales"></div>
      </div>
    </div>
  </div>


  <div class="col-lg-9">
    <div class="card">
      <div class="card-body">
        <h3 class="card-title">عدد مبيعات الشهر</h3>
        @php  $traner_month_days = \App\Transactions::selectraw("transfer_date")->where("mareter_code",Auth::user()->mareter_code)->where("is_payable",1)->whereraw("month(transfer_date) = ".date("n")." and year(transfer_date)= ".date("Y"))->get();
            $tr_month_days = [];
            foreach($traner_month_days as $month_day)
            {

              $tr_month_days[] = date("Y-m-d",strtotime($month_day->transfer_date)) ;
            }

      @endphp
      @php $query_users_month_count =  \App\Transactions::selectraw("count(id) as user_count , transfer_date")->where("mareter_code",Auth::user()->mareter_code)->where("is_payable",1)->whereraw("month(transfer_date) = ".date("n")." and year(transfer_date)= ".date("Y"))->groupby("transfer_date")->get();
           $trs_month_count = array();
           $trs_months_year  = array();
           foreach($query_users_month_count as $u_count)
           {
              $trs_month_count[] = $u_count->user_count;
              $trs_months_year[] = date("m",strtotime($u_count->transfer_date)) ;
           }

      @endphp
        <div id="chart-tasks-overview" class="chart-lg"></div>
      </div>
    </div>
  </div>
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <h3 class="card-title">عدد مبيعات السنة</h3>

        <div id="chart-year-overview" class="chart-lg"></div>
      </div>
    </div>
  </div>





  <div class="col-md-6 col-lg-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">عملائك </h4>
      </div>
      <div class="table-responsive">
        @php $your_customers = \App\Transactions::selectraw("name")->join("requests","requests.id","transactions.request_id")->join("users","requests.user_id","users.id")->where("transactions.mareter_code",Auth::user()->mareter_code)->get();   @endphp
        <table class="table card-table table-vcenter">
          <thead>
            <tr>
              <th>اسم العميل</th>

            </tr>
          </thead>
          @foreach($your_customers as $customer)
            <tr>
              <td>
                {{$customer->name}}
              </td>
            </tr>
          @endforeach

        </table>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-lg-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">مشاريع العملاء الخاصيين بك </h4>
      </div>
      <div class="table-responsive">
        @php $projects = \App\Project::selectRaw("projects.*,requests.project_status,requests.user_id,requests.id as related_request_id")->join("requests","requests.project_id","projects.id")->join("transactions","requests.id","transactions.request_id")->orderBy("projects.id","desc")->where("transactions.mareter_code",Auth::user()->mareter_code)->take(5)->get();   @endphp
        <table class="table card-table table-vcenter">
          <thead>
            <tr>
              <th>
                 @lang('site.project_num')
              </th>
              <th>
                 @lang('site.proj_name')
              </th>
              <th>
                 @lang('site.project_category')
              </th>
               <th>
                  @lang('site.exist_in_store')
               </th>
               <th>
                  @lang('site.price')
               </th>
               <th>
                  @lang('site.under_country')
               </th>
               <th>
                  @lang('site.project_staus')
               </th>
               <th>
                  @lang('site.which_customer')
               </th>

            </tr>
          </thead>
          @foreach ($projects as $key => $project)
        <tr>
          <td>{{$project->project_num }}</td>
          <td>{{$project->project_name}}</td>
          <td><span class="badge bg-indigo">{{$project->project_category}}</span></td>
          @if($project->add_to_store == 0)
            <td><span class="badge bg-red">@lang('site.no')</span>    </td>
          @else
            <td> <span class="badge bg-green"> @lang('site.yes')</span>    </td>
          @endif
          <td>{{$project->first_price}}</td>
          <td>{{$project->country->title}}</td>
          @if($project->project_status == 1)
            <td>@lang('site.under_work')</td>
          @elseif($project->project_status == 2)
            <td>@lang('site.done_ok')</td>
          @else
            <td></td>
          @endif
          <td>{{\App\User::find($project->user_id)->name}}</td>

        </tr>
        @endforeach

        </table>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-lg-4">
  <div class="card">
    <div class="card-header">
      <h4 class="card-title">مبيعات الاشهر</h4>
    </div>

    @php $sales_years =  \App\Transactions::selectraw("sum(amount) as user_count , transfer_date")->where("mareter_code",Auth::user()->mareter_code)->where("is_payable",1)->whereraw("year(transfer_date)= ".date("Y"))->groupby("transfer_date")->get();


    @endphp

    <table class="table card-table table-vcenter">
      <thead>
        <tr>
          <th>الشهر</th>
          <th>القيمة</th>
        </tr>
      </thead>
      <tbody>
        @foreach($sales_years as $t)
        <tr>
          <td>{{date("m",strtotime($t->transfer_date))}}</td>
          <td>{{$t->user_count}}</td>

        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

</div>
@endsection
@section('footerjscontent')
<script>
document.addEventListener("DOMContentLoaded", function () {
  window.ApexCharts && (new ApexCharts(document.getElementById('chart-tasks-overview'), {
    chart: {
      type: "bar",
      fontFamily: 'inherit',
      height: 320,
      parentHeightOffset: 0,
      toolbar: {
        show: false,
      },
      animations: {
        enabled: false
      },
    },
    plotOptions: {
      bar: {
        columnWidth: '50%',
      }
    },
    dataLabels: {
      enabled: false,
    },
    fill: {
      opacity: 1,
    },
    series: [{
      name: "Sales",
      data: {!! json_encode($trs_month_count) !!}
    }],
    grid: {
      padding: {
        top: -20,
        right: 0,
        left: -4,
        bottom: -4
      },
      strokeDashArray: 4,
    },
    xaxis: {
      labels: {
        padding: 0
      },
      tooltip: {
        enabled: false
      },
      axisBorder: {
        show: false,
      },
      categories:  {!! json_encode($tr_month_days) !!} ,
    },
    yaxis: {
      labels: {
        padding: 4
      },
    },
    colors: ["#206bc4"],
    legend: {
      show: false,
    },
  })).render();
});
document.addEventListener("DOMContentLoaded", function () {
  window.ApexCharts && (new ApexCharts(document.getElementById('chart-year-overview'), {
    chart: {
      type: "bar",
      fontFamily: 'inherit',
      height: 320,
      parentHeightOffset: 0,
      toolbar: {
        show: false,
      },
      animations: {
        enabled: false
      },
    },
    plotOptions: {
      bar: {
        columnWidth: '50%',
      }
    },
    dataLabels: {
      enabled: false,
    },
    fill: {
      opacity: 1,
    },
    series: [{
      name: "Sales",
      data: {!! json_encode($trs_month_count) !!}
    }],
    grid: {
      padding: {
        top: -20,
        right: 0,
        left: -4,
        bottom: -4
      },
      strokeDashArray: 4,
    },
    xaxis: {
      labels: {
        padding: 0
      },
      tooltip: {
        enabled: false
      },
      axisBorder: {
        show: false,
      },
      categories:  {!! json_encode($trs_months_year) !!} ,
    },
    yaxis: {
      labels: {
        padding: 4
      },
    },
    colors: ["#206bc4"],
    legend: {
      show: false,
    },
  })).render();
});

document.addEventListener("DOMContentLoaded", function () {
  window.ApexCharts && (new ApexCharts(document.getElementById('chart-total-sales'), {
    chart: {
      type: "donut",
      fontFamily: 'inherit',
      height: 240,
      sparkline: {
        enabled: true
      },
      animations: {
        enabled: false
      },
    },
    fill: {
      opacity: 1,
    },
    series: {!! json_encode($sales_sum_chart) !!},
    labels: ["هذا الشهر", "الشهر السابق"],
    grid: {
      strokeDashArray: 4,
    },
    colors: ["#206bc4", "#79a6dc"],
    legend: {
      show: false,
    },
    tooltip: {
      fillSeriesColor: false
    },
  })).render();
});
  // @formatter:off
  document.addEventListener("DOMContentLoaded", function () {
    window.ApexCharts && (new ApexCharts(document.getElementById('chart-revenue-bg'), {
      chart: {
        type: "area",
        fontFamily: 'inherit',
        height: 40.0,
        sparkline: {
          enabled: true
        },
        animations: {
          enabled: false
        },
      },
      dataLabels: {
        enabled: false,
      },
      fill: {
        opacity: .16,
        type: 'solid'
      },
      stroke: {
        width: 2,
        lineCap: "round",
        curve: "smooth",
      },
      series: [{
        name: "Profits",
        data: [37, 35, 44, 28, 36, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 19, 46, 39, 62, 51, 35, 41, 67]
      }],
      grid: {
        strokeDashArray: 4,
      },
      xaxis: {
        labels: {
          padding: 0
        },
        tooltip: {
          enabled: false
        },
        axisBorder: {
          show: false,
        },
        type: 'datetime',
      },
      yaxis: {
        labels: {
          padding: 4
        },
      },
      labels: [
        '2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19'
      ],
      colors: ["#206bc4"],
      legend: {
        show: false,
      },
    })).render();
  });
  // @formatter:on
</script>
<script>
  // @formatter:off
  document.addEventListener("DOMContentLoaded", function () {
    window.ApexCharts && (new ApexCharts(document.getElementById('chart-new-clients'), {
      chart: {
        type: "line",
        fontFamily: 'inherit',
        height: 40.0,
        sparkline: {
          enabled: true
        },
        animations: {
          enabled: false
        },
      },
      fill: {
        opacity: 1,
      },
      stroke: {
        width: [2, 1],
        dashArray: [0, 3],
        lineCap: "round",
        curve: "smooth",
      },
      series: [{
        name: "May",
        data: [37, 35, 44, 28, 36, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 4, 46, 39, 62, 51, 35, 41, 67]
      },{
        name: "April",
        data: [93, 54, 51, 24, 35, 35, 31, 67, 19, 43, 28, 36, 62, 61, 27, 39, 35, 41, 27, 35, 51, 46, 62, 37, 44, 53, 41, 65, 39, 37]
      }],
      grid: {
        strokeDashArray: 4,
      },
      xaxis: {
        labels: {
          padding: 0
        },
        tooltip: {
          enabled: false
        },
        type: 'datetime',
      },
      yaxis: {
        labels: {
          padding: 4
        },
      },
      labels: [
        '2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19'
      ],
      colors: ["#206bc4", "#a8aeb7"],
      legend: {
        show: false,
      },
    })).render();
  });
  // @formatter:on
</script>
<script>
  // @formatter:off
  document.addEventListener("DOMContentLoaded", function () {
    window.ApexCharts && (new ApexCharts(document.getElementById('chart-active-users'), {
      chart: {
        type: "bar",
        fontFamily: 'inherit',
        height: 40.0,
        sparkline: {
          enabled: true
        },
        animations: {
          enabled: false
        },
      },
      plotOptions: {
        bar: {
          columnWidth: '50%',
        }
      },
      dataLabels: {
        enabled: false,
      },
      fill: {
        opacity: 1,
      },
      series: [{
        name: "Profits",
        data: [37, 35, 44, 28, 36, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 19, 46, 39, 62, 51, 35, 41, 67]
      }],
      grid: {
        strokeDashArray: 4,
      },
      xaxis: {
        labels: {
          padding: 0
        },
        tooltip: {
          enabled: false
        },
        axisBorder: {
          show: false,
        },
        type: 'datetime',
      },
      yaxis: {
        labels: {
          padding: 4
        },
      },
      labels: [
        '2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19'
      ],
      colors: ["#206bc4"],
      legend: {
        show: false,
      },
    })).render();
  });
  // @formatter:on
</script>
<script>
  // @formatter:off
  document.addEventListener("DOMContentLoaded", function () {
      window.ApexCharts && (new ApexCharts(document.getElementById('chart-mentions'), {
        chart: {
          type: "bar",
          fontFamily: 'inherit',
          height: 240,
          parentHeightOffset: 0,
          toolbar: {
            show: false,
          },
          animations: {
            enabled: false
          },
          stacked: true,
        },
        plotOptions: {
          bar: {
            columnWidth: '50%',
          }
        },
        dataLabels: {
          enabled: false,
        },
        fill: {
          opacity: 1,
        },
        series: [{
          name: "Sales",
          data: {!!  json_encode($trs_month_count) !!}
        }
        ],
        grid: {
          padding: {
            top: -20,
            right: 0,
            left: -4,
            bottom: -4
          },
          strokeDashArray: 4,
          xaxis: {
            lines: {
              show: true
            }
          },
        },
        xaxis: {
          labels: {
            padding: 0
          },
          tooltip: {
            enabled: false
          },
          axisBorder: {
            show: false,
          },
          type: 'datetime',
        },
        yaxis: {
          labels: {
            padding: 4
          },
        },
        labels: {!! json_encode($tr_month_days)  !!},
        colors: ["#206bc4"],
        legend: {
          show: true,
          position: 'bottom',
          height: 32,
          offsetY: 8,
          markers: {
            width: 8,
            height: 8,
            radius: 100,
          },
          itemMargin: {
            horizontal: 8,
          },
        },
      })).render();
    });
  // @formatter:on
</script>
<script>
  // @formatter:on
  document.addEventListener("DOMContentLoaded", function() {
    $('#map-world').vectorMap({
      map: 'world_en',
      backgroundColor: 'transparent',
      color: 'rgba(120, 130, 140, .1)',
      borderColor: 'transparent',
      scaleColors: ["#d2e1f3", "#206bc4"],
      normalizeFunction: 'polynomial',
      values: (chart_data = {"af":16, "al":11, "dz":158, "ao":85, "ag":1, "ar":351, "am":8, "au":1219, "at":366, "az":52, "bs":7, "bh":21, "bd":105, "bb":3, "by":52, "be":461, "bz":1, "bj":6, "bt":1, "bo":19, "ba":16, "bw":12, "br":2023, "bn":11, "bg":44, "bf":8, "bi":1, "kh":11, "cm":21, "ca":1563, "cv":1, "cf":2, "td":7, "cl":199, "cn":5745, "co":283, "km":0, "cd":12, "cg":11, "cr":35, "ci":22, "hr":59, "cy":22, "cz":195, "dk":304, "dj":1, "dm":0, "do":50, "ec":61, "eg":216, "sv":21, "gq":14, "er":2, "ee":19, "et":30, "fj":3, "fi":231, "fr":2555, "ga":12, "gm":1, "ge":11, "de":3305, "gh":18, "gr":305, "gd":0, "gt":40, "gn":4, "gw":0, "gy":2, "ht":6, "hn":15, "hk":226, "hu":132, "is":12, "in":1430, "id":695, "ir":337, "iq":84, "ie":204, "il":201, "it":2036, "jm":13, "jp":5390, "jo":27, "kz":129, "ke":32, "ki":0, "kr":986, "undefined":5, "kw":117, "kg":4, "la":6, "lv":23, "lb":39, "ls":1, "lr":0, "ly":77, "lt":35, "lu":52, "mk":9, "mg":8, "mw":5, "my":218, "mv":1, "ml":9, "mt":7, "mr":3, "mu":9, "mx":1004, "md":5, "mn":5, "me":3, "ma":91, "mz":10, "mm":35, "na":11, "np":15, "nl":770, "nz":138, "ni":6, "ne":5, "ng":206, "no":413, "om":53, "pk":174, "pa":27, "pg":8, "py":17, "pe":153, "ph":189, "pl":438, "pt":223, "qa":126, "ro":158, "ru":1476, "rw":5, "ws":0, "st":0, "sa":434, "sn":12, "rs":38, "sc":0, "sl":1, "sg":217, "sk":86, "si":46, "sb":0, "za":354, "es":1374, "lk":48, "kn":0, "lc":1, "vc":0, "sd":65, "sr":3, "sz":3, "se":444, "ch":522, "sy":59, "tw":426, "tj":5, "tz":22, "th":312, "tl":0, "tg":3, "to":0, "tt":21, "tn":43, "tr":729, "tm":0, "ug":17, "ua":136, "ae":239, "gb":2258, "us":4624, "uy":40, "uz":37, "vu":0, "ve":285, "vn":101, "ye":30, "zm":15, "zw":5}),
      onLabelShow: function (event, label, code) {
        if (chart_data[code] > 0) {
          label.append(': <strong>' + chart_data[code] + '</strong>');
        }
      },
    });
  });
  // @formatter:off
</script>
<script>
  // @formatter:off
  document.addEventListener("DOMContentLoaded", function () {
    window.ApexCharts && (new ApexCharts(document.getElementById('chart-development-activity'), {
      chart: {
        type: "area",
        fontFamily: 'inherit',
        height: 160,
        sparkline: {
          enabled: true
        },
        animations: {
          enabled: false
        },
      },
      dataLabels: {
        enabled: false,
      },
      fill: {
        opacity: .16,
        type: 'solid'
      },
      title: {
        text: "Development Activity",
        margin: 0,
        floating: true,
        offsetX: 10,
        style: {
          fontSize: '18px',
        },
      },
      stroke: {
        width: 2,
        lineCap: "round",
        curve: "smooth",
      },
      series: [{
        name: "Purchases",
        data: [3, 5, 4, 6, 7, 5, 6, 8, 24, 7, 12, 5, 6, 3, 8, 4, 14, 30, 17, 19, 15, 14, 25, 32, 40, 55, 60, 48, 52, 70]
      }],
      grid: {
        strokeDashArray: 4,
      },
      xaxis: {
        labels: {
          padding: 0
        },
        tooltip: {
          enabled: false
        },
        axisBorder: {
          show: false,
        },
        type: 'datetime',
      },
      yaxis: {
        labels: {
          padding: 4
        },
      },
      labels: [
        '2020-06-20', '2020-06-21', '2020-06-22', '2020-06-23', '2020-06-24', '2020-06-25', '2020-06-26', '2020-06-27', '2020-06-28', '2020-06-29', '2020-06-30', '2020-07-01', '2020-07-02', '2020-07-03', '2020-07-04', '2020-07-05', '2020-07-06', '2020-07-07', '2020-07-08', '2020-07-09', '2020-07-10', '2020-07-11', '2020-07-12', '2020-07-13', '2020-07-14', '2020-07-15', '2020-07-16', '2020-07-17', '2020-07-18', '2020-07-19'
      ],
      colors: ["#206bc4"],
      legend: {
        show: false,
      },
      point: {
        show: false
      },
    })).render();
  });
  // @formatter:on
</script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    $().peity && $('#sparkline-7').text("56/100").peity("pie", {
      width: 40,
      height: 40,
      stroke: "#cd201f",
      strokeWidth: 2,
      fill: ["#cd201f", "rgba(110, 117, 130, 0.2)"],
      padding: .2,
      innerRadius: 17,
    });
  });
</script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    $().peity && $('#sparkline-8').text("22/100").peity("pie", {
      width: 40,
      height: 40,
      stroke: "#fab005",
      strokeWidth: 2,
      fill: ["#fab005", "rgba(110, 117, 130, 0.2)"],
      padding: .2,
      innerRadius: 17,
    });
  });
</script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    $().peity && $('#sparkline-9').text("17, 24, 20, 10, 5, 1, 4, 18, 13").peity("line", {
      width: 64,
      height: 40,
      stroke: "#206bc4",
      strokeWidth: 2,
      fill: ["#d2e1f3"],
      padding: .2,
    });
  });
</script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    $().peity && $('#sparkline-10').text("13, 11, 19, 22, 12, 7, 14, 3, 21").peity("line", {
      width: 64,
      height: 40,
      stroke: "#206bc4",
      strokeWidth: 2,
      fill: ["#d2e1f3"],
      padding: .2,
    });
  });
</script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    $().peity && $('#sparkline-11').text("10, 13, 10, 4, 17, 3, 23, 22, 19").peity("line", {
      width: 64,
      height: 40,
      stroke: "#206bc4",
      strokeWidth: 2,
      fill: ["#d2e1f3"],
      padding: .2,
    });
  });
</script>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    $().peity && $('#sparkline-12').text("9, 6, 14, 11, 8, 24, 2, 16, 15").peity("line", {
      width: 64,
      height: 40,
      stroke: "#206bc4",
      strokeWidth: 2,
      fill: ["#d2e1f3"],
      padding: .2,
    });
  });
</script>
@endsection
