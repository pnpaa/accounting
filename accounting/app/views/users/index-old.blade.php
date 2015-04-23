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
  <div class="page-toolbar">
    <div class="btn-group pull-right">
      <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
      View <i class="fa fa-angle-down"></i>
      </button>
      <ul class="dropdown-menu pull-right" role="menu">
        <li>
          <a   href="#" onClick ="$('#users').tableExport({type:'excel',escape:'false'});" >Save as Excel</a>
        </li>
        <li>
          <a href="#" onClick ="$('#users').tableExport({type:'pdf',pdfFontSize:'7',escape:'false'});">Save as Pdf</a>
        </li>
      </ul>
    </div>
  </div>
</div>
<!-- END PAGE HEADER-->
<div class="clearfix"></div>
<br/>
<!-- BEGIN EXAMPLE TABLE PORTLET-->

    <table class="table table-striped table-bordered table-hover pullUp" id="users">
      <thead  >
        <tr>
          <th>
            Photo
          </th>
          <th>
            Full Name
          </th>
          <th>
            Work
          </th>
          <th>
            Company
          </th>
          <th>
            Batch
          </th>
          <th>
            Committtee
          </th>
          <th>
            About
          </th>
        </tr>
      </thead>
      <tbody >
        @foreach($users as $user)
        <tr>
          <td><a   href="{{{route('users.edit',$user->id)}}}"><img alt="" src=" {{{asset('assets/uploads/'.($user->user_photo?$user->user_photo:'asas.jpg'))}}}" class="user_photo"></img></a></td>
          <td><a   href="{{{route('users.edit',$user->id)}}}">{{{$user->first_name}}},{{{$user->last_name}}}</a></td>
          <td>{{{$user->work}}}</td>
          <td>{{{$user->company_working}}}</td>
          <td>{{{$user->batch}}}</td>
          <td>{{{ getCommitteeName($user->committee)}}}</td>
          <td>{{{$user->user_about}}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>


<!-- END EXAMPLE TABLE PORTLET-->
@stop
@section('script')
{{ HTML::script('assets/dashboard/global/plugins/datatables/media/js/jquery.dataTables.min.js') }}
{{ HTML::script('assets/dashboard/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js') }}
{{ HTML::script('assets/dashboard/global/scripts/metronic.js') }}
{{ HTML::script('assets/dashboard/admin/layout/scripts/layout.js') }}
{{ HTML::script('assets/js/export/tableExport.js') }}
{{ HTML::script('assets/js/export/jquery.base64.js') }}
{{ HTML::script('assets/js/export/html2canvas.js') }}
{{ HTML::script('assets/js/export/jspdf/libs/sprintf.js') }}
{{ HTML::script('assets/js/export/jspdf/jspdf.js') }}
{{ HTML::script('assets/js/export/jspdf/libs/base64.js') }}
<script>
  jQuery(document).ready(function() {
    Metronic.init();
    Layout.init(); // init layout
     $('#users').dataTable();
  });
</script>
@stop