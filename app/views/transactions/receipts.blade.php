@extends('template.main')
@section('css')
{{HTML::style('assets/dashboard/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}
@stop
@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title stretchRight">
 PNPAA Transactions
</h3>
<div class="page-bar stretchRight">
  <ul class="page-breadcrumb">
    <li>
      <i class="fa fa-home"></i>
      <a href="{{{route('dashboard')}}}">Home</a>
      <i class="fa fa-angle-right"></i>
    </li>
    <li class="active">
      Transactions
    </li>
  </ul>
  <div class="page-toolbar">
    <div class="btn-group pull-right">
      <button type="button" class="btn btn-fit-height default dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
      Actions <i class="fa fa-angle-down"></i>
      </button>
      <ul class="dropdown-menu pull-right" role="menu">
        {{--<li>
           <a href="export">export</a>
        </li>--}}
        <li>
          <a   href="#" onClick ="$('#transactions_table').tableExport({type:'excel',escape:'false'});" >Save as Excel</a>
        </li>
        <li>
          <a href="#" onClick ="$('#transactions_table').tableExport({type:'pdf',pdfFontSize:'7',escape:'false'});">Save as Pdf</a>
        </li>
      </ul>
    </div>
  </div>
</div>
<!-- END PAGE HEADER-->
<div class="row">
  <div class="col-md-12">
    <!-- BEGIN TABLE PORTLET-->
    <div class="portlet fadeIn">
      <div class="portlet-title">
        <div class="caption">
          @if (Auth::id() == 1)
          <div class="btn-group">
            <a href="{{{route('transaction.create')}}}"><button id="sample_editable_1_new1" class="btn btn-success">
            Add New <i class="fa fa-plus"></i>
            </button></a>
          </div>
          @else
          <div class="btn-group">
            <a href="{{{route('transaction.show',0)}}}"><button id="sample_editable_1_new1" class="btn btn-success">
            View Receipts <i class="fa fa-eye"></i>
            </button></a>
          </div>
          @endif
        </div>
        <div class="tools">
        </div>
      </div>
      <div class="portlet-body">
        <table class="table table-striped table-bordered table-hover" id="transactions_table">
          <thead>
            <tr>
              <th>
                  Transaction for the month of
              </th>
              <th>
                User
              </th>
              <th>
                Cashier
              </th>
              <th>
                Purpose
              </th>
              <th>
                Amount
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach($transactions as $transaction)
            <tr>
              <td>{{{date_format(new DateTime($transaction->transaction_date),'M Y')}}}</td>
              <td>{{{getUserName($transaction->user_id,true)}}}</td>
              <td>{{{getUserName($transaction->transaction_setter,true)}}}</td>
              <td>{{{$transaction->transaction_purpose}}}</td>
              <td>{{{$transaction->transaction_amount}}}</td>
            </tr>
            @endforeach
          </tbody>
         </table>
      </div>
    </div>
    <!-- END TABLE PORTLET-->

  </div>
</div>
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
     Layout.init();
     $('#transactions_table').dataTable();
   });

</script>
@stop