@extends('template.login')
@section('content')
<div class="logo">
  <a href="{{ route('index') }}">
  <img src="{{asset('assets/front-page/images/pnpaa-logo-small.png')}}" alt=""/>
  </a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
   <!-- BEGIN FORGOT PASSWORD FORM -->
  <form   action="new-pass"  id="new-pass-form" method="post">
    {{Form::token()}}

    <h3>Security Guard</h3>
    <p>
      Create new password
    </p>

    <div class="form-group">
       <label for="">New Password </label>
        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder=" " id="password" name="password"/>

    </div>
    <div class="form-group">
        <label for=""> Confirm Password</label>
        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder=" " name="cpassword"/>

    </div>
    <div class="form-actions">
  <!--     <button type="button" id="back-btn" class="btn">
      <i class="m-icon-swapleft"></i> Back </button> -->
      <button type="submit" class="btn blue pull-right">
      Submit <i class="m-icon-swapright m-icon-white"></i>
      </button>
    </div>
    <input type="hidden" name="id" value="{{$id}}">
  </form>
  <!-- END FORGOT PASSWORD FORM -->
</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
<div class="copyright">
  2014 &copy; Pnpaa .
</div>
@stop