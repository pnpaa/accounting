@extends('template.main')
@section('css')
{{HTML::style('assets/dashboard/admin/pages/css/timeline.css')}}
@stop
@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title stretchRight">
 PNPAA Transactions Log
</h3>
<div class="page-bar stretchRight">
  <ul class="page-breadcrumb">
    <li>
      <i class="fa fa-home"></i>
      <a href="{{{route('dashboard')}}}">Home</a>
      <i class="fa fa-angle-right"></i>
    </li>
    <li class="active">
      Activities Log
    </li>
  </ul>
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div ng-app="timeLineApp" >
   <label for="">Legend:</label><br>
  <label for="" style="color:#555555"><i class="fa fa-briefcase"></i> Transaction made by an admin  </label><br>
  <label for="" style="color:#4b8df8"><i class="fa fa-gears"></i> User payment to a specific cashier</label>
 <div class="col-md-12"  id="timeline-list" ng-controller="timeLineController" data-ng-init="loop()">
  <div class="col-md-4 col-md-offset-8">
    <input class="search form-control stretchRight" placeholder="Search " />
  </div>
  <div class="clearfix">
  </div>
  <br/>
  <ul class="timeline list fadeIn" id="timeline">
    <?php $i=0;?>

    @foreach($transactions as $t)

      @if($i++ % 5 == 0 AND $i++ <> 1 )
              @if ( $t->type == 0 )
                  <li class="timeline-blue jscroll hidden" data-limit="{{$i}}">
              @else
                  <li class="timeline-grey jscroll hidden" data-limit="{{$i}}">
              @endif
      @else
              @if ( $t->type == 0 )
                  <li class="timeline-blue jscroll hidden" data-limit="{{$i}}">
              @else
                  <li class="timeline-grey jscroll hidden" data-limit="{{$i}}">
              @endif

      @endif

      <div class="timeline-time" style="width: 16%;">
        <span class="date">
        <span class="time">
        {{{dateMonth($t->transaction_date)}}}</span>
       <?php
             date_default_timezone_set('UTC');

              $date = date_create($t->transaction_date,timezone_open('+08:00'));
           //   print_r($date);
              //echo date('G:ia',strtotime($t->transaction_date));
       ?>
         </span>

      </div>
      <div class="timeline-icon">
        @if ( $t->type == 0)
        <i class="fa fa-briefcase"></i>
        @else
        <i class="fa fa-gears"></i>
        @endif
      </div>
      <div class="timeline-body">
        @if ( $t->type == 0)
        <h2>For the {{{$t->transaction_purpose}}}</h2>
        <div class="timeline-content">
          {{{getUserName($t->user_id,true)}}} is paying for {{{$t->transaction_purpose}}} to cashier {{{getUserName($t->transaction_setter,true)}}}
        </div>
        <div class="timeline-footer">
        <!--   <a href="#" class="nav-link pull-right">
          Read more <i class="m-icon-swapright m-icon-white"></i>
          </a> -->
        </div>
        @else
        <h2>For the {{{$t->transaction_purpose}}}</h2>
        <div class="timeline-content">
          {{{getUserName($t->transaction_setter,true)}}} is  adding this transaction
        </div>
        <div class="timeline-footer">
          <!-- <a href="#" class="nav-link pull-right">
          Read more <i class="m-icon-swapright m-icon-white"></i>
          </a> -->
        </div>
        @endif
      </div>
    </li>
    @endforeach
  </ul>
  <div class="clearfix">
  </div>
  <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-md-offset-3 loader-con">
    <img src="http://localhost:8000/assets/front-page/images/loading.gif" class="hidden" alt="">
    <button type="button" class="btn btn-success loader col-md-6 " ng-click="loadMore()">Load More</button>
  </div>
 </div>
</div>
@stop
@section('script')
{{ HTML::script('assets/dashboard/global/scripts/metronic.js') }}
{{ HTML::script('assets/dashboard/admin/layout/scripts/layout.js') }}
{{ HTML::script('assets/js/fuzzy-search.js') }}
{{ HTML::script('assets/js/list-sort.js') }}
<script>
  jQuery(document).ready(function() {
     Metronic.init();
     Layout.init(); // init layout
   });
   var options={
              valueNames:['timeline-content','date'],
              plugins: [ ListFuzzySearch() ]
   };
   var timelineList=new List('timeline-list',options);
   var count = $('ul.timeline li').length;
</script>
@stop
