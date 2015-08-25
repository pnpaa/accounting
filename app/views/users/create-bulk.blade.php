
@extends('template.main')

@section('css')
{{HTML::style('assets/dashboard/global/plugins/select2/select2.css')}}
{{HTML::style('assets/dashboard/global/css/components.css')}}
{{HTML::style('assets/dashboard/global/css/plugins.css')}}
{{HTML::style('assets/dashboard/global/plugins/fancybox/source/jquery.fancybox.css')}}
{{HTML::style('assets/dashboard/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css')}}

{{HTML::style('assets/dashboard/admin/pages/css/portfolio.css')}}
@stop

@section('content')
      <h3 class="page-title">
      PNPAA  Users
      </h3>
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li>
            <i class="fa fa-home"></i>
            <a href="{{ route('dashboard') }}">Home</a>
            <i class="fa fa-angle-right"></i>
          </li>
          <li>
           Create Bulk Users
          </li>
        </ul>
       </div>
       <div class="row">
         <div class="col-md-12">
           <div class="col-md-4 col-md-offset-4">
             <form action="store-bulk" id="create-bulk-user" method="post">
                {{ Form::token() }}
                <div class="form-group">
                  <label for="">Number of users to add:</label>
                  <input type="number" name="users_num"  class="form-control" value="" placeholder="">
                </div>
                <div class="form-group">
                  <label for="">Specify role:</label>
                  <select name="users_role" class="form-control">
                       <option value="0">none</option>
                    @foreach ($roles as $role)
                       <option value="{{$role->role_id}}">{{$role->role_name}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Specify Committee:</label>
                  <select name="users_committee" class="form-control">
                       <option value="0">none</option>
                    @foreach ($committees as $committee)
                       <option value="{{$committee->id}}">{{$committee->committee_title}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Specify Batch:</label>
                  <select name="users_batch" class="form-control">
                       <option value="0">none</option>
                       <option value="2012">2012</option>
                       <option value="2013">2013</option>
                       <option value="2014">2014</option>
                       <option value="2015">2015</option>
                  </select>
                </div>
                <input type="submit" class="btn green-meadow" name="" value="Create">
             </form>
           </div>
         </div>
       </div>

@stop

@section('script')
{{ HTML::script('assets/dashboard/global/scripts/metronic.js') }}
{{ HTML::script('assets/dashboard/admin/layout/scripts/layout.js') }}
<script>
  jQuery(document).ready(function() {
     Metronic.init();
     Layout.init();
  });
</script>
@stop

