@extends('template.main')

@section('content')
<!-- BEGIN PAGE HEADER-->
<h3 class="page-title">
 PNPAA Committees
</h3>
<div class="page-bar">
  <ul class="page-breadcrumb">
    <li>
      <i class="fa fa-home"></i>
      <a href="{{ route('dashboard') }}">Home</a>
      <i class="fa fa-angle-right"></i>
    </li>
    <li>
      Current Committees
    </li>
  </ul>
</div>
<!-- END PAGE HEADER-->
<!-- BEGIN PAGE CONTENT-->
<div class="row" >
  <div class="col-md-4">
    <div class="portlet  box green-haze">
      <div class="portlet-title">
        <div class="caption">
          <i class="fa fa-users"></i>Create New Committee
        </div>
      </div>
      <div class="portlet-body">
        <form  action="#"  role="form" onsubmit="return false;" class="add-committee" accept-charset="utf-8">
          <div class="form-group">
            <h4>Committee Name</h4>
            <input type="text" class="form-control"  name="committee_title">
          </div>
          <div class="form-group">
            <h4>Committee Details</h4>
            <textarea  class="form-control"  name="committee_content" style="height: 250px;" ></textarea>
          </div>
          <div class="form-group">
            <button type="submit"  class="btn btn-lg create-committee green-meadow">Create</button>
          </div>
          {{Form::token()}}
        </form>
      </div>
    </div>
  </div>
  <div class="col-md-8" id="sortable_portlets">
    <div class="col-md-6">
      <!-- empty sortable porlet required for each columns! -->
      <div class="portlet portlet-sortable-empty next-con text-center">
        <p><span class="fa fa-cloud"></span> Drag an item here</p>
      </div>
    </div>
    <div class="col-md-6">
      <!-- empty sortable porlet required for each columns! -->
      <div class="portlet portlet-sortable-empty text-center">
        <p><span class="fa fa-cloud"></span> Drag an item here</p>
      </div>
    </div>
    @foreach($committee as $com)
    <div class="col-md-6  column sortablea" id="portlet-{{{$com->id}}}">
      <div class="portlet portlet-sortable box green-haze">
        <div class="portlet-title">
          <div class="caption">
            <i class="fa fa-user"></i>
          </div>
          <div class="actions">
            <a href="#" class="btn btn-default btn-sm edit" data-id="{{{$com->id}}}" data-toggle="modal" data-target="#myModal">
            <i class="fa fa-pencil"></i> Edit </a>
            <a href="#" class="btn btn-default btn-sm delete"  data-id="{{{$com->id}}}" data-toggle="modal" data-target="#myModal2">
            <i class="fa fa-times"></i> Delete </a>
          </div>
        </div>
        <div class="portlet-body">
          <h4>{{{$com->committee_title}}}</h4>
          <p>
            {{{$com->committee_content}}}
          </p>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
</div>
<!-- END PAGE CONTENT-->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Editing Committee Info</h4>
      </div>
      <div class="modal-body">
        <form action="#" role="form" accept-charset="utf-8">
          <div class="form-group">
            <h4>Committee Name</h4>
            <input type="text" class="form-control" name="m_committee_title">
          </div>
          <div class="form-group">
            <h4>Committee Details</h4>
            <textarea class="form-control" name="m_committee_content" style="height: 250px;"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary btn-edit">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel"></h4>
      </div>
      <div class="modal-body">
        <h4>Are you sure you want to delete this committee?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger confirm-delete">Delete</button>
      </div>
    </div>
  </div>
</div>
<input type="hidden" name="current-id" value="" >
@stop
@section('script')
<!-- BEGIN PAGE LEVEL SCRIPTS -->
{{ HTML::script('assets/dashboard/global/scripts/metronic.js') }}
{{ HTML::script('assets/dashboard/admin/layout/scripts/layout.js') }}
{{ HTML::script('assets/dashboard/admin/layout/scripts/layout.js') }}
{{ HTML::script('assets/dashboard/admin/pages/scripts/portlet-draggable.js') }}
<!-- END PAGE LEVEL SCRIPTS -->
<script>
  jQuery(document).ready(function() {
     // initiate layout and plugins
     Metronic.init(); // init metronic core components
     Layout.init(); // init current layout
     PortletDraggable.init();
  });
   $('.create-committee').click(function(event) {
      // console.log('yay'+( $('input[name=committee_title]').val() ).length);

    if (( $('input[name=committee_title]').val() ).length > 0) {
      console.log('yey');
      $.ajax({
      	url: '{{{route('committee.store')}}}',
      	type: 'POST',
      	data: {
      		_token:$('input[name=_token]').val(),
      		committee_title: $('input[name=committee_title]').val(),
      		committee_content: $('textarea[name=committee_content]').val()
      	},
      	success:function(data){
       /*   console.log(data);
      		 	var portlet='<div class="portlet portlet-sortable box green-haze" id="portlet-'+data.data.id+'">'
  										+'<div class="portlet-title">'
  											+'<div class="caption">'
  												+'<i class="fa fa-user"></i>'
  											+'</div>'
  											+'<div class="actions">'
  												+'<a href="#" class="btn btn-default btn-sm edit" data-id="{{{$com->id}}}" data-toggle="modal" data-target="#myModal">'
  												+'<i class="fa fa-pencil"></i> Edit </a>'
  												+'<a href="#" class="btn btn-default btn-sm delete" data-id="{{{$com->id}}}" data-toggle="modal" data-target="#myModal2">'
  												+'<i class="fa fa-times"></i> Delete </a>'
  											+'</div>'
  										+'</div>'
  										+'<div class="portlet-body">'
  											 +'<h4>'+data.data.committee_title+'</h4>'
  												+'<p>'+data.data.committee_content+'</p>'
  										+'</div>'
  								+'</div><div class="clearfix"></div>';
  		    	$('div.next-con').append(portlet);*/
            location.reload();
          	$('input[name=current-id]').val(data.data.id);
      	}
      });
    };

   });

  $('.delete').click(function(event) {
  	$('input[name=current-id]').val($(this).data('id'));
  	// console.log($(this).data('id'));
  });
  $('.edit').click(function(event) {
  	$('input[name=current-id]').val($(this).data('id'));
      $('input[name=m_committee_title]').val($('div#portlet-'+$(this).data('id') +' div.portlet-body').find('h4').text());
      $('textarea[name=m_committee_content]').val($('div#portlet-'+$(this).data('id') +' div.portlet-body').find('p').text());
  });
  $('.confirm-delete').click(function(event) {
  	 $.ajax({
  	 	url:'{{{route('committee.destroy')}}}',
  	 	method:'delete',
          data:{
          	id:$('input[name=current-id]').val()
          },
          success:function(data){
            console.log(data);
          	data.match('success')?$('#myModal2').modal('hide'):'';
          	data.match('success')?$('#portlet-'+$('input[name=current-id]').val()).remove():'';
          }
  	 });
  });
  $('.btn-edit').click(function(event) {
     $.ajax({
     	  url:'{{{route('committee.update')}}}',
     	  method:'put',
     	  data:{
     	  	  id:$('input[name=current-id]').val(),
     	  	  committee_title:$('input[name=m_committee_title]').val(),
     	  	  committee_content:$('textarea[name=m_committee_content]').val()
     	  },
     	  success:function(data){
     	    // console.log(data);
     	  	$('#myModal').modal('hide');
          $('div#portlet-'+$('input[name=current-id]').val() +' div.portlet-body').find('h4').html(data.data.committee_title);
          $('div#portlet-'+$('input[name=current-id]').val() +' div.portlet-body').find('p').html(data.data.committee_content);
     	  }
     });
  });
</script>
@stop