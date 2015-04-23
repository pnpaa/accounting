<?php
// require_once('C:\xampp\htdocs\pnpaa\public\iflychat\iflychat_api_settings.php');
// require_once('C:\xampp\htdocs\pnpaa\public\iflychat\iflychat_api.php');
// $iflychat = new iFlyChat($iflychat_settings);
// $ifly_html_code = $iflychat->get_html_code();
?>
<!DOCTYPE html>
<html lang="en-US">
<head>

	@yield('head')
</head>
<body  class="page-header-fixed   page-sidebar-closed-hide-logo login">
	@yield('body')
	@yield('scripts')
   @if (Auth::check())
     <iframe  width="1" height="1" src="http://forum.pnpaa.com/?si=1">
   </iframe>
   @else
    <iframe   width="1" height="1" src="http://forum.pnpaa.com/?so=0">
    </iframe>
   @endif


</body>

</html>
