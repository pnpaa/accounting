@extends('template.main')
@section('css')
{{HTML::style('assets/dashboard/global/plugins/select2/select2.css')}}
{{HTML::style('assets/dashboard/global/css/components.css')}}
{{HTML::style('assets/dashboard/global/css/plugins.css')}}
{{HTML::style('assets/dashboard/global/plugins/bootstrap-datepicker/css/datepicker3.css')}}
@stop
@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
 PNPAA Transactions
</h3>
<div class="page-bar">
  <ul class="page-breadcrumb">
    <li>
      <i class="fa fa-home"></i>
      <a href="{{{route('dashboard')}}}">Home</a>
      <i class="fa fa-angle-right"></i>
    </li>
    <li class="active">
      Create Transaction
    </li>
  </ul>
  <div class="page-toolbar">
  </div>
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
@if (Session::has('info'))
<div class="note note-success">
  <h4 class="block">{{Session::get('info')}}</h4>
  <p>
    {{getUserName(Session::get('data')['user_id'],true)}} has paid {{Session::get('data')['transaction_purpose']}} which is {{Session::get('data')['transaction_amount']}}. Receipt will be received through email.
  </p>
</div>
@endif
@if (Session::has('error'))
<div class="note note-danger">
  <h4 class="block">{{Session::get('error')}}</h4>
  <p>
    type the code correctly
  </p>
</div>
@endif
<div class="portlet box grey" ng-app="paymentApp">
  <div class="portlet-title">
    <div class="caption">
      <i class="icon-briefcase"></i>Create Transaction
    </div>
  </div>
  <div class="portlet-body form" ng-controller="paymentController">
    <!-- BEGIN FORM-->
    <form action="{{{route('transaction.store')}}}" method="post" class="form-horizontal form-row-sepe" id="pay">
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
          <label class="control-label col-md-3">Alumni Name</label>
          <div class="col-md-4">
            <select class="form-control select2me" name="user_id" data-placeholder="Select...">
              @foreach($users as $user)
              <option value="{{{$user->id}}}">{{{$user->last_name}}} , {{{$user->first_name}}}</option>
              @endforeach
            </select>
            <span class="help-block">
            </span>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3">Purpose</label>
          <div class="col-md-4">
            <select name="transaction_purpose" ng-model="test" ng-change="updateAmount()"   class="form-control select2me" required="required">
              <option   ng-repeat="transaction in transactions" value="[[ transaction.id ]]">[[ transaction.transaction_purpose ]]</option>
            </select>
            <span class="help-block">
            </span>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-md-3">Amount</label>
          <div class="col-md-4">
            <input type="text" name="transaction_amount" id="input" class="form-control" value="[[  amount  ]]">
            <span class="help-block">
            </span>
          </div>
        </div>
        <div class="form-group">
          <div class="col-md-3"></div>
          <div class="col-md-4">
            <div class="checkbox">
              <label>
              <input type="checkbox" value="" name="pay_check_box">
              Payment for other months
              </label>
            </div>
          </div>
        </div>
        <div class="form-group input-date">
          <label class="control-label col-md-3">Date</label>
          <div class="col-md-3">
            <input class="form-control form-control-inline input-medium date-picker" size="16" name="transaction_date" type="text" value="">
          </div>
        </div>
      </div>
      <div class="form-actions">
        <div class="row">
          <div class="col-md-offset-3 col-md-9">
            <button type="submit" class="btn green-meadow"><i class="fa fa-check"></i> Paid</button>
            <button type="button" class="btn default">Cancel</button>
          </div>
        </div>
      </div>
      {{ Form::token()}}
    </form>
    <!-- END FORM-->
  </div>
</div>
@stop
@section('script')
{{ HTML::script('assets/dashboard/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}
{{ HTML::script('assets/dashboard/global/plugins/select2/select2.min.js') }}
{{ HTML::script('assets/dashboard/global/scripts/metronic.js') }}
{{ HTML::script('assets/dashboard/admin/pages/scripts/components-dropdowns.js') }}
{{ HTML::script('assets/dashboard/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}
{{ HTML::script('assets/js/jquery.validation.min.js') }}
{{ HTML::script('assets/js/custom-validation.js') }}
<script>
  jQuery(document).ready(function() {
      Metronic.init();
      ComponentsDropdowns.init();
   if (jQuery().datepicker) {
       $('.date-picker').datepicker({
           rtl: Metronic.isRTL(),
           orientation: "left",
           autoclose: true
       });

   }
     $('.input-date').hide();
     $('input[name=pay_check_box]').change(function(event) {
       	 (!$(this).parent('span').hasClass('checked'))? $('.input-date').show():$('.input-date').hide();
     });

  });
  $.ajax({
    	url:'../getTransactions',
    	method:'post',
    	success:function(data){
    		Session.set('transactions',data);
    	}
  });
</script>
@stop