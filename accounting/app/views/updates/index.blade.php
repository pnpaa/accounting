<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pnpa - {{{Auth::user()->first_name}}}</title>
    <!-- start: MAIN CSS -->
    {{HTML::script('assets/dashboard/global/plugins/pace/pace.min.js')}}
    {{HTML::style('assets/dashboard/global/plugins/pace/themes/pace-theme-minimal.css')}}
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,500,600,700,200,100,800' rel='stylesheet' type='text/css'>
    {{HTML::style('assets/calendar/plugins/bootstrap/css/bootstrap.min.css')}}
    {{HTML::style('assets/calendar/plugins/font-awesome/css/font-awesome.min.css')}}
    {{HTML::style('assets/calendar/plugins/iCheck/skins/all.css')}}
    {{HTML::style('assets/calendar/plugins/perfect-scrollbar/src/perfect-scrollbar.css')}}
    {{HTML::style('assets/calendar/plugins/animate.css/animate.min.css')}}
    <!-- end: MAIN CSS -->
    <!-- start: CSS REQUIRED FOR SUBVIEW CONTENTS -->
    {{HTML::style('assets/calendar/plugins/summernote/dist/summernote.css')}}
    {{HTML::style('assets/calendar/plugins/fullcalendar/fullcalendar/fullcalendar.css')}}
    {{HTML::style('assets/calendar/plugins/toastr/toastr.min.css')}}
    {{HTML::style('assets/calendar/plugins/bootstrap-select/bootstrap-select.min.css')}}
    {{HTML::style('assets/calendar/plugins/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css')}}
    {{HTML::style('assets/calendar/plugins/DataTables/media/css/DT_bootstrap.css')}}
    {{HTML::style('assets/calendar/plugins/bootstrap-fileupload/bootstrap-fileupload.min.css')}}
    {{HTML::style('assets/calendar/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css')}}

    {{HTML::style('assets/calendar/css/styles.css')}}
    {{HTML::style('assets/calendar/css/styles-responsive.css')}}
    {{HTML::style('assets/calendar/css/plugins.css')}}
    <link rel="stylesheet" type="assets/calendar/css/print.css" type="text/css" media="print"/>
    <!-- end: CORE CSS -->
        {{HTML::style('assets/calendar/css/import/global/plugins/simple-line-icons/simple-line-icons.min.css')}}
        {{HTML::style('assets/calendar/css/import/admin/layout/css/layout.css')}}
        {{HTML::style('assets/calendar/css/import/admin/layout/css/themes/darkblue.css')}}
        {{HTML::style('assets/calendar/css/import/global/plugins/bootstrap-colorpicker/css/colorpicker.css')}}
        {{HTML::style('assets/dashboard/global/css/plugins.css')}}
        {{HTML::style('assets/css/style.css')}}



    <link rel="shortcut icon" href="favicon.ico" />
    <style type="text/css" media="screen">
      .page-header.navbar .menu-toggler {
        background-image: url(assets/calendar/images/sidebar_toggler_icon_darkblue.png) !important;
      }
      .modal-dialog{margin-top: 50px;}
      .pr-5{padding-right: 5px !important;}
      div.subviews.subviews-right{height: 700px!important;}
    </style>
  </head >
  <!-- end: HEAD -->
  <!-- start: BODY -->

  <body class="page-header-fixed  page-sidebar-closed-hide-logo"   ng-app="updateApp">
      @include ('template.header')
    <div class="main-wrapper">

             @if(Auth::user()->role ==1 )
                   @include ('template.admin-side-bar')
                @elseif(Auth::user()->role == 3 )
                   @include ('template.cashier-side-bar')
                @else
                   @include ('template.user-side-bar')
                @endif

      <!-- start: MAIN CONTAINER -->
      <div class="main-container inner" style="background: #E6E6E6;">
        <!-- start: PAGE -->
        <div class="main-content" style="background: #E6E6E6; left:0 !important;" >
          <!-- start: PANEL CONFIGURATION MODAL FORM -->
          {{--<div class="modal fade" id="panel-config" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                    &times;
                  </button>
                  <h4 class="modal-title">Panel Configuration</h4>
                </div>
                <div class="modal-body">
                  Here will be a configuration form
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">
                    Close
                  </button>
                  <button type="button" class="btn btn-primary">
                    Save changes
                  </button>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>--}}
          <!-- /.modal -->
          <!-- end: SPANEL CONFIGURATION MODAL FORM -->
          <div class="container">
            <!-- start: PAGE HEADER -->
            <!-- start: TOOLBAR -->
            <div class="toolbar row">
              <div class="col-sm-6 hidden-xs">
                <div class="page-header">
                  <h1>PNPAA Updates</h1>
                </div>
              </div>
              <div class="col-sm-6 col-xs-12">
                <a href="#" class="back-subviews">
                  <i class="fa fa-chevron-left"></i> BACK
                </a>
                <a href="#" class="close-subviews">
                  <i class="fa fa-times"></i> CLOSE
                </a>
                <div class="toolbar-tools pull-right">
                </div>
              </div>
            </div>
            <!-- end: TOOLBAR -->
            <!-- end: PAGE HEADER -->
            <!-- start: BREADCRUMB -->
            <div class="row" style="height:50px;">
              <div class="col-md-12">
                <ol class="breadcrumb">
                  <li>
                    <a href="{{{route('dashboard')}}}">
                      Home
                    </a>
                  </li>
                  <li class="active">
                    Updates
                  </li>
                </ol>
              </div>
            </div>
            <!-- end: BREADCRUMB -->
            <!-- start: PAGE CONTENT -->
            <div class="row">
              <div class="col-sm-12">
                <!-- start: FULL CALENDAR PANEL -->
                <div class="panel panel-white">
                  <div class="panel-heading">
                    <i class="fa fa-calendar"></i>
                   All Updates
                    {{--<div class="panel-tools">
                      <div class="dropdown">
                        <a data-toggle="dropdown" class="btn btn-xs dropdown-toggle btn-transparent-grey">
                          <i class="fa fa-cog"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-light pull-right" role="menu">
                          <li>
                            <a class="panel-collapse collapses" href="#"><i class="fa fa-angle-up"></i> <span>Collapse</span> </a>
                          </li>
                          <li>
                            <a class="panel-refresh" href="#">
                              <i class="fa fa-refresh"></i> <span>Refresh</span>
                            </a>
                          </li>
                          <li>
                            <a class="panel-config" href="#panel-config" data-toggle="modal">
                              <i class="fa fa-wrench"></i> <span>Configurations</span>
                            </a>
                          </li>
                          <li>
                            <a class="panel-expand" href="#">
                              <i class="fa fa-expand"></i> <span>Fullscreen</span>
                            </a>
                          </li>
                        </ul>
                      </div>
                      <a class="btn btn-xs btn-link panel-close" href="#">
                        <i class="fa fa-times"></i>
                      </a>
                    </div>--}}
                  </div>
                  <div class="panel-body">
                    <div class="col-sm-12 space20">
                      <a href="#newFullEvent" class="btn btn-green add-event"><i class="fa fa-plus"></i> Add New Event</a>
                    </div>
                    <div class="col-sm-9">
                      <div id='full-calendar'></div>
                      {{Form::token()}}
                    </div>
                    <div class="col-sm-3" ng-controller="categoryController">
                      <h4 class="space20">Categories</h4>
                      <div id="event-categories">
                         @foreach ($updatesCategory as $category)
                            <div class="update-category" data-id="{{$category->id}}" data-name="{{$category->category_name}}" data-color="{{$category->category_color}}">
                                @if ($category->category_setter == Auth::id() OR Auth::user()->role == 1)
                                <a href="{{ route('updatesCategory.destroy',$category->id) }}" data-toggle="tooltip" data-placement="top" title="Delete" data-method="put" data-key="{{$category->id}}"  data-confirm="Are you sure you want to delete this?"  class="close  ttp" title=""> <span class="glyphicon glyphicon-trash f-12"></span> </a>
                                 <button type="button" data-toggle="tooltip" data-placement="top" title="Edit" ng-click="edit({{$category->id}})" class="close pr-5 ttp"  aria-hidden="true"><i class="fa fa-edit f-12"></i></button>
                                @endif
                              {{$category->category_name}}
                          </div>

                         @endforeach
                         {{ Form::open(['route'=>'updatesCategory.store','id' => 'category_add']) }}
                        <h3>Add New</h3>

                        <div class="col-md-12 p-0">
                          <div class="input-group color colorpicker-default" data-color="#3865a8" data-color-format="rgba">
                            <span class="input-group-btn">
                            <button class="btn default" type="button"><i style="background-color: rgb(46, 102, 186);"></i>&nbsp;</button>
                            </span>
                            <input type="text" class="form-control"  name="category_color" value="#3865a8" readonly="">
                          </div>
                          <!-- /input-group -->
                        </div>
                        <div class="col-md-12 p-0">
                         <div class="form-group">
                           <input type="text" class="form-control" name="category_name" value="" placeholder="Add new Category">
                         </div>
                        </div>
                         <button type="submit" class="hidden"></button>
                         {{Form::close()}}
                        {{-- Form::open(['route'=>'updatesCategory.update','class' => 'hidden' ,'id' => 'category_edit','']) --}}
                        <form action="{{route('updatesCategory.update')}}" class="hidden" id="category_edit" method="post"  accept-charset="utf-8">
                        <input type="hidden" name="_method" value="PUT" />
                         {{ Form::token()}}
                        <h3>Edit</h3>
                        <div class="col-md-12 p-0">
                          <div class="input-group color colorpicker-default" data-color="#3865a8" data-color-format="rgba">
                            <span class="input-group-btn">
                            <button class="btn default" type="button"><i style="background-color: [[ category_color ]];"></i>&nbsp;</button>
                            </span>
                            <input type="text" class="form-control"  name="category_color" value="[[ category_color ]]" readonly="">
                          </div>
                          <!-- /input-group -->
                        </div>
                        <div class="col-md-12 p-0">
                         <div class="form-group">
                           <input type="text" class="form-control" name="category_name" value="[[ category_name ]]" placeholder="Add new Category">
                         </div>
                        </div>
                         <input type="hidden" name="id" value="[[ id ]]" >
                         <button type="submit" class="hidden"></button>
                        {{Form::close()}}

                      </div>
                    </div>
                  </div>
                </div>
                <!-- end: FULL CALENDAR PANEL -->
              </div>
            </div>
            <!-- end: PAGE CONTENT-->
          </div>
          <div class="subviews">
            <div class="subviews-container"></div>
          </div>
        </div>
        <!-- end: PAGE -->
      </div>
      <!-- end: MAIN CONTAINER -->
        <!-- BEGIN FOOTER -->
          <div class="page-footer">
            <div class="page-footer-inner">
              2014 &copy; Pnpaa.
            </div>
            <div class="page-footer-tools">
              <span class="go-top">
              <i class="fa fa-angle-up"></i>
              </span>
            </div>
          </div>
          <!-- END FOOTER -->
      <!-- start: SUBVIEW FOR CALENDAR PAGE -->
      <div id="newFullEvent">
        <div class="noteWrap col-md-8 col-md-offset-2">
          <h3>Add new event</h3>
          <form class="form-full-event">
            {{Form::token()}}
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <input class="event-id hide" type="text">
                  <input class="event-name form-control" name="eventName" type="text" placeholder="Event Name...">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <input type="checkbox" class="all-day" data-label-text="All-Day" data-on-text="True" data-off-text="False">
                </div>
              </div>
              <div class="no-all-day-range">
                <div class="col-md-8">
                  <div class="form-group">
                    <div class="form-group">
                      <span class="input-icon">
                        <input type="text" class="event-range-date form-control" name="eventRangeDate" placeholder="Range date"/>
                        <i class="fa fa-clock-o"></i> </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="all-day-range">
                <div class="col-md-8">
                  <div class="form-group">
                    <div class="form-group">
                      <span class="input-icon">
                        <input type="text" class="event-range-date form-control" name="ad_eventRangeDate" placeholder="Range date"/>
                        <i class="fa fa-calendar"></i> </span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="hide">
                <input type="text" class="event-start-date" name="eventStartDate"/>
                <input type="text" class="event-end-date" name="eventEndDate"/>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                    <select name="event_category" class="form-control selectpicker event-categories" >
                        @foreach ($updatesCategory as $category)
                         <option data-content="<span class='update-category' data-color='{{$category->category_color}}' >  {{$category->category_name}} </span>" value="{{$category->id}}">  {{$category->category_name}}
                         </option>
                        @endforeach
                    </select>

                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group">
                  <textarea class="summernote" placeholder="Write note here..."></textarea>
                </div>
              </div>
            </div>
            <div class="pull-right">
              <div class="btn-group">
                <a href="{{route('updates.index')}}" class="btn btn-info close-subview-button">
                  Close
                </a>
              </div>
              <div class="btn-group">
                <button class="btn btn-info save-new-event" type="submit">
                  Save
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div id="readFullEvent">
        <div class="noteWrap col-md-8 col-md-offset-2">
          <div class="row">
            <div class="col-md-12">
              <h2 class="event-title"></h2>
              <div class="btn-group options-toggle pull-right">
                <button class="btn dropdown-toggle btn-transparent-grey" data-toggle="dropdown">
                  <i class="fa fa-cog"></i>
                  <span class="caret"></span>
                </button>
                <ul role="menu" class="dropdown-menu dropdown-light pull-right">
                  <li>
                    <a href="#newFullEvent" class="edit-event">
                      <i class="fa fa-pencil"></i> Edit
                    </a>
                  </li>
                  <li>
                    <a href="#" class="delete-event">
                      <i class="fa fa-times"></i> Delete
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-6">
              <span class="event-category event-cancelled">Cancelled</span>
              <span class="event-allday"><i class='fa fa-check'></i> All-Day</span>
            </div>
            <div class="col-md-12">
              <div class="event-start">
                <div class="event-day"></div>
                <div class="event-date"></div>
                <div class="event-time"></div>
              </div>
              <div class="event-end"></div>
            </div>
            <div class="col-md-12">
              <div class="event-content"></div>
            </div>
          </div>
        </div>
      </div>
      <!-- end: SUBVIEW FOR CALENDAR PAGE -->
    </div>
      {{ HTML::script('assets/calendar/plugins/jQuery/jquery-2.1.1.min.js') }}
    {{ HTML::script('assets/calendar/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js') }}
    {{ HTML::script('assets/calendar/plugins/bootstrap/js/bootstrap.min.js') }}
    {{ HTML::script('assets/calendar/plugins/blockUI/jquery.blockUI.js') }}
    {{ HTML::script('assets/calendar/plugins/iCheck/jquery.icheck.min.js') }}
    {{ HTML::script('assets/calendar/plugins/moment/min/moment.min.js') }}
    {{ HTML::script('assets/calendar/plugins/perfect-scrollbar/src/jquery.mousewheel.js') }}
    {{ HTML::script('assets/calendar/plugins/perfect-scrollbar/src/perfect-scrollbar.js') }}
    {{ HTML::script('assets/calendar/plugins/bootbox/bootbox.min.js') }}
    {{ HTML::script('assets/calendar/plugins/jquery.scrollTo/jquery.scrollTo.min.js') }}
    {{ HTML::script('assets/calendar/plugins/ScrollToFixed/jquery-scrolltofixed-min.js') }}
    {{ HTML::script('assets/calendar/plugins/jquery.appear/jquery.appear.js') }}
    {{ HTML::script('assets/calendar/plugins/jquery-cookie/jquery.cookie.js') }}
    {{ HTML::script('assets/calendar/plugins/velocity/jquery.velocity.min.js') }}
    {{ HTML::script('assets/calendar/plugins/TouchSwipe/jquery.touchSwipe.min.js') }}
    <!-- end: MAIN JAVASCRIPTS -->
    <!-- start: JAVASCRIPTS REQUIRED FOR SUBVIEW CONTENTS -->
    {{ HTML::script('assets/calendar/plugins/jquery-mockjax/jquery.mockjax.js') }}
    {{ HTML::script('assets/calendar/plugins/toastr/toastr.js') }}
    {{ HTML::script('assets/calendar/plugins/bootstrap-modal/js/bootstrap-modal.js') }}
    {{ HTML::script('assets/calendar/plugins/bootstrap-modal/js/bootstrap-modalmanager.js') }}
    {{ HTML::script('assets/calendar/plugins/fullcalendar/fullcalendar/fullcalendar.min.js') }}
    {{ HTML::script('assets/calendar/plugins/bootstrap-switch/dist/js/bootstrap-switch.min.js') }}
    {{ HTML::script('assets/calendar/plugins/bootstrap-select/bootstrap-select.min.js') }}
    {{ HTML::script('assets/calendar/plugins/jquery-validation/dist/jquery.validate.min.js') }}
    {{ HTML::script('assets/calendar/plugins/bootstrap-fileupload/bootstrap-fileupload.min.js') }}
    {{ HTML::script('assets/calendar/plugins/DataTables/media/js/jquery.dataTables.min.js') }}
    {{ HTML::script('assets/calendar/plugins/DataTables/media/js/DT_bootstrap.js') }}
    {{ HTML::script('assets/calendar/plugins/truncate/jquery.truncate.js') }}
    {{ HTML::script('assets/calendar/plugins/summernote/dist/summernote.min.js') }}
    {{ HTML::script('assets/calendar/plugins/bootstrap-daterangepicker/daterangepicker.js') }}
    {{ HTML::script('assets/calendar/js/subview.js') }}
    {{-- HTML::script('assets/calendar/js/subview-examples.js') --}}
    <!-- end: JAVASCRIPTS REQUIRED FOR SUBVIEW CONTENTS -->
    <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    {{ HTML::script('assets/calendar/plugins/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}
    {{ HTML::script('assets/calendar/js/pages-calendar.js') }}
    {{ HTML::script('assets/calendar/css/import/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js') }}
    {{ HTML::script('assets/calendar/plugins/bootbox/bootbox.min.js') }}
    <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
    <!-- start: CORE JAVASCRIPTS  -->
    {{ HTML::script('assets/calendar/js/main.js') }}
    <!-- end: CORE JAVASCRIPTS  -->
    {{ HTML::script('assets/calendar/css/import/global/scripts/metronic.js') }}
    {{ HTML::script('assets/calendar/css/import/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}
    {{ HTML::script('assets/calendar/css/import/global/plugins/jquery.blockui.min.js') }}
    {{ HTML::script('assets/calendar/css/import/admin/layout/scripts/layout.js') }}
    {{ HTML::script('assets/js/app/angular.js') }}
    {{ HTML::script('assets/js/app/app.js') }}
    {{ HTML::script('assets/js/app/session.js') }}

          <script>
      jQuery(document).ready(function() {

           Layout.init(); // init layout
           Main.init();
          // SVExamples.init();
           Calendar.init();

          if($('div.page-sidebar ul').hasClass('page-sidebar-menu-closed')){

                  $('div.main-container').addClass('close-content');
           }
         $('DIV.menu-toggler.sidebar-toggler').click(function(){
           if(!$('div.page-sidebar ul').hasClass('page-sidebar-menu-closed')){

                  $('div.main-container').addClass('close-content');
           }else{
             $('div.main-container').removeClass('close-content');
           }
         });

        if (!jQuery().colorpicker) {
            return;
        }
        $('.colorpicker-default').colorpicker({
            format: 'hex'
        });
        $('.colorpicker-rgba').colorpicker();

        $("span.update-category,div.update-category").each(function() {
              $(this).attr('style', "border-left:2px solid "+$(this).data('color')+" !important;padding-left:10px");
        });

          $('#demo_3').click(function(){
                bootbox.confirm("Are you sure?", function(result) { alert("Confirm result: "+result);      });
          });
          $('.ttp').tooltip();
      });
      $(function(){

          $('[data-method]').append(function(){
              return "\n"+
              "<form id='f-"+$(this).attr('data-key')+"' action='"+$(this).attr('href')+"' method='POST' style='display:none'>\n"+
              "   <input type='hidden' name='_method' value='"+$(this).attr('data-method')+"'>\n"+
              "   <input type='hidden' name='archived' value='true'>\n"+
              "   <input type='hidden' name='id' value='"+$(this).attr('data-key')+"'>\n"+
              "</form>\n"
          })
          .removeAttr('href')
          .attr('style','cursor:pointer;')
          .attr('onclick','_confirm($(this).attr("data-confirm"),$(this).attr("data-key"))');
      });
      function _confirm(msg,id) {
            bootbox.confirm(msg,function(result){  if(result)$('#f-'+id).submit(); });
      }
      function getCategoryName (id) {
          var data =JSON.parse('<?php echo $updatesCategory;?>');
          for(var i=0;i<data.length;i++){
             if(data[i].id == id) return data[i].category_name;
          }
         return 'Generic';
      }
      </script>
    <script>
           $.ajax({
            url:'get-updates',
            method:'post',
            data:{
              _token:$('input[name=_token]').val()
            },

            success:function(data){
              Session.unset('updates');
              Session.set('updates',data);
              // console.log(data[2].update_classname[0].category_color);
            }
          });

    </script>

  </body>

</html>