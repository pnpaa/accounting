@extends('template.main')
@section('css')
{{HTML::style('assets/dashboard/admin/pages/css/inbox.css')}}
@stop
@section('content')
<h3 class="page-title">
   Inbox <small>user inbox</small>
</h3>
<div class="page-bar">
   <ul class="page-breadcrumb">
      <li>
         <i class="fa fa-home"></i>
         <a href="index.html">Home</a>
         <i class="fa fa-angle-right"></i>
      </li>
      <li>
         <a href="#">Extra</a>
         <i class="fa fa-angle-right"></i>
      </li>
      <li>
         <a href="#">Inbox</a>
      </li>
   </ul>
   <div class="page-toolbar">
      <div class="btn-group pull-right">
         <button type="button" class="btn btn-fit-height grey-salt dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="1000" data-close-others="true">
         Actions <i class="fa fa-angle-down"></i>
         </button>
         <ul class="dropdown-menu pull-right" role="menu">
            <li>
               <a href="#">Action</a>
            </li>
            <li>
               <a href="#">Another action</a>
            </li>
            <li>
               <a href="#">Something else here</a>
            </li>
            <li class="divider">
            </li>
            <li>
               <a href="#">Separated link</a>
            </li>
         </ul>
      </div>
   </div>
</div>
<!-- END PAGE HEADER-->
<div ng-app="mailApp">
   <div class="row inbox" ng-controller="mailAppController">
      <input type="hidden" name="base_url" value="{{URL::to('/')}}">
      <div class="col-md-2">

         <ul class="inbox-nav margin-bottom-10">
            <li class="compose-btn">
               <a href="{{route('mail.create')}}" data-title="Compose" class="btn green">
               <i class="fa fa-edit"></i> Compose </a>
            </li>
            <li class="inbox <?php echo (explode('.',Route::currentRouteName() )[0] == 'mail')?'active':'';?>">
               <a href="{{route('mail.index')}}" class="btn" data-title="Inbox">
               Inbox(3) </a>
               <b></b>
            </li>
            <li class="all <?php echo (Request::path()=='mailler/all')?'active':'';?>">
               <a href="{{URL::to('mailler/all')}}" class="btn" data-title="Inbox">
               All Mail</a>
               <b></b>
            </li>
            <li class="sent  <?php echo (Request::path()=='mailler/sent')?'active':'';?>">
               <a class="btn" href="{{URL::to('mailler/sent')}}" data-title="Sent">
               Sent </a>
               <b></b>
            </li>
            <li class="draft  <?php echo (Request::path()=='mailler/draft')?'active':'';?>">
               <a class="btn" href="{{URL::to('mailler/draft')}}" data-title="Draft">
               Draft </a>
               <b></b>
            </li>
               <li class="draft  <?php echo (Request::path()=='mailler/spam')?'active':'';?>">
               <a class="btn" href="{{URL::to('mailler/spam')}}" data-title="Draft">
               Spam </a>
               <b></b>
            </li>
            <li class="trash  <?php echo (Request::path()=='mailler/trash')?'active':'';?>">
               <a class="btn" href="{{URL::to('mailler/trash')}}" data-title="Trash">
               Trash </a>
               <b></b>
            </li>
            @foreach (getUserFolders() as $folder)
            <li>
               <a href="{{{URL::to('folder/'.$folder->id)}}}">
               <i class="icon-eye"></i>
               <span class="title">
               {{$folder->folder_name}} </span>
               <i class="fa  fa-trash-o pull-right"></i>
               <i class="fa fa-edit pull-right "></i>
               </a>
            </li>
            @endforeach
            <li>
               <a href="{{{route('folder.create')}}}">
               <i class="icon-plus"></i>
               <span class="title">
               Add Folder</span>
               </a>
            </li>
         </ul>
      </div>
      <div class="col-md-10">
         <div class="inbox-loading">
         </div>
         <div class="inbox-content">
            <table class="table table-striped table-advance table-hover">
               <thead>
                  <tr>
                     <th colspan="3">
                        <div class="checker"></div>
                        <div class="btn-group">
                           <a class="btn btn-sm blue dropdown-toggle" href="#" data-toggle="dropdown">
                           More <i class="fa fa-angle-down"></i>
                           </a>
                           <ul class="dropdown-menu">
                              <li>
                                 <a href="#" class="read-message">
                                 <i class="fa fa-pencil"></i> Mark as Read </a>
                              </li>
                              <li>
                                 <a href="#" class="spam-message">
                                 <i class="fa fa-ban"></i> Spam </a>
                              </li>
                              <li class="divider">
                              </li>
                              <li>
                                 <a href="#" class="delete-message">
                                 <i class="fa fa-trash-o"></i> Delete </a>
                              </li>
                           </ul>
                        </div>
                     </th>
                     <th class="pagination-control" colspan="3">
                        <span class="pagination-info">
                       <?php echo $mails->links(); ?>
                       </span>
                       {{--  <a class="btn btn-sm blue">
                       <i class="fa fa-angle-left"></i>
                       </a>
                       <a class="btn btn-sm blue">
                       <i class="fa fa-angle-right"></i>
                       </a> --}}
                     </th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($mails as $mail)
                  @if ($mail->type == 0)
                  <tr class="unread  m-{{$mail->id}}" data-messageid="{{$mail->id}}" >
                     <td class="inbox-small-cells">
                        <div class="mail-checkbox" data-id="{{$mail->id}}" ></div>
                     </td>

                     <td class="inbox-small-cells">
                        <i class="fa fa-star"></i>
                     </td>
                     <td class="view-message hidden-xs" ng-click="viewMessage( {{ $mail->id }} )">
                        {{$mail->subject}}
                     </td>
                     <td class="view-message" ng-click="viewMessage( {{ $mail->id }} )">
                        {{ substr($mail->message,0,80) }}
                     </td>
                     <td class="view-message inbox-small-cells">
                     </td>
                     <td class="view-message text-right">
                        {{ dateMonth($mail->created_at)}}
                     </td>
                  </tr>
                  @endif
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
@stop
@section('script')
<script>
   $('.mail-checkbox').on('click',function(){
     $(this).hasClass('selected')?$(this).removeClass('selected'):$(this).addClass('selected');
   });
  $('.checker').click(function(){
   if($(this).hasClass('selected')){
      $(this).removeClass('selected')
     $('.mail-checkbox').each(function(){
        if($(this).hasClass('selected'))$(this).removeClass('selected');
     });
   }else{
     $(this).addClass('selected')
     $('.mail-checkbox').each(function(){
        if(!$(this).hasClass('selected'))$(this).addClass('selected');
     });
  }
  });
  $('.delete-message').click(function(){
     $('.mail-checkbox').each(function(){
        if($(this).hasClass('selected')){
         console.log($(this).data('id'));
         var id=$(this).data('id');
          $.ajax({
            url: "{{route('mail.update')}}",
            type: 'PUT',
            data: {id: id,delete:true},
            success:function(data){
                $('.m-'+id).remove();
            }
         });
        }
     });
  });
   $('.spam-message').click(function(){
     $('.mail-checkbox').each(function(){
        if($(this).hasClass('selected')){
         console.log($(this).data('id'));
         var id=$(this).data('id');
          $.ajax({
            url: "{{route('mail.update')}}",
            type: 'PUT',
            data: {id: id,spam:true},
            success:function(data){
                $('.m-'+id).remove();
            }
         });
        }
     });
  });
    $('.read-message').click(function(){
     $('.mail-checkbox').each(function(){
        if($(this).hasClass('selected')){
         console.log($(this).data('id'));
         var id=$(this).data('id');
         /* $.ajax({
            url: "{{route('mail.update')}}",
            type: 'PUT',
            data: {id: id,read:true},
            success:function(data){
                $('.m-'+id).remove();
            }
         });*/
        }
     });
  });

</script>
@stop