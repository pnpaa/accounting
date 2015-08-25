

@extends('template.main')
@section('css')
{{HTML::style('assets/dashboard/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}
@stop
@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
  PNPAA  Current Users
</h3>
<div class="page-bar">
  <ul class="page-breadcrumb">
    <li>
      <i class="fa fa-home"></i>
      <a href="{{{route('dashboard')}}}">Home</a>
      <i class="fa fa-angle-right"></i>
    </li>
    <li>
      Users
    </li>
  </ul>
</div>
<!-- END PAGE HEADER-->
<div class="clearfix"></div>
<br/>
<div ng-app="usersListApp">
  <div class="col-md-12 fadeIn" id="users-list" ng-controller="usersListController" data-ng-init="loop()">
    <div class="col-md-4 col-md-offset-8">
      <input class="search form-control stretchRight" placeholder="Search " />
    </div>
    <div class="clearfix">
    </div>
    <br/>
    <ul class="users-list list">
      <?php $i=0;?>
      @foreach($users as $user)
      <li class="jscroll hidden" data-limit="{{$i++}}">
        <div class="row">
          <div class="col-md-5">
            <a   href="{{{route('users.edit',$user->id)}}}" class="pull-left users-list-photo">
            <img src="{{{asset('assets/uploads/'.($user->user_photo?$user->user_photo:'asas.jpg'))}}}" class="img-responsive img-circle" alt="Image">
            </a>
            <a   href="{{{route('users.edit',$user->id)}}}">
              <h3 class="names">{{{$user->last_name}}},{{{$user->first_name}}}</h3>
            </a>
            <p class="batch_and_committee">Batch  {{{$user->batch}}} in {{{ getCommitteeName($user->committee)}}} committee </p>
            <p class="work_and_company">{{{$user->work}}} <i>in</i> {{{$user->company_working}}} </p>
            <a href="https://www.facebook.com/{{$user->facebook_contact}}" data-original-title="facebook" class="social-icon facebook">
            </a>
            <a href="mailto:{{$user->google_contact}}" data-original-title="Goole Plus" class="social-icon googleplus">
            </a>
           <!--  <a href="#" data-original-title="linkedin" class="social-icon linkedin">
            </a> -->
            <a href="skype:{{$user->skype_contact}}?userinfo" data-original-title="skype" class="social-icon skype">
            </a>
            <a href="https://twitter.com/{{$user->twitter_contact}}" data-original-title="twitter" class="social-icon twitter">
            </a>
            <a href="mailto:{{$user->yahoo_contact}}" data-original-title="yahoo" class="social-icon yahoo">
            </a>

          </div>
          <div class="col-md-7 pull-right">
            <p class="pt-25 about"><i class="fa  fa-quote-left"></i>
              @if($user->user_about <> null)
              {{{$user->user_about}}}
              @else
               User About
              @endif
              <i class="fa  fa-quote-right"></i>
            </p>
          </div>
        </div>
      </li>
      @endforeach
    </ul>
    <br>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 col-md-offset-3 users-loader-con">
    <img src="http://localhost:8000/assets/front-page/images/loading.gif" class="hidden" alt="">
    <button type="button" class="btn btn-success   col-md-12" ng-click="loadMore()" >Load More</button>
  </div>
  </div>
</div>
@stop
@section('script')
{{ HTML::script('assets/dashboard/global/scripts/metronic.js') }}
{{ HTML::script('assets/dashboard/admin/layout/scripts/layout.js') }}
{{ HTML::script('assets/js/fuzzy-search.js') }}
{{ HTML::script('assets/js/list-sort.js') }}
<script>
  jQuery(document).ready(function() {
    Metronic.init();
    Layout.init(); // init layout
  });

   var options={
              valueNames:['names','batch_and_committee','work_and_company','about'],
              plugins: [ ListFuzzySearch() ]
   };
   var usersList=new List('users-list',options);
   var count = $('ul.users-list li').length;
</script>
@stop

