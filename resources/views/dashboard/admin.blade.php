@extends('layouts.app')

@section('page-title', trans('app.dashboard'))
@section('page-heading', trans('app.dashboard'))

@section('breadcrumbs')
    <li class="breadcrumb-item active">
        @lang('app.dashboard')
    </li>
@stop

@section('content')

<div class="row">

    <div class="col-xl-3 col-md-6">
        <div class="card widget">
            <div class="card-body">
                <div class="row">
                        <div class="top_stats_wrapper">
                                <p class="text-uppercase mtop5"> Quatations Awaiting Confirmation                  <span class="pull-right">10 / 14</span>
                 </p>
                 <div class="clearfix"></div>
                 <div class="progress no-margin progress-bar-mini">
                    <div class="progress-bar progress-bar-danger no-percent-text not-dynamic" role="progressbar" aria-valuenow="71.43" aria-valuemin="0" aria-valuemax="100" style="width: 71.43%;" data-percent="71.43">
                    </div>
                 </div>
              </div>
                        
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card widget">
            <div class="card-body">
                <div class="row">
                        <div class="top_stats_wrapper">
                                <p class="text-uppercase mtop5"> Converted Leads  <span class="pull-right">10 / 14</span>
                 </p>
                 <div class="clearfix"></div>
                 <div class="progress no-margin progress-bar-mini">
                    <div class="progress-bar progress-bar-success no-percent-text not-dynamic" role="progressbar" aria-valuenow="71.43" aria-valuemin="0" aria-valuemax="100" style="width: 71.43%;" data-percent="71.43">
                    </div>
                 </div>
              </div>
                       
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card widget">
            <div class="card-body">
                <div class="row">
                        <div class="top_stats_wrapper">
                                <p class="text-uppercase mtop5"> Opportunities  <span class="pull-right">10 / 14</span>
                 </p>
                 <div class="clearfix"></div>
                 <div class="progress no-margin progress-bar-mini">
                    <div class="progress-bar  no-percent-text not-dynamic" role="progressbar" aria-valuenow="71.43" aria-valuemin="0" aria-valuemax="100" style="width: 71.43%;" data-percent="71.43">
                    </div>
                 </div>
              </div>
                        
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card widget">
            <div class="card-body">
                <div class="row">
                        <div class="top_stats_wrapper">
                                <p class="text-uppercase mtop5"> Opportunities  <span class="pull-right">10 / 14</span>
                 </p>
                 <div class="clearfix"></div>
                 <div class="progress no-margin progress-bar-mini">
                    <div class="progress-bar progress-bar-danger no-percent-text not-dynamic" role="progressbar" aria-valuenow="71.43" aria-valuemin="0" aria-valuemax="100" style="width: 71.43%;" data-percent="71.43">
                    </div>
                 </div>
              </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <div class="col-lg-8 col-md-12">
        <div class="card">
            <div class="card-body">
                    <div id='calendar'></div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-lg-4">
        <div class="card">
            <div class="card-body">
                <h5 class="text-muted">Leads Overview</h5>
                    <canvas id="leads" width="321" height="250"></canvas>
            </div>
        </div>
    </div>
</div>

@stop

@section('scripts')

    {!! HTML::script('assets/js/chart.min.js') !!}
    {!! HTML::script('vendor/fullcalendar/fullcalendar.min.js') !!}
    {!! HTML::script('vendor/fullcalendar/gcal.min.js') !!}
    {!! HTML::style('vendor/fullcalendar/fullcalendar.min.css') !!}
    {!! HTML::style('vendor/calender/css/calendar.print.css') !!}
    <script>
            var oilCanvas = document.getElementById("leads");
    
    Chart.defaults.global.defaultFontFamily = "Roboto";
    Chart.defaults.global.defaultFontSize = 15;
    
    var oilData = {
        labels: [
            "Customer",
            "New",
            "Contacted",
            "Proposal Sent",
            "Qualified",
            "Working"
        ],
        datasets: [
            {
                data: [{{ $leads_customer }},{{ $leads_new }},  {{ $leads_Contacted }},{{ $leads_proposalsent }}, {{ $leads_Qualified }}, {{ $leads_working }}],
                backgroundColor: [
                    "#7CB342",
                    "#616161",
                    "#616161",
                    "#616161",
                    "#616161",
                    "#616161"
                ]
            }]
    };
    
    var chartOptions = {
      
      responsive: true,
      legend: {
        position: 'top'
      },
      animation: {
        animateRotate: true,
        animateScale: true
      }
    };
    
    var pieChart = new Chart(oilCanvas, {
      type: 'doughnut',
      data: oilData,
      options: chartOptions
    });
    $('#calendar').fullCalendar({
  themeSystem: 'bootstrap4',
  header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay,listMonth'
          },
          weekNumbers: false,
          navLinks: true, // can click day/week names to navigate views
          editable: true,
});
        </script>
@stop