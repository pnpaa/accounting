@extends('template.main')

@section('css')
{{HTML::style('assets/dashboard/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}
@stop

@section('content')

<h3 class="page-title stretchRight">
 Users not paid
</h3>
<div class="page-bar stretchRight">
  <ul class="page-breadcrumb">
    <li>
      <i class="fa fa-home"></i>
      <a href="{{{route('dashboard')}}}">Home</a>
      <i class="fa fa-angle-right"></i>
    </li>
    <li class="active">
      users
    </li>
  </ul>
       <div class="page-toolbar hidden">
      <div class="btn-group pull-right">
         <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
         Actions <i class="fa fa-angle-down"></i>
         </button>
         <ul class="dropdown-menu pull-right" role="menu">
            <li>
               <a href="#" data-toggle="modal" data-target="#myModal">Send Mail</a>
            </li>

         </ul>
      </div>
   </div>
 </div>
 <div class="row">
 <div class="col-md-12">

		  <table class="table table-striped table-bordered table-hover" id="transactions_table">
				<thead>
					<tr>
					<th class="no-sort"><div class="trans-checkbox-control"></div></th>
						<th>Name</th>
						<th>Amount</th>
						<th>Purpose</th>
						<th>Date</th>
					</tr>
				</thead>
				<tbody>
				{{--dd($unpaid_users)--}}
 @foreach ($unpaid_users as $data)

									   <tr>
									   <td><div class="trans-checkbox" data-id="{{$data['id']}}"></div></td>
									    <td>{{getUserName($data['id'],true)}}</td>
									    <td class="ammount{{$data['id']}}">{{$data['transaction_amount']}}</td>
									    <td class="purpose{{$data['id']}}">{{$data['transaction_purpose']}}</td>
									    <td>{{dateMonth($data['transaction_date'])}}</td>
									   </tr>
					@endforeach

				</tbody>
			</table>

 </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Send Email</h4>
      </div>
      <div class="modal-body">
        <div class="clearfix">
        </div>
        <div class="col-md-12">
         <div class="inbox-content">
            <form class="inbox-compose form-horizontal ng-pristine ng-valid"  action="#" method="POST">

               <div class="inbox-form-group mail-to">
                  {{--<label class="control-label">To:</label>
                  <div class="controls controls-to">
                     <input type="text" class="form-control" name="recepient" value=" ">
                  </div>--}}
               </div>
               <div class="inbox-form-group">
                  <label class="control-label">Subject:</label>
                  <div class="controls">
                     <input type="text" class="form-control" name="subject" value=" ">
                  </div>
               </div>
               <div class="inbox-form-group">
                  <textarea name="message" class="form-control" placeholder="your message" style=" height: 250px;"></textarea>
               </div>

               <input name="_token" type="hidden" value="C7IQTcnGN0PLV8P0njWvi6zCq39EbQGhwap10yfq">
            </form>
         </div>
        </div>
        <div class="clearfix">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn send btn-primary">Send</button>
      </div>
    </div>
  </div>
</div>
@stop

@section('script')
{{ HTML::script('assets/dashboard/global/plugins/datatables/media/js/jquery.dataTables.min.js') }}
{{ HTML::script('assets/dashboard/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js') }}
{{ HTML::script('assets/dashboard/global/scripts/metronic.js') }}
{{ HTML::script('assets/dashboard/admin/layout/scripts/layout.js') }}
<script>
  jQuery(document).ready(function() {
     Metronic.init();
     Layout.init();
     $('#transactions_table').dataTable({
    "aoColumnDefs":[{
      "bSortable":false,
      "aTargets":['no-sort']
    }]
   });
   });
  $('.send').click(function(){
    console.log('emailing');
     $('.trans-checkbox').each(function(){
        if($(this).hasClass('selected')){
           var id=$(this).data('id');
           var purpose=$('.purpose'+$(this).data('id')).text();
           var amount=$('.amount'+$(this).data('id')).text();
          //ajax calling send email function
        }
     });
  });


   $('.trans-checkbox').on('click',function(){
   	 updateAction();
     $(this).hasClass('selected')?$(this).removeClass('selected'):$(this).addClass('selected');
   });
  $('.trans-checkbox-control').click(function(){
	  //updateAction();
   if($(this).hasClass('selected')){
      $(this).removeClass('selected');
      $('.page-toolbar').addClass('hidden');
      $('.trans-checkbox').each(function(){
        if($(this).hasClass('selected'))$(this).removeClass('selected');
     });
   }else{
    	$('.page-toolbar').removeClass('hidden');
     $(this).addClass('selected');
     $('.trans-checkbox').each(function(){
        if(!$(this).hasClass('selected'))$(this).addClass('selected');
     });
  }
  });

  function updateAction (argument) {
     $('.trans-checkbox').each(function(){
        if($(this).hasClass('selected')){
        	  $('.page-toolbar').removeClass('hidden');
        }

     });

  }
</script>

@stop