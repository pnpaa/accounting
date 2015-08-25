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
  <form   action="verify-question" method="post">
    {{Form::token()}}

    <h3>Security Question</h3>
    <p>
      Verify your Identity
    </p>
    @if(Session::has('message'))
     <div class="alert alert-danger">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      {{Session::get('message')}}
     </div>
    @endif

    <div class="form-group">
       <label for="">{{$user->question_1}}</label>
        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder=" " name="question_1"/>

    </div>
    <div class="form-group">
        <label for="">{{$user->question_2}}</label>
        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder=" " name="question_2"/>

    </div>
    <div class="form-actions">
     <!--  <button type="button" id="back-btn" class="btn">
      <i class="m-icon-swapleft"></i> Back </button> -->
      <button type="submit" class="btn blue pull-right">
      Submit <i class="m-icon-swapright m-icon-white"></i>
      </button>
    </div>
    <input type="hidden" value="{{$user->email}}" name="email">
  </form>
  <!-- END FORGOT PASSWORD FORM -->
</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
<div class="copyright">
  2014 &copy; Pnpaa .
</div>
@stop