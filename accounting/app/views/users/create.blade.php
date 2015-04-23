@extends('template.main')
@section('css')
<!-- BEGIN PAGE LEVEL STYLES -->
{{HTML::style('assets/dashboard/global/plugins/select2/select2.css')}}
{{HTML::style('assets/dashboard/global/css/components.css')}}
{{HTML::style('assets/dashboard/global/css/plugins.css')}}
@stop

@section('content')
   <!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
		PNPAA Users
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="{{{route('dashboard')}}}">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li class="active">
					 Create User
					</li>
				 </ul>
		</div>
			<!-- END PAGE HEADER-->
  {{ Form::open(array('url' => route('users.store'),'id'=>'submit_form','class'=>'form-horizontal')) }}
  	<div class="row">
				<div class="col-md-12">
					<div class="portlet box green-meadow" id="form_wizard_1">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-user"></i> Create new User- <span class="step-title">
								Step 1 of 4 </span>
							</div>
	 				</div>
						<div class="portlet-body form">
								<div class="form-wizard">
									<div class="form-body">
										<ul class="nav nav-pills nav-justified steps">
											<li>
												<a href="#tab1" data-toggle="tab" class="step">
												<span class="number">
												1 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Account Info </span>
												</a>
											</li>
											<li>
												<a href="#tab2" data-toggle="tab" class="step">
												<span class="number">
												2 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Profile Info </span>
												</a>
											</li>
											<li>
												<a href="#tab3" data-toggle="tab" class="step active">
												<span class="number">
												3 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Company Info </span>
												</a>
											</li>
											<li>
												<a href="#tab4" data-toggle="tab" class="step">
												<span class="number">
												4 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Confirm </span>
												</a>
											</li>
										</ul>
										<div id="bar" class="progress progress-striped" role="progressbar">
											<div class="progress-bar progress-bar-success">
											</div>
										</div>
										<div class="tab-content">
											<div class="alert alert-danger display-none">
												<button class="close" data-dismiss="alert"></button>
												You have some form errors. Please check below.
											</div>
											<div class="alert alert-success display-none">
												<button class="close" data-dismiss="alert"></button>
												Your form validation is successful!
											</div>
											<div class="tab-pane active" id="tab1">
												<h3 class="block">Provide your account info</h3>
												<div class="form-group">
													<label class="control-label col-md-3">Username <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="username"/>
														<span class="help-block">
														Provide your username </span>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Password <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="password" class="form-control" name="password" id="submit_form_password"/>
														<span class="help-block">
														Provide your password. </span>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Confirm Password <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="password" class="form-control" name="rpassword"/>
														<span class="help-block">
														Confirm your password </span>
													</div>
												</div>
													<div class="form-group">
														<label class="control-label col-md-3">User Role</label>
														<div class="col-md-4">
															<select class="form-control select2me" name="role" data-placeholder="Select...">
																@foreach($roles as $role)
																  <option value="{{{$role->role_id}}}">{{{$role->role_name}}}</option>
																@endforeach
															</select>
													 	<span class="help-block">
															 </span>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Committee</label>
														<div class="col-md-4">
															<select class="form-control select2me" name="committee" data-placeholder="Select...">
																	<option value="none">none</option>
																 @foreach($committee as $com)
           																<option value="{{{$com->id}}}">{{{$com->committee_title}}}</option>
																 @endforeach
															</select>
													 	<span class="help-block">
															 </span>
														</div>
													</div>
													<div class="form-group">
														<label class="control-label col-md-3">Batch</label>
														<div class="col-md-4">
															<select class="form-control select2me" name="batch" data-placeholder="Select...">
																	<option value="none">none</option>
																	<option value="2012">2012</option>
																	<option value="2013">2013</option>
																	<option value="2014">2014</option>
																	<option value="2015">2015</option>
															</select>
													 	<span class="help-block">
															 </span>
														</div>
													</div>
													<div class="form-group">
													<label class="control-label col-md-3">Email<span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="email"/>
														<span class="help-block">
														Provide your email address</span>
													</div>
												</div>
											</div>
											<div class="tab-pane" id="tab2">
												<h3 class="block">Provide your profile details</h3>
												<div class="form-group">
													<label class="control-label col-md-3">Firstname <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="first_name"/>
														<span class="help-block">
														Provide your first name </span>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Lastname <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="last_name"/>
														<span class="help-block">
														Provide your last name </span>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Middlename <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="maidden_name"/>
														<span class="help-block">
														Provide your maidden name </span>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Birth Date <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="birth_date"/>
														<span class="help-block">
														Provide your birth date</span>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Gender <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<div class="radio-list">
															<label>
															<input type="radio" name="gender" value="M" data-title="Male"/>
															Male </label>
															<label>
															<input type="radio" name="gender" value="F" data-title="Female"/>
															Female </label>
														</div>
														<div id="form_gender_error">
														</div>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Permanent Address <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="permanent_address"/>
														<span class="help-block">
														Provide your   address </span>
													</div>
												</div>
											 <div class="form-group">
													<label class="control-label col-md-3">Current Address <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="current_address"/>
														<span class="help-block">
														Provide your   address </span>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">About</label>
													<div class="col-md-4">
														<textarea class="form-control" rows="3" name="user_about"></textarea>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Phone Number
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="phone_contact"/>
														<span class="help-block">
														Provide your phone number </span>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Connect with
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" placeholder="skype" name="skype_contact"/><br/>
														<input type="text" class="form-control" placeholder="facebook" name="facebook_contact"/><br/>
														<input type="text" class="form-control" placeholder="twitter" name="twitter_contact"/><br/>
														<input type="text" class="form-control" placeholder="linked" name="linked_contact"/><br/>
														<input type="text" class="form-control" placeholder="yahoo" name="yahoo_contact"/><br/>
														<input type="text" class="form-control" placeholder="google" name="google_contact"/>
													</div>
												</div>
											</div>
											<div class="tab-pane" id="tab3">
												<h3 class="block">Provide Company Info</h3>
												<div class="form-group">
													<label class="control-label col-md-3">Job <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="work"/>
														<span class="help-block">
														</span>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Company Working<span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="company_working"/>
														<span class="help-block">
														</span>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Company Address<span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="company_working_address"/>
														<span class="help-block">
														</span>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Company Working Shift<span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" name="company_working_hours"/>
														<span class="help-block">
														</span>
													</div>
												</div>
											</div>
											<div class="tab-pane" id="tab4">
												<h3 class="block">Confirm your account</h3>
												<h4 class="form-section">Account Info</h4>
												<div class="form-group">
													<label class="control-label col-md-3">Username:</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="username">
														</p>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Committee:</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="committee">
														</p>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Batch:</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="batch">
														</p>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Email:</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="email">
														</p>
													</div>
												</div>
												<h4 class="form-section">Profile Info</h4>
												<div class="form-group">
													<label class="control-label col-md-3">Firstname :</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="first_name">
														</p>
													</div>
												</div>
													<div class="form-group">
													<label class="control-label col-md-3">Lastname  :</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="last_name">
														</p>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Middle name  :</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="maidden_name">
														</p>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Birth Date   :</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="birth_date">
														</p>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Gender:</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="gender">
														</p>
													</div>
												</div>
													<div class="form-group">
													<label class="control-label col-md-3">Permanent Address:</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="permanent_address">
														</p>
													</div>
												</div>
													<div class="form-group">
													<label class="control-label col-md-3">Current Address:</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="current_address">
														</p>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">About:</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="user_about">
														</p>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Phone number:</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="phone_contact">
														</p>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Connect with:</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="skype_contact"></p><br/>
														<p class="form-control-static" data-display="facebook_contact"></p><br/>
														<p class="form-control-static" data-display="twitter_contact"></p><br/>
														<p class="form-control-static" data-display="linked_contact"></p><br/>
														<p class="form-control-static" data-display="yahoo_contact"></p><br/>
														<p class="form-control-static" data-display="google_contact"></p>
													</div>
												</div>
												<h4 class="form-section">Company Info</h4>
												<div class="form-group">
													<label class="control-label col-md-3">Job:</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="work">
														</p>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Company Working:</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="company_working">
														</p>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Company Address :</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="company_working_address">
														</p>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Company Working Shift:</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="company_working_hours">
														</p>
													</div>
												</div>
           </div>
										</div>
									</div>
									<div class="form-actions">
										<div class="row">
											<div class="col-md-offset-3 col-md-9">
												<a href="javascript:;" class="btn default button-previous">
												<i class="m-icon-swapleft"></i> Back </a>
												<a href="javascript:;" class="btn green-meadow button-next">
												Continue <i class="m-icon-swapright m-icon-white"></i>
												</a>
											 <button type="submit"    class="btn green button-submit">Submit <i class="m-icon-swapright m-icon-white"></i> </button>
											</div>
										</div>
									</div>
					  </div>
						</div>
					</div>
				</div>
			</div>
	 {{ Form::close() }}
@stop
@section('script')
 {{ HTML::script('assets/dashboard/global/plugins/jquery-validation/js/jquery.validate.min.js') }}
 {{ HTML::script('assets/dashboard/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}
 {{ HTML::script('assets/dashboard/global/plugins/select2/select2.min.js') }}
 {{ HTML::script('assets/dashboard/global/scripts/metronic.js') }}
 {{ HTML::script('assets/dashboard/admin/layout/scripts/layout.js') }}
 {{ HTML::script('assets/dashboard/admin/pages/scripts/form-wizard.js') }}
 {{ HTML::script('assets/dashboard/admin/pages/scripts/components-dropdowns.js') }}
 <script>
        jQuery(document).ready(function() {
        	 Metronic.init(); // init metronic core componets
			       Layout.init(); // init layout
			       FormWizard.init();
          ComponentsDropdowns.init();
        });
 </script>
@stop