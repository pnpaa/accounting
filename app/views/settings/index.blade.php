@extends('template.main')
@section('css')
{{HTML::style('assets/dashboard/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}
@stop
@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
  PNPAA Transaction Settings
</h3>
<div class="page-bar">
  <ul class="page-breadcrumb">
    <li>
      <i class="fa fa-home"></i>
      <a href="{{route('dashboard')}}">Home</a>
      <i class="fa fa-angle-right"></i>
    </li>
    <li>
      Settings
    </li>
  </ul>
{{--   <div class="page-toolbar">
    <div class="btn-group pull-right">
      <button type="button" class="btn btn-fit-height default dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
      Actions <i class="fa fa-angle-down"></i>
      </button>
      <ul class="dropdown-menu pull-right" role="menu">
        <li>
          <a   href="#" onClick ="$('#settingsTable').tableExport({type:'excel',escape:'false'});" >Save as Excel</a>
        </li>
        <li>
          <a href="#" onClick ="$('#settingsTable').tableExport({type:'pdf',pdfFontSize:'7',escape:'false'});">Save as Pdf</a>
        </li>
      </ul>
    </div>
  </div> --}}
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
@if (Session::has('info'))
<div class="note note-success">
  <h4 class="block">{{Session::get('info')}}</h4>
  <p>
    {{ Session::get('data')['transaction_purpose'] }} which is   {{ Session::get('data')['transaction_amount'] }} has been successfully added.
  </p>
</div>
@endif
@if (Session::has('error'))
<div class="note note-danger">
  <h4 class="block">{{Session::get('error')}}</h4>
  <p>
    Incorrect captcha. Please retry.
  </p>
</div>
@endif
<div class="row">
  <div class="col-md-4">
    <!-- BEGIN PAGE CONTENT-->
    <div class="portlet box grey">
      <div class="portlet-title">
        <div class="caption">
          <i class="fa fa-gift"></i>Add Transaction
        </div>
      </div>
      <div class="portlet-body form">
        <!-- BEGIN FORM-->
        <form action="{{{route('settings.store')}}}" method="post" class="form-horizontal form-row-sepe" id="add_settings">
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3">Enter the Code</label>
              <div class="col-md-4">
                <!-- BEGIN REPCAPTCHA -->
                <script type="text/javascript">
                  var RecaptchaOptions = {
                     theme : 'custom',
                     custom_theme_widget: 'recaptcha_widget'
                  };
                </script>
                <div id="recaptcha_widget" style="display:none">
                  <div id="recaptcha_image" class="img-thumbnail-2" style="width:325px!important;height: auto!important;"></div>
                  <div class="recaptcha_only_if_incorrect_sol" style="color:red">Incorrect please try again</div>
                  <span class="recaptcha_only_if_image"></span><br/>
                  <span class="recaptcha_only_if_audio"></span>
                  <div class="input-group" style="width:325px;padding-top: 10px;">
                    <input type="text" id="recaptcha_response_field" class="form-control" name="recaptcha_response_field" />
                    <span class="input-group-addon"><a href="javascript:Recaptcha.reload()"><i class="fa fa-refresh"></i></a></span>
                    <span class="input-group-addon recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')"><i title="Get an audio CAPTCHA" class="fa fa-headphones"></i></a></span>
                    <span class="input-group-addon recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')"><i class="fa fa-file-image-o"></i></a></span>
                    <span class="input-group-addon"><a href="javascript:Recaptcha.showhelp()"><i class="fa fa-question-circle"></i></a></span>
                  </div>
                </div>
               <script type="text/javascript"
                                              src="http://www.google.com/recaptcha/api/challenge?k=6Ldk3wETAAAAAJgDD9iXorElxMn2zXMVAKxIbiA6"></script>
                                            <noscript>
                                              <iframe src="http://www.google.com/recaptcha/api/noscript?k=6Ldk3wETAAAAAJgDD9iXorElxMn2zXMVAKxIbiA6"
                                                height="300" width="500" frameborder="0"></iframe><br>
                                              <textarea name="recaptcha_challenge_field" rows="3" cols="40">
                                              </textarea>
                                              <input type="hidden" name="recaptcha_response_field"
                                                value="manual_challenge">
                                            </noscript>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Amount</label>
              <div class="col-md-9">
                <input type="text" class="form-control" name="transaction_amount">
                <span class="help-block">
                </span>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Purpose</label>
              <div class="col-md-9">
                <textarea class="form-control" name="transaction_purpose"></textarea>
                <span class="help-block">
                </span>
              </div>
            </div>
          </div>
          <div class="form-actions">
            <div class="row">
              <div class="col-md-offset-3 col-md-9">
                <button type="submit" class="btn green-meadow"><i class="fa fa-check"></i> Add</button>
                <button type="button" class="btn default">Cancel</button>
              </div>
            </div>
          </div>
          {{Form::token()}}
        </form>
        <!-- END FORM-->
      </div>
    </div>
  </div>
  <div class="col-md-8" ng-app="settingsApp">
    <div ng-controller="settingsController">
      <table class="table table-bordered" id="settingsTable" >
        <thead>
          <tr>
            <th>Purpose</th>
            <th>Amount</th>
            <th style="width: 25%;" class="no-sort">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($settings as $setting)
          <tr class="r-{{$setting->id}}">
            <td class="p-{{$setting->id}}">{{{$setting->transaction_purpose}}}</td>
            <td class="a-{{$setting->id}}">{{{$setting->transaction_amount}}}</td>
            <td><button class="btn green-meadow" ng-click="edit({{$setting->id}})">Edit</button>
              <button class="btn btn-danger" ng-click="delete({{$setting->id}})">Delete</button>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <!-- Modal -->
      <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel">
                Confirm Delete
              </h4>
            </div>
            <div class="modal-body">
              <p>Are you sure to delete this item?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" ng-click="destroy()">Save changes</button>
            </div>
          </div>
        </div>
      </div>
      <!------------------------------------------- -->
      <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel">Editing Transaction Settings</h4>
            </div>
            <form action="#" role="form" id="edit_settings_form" onsubmit="return false;">
              <div class="modal-body">
                <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                      <label for="">Purpose</label>
                      <textarea name="m_purpose" class="form-control" value="[[ purpose ]]"></textarea>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="form-group">
                      <label for="">Amount</label>
                      <input type="text"  class="form-control" name="m_amount" value="[[ amount ]]" ></input>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" ng-click="save()">Save changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END PAGE CONTENT -->
@stop
@section('script')
<!-- BEGIN PAGE LEVEL PLUGINS -->
{{ HTML::script('assets/dashboard/global/plugins/datatables/media/js/jquery.dataTables.min.js') }}
{{ HTML::script('assets/dashboard/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js') }}
{{ HTML::script('assets/js/jquery.validation.min.js') }}
{{ HTML::script('assets/js/custom-validation.js') }}
{{ HTML::script('assets/js/export/tableExport.js') }}
{{ HTML::script('assets/js/export/jquery.base64.js') }}
{{ HTML::script('assets/js/export/html2canvas.js') }}
{{ HTML::script('assets/js/export/jspdf/libs/sprintf.js') }}
{{ HTML::script('assets/js/export/jspdf/jspdf.js') }}
{{ HTML::script('assets/js/export/jspdf/libs/base64.js') }}
<script>
  jQuery(document).ready(function() {
   $('#settingsTable').dataTable({
    "aoColumnDefs":[{
      "bSortable":false,
      "aTargets":['no-sort']
    }]
   });
  });
   function saveSettings (id,purpose,amount) {
   	 $.ajax({
         url:'{{{route('settings.update')}}}',
         method:'PUT',
         data:{id:id,transaction_purpose:purpose,transaction_amount:amount},
         success : function(data) {
  			console	.log(data);
         },
         beforeSend:function(data){
         	    // $.blockUI({
              //         message : '<i class="fa fa-spinner fa-spin"></i> Do some ajax to sync with backend...'
              // });
         }
   	 });

   }
   function destroySettings (id) {
   	//alert(id);
   	$.ajax({
   		url:'{{{route('settings.update')}}}',
   		method:'PUT',
   		data:{id:id,archived:true},
   		success:function(data){
   			console.log(data);
   		}

   	});
   }
</script>
@stop