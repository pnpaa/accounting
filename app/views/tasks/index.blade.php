@extends('template.main')

@section('css')
     {{HTML::style('assets/css/theme-default.css')}}
     <!-- BEGIN PAGE LEVEL STYLES -->
    {{HTML::style('assets/dashboard/global/plugins/select2/select2.css')}}
    <!-- BEGIN THEME STYLES -->
    {{HTML::style('assets/dashboard/global/css/components.css')}}
    {{HTML::style('assets/dashboard/global/css/plugins.css')}}
    {{HTML::style('assets/dashboard/global/plugins/bootstrap-datepicker/css/datepicker3.css')}}

    {{--HTML::style('assets/dashboard/global/plugins/bootstrap-datetimepicker/css/datetimepicker.css')--}}

    <style type="text/css">
     .task-content:hover{cursor: pointer;cursor: hand;}
    </style>

@stop
@section('content')
            <!-- BEGIN PAGE HEADER-->
            <h3 class="page-title">
            PNPAA Tasks
            </h3>
            <div class="page-bar">
                <ul class="page-breadcrumb">
                    <li>
                        <i class="fa fa-home"></i>
                        <a href="{{{route('dashboard')}}}">Home</a>
                        <i class="fa fa-angle-right"></i>
                    </li>

                    <li class="active">
                         Tasks
                    </li>
                </ul>
            </div>
            <!-- END PAGE HEADER-->
              <div ng-app="taskApp">
                <div ng-controller="taskAppController">
              <!-- START CONTENT FRAME -->
                <div class="content-frame">
                    <!-- START CONTENT FRAME TOP -->
                    <div class="content-frame-top">
                      <div class="pull-right">
                            <button class="btn btn-default content-frame-left-toggle"><span class="fa fa-bars"></span></button>
                        </div>
                        <div class="pull-right" style="width: 100px; margin-right: 5px;">
                            <select class="form-control select task-filter">
                                <option value="task-all">All</option>
                                <option value="task-primary">Generic</option>
                                <option value="task-warning">Work</option>
                                <option value="task-info">Project</option>
                                <option value="task-success">Personal</option>
                            </select>
                        </div>

                    </div>
                    <div class="content-frame-left">
                       <form action="#" method="post" onsubmit="return false;" id="add-new-task">

                       <div class="form-group">
                            <h4>Task name:</h4>
                            <input type="text" name="new_task_name" value="" class="form-control" placeholder="Your task text name...">
                       </div>
                        <div class="form-group">
                            <h4>Task description:</h4>
                            <textarea class="form-control push-down-10" name="new_task_desc" id="new_task_desc" rows="4" placeholder="Your task text details..."></textarea>
                       </div>
                        <div class="form-group">
                         @if (Auth::user()->role == 1)
                            <h4>Assigned to:</h4>
                             <select class="form-control select2me" name="user_id" data-placeholder="Select...">
                                                <option value="" disabled selected>Select</option>
                                                @foreach($users as $user)
                                                <option value="{{{$user->id}}}">{{{$user->last_name}}} , {{{$user->first_name}}}</option>
                                                @endforeach
                             </select>
                          @else
                            <input type="hidden" name="user_id" value="{{{Auth::user()->id}}}">
                          @endif
                        </div>
                     <div class="form-group">
                                          <h4>Date due:</h4>

                            <input class="form-control  date-picker"  name="due_date" type="text" value="">


                       </div>

                      <!--   <div class="form-group">
                                          <h4>Date due:</h4>
                                            <div class="input-group date form_datetime">
                                                <input type="text" size="16" readonly="" name="due_date" class="form-control"/>
                                                <span class="input-group-btn">
                                                <button class="btn default date-set" type="button"><i class="fa fa-calendar"></i></button>
                                                </span>
                                            </div>


                       </div> -->
                       <div class="form-group">
                            <h4>Task groups:</h4>
                            <select name="task_group" class="form-control select2me" placeholder="Select task group..">
                                                <option value="" disabled selected>Select</option>

                                <option value="task-primary">Generic</option>
                                <option value="task-warning">Work</option>
                                <option value="task-info">Project</option>
                                <option value="task-success">Personal</option>

                            </select>
                         </div>
                        <div class="form-group">
                            <span class="label label-primary">Generic</span>
                            <span class="label label-warning">Work</span>
                            <span class="label label-info">Project</span>
                            <span class="label label-success">Personal</span>
                        </div>
                       <div class="form-group">
                            <button class="btn btn-primary" type="submit" id="add_new_task"><span class="fa fa-edit"></span> Add</button>
                            {{Form::token()}}
                        </div>

                    </div>
                    <!-- END CONTENT FRAME TOP -->

                    <!-- START CONTENT FRAME BODY -->
                    <div class="content-frame-body">

                        <div class="row push-up-10">
                            <div class="col-md-4">

                                <h3>To-do List</h3>

                                <div class="tasks" id="tasks">
                                    @foreach($my_tasks as $task)
                                     @if($task->task_status == 0)
                                     <input type="hidden" id="to-do-title-{{$task->id}}" ng-model="title" value="{{$task->task_title}}" >
                                     <input type="hidden" id="to-do-content-{{$task->id}}" ng-model="content" value="{{$task->task_content}}" >
                                     <input type="hidden" id="to-do-due-{{$task->id}}" ng-model="due" value="{{$task->task_due}}" >
                                     <input type="hidden" id="to-do-group-{{$task->id}}" ng-model="group" value="{{$task->task_group}}" >
                                     <input type="hidden" id="to-do-assign-{{$task->id}}" ng-model="assign" value="{{$task->task_assign}}" >
                                       <div class="task-item {{{$task->task_group}}}" ng-click="updateModal({{$task->id}} )" data-group="{{{$task->task_group}}}"  data-id="{{{$task->id}}}">
                                            <div class="task-title"><h3>{{{$task->task_title}}}</h3></div>
                                            <div class="task-content"><p>{{{$task->task_content}}}</p></div>
                                             <h4 class="pull-right task-assign"><span class="label label-primary" data-user="{{{$task->task_assign}}}">{{{getUserName($task->task_assign,true)}}}</span></h4>
                                            <div class="task-footer">
                                                <div class="pull-left task-due" data-date="{{{$task->task_due}}}"><span class="fa fa-clock-o"></span> {{{dateTime($task->task_due,true)}}}</div>
                                            </div>
                                        </div>
                                     @endif
                                  @endforeach
                                   @foreach($tasks as $task)
                                     @if($task->task_status == 0)
                                     <input type="hidden" id="to-do-title-{{$task->id}}" ng-model="title" value="{{$task->task_title}}" >
                                     <input type="hidden" id="to-do-content-{{$task->id}}" ng-model="content" value="{{$task->task_content}}" >
                                     <input type="hidden" id="to-do-due-{{$task->id}}" ng-model="due" value="{{$task->task_due}}" >
                                     <input type="hidden" id="to-do-group-{{$task->id}}" ng-model="group" value="{{$task->task_group}}" >
                                     <input type="hidden" id="to-do-assign-{{$task->id}}" ng-model="assign" value="{{$task->task_assign}}" >
                                       <div class="task-item {{{$task->task_group}}}" ng-click="updateModal({{$task->id}} )" data-group="{{{$task->task_group}}}"  data-id="{{{$task->id}}}">
                                            <div class="task-title"><h3>{{{$task->task_title}}}</h3></div>
                                            <div class="task-content"><p>{{{$task->task_content}}}</p></div>
                                             <h4 class="pull-right task-assign"><span class="label label-primary" data-user="{{{$task->task_assign}}}">{{{getUserName($task->task_assign,true)}}}</span></h4>
                                            <div class="task-footer">
                                                <div class="pull-left task-due" data-date="{{{$task->task_due}}}"><span class="fa fa-clock-o"></span> {{{dateTime($task->task_due,true)}}}</div>
                                            </div>
                                        </div>
                                     @endif
                                  @endforeach
                               </div>

                            </div>
                            <div class="col-md-4">
                                <h3>In Progress</h3>
                                <div class="tasks" id="tasks_progreess">

                              @foreach($tasks as $task)
                                     @if($task->task_status == 1)
                                       <input type="hidden" id="to-do-title-{{$task->id}}" ng-model="title" value="{{$task->task_title}}" >
                                     <input type="hidden" id="to-do-content-{{$task->id}}" ng-model="content" value="{{$task->task_content}}" >
                                     <input type="hidden" id="to-do-due-{{$task->id}}" ng-model="due" value="{{$task->task_due}}" >
                                     <input type="hidden" id="to-do-group-{{$task->id}}" ng-model="group" value="{{$task->task_group}}" >
                                     <input type="hidden" id="to-do-assign-{{$task->id}}" ng-model="assign" value="{{$task->task_assign}}" >

                                       <div class="task-item {{{$task->task_group}}}"   ng-click="updateModal({{$task->id}} )" data-group="{{{$task->task_group}}}" data-id="{{{$task->id}}}">
                                            <div class="task-title"><h3>{{{$task->task_title}}}</h3></div>
                                            <div class="task-content"><p>{{{$task->task_content}}}</p></div>
                                             <h4 class="pull-right task-assign"><span class="label label-primary">{{{getUserName($task->task_assign,true)}}}</span></h4>
                                            <div class="task-footer">
                                                <div class="pull-left task-due"><span class="fa fa-clock-o"></span> {{{dateTime($task->task_due,true)}}}</div>
                                            </div>
                                        </div>
                                     @endif
                                  @endforeach

                                    <div class="task-drop push-down-10">
                                        <span class="fa fa-cloud"></span>
                                        Drag your task here to start it tracking time
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <h3>Completed</h3>
                                <div class="tasks" id="tasks_completed">
                                 @foreach($tasks as $task)
                                     @if($task->task_status == 2)
                                       <input type="hidden" id="to-do-title-{{$task->id}}" ng-model="title" value="{{$task->task_title}}" >
                                     <input type="hidden" id="to-do-content-{{$task->id}}" ng-model="content" value="{{$task->task_content}}" >
                                     <input type="hidden" id="to-do-due-{{$task->id}}" ng-model="due" value="{{$task->task_due}}" >
                                     <input type="hidden" id="to-do-group-{{$task->id}}" ng-model="group" value="{{$task->task_group}}" >
                                     <input type="hidden" id="to-do-assign-{{$task->id}}" ng-model="assign" value="{{$task->task_assign}}" >

                                       <div class="task-item {{{$task->task_group}}}"  ng-click="updateModal({{$task->id}} )" data-group="{{{$task->task_group}}}"  data-id="{{{$task->id}}}" >
                                         <div class="task-title" ><h3>{{{$task->task_title}}}</h3></div>
                                            <div class="task-content"><p>{{{$task->task_content}}}</p></div>
                                             <h4 class="pull-right task-assign"><span class="label label-primary">{{{getUserName($task->task_assign,true)}}}</span></h4>
                                            <div class="task-footer">
                                                <div class="task-due"><span class="fa fa-clock-o pull-left"></span> {{{dateTime($task->task_due,true)}}}  </div>
                                            </div>
                                        </div>
                                     @endif
                                  @endforeach
                                    <div class="task-drop">
                                        <span class="fa fa-cloud"></span>
                                        Drag your task here to finish it
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  <!-- END CONTENT FRAME BODY -->
                </div>
             <!-- END CONTENT FRAME -->
             <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Task</h4>
                      </div>
                      <div class="modal-body" >
                       <form action="#"  id="task_view" accept-charset="utf-8">
                           <div class="form-group">
                               <h4>Task Name</h4>
                                <input type="text" name="m_task_title" value="[[ task_title ]]" class="form-control"  >
                           </div>
                           <div class="form-group">
                                  <h4>Task Details</h4>
                                  <textarea class="form-control" name="m_task_content">[[ task_content ]]</textarea>
                           </div>
                           <div class="form-group">
                                  <h4>Task Due</h4>
                                  <input type="text" name="m_task_due" class="date-picker form-control">
                                 <!--   <div class="input-group date form_datetime">
                                                <input type="text" size="16" readonly="" value="[[task_due]]" name="m_task_due" class="form-control"/>
                                                <span class="input-group-btn">
                                                <button class="btn default date-set" type="button"><i class="fa fa-calendar"></i></button>
                                                </span>
                                  </div> -->
                           </div>
                            <div class="form-group">
                                @if (Auth::user()->role == 1)
                                    {{-- expr --}}
                                     <h4>Task Assign</h4>
                                         <select class="form-control select2me" value="[[task_assign]]" name="m_task_assign" data-placeholder="Select...">
                                            @foreach($users as $user)
                                            <option value="{{{$user->id}}}">{{{$user->last_name}}} , {{{$user->first_name}}}</option>
                                            @endforeach
                                         </select>
                                @else
                                   <input type="hidden" name="m_task_assign" value="{{Auth::user()->id}}">

                                @endif

                            </div>
                           <div class="form-group">
                            <h4>Task groups:</h4>
                            <select name="m_task_group" value="[[task_group]]" class="form-control select2me" placeholder="Select task group..">
                                <option value="task-all">All</option>
                                <option value="task-primary">Generic</option>
                                <option value="task-warning">Work</option>
                                <option value="task-info">Project</option>
                                <option value="task-success">Personal</option>

                            </select>
                            <input type="hidden" name="m_id"  value="[[id]]">
                         </div>
                       </form>
                         <div class="form-group">
                            <h4>Action:</h4>
                            <button type="button" class="btn btn-primary task-btn-submit">Save changes</button>
                            <button class="btn btn-danger task-archived">Archived</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                         </div>
                      </div>

                    </div>
                  </div>
                </div>
               </div>
              </div>
@stop
@section('script')
    <!-- START SCRIPTS -->
        <!-- START THIS PAGE PLUGINS-->
      {{ HTML::script('assets/js/plugins/icheck/icheck.min.js') }}
       {{ HTML::script('assets/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js') }}

       {{ HTML::script('assets/js/plugins/moment.min.js') }}
       {{ HTML::script('assets/js/plugins/bootstrap/bootstrap-select.js') }}
        <!-- END THIS PAGE PLUGINS-->

        <!-- START TEMPLATE -->
 <!--      {{ HTML::script('assets/js/plugins/settings.js') }} -->
       {{ HTML::script('assets/js/plugins/plugins.js') }}
       {{ HTML::script('assets/js/plugins/actions.js') }}
       {{ HTML::script('assets/js/plugins/demo_tasks.js') }}
        <!-- END TEMPLATE -->

     {{ HTML::script('assets/dashboard/global/scripts/metronic.js') }}
     {{ HTML::script('assets/dashboard/admin/layout/scripts/layout.js') }}
     {{-- HTML::script('assets/dashboard/admin/layout/scripts/quick-sidebar.js') --}}
     {{ HTML::script('assets/dashboard/global/plugins/select2/select2.min.js') }}
     {{ HTML::script('assets/dashboard/admin/pages/scripts/components-dropdowns.js') }}
 {{-- HTML::script('assets/dashboard/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') --}}
{{ HTML::script('assets/dashboard/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}

   {{ HTML::script('assets/dashboard/admin/pages/scripts/components-pickers.js') }}



    <script>
    jQuery(document).ready(function() {
       Metronic.init();
       Layout.init(); // init layout
      // QuickSidebar.init(); // init quick sidebar
       ComponentsDropdowns.init();
   $('.task-filter').change(function(){
       var group=$(this).val();
       $('.task-item').each(function(){
           ($(this).data('group') == group)?$(this).removeClass('hidden'):$(this).addClass('hidden');
           if(group == 'task-all')$(this).removeClass('hidden');
       });

   });
  if (jQuery().datepicker) {
       $('.date-picker').datepicker({
           rtl: Metronic.isRTL(),
           orientation: "left",
           autoclose: true
       });

   }

        //  $(".form_datetime").datetimepicker({
        //     autoclose: true,
        //     isRTL: Metronic.isRTL(),
        //     format: "dd MM yyyy - hh:ii",
        //     pickerPosition: (Metronic.isRTL() ? "bottom-right" : "bottom-left")
        // });


       $('.task-btn-submit').click(function(event) {
              if (isValid()) {
                $.ajax({
                    url: '{{{route('tasks.update')}}}',
                    method: 'put',
                    data: {
                        id: $('input[name=m_id]').val(),
                        task_title: $('input[name=m_task_title]').val(),
                        task_content:  $('textarea[name=m_task_content]').val(),
                        task_assign: $('select[name=m_task_assign]').val(),
                        task_due: $('input[name=m_task_due]').val(),
                        task_group:  $('select[name=m_task_group]').val(),
                    },
                    success:function(data){
                        $('#myModal').modal('hide');
                        var div=$('div').find("[data-id="+$('input[name=m_id]').val()+"]");
                        div.find('div.task-title h3').html(data.data.task_title);
                        div.find('div.task-content p').html(data.data.task_content);
                        div.find('h4.task-assign span').html(data.data.task_assign);
                        div.find('div.task-footer div.task-due').html('<span class="fa fa-clock-o"></span>'+  data.data.task_due.date  );

                    }
                });
             }
         });
      });
     $('.task-archived').click(function(event) {
             var id=($('input[name=m_id]').val());
             $.ajax({
                    url: '{{{route('tasks.update')}}}',
                    method: 'put',
                    data: {
                        id: id,archived:true
                    },
                    success:function(data){
                        console.log(data);
                        $('#myModal').modal('hide');
                        $('div').find("[data-id="+id+"]").remove();
                    }
                });
     });

$('.date-picker1').change(function(event) {
    var date1=new Date($(this).val());
    var date2=new Date();
    if(date1 < date2 ){
        $(this).parent('div').addClass('has-error');
        $(this).next('span').remove();
        $(this).parent('div').append('<span id="due_date-error" class="error help-block">D ni pwede na date mn nwa tarong .</span>');
    }else{
        $(this).parent('div').removeClass('has-error');
        $(this).next('span').remove();
    }

    // console.log(new Date($(this).val()));
    // console.log($(this).val());
    // console.log(new Date());
  console.log(date1 < date2);
});

function isValid(argument) {

 var valid=false;
 $('input[name=m_task_title]').blur(function(event) {
    $('input[name=m_task_title]').parent('div').removeClass('has-error');
    $('input[name=m_task_title]').next('span').remove();
 });
  $('[name=m_task_content]').blur(function(event) {
    $('[name=m_task_content]').parent('div').removeClass('has-error');
    $('[name=m_task_content]').next('span').remove();
 });
    $('[name=m_task_due]').blur(function(event) {
    $('[name=m_task_due]').parent('div').removeClass('has-error');
    $('[name=m_task_due]').next('span').remove();
 });
 if (($('input[name=m_task_title]').val()).length>0) {
   valid=true;
   $('input[name=m_task_title]').parent('div').removeClass('has-error');
    $('input[name=m_task_title]').next('span').remove();

 }else{
   valid=false;
  $('input[name=m_task_title]').parent('div').addClass('has-error');
  var error='<span class="help-block has-error">This feild is required</span>';
    $('[name=m_task_title]').next('span').remove();

   $('input[name=m_task_title]').parent('div').append(error);
  console.log('here');
 };
  if (($('[name=m_task_content]').val()).length>0) {
   valid=true;
   $('[name=m_task_content]').parent('div').removeClass('has-error');
    $('[name=m_task_content]').next('span').remove();

 }else{
   valid=false;
  $('[name=m_task_content]').parent('div').addClass('has-error');
  var error='<span class="help-block has-error">This feild is required</span>';
    $('[name=m_task_content]').next('span').remove();

   $('[name=m_task_content]').parent('div').append(error);
  console.log('here');
 };
   if (validDate($('[name=m_task_due]').val())) {
   valid=true;
   $('[name=m_task_due]').parent('div').removeClass('has-error');
    $('[name=m_task_due]').next('span').remove();

 }else{
   valid=false;
  $('[name=m_task_due]').parent('div').addClass('has-error');
  var error='<span class="help-block has-error">Invalid Date</span>';
    $('[name=m_task_due]').next('span').remove();

   $('[name=m_task_due]').parent('div').append(error);
  console.log('here');
 };

return valid;

}
 function validDate(value) {
           var date1=new Date(value);
           var date2=new Date();
           if(date1 > date2 )return true;
        }
    </script>
    <!-- END SCRIPTS -->

@stop
