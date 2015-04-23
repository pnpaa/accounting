@extends('template.login')

@section('css')
{{HTML::style('assets/dashboard/admin/pages/css/lock.css')}}
@stop
@section('content')
<div class="page-lock">
	<div class="page-logo">
		<a class="brand" href="index.html">
		<img src="../../assets/admin/layout/img/logo-big.png" alt="logo"/>
		</a>
	</div>
	<div class="page-body">
		<img class="page-lock-img" src="../../assets/admin/pages/media/profile/profile.jpg" alt="">
		<div class="page-lock-info">
			<h1>Bob Nilson</h1>
			<span class="email">
			bob@keenthemes.com </span>
			<span class="locked">
			Locked </span>
			<form class="form-inline" action="http://www.keenthemes.com/preview/metronic/templates/admin/index.html">
				<div class="input-group input-medium">
					<input type="text" class="form-control" placeholder="Password">
					<span class="input-group-btn">
					<button type="submit" class="btn blue icn-only"><i class="m-icon-swapright m-icon-white"></i></button>
					</span>
				</div>
				<!-- /input-group -->
				<div class="relogin">
					<a href="login.html">
					Not Bob Nilson ? </a>
				</div>
			</form>
		</div>
	</div>
	<div class="page-footer-custom">
		 2014 &copy; Metronic. Admin Dashboard Template.
	</div>
</div>
@stop

@section('script')
{{ HTML::script('assets/dashboard/admin/pages/scripts/lock.js') }}
<script>
jQuery(document).ready(function() {    
    Lock.init();
});
</script>
@stop