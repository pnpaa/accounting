@extends('base-template')

@section('head')
<meta charset="utf-8"/>
<title>Pnpa - {{{Auth::user()->first_name}}}</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>

<!-- BEGIN PACE PLUGIN FILES -->
{{ HTML::script('assets/dashboard/global/plugins/pace/pace.min.js')}}
{{HTML::style('assets/dashboard/global/plugins/pace/themes/pace-theme-minimal.css')}}
<!-- END PACE PLUGIN FILES -->
 {{HTML::style('assets/dashboard/global/plugins/simple-line-icons/simple-line-icons.min.css')}}
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<!-- <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&amp;subset=all" rel="stylesheet" type="text/css"/> -->
{{HTML::style('assets/css/style.css')}}
{{HTML::style('assets/dashboard/global/plugins/font-awesome/css/font-awesome.min.css')}}
{{HTML::style('assets/dashboard/global/plugins/simple-line-icons/simple-line-icons.min.css')}}
{{HTML::style('assets/dashboard/global/plugins/bootstrap/css/bootstrap.min.css')}}
{{HTML::style('assets/dashboard/global/plugins/uniform/css/uniform.default.css')}}
{{HTML::style('assets/dashboard/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')}}
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN THEME STYLES -->
{{HTML::style('assets/dashboard/global/css/components.css')}}
{{HTML::style('assets/dashboard/global/css/plugins.css')}}
{{HTML::style('assets/dashboard/global/css/animations.css')}}
{{HTML::style('assets/dashboard/global/css/animate.css')}}
{{HTML::style('assets/dashboard/admin/layout/css/layout.css')}}
{{HTML::style('assets/dashboard/admin/layout/css/themes/darkblue.css')}}
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>

@yield('css')
@stop
@section('body')
    @include ('template.header')
    <!-- BEGIN CONTAINER -->
     <div class="page-container">
                @if(Auth::user()->role ==1 )
                   @include ('template.admin-side-bar')
                @elseif(Auth::user()->role == 3 )
                   @include ('template.cashier-side-bar')
                @elseif(Auth::user()->role == 4 )
                   @include ('template.auditor-side-bar')
                @else
                   @include ('template.user-side-bar')
                @endif

               <!-- BEGIN CONTENT -->
           <div class="page-content-wrapper">
                 <div class="page-content o-hidden"  >
                           @yield('content')
                 </div>
          </div>
           {{-- @include('template.quick-side-bar')--}}
      </div>
      <!-- END CONTAINER -->
      <div class="clearfix"></div>
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
@stop

@section('scripts')
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="../../assets/global/plugins/respond.min.js"></script>
<script src="../../assets/global/plugins/excanvas.min.js"></script>
<![endif]-->
{{ HTML::script('assets/dashboard/global/plugins/jquery-1.11.0.min.js') }}
{{ HTML::script('assets/dashboard/global/plugins/jquery-migrate-1.2.1.min.js') }}
{{ HTML::script('assets/dashboard/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js') }}
{{ HTML::script('assets/dashboard/global/plugins/bootstrap/js/bootstrap.min.js') }}
{{ HTML::script('assets/dashboard/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') }}
{{ HTML::script('assets/dashboard/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}
{{ HTML::script('assets/dashboard/global/plugins/jquery.blockui.min.js') }}
{{ HTML::script('assets/dashboard/global/plugins/jquery.cokie.min.js') }}
{{ HTML::script('assets/dashboard/global/plugins/uniform/jquery.uniform.min.js') }}
{{ HTML::script('assets/dashboard/global/plugins/bootstrap-switch/js/bootstrap-switch.js') }}
<!-- END CORE PLUGINS -->
{{ HTML::script('assets/dashboard/global/plugins/jquery-idle-timeout/jquery.idletimeout.js') }}
{{ HTML::script('assets/dashboard/global/plugins/jquery-idle-timeout/jquery.idletimer.js') }}
{{ HTML::script('assets/dashboard/admin/pages/scripts/ui-idletimeout.js') }}
{{ HTML::script('assets/js/app/angular.js') }}
{{ HTML::script('assets/js/app/app.js') }}
{{ HTML::script('assets/js/app/session.js') }}
 {{ HTML::script('assets/js/jquery.validation.min.js') }}
 {{ HTML::script('assets/js/jquery.maskedinput.min.js') }}
 {{ HTML::script('assets/js/custom-validation.js') }}

<script>
jQuery(document).ready(function() {
// UIIdleTimeout.init();
});
</script>
<script>
    $('ul.task-notifier li').click(function(event) {
                 console.log($(this).data('id'));
                   $.ajax({
                    url: '{{{route('tasks.update')}}}',
                    method: 'put',
                    data: {
                        id: $(this).data('id'),
                        seenzone_update:true
                    },
                    success:function(data){
                        console.log(data);
                    }
                });
    });
    $('ul.updates-notifier li').click(function(event) {
                 console.log($(this).data('id'));
                   $.ajax({
                    url: '{{{route('updates.update')}}}',
                    method: 'put',
                    data: {
                        id: $(this).data('id'),
                        seenzone_update:true
                    },
                    success:function(data){
                        console.log(data);
                    }
                });
    });

    $.post('https://post.chikka.com/smsapi/request',{
    message_type:'SEND',
    mobile_number:'+639056751602',
    shortcode:'292908933',
    message_id:'ccc81279fcc048d1a6fcc52ed4c13255',
    message:'test sms',
    client_id:'9e802e420c32a84f8d4f1508cd040193baaa3d05cfe1354894abcaa63fabe087',
    secret_key:'75d516ff0910d029ee728701e0605870048092aed54ed004ce21a9ea03a98a73'
    }, function(data, textStatus, xhr) {
      console.log(data);
    });
</script>

@yield('script')
@stop