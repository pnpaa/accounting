@extends('template.main')
@section('css')
 <!-- BEGIN PAGE LEVEL STYLES -->
 {{HTML::style('assets/dashboard/global/plugins/select2/select2.css')}}
@stop
@section('content')
<br/>
<br/>
<br/>
			<!-- BEGIN PAGE CONTENT-->
				<div class="portlet box blue">
					   <div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Add Transaction
							 </div>

					 	 </div>
						<div class="portlet-body form">
							<!-- BEGIN FORM-->
							<form action="{{{route('settings.store')}}}" method="post" class="form-horizontal form-row-sepe">
								<div class="form-body">
							        <div class="form-group">
										<label class="control-label col-md-3">Enter the code</label>
										<div class="col-md-9">
											<!-- BEGIN REPCAPTCHA -->
										 <div id="recaptcha_widget" class="form-recaptcha recaptcha_nothad_incorrect_sol recaptcha_isnot_showing_audio">
												<div class="form-recaptcha-img" style="width: 325px">
													<a id="recaptcha_image" href="#" style="width: 300px; height: 57px;"><img id="recaptcha_challenge_image" alt="reCAPTCHA challenge image" height="57" width="300" src="https://www.google.com/recaptcha/api/image?c=03AHJ_VutJKFGQBO5FQqbj8coe65H_lah2CfC53PYG_dZnxQ6st6FcYLRmOQYFvC-iZ_ctLep_HN-KVwRWsWCVnWA43o_YP-m5FeUpxpwMdOgBiUwfIEkBgsF_rd9Yfe0vCgNwA6iKz-v02ZGgXopvEvOtRw26xRGw5zbdc1os__okJlkpwIhvML8cdHfvy2K4g9kTRZZIzvRTfsMo-y5TH8RqzZMBNTX89HaqEFUYUWWCsvC7AqdZCPbW-vEx_wQgQ1CPlidSARhI3SE6OKTFCpyIKjwlqdmmlg"></a>
													<div class="recaptcha_only_if_incorrect_sol display-none" style="color:red">
														 Incorrect please try again
													</div>
												</div>
												<div class="input-group" style="width: 325px">
													<span id="recaptcha_challenge_field_holder" style="display: none;"><input type="hidden" name="recaptcha_challenge_field" id="recaptcha_challenge_field" value="03AHJ_VutJKFGQBO5FQqbj8coe65H_lah2CfC53PYG_dZnxQ6st6FcYLRmOQYFvC-iZ_ctLep_HN-KVwRWsWCVnWA43o_YP-m5FeUpxpwMdOgBiUwfIEkBgsF_rd9Yfe0vCgNwA6iKz-v02ZGgXopvEvOtRw26xRGw5zbdc1os__okJlkpwIhvML8cdHfvy2K4g9kTRZZIzvRTfsMo-y5TH8RqzZMBNTX89HaqEFUYUWWCsvC7AqdZCPbW-vEx_wQgQ1CPlidSARhI3SE6OKTFCpyIKjwlqdmmlg"></span><input type="text" class="form-control" id="recaptcha_response_field" name="recaptcha_response_field" autocomplete="off">
													<div class="input-group-btn">
														<a class="btn default" href="javascript:Recaptcha.reload()">
														<i class="fa fa-refresh"></i>
														</a>
														<a class="btn default recaptcha_only_if_image" href="javascript:Recaptcha.switch_type('audio')">
														<i title="Get an audio CAPTCHA" class="fa fa-headphones"></i>
														</a>
														<a class="btn default recaptcha_only_if_audio" href="javascript:Recaptcha.switch_type('image')">
														<i title="Get an image CAPTCHA" class="fa fa-picture-o"></i>
														</a>
														<a class="btn default" href="javascript:Recaptcha.showhelp()">
														<i class="fa fa-question-circle"></i>
														</a>
													</div>
												</div>
												<p class="help-block">
													<span class="recaptcha_only_if_image">
													Enter the words above </span>
													<span class="recaptcha_only_if_audio">
													Enter the numbers you hear </span>
												</p>
											</div>
											<!-- END REPCAPTCHA -->
									<!-- 		<p class="help-block">
										<span class="label label-sm label-danger">
										Note: </span>
										Please visit <a href="http://www.google.com/recaptcha" target="_blank">
										http://www.google.com/recaptcha </a>
										to learn more about the Google reCaptcha
									</p> -->
										</div>
									</div>

									<div class="form-group">
										<label class="control-label col-md-3">Amount</label>
										<div class="col-md-4">
								             <input type="text" class="form-control" name="transaction_amount">
											<span class="help-block">
											 </span>
										</div>
									</div>
									<div class="form-group">
										<label class="control-label col-md-3">Purpose</label>
										<div class="col-md-4">
											 <textarea class="form-control" name="transaction_purpose"></textarea>
											<span class="help-block">
											 </span>
										</div>
									</div>


							     </div>
						      <div class="form-actions">
									<div class="row">
										<div class="col-md-offset-3 col-md-9">
											<button type="submit" class="btn purple"><i class="fa fa-check"></i> Add</button>
											<button type="button" class="btn default">Cancel</button>
										</div>
									</div>
								</div>
								{{Form::token()}}
							</form>
							<!-- END FORM-->
						</div>
				</div>
@stop
@section('script')
{{ HTML::script('assets/dashboard/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
{{ HTML::script('assets/dashboard/global/plugins/select2/select2.min.js') }}
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
{{ HTML::script('assets/dashboard/global/scripts/metronic.js') }}
{{ HTML::script('assets/dashboard/admin/pages/scripts/components-dropdowns.js') }}
<!-- END PAGE LEVEL SCRIPTS -->
<script>
        jQuery(document).ready(function() {
           ComponentsDropdowns.init();
        });
    </script>


@stop