@extends('base-template')

@section('head')
	<title>Login|Pnpa</title>
	<link rel="shortcut icon" href="{{ URL::to('favicon.png') }}">
	{{HTML::style('assets/css/style.css')}}
  <!-- BEGIN GLOBAL MANDATORY STYLES -->
 <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css"/>
 {{HTML::style('assets/dashboard/global/plugins/font-awesome/css/font-awesome.min.css')}}
 {{HTML::style('assets/dashboard/global/plugins/simple-line-icons/simple-line-icons.min.css')}}
 {{HTML::style('assets/dashboard/global/plugins/bootstrap/css/bootstrap.min.css')}}
 {{HTML::style('assets/dashboard/admin/pages/css/login-soft.css')}}
 {{HTML::style('assets/dashboard/global/css/components.css')}}
 {{HTML::style('assets/dashboard/global/css/plugins.css')}}
 {{HTML::style('assets/dashboard/admin/layout/css/layout.css')}}
 {{HTML::style('assets/dashboard/admin/layout/css/themes/default.css')}}
<!-- END THEME STYLES -->
@stop
@section('body')
      @yield('content')
@stop
@section('scripts')
 {{ HTML::script('assets/dashboard/global/plugins/jquery-1.11.0.min.js') }}
 {{ HTML::script('assets/dashboard/global/plugins/bootstrap/js/bootstrap.min.js') }}
 {{ HTML::script('assets/dashboard/global/plugins/jquery-validation/js/jquery.validate.min.js') }}
 {{ HTML::script('assets/dashboard/global/scripts/metronic.js') }}
 {{ HTML::script('assets/dashboard/admin/layout/scripts/layout.js') }}
 {{ HTML::script('assets/dashboard/admin/pages/scripts/login-soft.js') }}
  <script>
  jQuery(document).ready(function() {
    Metronic.init(); // init metronic core components
    Layout.init(); // init current layout
    Login.init();
  });
  </script>
@stop


