@extends('template.main')

@section('css')
  {{HTML::style('assets/dashboard/global/plugins/jquery-notific8/jquery.notific8.min.css')}}
  {{HTML::style('assets/dashboard/global/plugins/bootstrap-toastr/toastr.min.css')}}
@stop

@section('content')
 	<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			Notific8 Notifications <small>Windows 8 style notifications</small>
			</h3>
			<div class="page-bar">
				<ul class="page-breadcrumb">
					<li>
						<i class="fa fa-home"></i>
						<a href="index.html">Home</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">UI Features</a>
						<i class="fa fa-angle-right"></i>
					</li>
					<li>
						<a href="#">Notific8 Notifications</a>
					</li>
				</ul>
				<div class="page-toolbar">
					<div class="btn-group pull-right">
						<button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
						Actions <i class="fa fa-angle-down"></i>
						</button>
						<ul class="dropdown-menu pull-right" role="menu">
							<li>
								<a href="#">Action</a>
							</li>
							<li>
								<a href="#">Another action</a>
							</li>
							<li>
								<a href="#">Something else here</a>
							</li>
							<li class="divider">
							</li>
							<li>
								<a href="#">Separated link</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">

					<div class="portlet yellow box">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-cogs"></i>Notific8 Notification Demo
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
							<!-- 	<a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a> -->
							</div>
						</div>
						<div class="portlet-body">
							<div class="note note-success">
								<h4 class="block">jquery.notific8</h4>
								<p>
									 jquery.notific8 is a notification plug-in that was inspired by the notification style introduced in Windows 8. For more info Check out <a href="https://github.com/willsteinmetz/jquery-notific8" target="_blank">
									the official github respository </a>
								</p>
							</div>
							<form class="form-horizontal">
								<div class="form-group">
									<label class="col-md-3 control-label" for="title">Notification text:</label>
									<div class="col-md-5">
										<input id="notific8_text" type="text" class="form-control" value="Inspired by Windows 8 notifications" placeholder="enter a text ..."/>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="title">Heading(optional):</label>
									<div class="col-md-5">
										<input id="notific8_heading" type="text" class="form-control" value="" placeholder="enter a heading ..."/>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="title">Sticky ?</label>
									<div class="col-md-5">
										<label class="checkbox">
										<input type="checkbox" id="notific8_sticky" value="1">
										</label>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="title">Life:</label>
									<div class="col-md-5">
										<select id="notific8_life" class="form-control input-medium">
											<option value="1000">1 second</option>
											<option value="5000">5 seconds</option>
											<option value="10000" selected="selected">10 seconds (default)</option>
											<option value="25000">25 seconds</option>
											<option value="60000">60 seconds</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="title">Style:</label>
									<div class="col-md-5">
										<select id="notific8_theme" class="form-control input-medium">
											<option value="teal" selected="selected">teal (default)</option>
											<option value="amethyst">amethyst</option>
											<option value="ruby">ruby</option>
											<option value="tangerine">tangerine</option>
											<option value="lemon">lemon</option>
											<option value="lime">lime</option>
											<option value="ebony">ebony</option>
											<option value="smoke">smoke</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="title">Position:</label>
									<div class="col-md-5">
										<select id="notific8_pos_hor" class="form-control input-small input-inline">
											<option value="top">top (default)</option>
											<option value="bottom">bottom</option>
										</select>
										<select id="notific8_pos_ver" class="form-control input-small input-inline">
											<option value="right">right (default)</option>
											<option value="left">left</option>
										</select>
									</div>
								</div>
								<div class="form-group">
									<label class="col-md-3 control-label" for="title"></label>
									<div class="col-md-5">
										<a href="javascript:;" class="btn green-meadow btn-lg" id="notific8_show">
										Show Notification! </a>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- END PAGE CONTENT-->

	<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<div class="portlet yellow box">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-cogs"></i>Toastr Notification Demo
							</div>
							<div class="tools">
								<a href="javascript:;" class="collapse">
								</a>
								<!-- <a href="#portlet-config" data-toggle="modal" class="config">
								</a>
								<a href="javascript:;" class="reload">
								</a>
								<a href="javascript:;" class="remove">
								</a> -->
							</div>
						</div>
						<div class="portlet-body">
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label" for="title">Title</label>
										<input id="title" type="text" class="form-control" value="Toastr Notifications" placeholder="Enter a title ..."/>
									</div>
									<div class="form-group">
										<label class="control-label" for="message">Message</label>
										<textarea class="form-control" id="message" rows="3" placeholder="Enter a message ...">Gnome & Growl type non-blocking notifications</textarea>
									</div>
									<div class="form-group">
										<div class="checkbox-list">
											<label for="closeButton">
											<input id="closeButton" type="checkbox" value="checked" checked class="input-small"/>Close Button </label>
											<label for="addBehaviorOnToastClick">
											<input id="addBehaviorOnToastClick" type="checkbox" value="checked" class="input-small"/>Add behavior on toast click </label>
											<label for="debugInfo">
											<input id="debugInfo" type="checkbox" value="checked" class="input-small"/>Debug </label>
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group" id="toastTypeGroup">
										<label>Toast Type</label>
										<div class="radio-list">
											<label>
											<input type="radio" name="toasts" value="success" checked/>Success </label>
											<label>
											<input type="radio" name="toasts" value="info"/>Info </label>
											<label>
											<input type="radio" name="toasts" value="warning"/>Warning </label>
											<label>
											<input type="radio" name="toasts" value="error"/>Error </label>
										</div>
									</div>
									<div class="form-group" id="positionGroup">
										<label>Position</label>
										<div class="radio-list">
											<label>
											<input type="radio" name="positions" value="toast-top-right" checked/>Top Right </label>
											<label>
											<input type="radio" name="positions" value="toast-bottom-right"/>Bottom Right </label>
											<label>
											<input type="radio" name="positions" value="toast-bottom-left"/>Bottom Left </label>
											<label>
											<input type="radio" name="positions" value="toast-top-left"/>Top Left </label>
											<label>
											<input type="radio" name="positions" value="toast-top-center"/>Top Center </label>
											<label>
											<input type="radio" name="positions" value="toast-bottom-center"/>Bottom Center </label>
											<label>
											<input type="radio" name="positions" value="toast-top-full-width"/>Top Full Width </label>
											<label>
											<input type="radio" name="positions" value="toast-bottom-full-width"/>Bottom Full Width </label>
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<div class="controls">
											<label class="control-label" for="showEasing">Show Easing</label>
											<input id="showEasing" type="text" placeholder="swing, linear" class="form-control input-small" value="swing"/>
											<label class="control-label" for="hideEasing">Hide Easing</label>
											<input id="hideEasing" type="text" placeholder="swing, linear" class="form-control input-small" value="linear"/>
											<label class="control-label" for="showMethod">Show Method</label>
											<input id="showMethod" type="text" placeholder="show, fadeIn, slideDown" class="form-control input-small" value="fadeIn"/>
											<label class="control-label" for="hideMethod">Hide Method</label>
											<input id="hideMethod" type="text" placeholder="hide, fadeOut, slideUp" class="form-control input-small" value="fadeOut"/>
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<div class="controls">
											<label class="control-label" for="showDuration">Show Duration</label>
											<input id="showDuration" type="text" placeholder="ms" class="form-control input-small" value="1000"/>
											<label class="control-label" for="hideDuration">Hide Duration</label>
											<input id="hideDuration" type="text" placeholder="ms" class="form-control input-small" value="1000"/>
											<label class="control-label" for="timeOut">Time out</label>
											<input id="timeOut" type="text" placeholder="ms" class="form-control input-small" value="5000"/>
											<label class="control-label" for="timeOut">Extended time out</label>
											<input id="extendedTimeOut" type="text" placeholder="ms" class="form-control input-small" value="1000"/>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<button type="button" class="btn green" id="showtoast">Show Toast</button>
									<button type="button" class="btn red" id="cleartoasts">Clear Toasts</button>
									<button type="button" class="btn red" id="clearlasttoast">Clear Last Toast</button>
								</div>
							</div>
						<!-- 	<div class="row margin-top-10">
							<div class="col-md-12">
								<pre id='toastrOptions'>
									 Settings...
								</pre>
							</div>
						</div> -->
						</div>
					</div>
				</div>
			</div>
			<!-- END PAGE CONTENT-->
@stop

@section('script')
  {{HTML::script('assets/dashboard/global/plugins/jquery-notific8/jquery.notific8.min.js')}}
  {{HTML::script('assets/dashboard/admin/pages/scripts/ui-notific8.js')}}
  {{HTML::script('assets/dashboard/global/plugins/bootstrap-toastr/toastr.min.js')}}
  {{HTML::script('assets/dashboard/admin/pages/scripts/ui-toastr.js')}}

<script>
jQuery(document).ready(function() {
   UINotific8.init();
   UIToastr.init();
});
</script>
@stop