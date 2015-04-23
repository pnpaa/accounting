@extends('template.main')
@section('css')
{{HTML::style('assets/dashboard/admin/pages/css/profile.css')}}
{{HTML::style('assets/dashboard/global/plugins/bootstrap-toastr/toastr.min.css')}}
 {{HTML::style('assets/dashboard/global/plugins/bootstrap-datepicker/css/datepicker3.css')}}

@stop
@section('content')


 	<!-- BEGIN PAGE HEADER-->
  <h3 class="page-title">
			 {{{$user->first_name}}} {{{$user->last_name}}} <small> profile </small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
					    <a href="{{{route('dashboard')}}}">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
					    <a href="{{{route('users.index')}}}">Users</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						 User Profile
					</li>
				</ul>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row profile">
				<div class="col-md-12 ">
				<div class="notify"></div>

					<!--BEGIN TABS-->
					<div class="tabbable tabbable-custom tabbable-full-width">
						<ul class="nav nav-tabs">
							<li class="active">
								<a href="#tab_1_1" data-toggle="tab">
								Overview </a>
							</li>
							<li>
								<a href="#tab_1_3" data-toggle="tab">
								Edit Account </a>
							</li>
					    	@if (Auth::id() == 1 OR Auth::id() == $user->id)
					    	<input type="hidden" name="key" value="1">
							{{--<li>
								<a href="#tab_1_4" data-toggle="tab">
								Projects </a>
							</li>--}}
							@endif
							<li>
								<a href="#tab_1_6" data-toggle="tab">
								Help </a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="tab_1_1">
								<div class="row">
									<div class="col-md-2">
										<ul class="list-unstyled profile-nav">
											<li>
												<img src="{{{asset('assets/uploads/'.($user->user_photo?$user->user_photo:'asas.jpg')) }}}" class="img-responsive user-photo thumbnail" alt=""/>
												@if (Auth::id() == 1 OR Auth::id() == $user->id)
												{{--<a href="#" class="profile-edit">
												edit </a>--}}
												@endif
											</li>
										</ul>
									</div>
									<div class="col-md-10">
										<div class="row">
											<div class="col-md-12 profile-info">
												<h1> {{{ $user->first_name }}}  {{{ $user->last_name }}}  </h1>
												<p>
													{{{ $user->user_about }}}
												</p>
												<ul class="list-inline">
													<li>
														<i class="fa fa-map-marker"></i>{{{ $user->permanent_address }}}
													</li>
													<li>
														<i class="fa fa-calendar"></i> {{{ $user->bday }}}
													</li>
													<li>
														<i class="fa fa-briefcase"></i> {{{ $user->work }}}
													</li>
												</ul>
											</div>
											</div>
										<!--end row-->
										<div class="tabbable tabbable-custom tabbable-custom-profile">
											<ul class="nav nav-tabs">
												<li class="active">
													<a href="#tab_1_11" data-toggle="tab">
													Company Details </a>
												</li>
											{{--	<li>
													<a href="#tab_1_22" data-toggle="tab">
													Feeds </a>
												</li>--}}
											</ul>
											<div class="tab-content">
												<div class="tab-pane active" id="tab_1_11">
													<div class="portlet-body">
														<table class="table table-striped table-bordered table-advance table-hover">
														<thead>
														<tr>
															<th>
																<i class="fa fa-briefcase"></i> Company
															</th>
															<th class="hidden-xs">
																<i class="fa fa-question"></i> Address
															</th>
															<th>
																<i class="fa fa-bookmark"></i> Time Shift
															</th>

														</tr>
														</thead>
														<tbody>
														<tr>
															<td>
																{{{ $user->company_working}}}
															</td>
															<td class="hidden-xs">
																{{{ $user->company_working_address }}}
															</td>
															<td>
																{{{ $user->company_working_hours }}}
															</td>

														</tr>

														</tbody>
														</table>
													</div>
												</div>
												<!--tab-pane-->
												<div class="tab-pane" id="tab_1_22">
													<div class="tab-pane active" id="tab_1_1_1">
														<div class="scroller" data-height="290px" data-always-visible="1" data-rail-visible1="1">
															<ul class="feeds">
																<li>
																	<div class="col1">
																		<div class="cont">
																			<div class="cont-col1">
																				<div class="label label-success">
																					<i class="fa fa-bell-o"></i>
																				</div>
																			</div>
																			<div class="cont-col2">
																				<div class="desc">
																					 You have 4 pending tasks. <span class="label label-danger label-sm">
																					Take action <i class="fa fa-share"></i>
																					</span>
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="col2">
																		<div class="date">
																			 Just now
																		</div>
																	</div>
																</li>
																<li>
																	<a href="#">
																	<div class="col1">
																		<div class="cont">
																			<div class="cont-col1">
																				<div class="label label-success">
																					<i class="fa fa-bell-o"></i>
																				</div>
																			</div>
																			<div class="cont-col2">
																				<div class="desc">
																					 New version v1.4 just lunched!
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="col2">
																		<div class="date">
																			 20 mins
																		</div>
																	</div>
																	</a>
																</li>
																<li>
																	<div class="col1">
																		<div class="cont">
																			<div class="cont-col1">
																				<div class="label label-danger">
																					<i class="fa fa-bolt"></i>
																				</div>
																			</div>
																			<div class="cont-col2">
																				<div class="desc">
																					 Database server #12 overloaded. Please fix the issue.
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="col2">
																		<div class="date">
																			 24 mins
																		</div>
																	</div>
																</li>
																<li>
																	<div class="col1">
																		<div class="cont">
																			<div class="cont-col1">
																				<div class="label label-info">
																					<i class="fa fa-bullhorn"></i>
																				</div>
																			</div>
																			<div class="cont-col2">
																				<div class="desc">
																					 New order received. Please take care of it.
																				</div>
																			</div>
																		</div>
																	</div>
																	<div class="col2">
																		<div class="date">
																			 30 mins
																		</div>
																	</div>
																</ul>
														</div>
													</div>
												</div>
												<!--tab-pane-->
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--tab_1_2-->
							<div class="tab-pane" id="tab_1_3">
								<div class="row profile-account">
									<div class="col-md-3">
										<ul class="ver-inline-menu tabbable margin-bottom-10">
											<li class="active">
												<a data-toggle="tab" href="#tab_1-1">
												<i class="fa fa-cog"></i> Personal info </a>
												<span class="after">
												</span>
											</li>
											<li>
												<a data-toggle="tab" href="#tab_5-5">
												<i class="fa fa-cog"></i> Company info </a>

											</li>
										   @if (Auth::id()==1 OR Auth::id() == $user->id)
											<li>
												<a data-toggle="tab" href="#tab_3-3">
												<i class="fa fa-lock"></i> Change Password </a>
											</li>
											@endif
											<li>
												<a data-toggle="tab" href="#tab_6-6">
												<i class="fa fa-lock"></i> Contact Details </a>
											</li>
										   @if (Auth::id()==1 OR Auth::id() == $user->id)
											<li>
												<a data-toggle="tab" href="#tab_2-2">
												<i class="fa fa-picture-o"></i> Change Profile Picture </a>
											</li>
											<li>
												<a data-toggle="tab" href="#tab_4-4">
												<i class="fa fa-eye"></i> Privacy Settings </a>
											</li>
										   @endif
										</ul>
									</div>
									<div class="col-md-9">
										<div class="tab-content">
											<div id="tab_1-1" class="tab-pane active">

												<form   action="#" onsubmit="return false;" >
													<div class="form-group">
														<label class="control-label">First Name</label>
														<input type="text" value="{{{$user->first_name}}}"  name="first_name" placeholder="" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Last Name</label>
														<input type="text" value="{{{$user->last_name}}}" name="last_name" placeholder="" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Middle Name</label>
														<input type="text" value="{{{$user->maidden_name}}}"  name="maidden_name" placeholder="" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Current Address</label>
														<input type="text" value="{{{$user->current_address}}}" name="current_address" placeholder="" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Permanent Address</label>
														<input type="text" value="{{{$user->permanent_address}}}" name="permanent_address" placeholder="" class="form-control"/>
													</div>

													<div class="form-group">
														<label class="control-label">Birthdate</label>
														<input type="text" value="{{{$user->birth_date}}}" name="birth_date"  placeholder="00-00-0000" class="form-control date-picker"/>
													</div>
													<div class="form-group">
														<label class="control-label">Gender</label><br>
												    <select name="gender" class="form-control">
												    	<option value="M" <?php echo $user->gender=='M'?'selected':''; ?>>Male</option>
												    	<option value="F" <?php echo $user->gender=='F'?'selected':''; ?>>Female</option>
												    </select>
													</div>
													<div class="form-group">
														<label class="control-label">Primary Email</label>
														<input type="text" value="{{{$user->email}}}" name="email" placeholder="" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">About</label>
														<textarea class="form-control user_about"  name="user_about" rows="3" placeholder=" are pnpa!!!">  {{{$user->user_about}}}  </textarea>
													</div>
												 	<div class="margiv-top-10">
														<!-- <a href="#" id="personal_info_submit" class="btn green">
														Save Changes </a> -->
														<input type="submit"  onclick="save_personal_info()"  class="btn green" value="submit">
														<!-- <a href="#" class="btn default">
														Cancel </a> -->
													</div>
												</form>
											</div>
											<div id="tab_2-2" class="tab-pane">

											 <form action="{{{URL::to('users/updatePhoto')}}}" enctype="multipart/form-data" onsubmit="return true;" method="post" role="form" >
                {{ Form::token()}}
													<div class="form-group">
														<div class="fileinput fileinput-new" data-provides="fileinput">
															<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
																<img src="{{{asset('assets/uploads/'.(Auth::user()->user_photo?$user->user_photo:'asas.jpg'))}}}" alt=""/>
															</div>
															<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
															</div>
															<div>
																<span class="btn default btn-file">
																<span cla ss="fileinput-new">
																Select image </span>
																<span class="fileinput-exists">
																Change </span>
																<input type="file" name="photo">
																<input type="hidden" name="id" value="{{{$user->id}}}">
																</span>
																<!-- <a href="#" class="btn default fileinput-exists" data-dismiss="fileinput">
																Remove </a> -->
															</div>
														</div>
														<div class="clearfix margin-top-10">
															<span class="label label-danger">
															NOTE! </span>
															<span>
															Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span>
														</div>
													</div>
													<div class="margin-top-10">
												 		<input type="submit" name="" class="btn green"    value="submit">
														<!-- <a href="#" class="btn default">
														Cancel </a> -->
													</div>
												</form>
											</div>
											<div id="tab_3-3" class="tab-pane">
												<form action="#" id="change-password-form" onsubmit="return false;" role="form">
													<div class="form-group">
														<label class="control-label">Current Password</label>
														<input type="password" name="current_password"   class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">New Password</label>
														<input type="password" name="new_password" id="new_password" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Re-type New Password</label>
														<input type="password" name="re_password" class="form-control"/>
													</div>
													<div class="margin-top-10">
													<!-- 	<a href="#" class="btn green">
														Change Password </a> -->
														<input type="submit" onclick="save_change_password()" class="btn green" value="submit">
													<!-- 	<a href="#" class="btn default">
														Cancel </a> -->
													</div>
													{{Form::token()}}
												</form>
											</div>
											<div id="tab_4-4" class="tab-pane">
												<form action="#">
													<table class="table table-bordered table-striped">
													<tr>
														<td>
										  				<h4 class="text-info">Your acount is  <span class="activated">activated </span> . 	 Switch  <span class="deactivated"> off to deactivate </span>.</h4>
														</td>
														<td>
														   <input id="switch-state"   name="activation-checkbox" type="checkbox" checked>
														</td>
													</tr>
													<tr>
														<td>
															 Enim eiusmod high life accusamus terry richardson ad squid wolf moon
														</td>
														<td>
															<label class="uniform-inline">
															<input type="checkbox" value=""/> Yes </label>
														</td>
													</tr>
													<tr>
														<td>
															 Enim eiusmod high life accusamus terry richardson ad squid wolf moon
														</td>
														<td>
															<label class="uniform-inline">
															<input type="checkbox" value=""/> Yes </label>
														</td>
													</tr>
													<tr>
														<td>
															 Enim eiusmod high life accusamus terry richardson ad squid wolf moon
														</td>
														<td>
															<label class="uniform-inline">
															<input type="checkbox" value=""/> Yes </label>
														</td>
													</tr>
													</table>
													<!--end profile-settings-->
													<div class="margin-top-10">
														<a href="#" class="btn green">
														Save Changes </a>
												<!-- 		<a href="#" class="btn default">
														Cancel </a> -->
													</div>
												</form>
											</div>
											<div id="tab_5-5" class="tab-pane ">
												<form role="form" onsubmit="return false;" action="#">
													<div class="form-group">
														<label class="control-label">Job</label>
														<input type="text"   value="{{{$user->work }}}" name="work" placeholder="" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Company Working</label>
														<input type="text" value="{{{$user->company_working }}}" name="company_working" placeholder="" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Company  Address</label>
														<input type="text"  value="{{{$user->company_working_address }}}" name="company_working_address"  placeholder="" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Company Time Shift</label>
														<input type="text" value="{{{$user->company_working_hours }}}" name="company_working_hours"    class="form-control"/>
													</div>
													<div class="margiv-top-10">
														<!-- <a href="#" class="btn green">
														Save Changes </a> -->
														<input type="submit" class="btn green" onclick="save_company_info()" value="submit">
														<!-- <a href="#" class="btn default">
														Cancel </a> -->
													</div>
												</form>
											</div>
											<div id="tab_6-6" class="tab-pane ">
												<form role="form" onsubmit="return false;" action="#">
													<div class="form-group">
														<label class="control-label">Skype</label>
														<input type="text" value="{{{$user->skype_contact}}}" name="skype_contact" placeholder="" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Facebook</label>
														<input type="text" value="{{{$user->facebook_contact}}}" name="facebook_contact" placeholder="" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Google</label>
														<input type="text" value="{{{$user->google_contact}}}" name="google_contact" placeholder="" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Yahoo mail</label>
														<input type="text" value="{{{$user->yahoo_contact}}}" name="yahoo_contact"  " class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Twitter</label>
														<input type="text" value="{{{$user->twitter_contact}}}" name="twitter_contact"  " class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Linked</label>
														<input type="text" value="{{{$user->linked_contact}}}" name="linked_contact"  class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Mobile</label>
														<input type="text" value="{{{$user->phone_contact}}}" name="phone_contact" placeholder="" class="form-control"/>
													</div>
													<div class="margiv-top-10">
														<!-- <a href="#" class="btn green">
														Save Changes </a> -->
														<input type="submit" onclick="save_contact_info()" class="btn green" value="submit">
														<!-- <a href="#" class="btn default">
														Cancel </a> -->
													</div>
												</form>
											</div>

										</div>
									</div>
									<!--end col-md-9-->
								</div>
							</div>
							<!--end tab-pane-->
							<div class="tab-pane" id="tab_1_4">
								<div class="row">
									<div class="col-md-12">
										<div class="add-portfolio">
											<span>
											502 Items sold this week </span>
											<a href="#" class="btn icn-only green">
											Add a new Project <i class="m-icon-swapright m-icon-white"></i>
											</a>
										</div>
									</div>
								</div>
								<!--end add-portfolio-->
								<div class="row portfolio-block">
									<div class="col-md-5">
										<div class="portfolio-text">
											<img src="../../assets/admin/pages/media/profile/logo_metronic.jpg" alt=""/>
											<div class="portfolio-text-info">
												<h4>Metronic - Responsive Template</h4>
												<p>
													 Lorem ipsum dolor sit consectetuer adipiscing elit.
												</p>
											</div>
										</div>
									</div>
									<div class="col-md-5 portfolio-stat">
										<div class="portfolio-info">
											 Today Sold <span>
											187 </span>
										</div>
										<div class="portfolio-info">
											 Total Sold <span>
											1789 </span>
										</div>
										<div class="portfolio-info">
											 Earns <span>
											$37.240 </span>
										</div>
									</div>
									<div class="col-md-2">
										<div class="portfolio-btn">
											<a href="#" class="btn bigicn-only">
											<span>
											Manage </span>
											</a>
										</div>
									</div>
								</div>
								<!--end row-->
								<div class="row portfolio-block">
									<div class="col-md-5 col-sm-12 portfolio-text">
										<img src="../../assets/admin/pages/media/profile/logo_azteca.jpg" alt=""/>
										<div class="portfolio-text-info">
											<h4>Metronic - Responsive Template</h4>
											<p>
												 Lorem ipsum dolor sit consectetuer adipiscing elit.
											</p>
										</div>
									</div>
									<div class="col-md-5 portfolio-stat">
										<div class="portfolio-info">
											 Today Sold <span>
											24 </span>
										</div>
										<div class="portfolio-info">
											 Total Sold <span>
											660 </span>
										</div>
										<div class="portfolio-info">
											 Earns <span>
											$7.060 </span>
										</div>
									</div>
									<div class="col-md-2 col-sm-12 portfolio-btn">
										<a href="#" class="btn bigicn-only">
										<span>
										Manage </span>
										</a>
									</div>
								</div>
								<!--end row-->
								<div class="row portfolio-block">
									<div class="col-md-5 portfolio-text">
										<img src="../../assets/admin/pages/media/profile/logo_conquer.jpg" alt=""/>
										<div class="portfolio-text-info">
											<h4>Metronic - Responsive Template</h4>
											<p>
												 Lorem ipsum dolor sit consectetuer adipiscing elit.
											</p>
										</div>
									</div>
									<div class="col-md-5 portfolio-stat">
										<div class="portfolio-info">
											 Today Sold <span>
											24 </span>
										</div>
										<div class="portfolio-info">
											 Total Sold <span>
											975 </span>
										</div>
										<div class="portfolio-info">
											 Earns <span>
											$21.700 </span>
										</div>
									</div>
									<div class="col-md-2 portfolio-btn">
										<a href="#" class="btn bigicn-only">
										<span>
										Manage </span>
										</a>
									</div>
								</div>
								<!--end row-->
							</div>
							<!--end tab-pane-->
							<div class="tab-pane" id="tab_1_6">
								<div class="row">
									<div class="col-md-3">
										<ul class="ver-inline-menu tabbable margin-bottom-10">
											<li class="active">
												<a data-toggle="tab" href="#tab_1">
												<i class="fa fa-briefcase"></i> General Questions </a>
												<span class="after">
												</span>
											</li>
											<li>
												<a data-toggle="tab" href="#tab_2">
												<i class="fa fa-group"></i> Membership </a>
											</li>
											<li>
												<a data-toggle="tab" href="#tab_3">
												<i class="fa fa-leaf"></i> Terms Of Service </a>
											</li>
											<li>
												<a data-toggle="tab" href="#tab_1">
												<i class="fa fa-info-circle"></i> License Terms </a>
											</li>
											<li>
												<a data-toggle="tab" href="#tab_2">
												<i class="fa fa-tint"></i> Payment Rules </a>
											</li>
											<li>
												<a data-toggle="tab" href="#tab_3">
												<i class="fa fa-plus"></i> Other Questions </a>
											</li>
										</ul>
									</div>
									<div class="col-md-9">
										<div class="tab-content">
											<div id="tab_1" class="tab-pane active">
												<div id="accordion1" class="panel-group">
													<div class="panel panel-default">
														<div class="panel-heading">
															<h4 class="panel-title">
															<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_1">
															1. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ? </a>
															</h4>
														</div>
														<div id="accordion1_1" class="panel-collapse collapse in">
															<div class="panel-body">
																 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
															</div>
														</div>
													</div>
													<div class="panel panel-default">
														<div class="panel-heading">
															<h4 class="panel-title">
															<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_2">
															2. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ? </a>
															</h4>
														</div>
														<div id="accordion1_2" class="panel-collapse collapse">
															<div class="panel-body">
																 Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
															</div>
														</div>
													</div>
													<div class="panel panel-success">
														<div class="panel-heading">
															<h4 class="panel-title">
															<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_3">
															3. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor ? </a>
															</h4>
														</div>
														<div id="accordion1_3" class="panel-collapse collapse">
															<div class="panel-body">
																 Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
															</div>
														</div>
													</div>
													<div class="panel panel-warning">
														<div class="panel-heading">
															<h4 class="panel-title">
															<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_4">
															4. Wolf moon officia aute, non cupidatat skateboard dolor brunch ? </a>
															</h4>
														</div>
														<div id="accordion1_4" class="panel-collapse collapse">
															<div class="panel-body">
																 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
															</div>
														</div>
													</div>
													<div class="panel panel-danger">
														<div class="panel-heading">
															<h4 class="panel-title">
															<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_5">
															5. Leggings occaecat craft beer farm-to-table, raw denim aesthetic ? </a>
															</h4>
														</div>
														<div id="accordion1_5" class="panel-collapse collapse">
															<div class="panel-body">
																 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et
															</div>
														</div>
													</div>
													<div class="panel panel-default">
														<div class="panel-heading">
															<h4 class="panel-title">
															<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_6">
															6. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth ? </a>
															</h4>
														</div>
														<div id="accordion1_6" class="panel-collapse collapse">
															<div class="panel-body">
																 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et
															</div>
														</div>
													</div>
													<div class="panel panel-default">
														<div class="panel-heading">
															<h4 class="panel-title">
															<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accordion1_7">
															7. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft ? </a>
															</h4>
														</div>
														<div id="accordion1_7" class="panel-collapse collapse">
															<div class="panel-body">
																 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et
															</div>
														</div>
													</div>
												</div>
											</div>
											<div id="tab_2" class="tab-pane">
												<div id="accordion2" class="panel-group">
													<div class="panel panel-warning">
														<div class="panel-heading">
															<h4 class="panel-title">
															<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_1">
															1. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ? </a>
															</h4>
														</div>
														<div id="accordion2_1" class="panel-collapse collapse in">
															<div class="panel-body">
																<p>
																	 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
																</p>
																<p>
																	 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
																</p>
															</div>
														</div>
													</div>
													<div class="panel panel-danger">
														<div class="panel-heading">
															<h4 class="panel-title">
															<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_2">
															2. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ? </a>
															</h4>
														</div>
														<div id="accordion2_2" class="panel-collapse collapse">
															<div class="panel-body">
																 Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
															</div>
														</div>
													</div>
													<div class="panel panel-success">
														<div class="panel-heading">
															<h4 class="panel-title">
															<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_3">
															3. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor ? </a>
															</h4>
														</div>
														<div id="accordion2_3" class="panel-collapse collapse">
															<div class="panel-body">
																 Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
															</div>
														</div>
													</div>
													<div class="panel panel-default">
														<div class="panel-heading">
															<h4 class="panel-title">
															<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_4">
															4. Wolf moon officia aute, non cupidatat skateboard dolor brunch ? </a>
															</h4>
														</div>
														<div id="accordion2_4" class="panel-collapse collapse">
															<div class="panel-body">
																 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
															</div>
														</div>
													</div>
													<div class="panel panel-default">
														<div class="panel-heading">
															<h4 class="panel-title">
															<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_5">
															5. Leggings occaecat craft beer farm-to-table, raw denim aesthetic ? </a>
															</h4>
														</div>
														<div id="accordion2_5" class="panel-collapse collapse">
															<div class="panel-body">
																 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et
															</div>
														</div>
													</div>
													<div class="panel panel-default">
														<div class="panel-heading">
															<h4 class="panel-title">
															<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_6">
															6. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth ? </a>
															</h4>
														</div>
														<div id="accordion2_6" class="panel-collapse collapse">
															<div class="panel-body">
																 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et
															</div>
														</div>
													</div>
													<div class="panel panel-default">
														<div class="panel-heading">
															<h4 class="panel-title">
															<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#accordion2_7">
															7. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft ? </a>
															</h4>
														</div>
														<div id="accordion2_7" class="panel-collapse collapse">
															<div class="panel-body">
																 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et
															</div>
														</div>
													</div>
												</div>
											</div>
											<div id="tab_3" class="tab-pane">
												<div id="accordion3" class="panel-group">
													<div class="panel panel-danger">
														<div class="panel-heading">
															<h4 class="panel-title">
															<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#accordion3_1">
															1. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ? </a>
															</h4>
														</div>
														<div id="accordion3_1" class="panel-collapse collapse in">
															<div class="panel-body">
																<p>
																	 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
																</p>
																<p>
																	 Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et.
																</p>
																<p>
																	 Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
																</p>
															</div>
														</div>
													</div>
													<div class="panel panel-success">
														<div class="panel-heading">
															<h4 class="panel-title">
															<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#accordion3_2">
															2. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry ? </a>
															</h4>
														</div>
														<div id="accordion3_2" class="panel-collapse collapse">
															<div class="panel-body">
																 Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
															</div>
														</div>
													</div>
													<div class="panel panel-default">
														<div class="panel-heading">
															<h4 class="panel-title">
															<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#accordion3_3">
															3. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor ? </a>
															</h4>
														</div>
														<div id="accordion3_3" class="panel-collapse collapse">
															<div class="panel-body">
																 Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
															</div>
														</div>
													</div>
													<div class="panel panel-default">
														<div class="panel-heading">
															<h4 class="panel-title">
															<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#accordion3_4">
															4. Wolf moon officia aute, non cupidatat skateboard dolor brunch ? </a>
															</h4>
														</div>
														<div id="accordion3_4" class="panel-collapse collapse">
															<div class="panel-body">
																 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
															</div>
														</div>
													</div>
													<div class="panel panel-default">
														<div class="panel-heading">
															<h4 class="panel-title">
															<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#accordion3_5">
															5. Leggings occaecat craft beer farm-to-table, raw denim aesthetic ? </a>
															</h4>
														</div>
														<div id="accordion3_5" class="panel-collapse collapse">
															<div class="panel-body">
																 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et
															</div>
														</div>
													</div>
													<div class="panel panel-default">
														<div class="panel-heading">
															<h4 class="panel-title">
															<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#accordion3_6">
															6. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth ? </a>
															</h4>
														</div>
														<div id="accordion3_6" class="panel-collapse collapse">
															<div class="panel-body">
																 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et
															</div>
														</div>
													</div>
													<div class="panel panel-default">
														<div class="panel-heading">
															<h4 class="panel-title">
															<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion3" href="#accordion3_7">
															7. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft ? </a>
															</h4>
														</div>
														<div id="accordion3_7" class="panel-collapse collapse">
															<div class="panel-body">
																 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--end tab-pane-->
						</div>
					</div>
					<!--END TABS-->
				</div>
			</div>
			<!-- END PAGE CONTENT-->


@stop
@section('script')
{{ HTML::script('assets/dashboard/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}
{{ HTML::script('assets/dashboard/global/plugins/bootstrap-toastr/toastr.min.js') }}
<!-- END PAGE LEVEL SCRIPTS -->
{{ HTML::script('assets/dashboard/admin/pages/scripts/ui-toastr.js') }}
{{ HTML::script('assets/dashboard/global/scripts/metronic.js') }}
{{ HTML::script('assets/dashboard/admin/layout/scripts/layout.js') }}
<script>
  jQuery(document).ready(function() {
     Metronic.init();
     Layout.init();
     UIToastr.init();
  });
    if (jQuery().datepicker) {
       $('.date-picker').datepicker({
           rtl: Metronic.isRTL(),
           orientation: "left",
           autoclose: true
       });

   }

	 function save_personal_info (argument) {
	 	   // console.log($('input[name=gender]').val());
         $.ajax({
              url:"{{{route('users.update')}}}",
              method:'PUT',
              data:{
              	   id: {{$user->id}},
              	   first_name:$('input[name=first_name]').val(),
              	   last_name:$('input[name=last_name]').val(),
              	   maidden_name:$('input[name=maidden_name]').val(),
              	   current_address:$('input[name=current_address]').val(),
              	   permanent_address:$('input[name=permanent_address]').val(),
              	   birth_date:$('input[name=birth_date]').val(),
              	   gender:$('select[name=gender]').val(),
              	   email:$('input[name=email]').val(),
              	   user_about:$('.user_about').val(),
              	   personal_info:true
              	   },
              success:function(data){
                if(data.match('ok')) {
                  toastr['success'](" ", "Successfully Updated");
                }
                  // toastr['success'](" ", "Successfully Updated");

                //console.log(data);
              }
         });
	 }
	 function save_company_info (argument) {
	 	$.ajax({
	 		 url:"{{{route('users.update')}}}",
              method:'PUT',
              data:{
              	   id: {{$user->id}},
              	   work:$('input[name=work]').val(),
              	   company_working:$('input[name=company_working]').val(),
              	   company_working_address:$('input[name=company_working_address]').val(),
              	   company_working_hours:$('input[name=company_working_hours]').val(),
              	   company_info:true
              	   },
	              success:function(data){
                  if(data.match('ok')) toastr['success'](" ", "Successfully Updated");
	              }
	 	});
	 }
	 function save_contact_info(argument) {

	 	 $.ajax({
	 		 url:"{{{route('users.update')}}}",
              method:'PUT',
              data:{
              	   id: {{$user->id}},
              	   skype_contact:$('input[name=skype_contact]').val(),
              	   facebook_contact:$('input[name=facebook_contact]').val(),
              	   google_contact:$('input[name=google_contact]').val(),
              	   yahoo_contact:$('input[name=yahoo_contact]').val(),
              	   twitter_contact:$('input[name=twitter_contact]').val(),
              	   linked_contact:$('input[name=linked_contact]').val(),
              	   phone_contact:$('input[name=phone_contact]').val(),
              	   contact_info:true
              	   },
	              success:function(data){
                if(data.match('ok') )toastr['success'](" ", "Successfully Updated");
	              }
	 	});

	 }
	 function save_change_password (argument) {
	  $.ajax({
	 		 url:"{{{route('users.update')}}}",
              method:'PUT',
              data:{
              	   id: {{$user->id}},
              	   current_password:$('input[name=current_password]').val(),
              	   new_password:$('input[name=new_password]').val(),
              	   change_password:true
              	   },
	              success:function(data){
                if(data.match('ok') )toastr['success'](" ", "Successfully Updated");
	              }
	 	});
	 }
	 function save_change_avatar (argument) {
	 	// console.log($('input[name=photo]').val());
           $.ajax({
	 		  url:"{{{URL::to('users/updatePhoto')}}}",
              method:'post',
              data:{
              	   id: {{$user->id}},
              	   photo:$('input[name=photo]').val(),
              	   change_avatar:true
              	   },
	              success:function(data){
                if(data.match('ok') )toastr['success'](" ", "Successfully Updated");
	              }
	 	});
	 }

   if ( $('input[name=key]').val() == undefined ) {
						    $('input[type="text"]').each(function(){
							      $(this ).attr('readonly', 'readonly');
					   		});
					        $('.user_about').attr('readonly', 'readonly');
							      $('input[type="submit"] ,a.btn.default ').attr('disabled', 'disabled').hide();
   };

      $('input[name="activation-checkbox"]').bootstrapSwitch('onSwitchChange' ,function(event, state) {
         // console.log(state);
         	  $.ajax({
												 		 url:"{{{route('users.update')}}}",
											              method:'PUT',
											              data:{
											              	   id: {{$user->id}},
											              	    activated:state,
											              	    account_status:true
											              	   },
												              success:function(data){
												                console.log(data);
												              }
												 	});

         if(state){
         	 $('span.activated').text('activated');
         	 $('span.deactivated').text('off to deactivate');
         }else{
          	$('span.activated').text('deactivated');
         	 $('span.deactivated').text('on to activate');
         }
      });



</script>
@stop