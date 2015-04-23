@extends('template.main')
@section('content')
<h3 class="page-title">
PNPAA Analysis
</h3>
<div class="page-bar">
  <ul class="page-breadcrumb">
    <li>
      <i class="fa fa-home"></i>
      <a href="{{{route('dashboard')}}}">Home</a>
      <i class="fa fa-angle-right"></i>
    </li>
    <li class="active">
      Analysis
    </li>
  </ul>
</div>
<div class="row pb-50">
  <div class="col-md-12">
    <div id="payment_trend" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
  </div>
</div>
<!-- BEGIN CHART PORTLETS-->
<div class="row pb-50">
  <div class="col-md-12">
    <div id="users_bar" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    <!-- <div id="bar-3d" style="height: 400px"></div> -->
  </div>
</div>
@if (Auth::user()->role == 1)
<div class="row pb-50">
  <div class="col-md-12">
    <div id="users_percentage_bar" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    <!-- <div id="bar-3d" style="height: 400px"></div> -->
  </div>
</div>
@endif
<div class="row pb-50">
  <div class="col-md-12">
    {{--<div id="dropoffs_percentage_bar" style="min-width: 310px; height: 400px; margin: 0 auto"></div>--}}
    <!-- <div id="bar-3d" style="height: 400px"></div> -->
  </div>
</div>
<!-- END CHART PORTLETS-->
<!-- BEGIN PIE CHART PORTLET-->
<div class="row">
  <div class="clearfix">
  </div>
  <div class="col-md-6">
    <div class="col-md-12 ">
      <h4>PNPAA Member</h4>
      <div class="col-md-6">
        <div id="pnpaa_members" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
        <!-- <div id="pie-3d" style="height: 400px"></div> -->
      </div>
      <div class="col-md-6">
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="col-md-12">
      <h4>Committee</h4>
      <div class="col-md-6">
        <div id="committee" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
      </div>
      <div class="col-md-6">
      </div>
    </div>
  </div>
</div>
<!-- END PIE CHART PORTLET-->
@stop
@section('script')
{{ HTML::script('assets/js/high-chart/highcharts.js') }}
{{ HTML::script('assets/js/high-chart/highcharts-3d.js') }}
{{ HTML::script('assets/js/high-chart/themes/dark-unica.js') }}
{{ HTML::script('assets/js/high-chart/modules/exporting.js') }}
{{ HTML::script('assets/js/canvas.js') }}
{{ HTML::script('assets/dashboard/global/scripts/metronic.js') }}
{{ HTML::script('assets/dashboard/admin/layout/scripts/layout.js') }}
<script>
  jQuery(document).ready(function() {
     Metronic.init(); // init metronic core components
     Layout.init(); // init current layout
  });

  $.ajax({
      url: 'getData',
      type: 'post',
      success:function(data){
          // Session.set('tasks', data.tasks);
          // Session.set('updates', data.updates);
          // Session.set('counter', data.counter);
          // Session.set('receive', data.counter.receive);
          Session.set('counter', data.counter);
          Session.set('a_receive', data.counter.receive);
          Session.set('a_user_pay', data.counter.user_pay);
          Session.set('a_payment_trend', data.counter.user_pay);
          Session.set('batches', data.batches);
          Session.set('committee', data.committees);
          Session.set('is_admin',data.user_role);
          Session.set('batch_percentage',data.batch_percentage);

      }
  });
</script>
<!-- END PAGE LEVEL SCRIPTS -->
@stop
