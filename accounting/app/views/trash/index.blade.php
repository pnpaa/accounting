@extends('template.main')
@section('css')
{{HTML::style('assets/dashboard/global/plugins/bootstrap-toastr/toastr.min.css')}}
@stop
@section('content')
<h2>Recycle Bin</h2>


<div class="row">

<div class="col-md-12">
	   @foreach ($updates as $update)
	   		<div class="note note-info note-{{ $update->id }}">
								<h4 class="block">{{ $update->update_title}}</h4>
								<p>
									  {{ $update->update_content }}
								</p>
          <span class="label label-default">updates</span>
          <a href="#" class="restore" data-type="updates" data-id="{{ $update->id }}">
          	   <i class=" icon-action-redo"></i> Restore
          </a>
           <a href="#" class="remove" data-type="updates" data-id="{{ $update->id }}">
          	   <i class="icon-trash pull-right"></i>
            </a>

							</div>
	   @endforeach
	   @foreach ($users as $user)
	   		<div class="note note-info">
								<h4 class="block">{{ $user->first_name}},{{ $user->last_name}}</h4>
								<p>
									  {{ $user->about}}
								</p>
          <span class="label label-default">users</span>
          <a href="#"  onclick="user_restore({{$user->id}})">
          	   <i class=" icon-action-redo"></i> Restore
          </a>
           <a href="#" class="remove" data-type="users" data-id="{{ $user->id }}">
          	   <i class="icon-trash pull-right"></i>
            </a>
							</div>
	   @endforeach
	   @foreach ($tasks as $task)
	   		<div class="note note-info note-{{ $task->id }}">
								<h4 class="block">{{ $task->task_title}}</h4>
								<p>
									  {{ $task->task_content}}
								</p>
          <span class="label label-default">tasks</span>
          <a href="#" class="restore" data-type="tasks" data-id="{{ $task->id }}">
          	   <i class=" icon-action-redo"></i> Restore
          </a>
            <a href="#" class="remove" data-type="tasks" data-id="{{ $task->id }}">
          	   <i class="icon-trash pull-right"></i>
            </a>
							</div>
	   @endforeach
	    @foreach ($transactions as $transaction)
	   		<div class="note note-info note-{{ $transaction->id }}">
								<h4 class="block">{{ $transaction->transaction_purpose}}</h4>
								<p>
									  {{ $transaction->transaction_amount}}
								</p>
          <span class="label label-default">transactions</span>
          <a href="#" class="restore" data-type="settings" data-id="{{ $transaction->id }}">
          	   <i class=" icon-action-redo"></i> Restore
          </a>
            <a href="#" class="remove" data-type="settings" data-id="{{ $transaction->id }}">
          	   <i class="icon-trash pull-right"></i>
            </a>
							</div>
	   @endforeach
	   @foreach ($inquiries as $inquiry)
	   		<div class="note note-info note-{{ $inquiry->id }}">
								<h4 class="block">{{ $inquiry->subject}}</h4>
								<p>
									  {{ $inquiry->message}}
								</p>
          <span class="label label-default">inquiries</span>
          <a href="#"  class="restore" data-type="notifications" data-id="{{ $inquiry->id }}">
          	   <i class=" icon-action-redo"></i> Restore
          </a>
            <a href="#" class="remove" data-type="notifications" data-id="{{ $inquiry->id }}">
          	   <i class="icon-trash pull-right"></i>
            </a>
							</div>
	   @endforeach
	      @foreach ($committees as $committee)
	   		<div class="note note-info note-{{ $committee->id }}">
								<h4 class="block">{{ $committee->committee_title}}</h4>
								<p>
									  {{ $committee->committee_content}}
								</p>
          <span class="label label-default">committees</span>
          <a href="#"  class="estore" data-type="committee" data-id="{{ $committee->id }}">
          	   <i class=" icon-action-redo"></i> Restore
          </a>
           <a href="#" class="remove" data-type="committee" data-id="{{ $committee->id }}">
          	   <i class="icon-trash pull-right"></i>
            </a>
							</div>
	   @endforeach
	   @foreach ($updatesCategories as $updatesCategory)
	   		<div class="note note-info note-{{ $updatesCategory->id }}">
								<h4 class="block">{{ $updatesCategory->category_name}}</h4>
								<p style="color:{{ $updatesCategory->category_color}}">
          Color Identifier
								</p>
          <span class="label label-default">updatesCategories</span>
          <a href="#" class="restore" data-type="updatesCategory" data-id="{{ $updatesCategory->id }}">
          	   <i class=" icon-action-redo"></i> Restore
          </a>
          <a href="#" class="remove" data-type="updatesCategory" data-id="{{ $updatesCategory->id }}">
          	   <i class="icon-trash pull-right"></i>
          </a>
							</div>
	   @endforeach
		 </div>
</div>
@stop

@section('script')
{{ HTML::script('assets/dashboard/global/plugins/bootstrap-toastr/toastr.min.js') }}
<!-- END PAGE LEVEL SCRIPTS -->
{{ HTML::script('assets/dashboard/admin/pages/scripts/ui-toastr.js') }}
{{ HTML::script('assets/dashboard/global/scripts/metronic.js') }}
{{ HTML::script('assets/dashboard/admin/layout/scripts/layout.js') }}
<script>
  jQuery(document).ready(function() {
     Metronic.init();
     Layout.init();
      UIToastr.init();
  });
function user_restore (id) {

	            $.ajax({
    		                   url:"{{{route('users.update')}}}",
											              method:'PUT',
											              data:{id: id, un_archived:true   },
												             success:function(data){	if (data.match('ok')) window.location.reload();}
												 	});
}
$('.restore').click(function(event) {
	           var id = $(this).data('id');
 	 	        $.ajax({
    		                   url:$(this).data('type')+"/0",
											              method:'PUT',
											              data:{id: id, un_archived:true   },
												             success:function(data){
												               // console.log(data);
												                 $('.note-'+id).remove();
												                   toastr['success'](" ", "Successfully Restored");
												             }
												 	});
 });
$('.remove').click(function(event) {
	           var id = $(this).data('id');
 	 	        $.ajax({
    		                   url:$(this).data('type')+"/0",
											              method:'DELETE',
											              data:{id: id  },
												             success:function(data){
												              console.log(data);
												                 $('.note-'+id).remove();
												                 toastr['success'](" ", "Successfully Remove");

												             }
												 	});
 });

</script>


@stop