@extends('template.main')

@section('css')
{{HTML::style('assets/dashboard/global/plugins/select2/select2.css')}}
{{HTML::style('assets/dashboard/global/css/components.css')}}
{{HTML::style('assets/dashboard/global/css/plugins.css')}}
{{HTML::style('assets/dashboard/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}

@stop

@section('content')
  <h3 class="page-title">
      PNPAA  Transactions
      </h3>
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li>
            <i class="fa fa-home"></i>
            <a href="{{ route('dashboard') }}">Home</a>
            <i class="fa fa-angle-right"></i>
          </li>
          <li>
           Transactions
          </li>
        </ul>
     </div>
<div class="col-md-12">
 <div class="row">
    <div class="col-md-4 ">
    @if(Session::has('message'))
    <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      {{Session::get('message')}}
      </div>
    @endif
       <div class="panel panel-default">
           <div class="panel-heading">
             <h3 class="panel-title">Create Transaction</h3>
           </div>
           <div class="panel-body">
             <form action="{{URL::to('transactions/forward')}}" method="post" id="forward-amount">
                {{ Form::token()}}
               <div class="form-group">
                 <label for="">PN Staff</label>
                 <input type="text" name="pn_staff"  class="form-control"  required="required" >

               </div>
               <div class="form-group">
                 <label for="">Amount</label>
                 <input type="text" name="amount" value="{{getBalance(Auth::id())}}" class="form-control"  required="required" >
               </div>
               <div class="form-group">
                 <button type="submit" class="btn btn-primary">Forward</button>
               </div>
             </form>
           </div>
       </div>
    </div>
    <div class="col-md-8  ">
         <table class="table" id="logs_table">
                   <thead>
                     <tr>
                       <th>Date</th>
                       <th>PN Staff</th>
                       <th>Auditor</th>
                       <th>Amount</th>
                     </tr>
                   </thead>
                   <tbody>
                    @foreach(Balance::whereType(1)->get() as $key => $value)
                     <tr>
                       <td>{{dateMonth($value->created_at)}}</td>
                       <td>{{ ($value->pn_staff)}}</td>
                       <td>{{getUserName($value->auditor_id,true)}}</td>
                       <td>Pph {{$value->amount}}</td>
                     </tr>
                    @endforeach
                   </tbody>
                 </table>
    </div>
  </div>
</div>
@stop

@section('script')

{{ HTML::script('assets/dashboard/global/plugins/datatables/media/js/jquery.dataTables.min.js') }}
{{ HTML::script('assets/dashboard/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js') }}
{{ HTML::script('assets/dashboard/global/scripts/metronic.js') }}
{{ HTML::script('assets/dashboard/admin/layout/scripts/layout.js') }}

{{ HTML::script('assets/dashboard/global/plugins/select2/select2.min.js') }}

{{ HTML::script('assets/dashboard/admin/pages/scripts/components-dropdowns.js') }}
{{ HTML::script('assets/js/jquery.validation.min.js') }}
{{ HTML::script('assets/js/custom-validation.js') }}
<script>
  jQuery(document).ready(function() {
     Metronic.init();
     Layout.init();
     $('#logs_table').dataTable();
   });

</script>
@stop