@extends('template.main')
@section('css')
{{HTML::style('assets/dashboard/global/plugins/gritter/css/jquery.gritter.css')}}
{{HTML::style('assets/dashboard/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css')}}
@stop
@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title stretchRight">
  PNPAA Dashboard
</h3>
<div class="page-bar stretchRight">
  <ul class="page-breadcrumb">
    <li>
      <i class="fa fa-home"></i>
      Home
    </li>
  </ul>
</div>
<!-- END PAGE HEADER-->
<div ng-app="pageApp">
  <!-- BEGIN DASHBOARD STATS -->
  <div class="row pb-20" ng-controller="counterController" >
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 fadeIn">
            <div class="dashboard-stat blue-madison item active">
              <div class="visual hatch">
                <i class="fa fa-users"></i>
              </div>
              <div class="details   slideRight">
                <div class="number">
                  [[ counter.users ]]
                </div>
                <div class="desc">
                  Current Alumni Members
                </div>
              </div>
             <!--  <a class="more" href="{{ route('users.index') }}">
              View more <i class="m-icon-swapright m-icon-white"></i>
              </a> -->
            </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 fadeIn">
      <div class="dashboard-stat red-intense">
        <div class="visual hatch">
          <i class="fa fa-briefcase"></i>
        </div>
        @if(Auth::user()->role ==1 )
        <div class="details  slideRight">
          <div class="number">
            P  [[ counter.amount ]]
          </div>
          <div class="desc slideRight">
            Total Amount received
          </div>
        </div>
        @else
        <div class="details slideRight">
          <div class="number">
            P  [[ counter.amount ]]
          </div>
          <div class="desc ">
            Total Amount paid
          </div>
        </div>
        @endif
       <!--  <a class="more" href="{{route('analysis')}}">
        View more <i class="m-icon-swapright m-icon-white"></i>
        </a> -->
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 fadeIn">
      <div class="dashboard-stat green-haze">
        <div class="visual hatch">
          <i class="fa  fa-comments"></i>
        </div>
        <div class="details slideRight">
          <div class="number">
            [[ counter.committees ]]
          </div>
          <div class="desc  ">
            Committees
          </div>
        </div>
       <!--  <a class="more" href="{{ route('committee.index') }}">
        View more <i class="m-icon-swapright m-icon-white"></i>
        </a> -->
      </div>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 fadeIn">
      <div class="dashboard-stat purple-plum">
        <div class="visual hatch">
          <i class="fa fa-graduation-cap"></i>
        </div>
        <div class="details">
          <div class="number">
            [[ counter.batches ]]
          </div>
          <div class="desc  ">
            Batches
          </div>
        </div>
        <!-- <a class="more" href="{{route('analysis')}}">
        View more <i class="m-icon-swapright m-icon-white"></i>
        </a> -->
      </div>
    </div>
  </div>
  <!-- END DASHBOARD STATS -->
  <div class="clearfix">
  </div>
  @if(Auth::user()->role ==1 )
  <div class="row">
    <div class="col-md-6 col-sm-6 stretchRight">
      <div class="col-md-12">
        <div id="users_pay" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
      </div>
      <!-- END PORTLET-->
    </div>
    <div class="col-md-6 col-sm-6  stretchRight ">
      <div class="col-md-12 ">
        <div id="payment_receive" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
      </div>
    </div>
  </div>
  @else
  <div class="row">
    <div class="col-md-12 pullUp">
      <div id="payment_receive" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
    </div>
  </div>
  @endif
  <div class="clearfix">
  </div>
  <br/>
  <br/>
  <div class="row">
    <div class="col-md-6 col-sm-6 slideRight" ng-controller="activityController">
      <div class="portlet box blue-steel">
        <div class="portlet-title">
          <div class="caption">
            <i class="fa fa-bell-o"></i>Upcoming Activities
          </div>
        </div>
        <div class="portlet-body">
          <div  ng-repeat="update in updates"  class="note  [[ update.update_classname ]]"  >
            <h4 class="block">  [[ update.update_title ]]  <span class="label label-info">
              created by  [[ update.update_setter ]] </span>
            </h4>
            <p>
              [[ update.update_content ]]
            </p>
          </div>
          <div class="scroller-footer">
            <div class="btn-arrow-link pull-right">
              <a href="{{ route('updates.index') }}">View All </a>
              <i class="icon-arrow-right"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-sm-6 slideLeft" ng-controller="taskController">
      <div class="portlet box green-haze tasks-widget " >
        <div class="portlet-title">
          <div class="caption">
            <i class="fa fa-check"></i>Tasks
          </div>
        </div>
        <div class="portlet-body" >
          <div  ng-repeat="task in tasks"  class="note  [[ task.task_group ]]"  >
            <h4 class="block">  [[ task.task_title ]]  <span class="label label-success">
                assigned by  [[ task.task_setter ]] </span>
            </h4>
            <p>
              [[ task.task_content ]]
            </p>
          </div>
          <div class="clearfix">
          </div>
          <div class="row">
            <div class="btn-arrow-link pull-right mr-10">
              <a href="{{ route('tasks.index') }}">View All </a>
              <i class="icon-arrow-right"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END CONTENT -->
@stop
@section('script')
<!-- BEGIN PAGE LEVEL PLUGINS -->
{{ HTML::script('assets/dashboard/global/plugins/bootstrap-daterangepicker/moment.min.js') }}
{{ HTML::script('assets/dashboard/global/plugins/bootstrap-daterangepicker/daterangepicker.js') }}
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
{{ HTML::script('assets/dashboard/global/scripts/metronic.js') }}
{{ HTML::script('assets/dashboard/admin/layout/scripts/layout.js') }}
{{ HTML::script('assets/dashboard/admin/pages/scripts/index.js') }}
{{ HTML::script('assets/js/high-chart/highcharts.js') }}
{{ HTML::script('assets/js/high-chart/highcharts-3d.js') }}
{{ HTML::script('assets/js/high-chart/themes/dark-unica.js') }}
{{ HTML::script('assets/js/high-chart/modules/exporting.js') }}
{{ HTML::script('assets/js/canvas.js') }}
<!-- END PAGE LEVEL SCRIPTS -->
<script>
  jQuery(document).ready(function() {
     Metronic.init(); // init metronic core componets
     Layout.init(); // init layout
     Index.initDashboardDaterange();

  });

  $.ajax({
      url: 'getData',
      type: 'post',
      success:function(data){
          Session.set('tasks', data.tasks);
          Session.set('updates', data.updates);
          Session.set('counter', data.counter);
          Session.set('receive', data.counter.receive);
          Session.set('a_receive', data.counter.receive);
          Session.set('user_pay', data.counter.user_pay);
          Session.set('is_admin',data.user_role);
          // console.log(data.user_role);
      }
  });
     $('div.dashboard-stat').hover(function(event) {
      $(this).find('div.visual').removeClass('floating').addClass('floating');
    });
     $('div.dashboard-stat').mouseleave(function(event) {
         $(this).find('div.visual').removeClass('floating') ;
     });
</script>

@stop