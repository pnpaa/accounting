
@extends('template.main')

@section('css')
{{HTML::style('assets/dashboard/global/plugins/select2/select2.css')}}
{{HTML::style('assets/dashboard/global/css/components.css')}}
{{HTML::style('assets/dashboard/global/css/plugins.css')}}
{{HTML::style('assets/dashboard/global/plugins/fancybox/source/jquery.fancybox.css')}}
{{HTML::style('assets/dashboard/global/plugins/bootstrap-datepicker/css/datepicker.css')}}
{{HTML::style('assets/dashboard/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css')}}
{{HTML::style('assets/dashboard/admin/pages/css/portfolio.css')}}
{{HTML::style('assets/dashboard/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}

@stop

@section('content')
      <h3 class="page-title">
      PNPAA  Receipts
      </h3>
      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li>
            <i class="fa fa-home"></i>
            <a href="{{ route('dashboard') }}">Home</a>
            <i class="fa fa-angle-right"></i>
          </li>
          <li>
           Receipts
          </li>
        </ul>


      </div>
      <div class="row">
        <table class="table" id="transactions-table">
          <thead>
            <tr>
              <th>Date</th>
              <th>OR Number</th>
              <th>Payee</th>
              <th>Cashier</th>
              <th>For the month of</th>
              <th>Purpose</th>
              <th>Amount</th>
              <th>Total</th>
              <th>Recorded By</th>
            </tr>
          </thead>
          <tbody>
           @foreach ($transactions as $transaction)
            <tr>
              <td>{{{ dateMonth($transaction->transaction_date)  }}} </td>
              <td>{{$transaction->or_number}}</td>
              <td>{{{getUserName($transaction->user_id,true)}}}</td>
              <td>{{{getUserName($transaction->transaction_setter,true)}}} </td>
              <td>{{{  date_format(new DateTime($transaction->transaction_date),'M Y') }}} </td>
              <td>{{{$transaction->transaction_purpose}}}</td>
              <td>{{{$transaction->transaction_amount}}}</td>
              <td>{{{$transaction->transaction_amount}}}</td>
              <td>{{{getUserName($transaction->transaction_setter,true)}}}</td>
            </tr>
           @endforeach
          </tbody>
        </table>
      </div>
    {{--<div class="row">
      	<div class="col-md-12">
      		 <h4>Filter By: </h4>
           <form action="{{URL::to('transactions/filter')}}" method="post" accept-charset="utf-8">
            {{Form::token()}}
            @if(Auth::user()->role == 1)
            <div class="col-md-3">
           	 <select name="batch_filter"    class="form-control select2me" required="required">
             	 <option value="*">All</option>
               <option value="2012">2012</option>
               <option value="2013">2013</option>
               <option value="2014">2014</option>
               <option value="2015">2015</option>
               option
	            </select>
	            <span class="help-block">
										    batch </span>
	           </div>
	            <div class="col-md-3">
           	 <select name="committee_filter"    class="form-control select2me" required="required">
             	 <option value="*">All</option>
               <option value="1">finance</option>
               <option value="2">environment</option>
               <option value="3">education</option>
               <option value="4">information</option>
               option
	            </select>
	            <span class="help-block">
										    committee </span>
	           </div>
             @endif
	           <div class="col-md-3">
	                    <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy">
                        <input type="text" class="form-control" name="start_date">
                        <span class="input-group-addon">
                        to </span>
                        <input type="text" class="form-control" name="end_date">
                      </div>
                          <span class="help-block">
                        Select date range </span>

	           </div>

             <input type="submit" name="" class="btn green-meadow pull-right" value="Go">
           </form>
      	</div>
      </div>
      <br/>
      <br/>
      <div class="row">
      	<div class="col-md-12">
          <div class="tabbable tabbable-custom boxless">
            <div class="row mix-grid">
      	      @foreach ($transactions as $transaction)
															<div class="col-md-3 col-sm-4 mix ">
																<div class="mix-inner">
																  <div class="row">
                      <div class="col-md-12 p-20">
                            <div class="col-md-6">
                              <img src="{{asset('assets/front-page/images/pnpaa-logo-small.png')}}" alt="logo">
                                </div>
                                <div class="col-md-6 item transaction-date">
                                  <p>Date : {{{ dateMonth($transaction->transaction_date)}}} </p>
                                </div>
                                <div class="col-md-12">
                                  <p class="payee">Payee : {{{getUserName($transaction->user_id,true)}}} </p>
                                  <p class="received-from">Received From : {{{getUserName($transaction->transaction_setter,true)}}} </p>
                                  <p>For : {{{ dateMonth($transaction->transaction_date)}}} </p>
                                </div>
                                <div class="col-md-12">
                                  <table class="table table-bordered table-hover">
                                    <thead>
                                      <tr>
                                        <th>No</th>
                                        <th>Description</th>
                                        <th>Amount</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <tr>
                                        <td>1</td>
                                        <td class="transaction-purpose">{{{$transaction->transaction_purpose}}}</td>
                                        <td class="transaction-amount">Php {{{$transaction->transaction_amount}}}</td>
                                      </tr>
                                      <tr>
                                        <td colspan="2">TOTAL</td>
                                        <td >Php {{{$transaction->transaction_amount}}}</td>
                                      </tr>
                                    </tbody>
                                  </table>
                                </div>
                                <div class="col-md-6 col-md-offset-6">
                                  <p>{{{getUserName($transaction->transaction_setter,true)}}} </p>
                                  <p>Recorded by</p>
                                </div>
                              </div>
                  </div>
																	<div class="mix-details">
															   <h4>{{{getUserName($transaction->user_id,true)}}}  paid for {{{$transaction->transaction_purpose}}} at the amount of {{{$transaction->transaction_amount}}}</h4>
																	</div>
																</div>
															</div>
             @endforeach
											</div>
          </div>
      	</div>
      </div>--}}

@stop
@section('script')

{{ HTML::script('assets/dashboard/global/plugins/datatables/media/js/jquery.dataTables.min.js') }}
{{ HTML::script('assets/dashboard/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js') }}

{{ HTML::script('assets/dashboard/global/plugins/jquery-mixitup/jquery.mixitup.min.js') }}
{{ HTML::script('assets/dashboard/global/plugins/fancybox/source/jquery.fancybox.pack.js') }}
{{ HTML::script('assets/dashboard/global/plugins/select2/select2.min.js') }}
{{ HTML::script('assets/dashboard/admin/pages/scripts/components-dropdowns.js') }}
{{ HTML::script('assets/dashboard/admin/pages/scripts/components-pickers.js') }}
{{ HTML::script('assets/dashboard/global/plugins/bootstrap-daterangepicker/moment.min.js') }}
{{ HTML::script('assets/dashboard/global/plugins/bootstrap-daterangepicker/daterangepicker.js') }}
{{ HTML::script('assets/dashboard/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}

{{ HTML::script('assets/dashboard/admin/pages/scripts/portfolio.js') }}
{{ HTML::script('assets/dashboard/global/scripts/metronic.js') }}
{{ HTML::script('assets/dashboard/admin/layout/scripts/layout.js') }}
<script>
jQuery(document).ready(function() {
   Metronic.init(); // init metronic core components
   Layout.init(); // init current layout
   ComponentsDropdowns.init();
   // ComponentsPickers.init();
    $('#transactions-table').dataTable();
 if (jQuery().datepicker) {
            $('.date-picker').datepicker({
                rtl: Metronic.isRTL(),
                orientation: "left",
                autoclose: true
            });
            //$('body').removeClass("modal-open"); // fix bug when inline picker is used in modal
        }

   $('.mix-grid').mixitup();

});
</script>
@stop