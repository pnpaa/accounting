@extends('template.main')
@section('css')
{{HTML::style('assets/dashboard/admin/pages/css/inbox.css')}}
{{HTML::style('assets/dashboard/admin/pages/css/bootstrap-wysihtml5.css')}}
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
            <li class="inbox <?php echo (explode('.',Route::currentRouteName() )[0]== 'mail')?'active':'';?>">
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
            <form class="inbox-compose form-horizontal" id="fileupload" action="{{URL::to('mailler/reply')}}" method="POST"  >
               <div class="inbox-compose-btn">
                  <button class="btn blue"><i class="fa fa-check"></i>Send</button>
                  <button class="btn">Discard</button>
                  <button class="btn">Draft</button>
               </div>
               <div class="inbox-form-group mail-to">
                  <label class="control-label">To:</label>
                  <div class="controls controls-to">
                     <input type="hidden" name="recepient" value="{{$mail->sender,true}}">
                     <input type="text" class="form-control" name="to" value="{{getUserName($mail->sender,true)}}">
                  </div>
               </div>
               <div class="inbox-form-group">
                  <label class="control-label">Subject:</label>
                  <div class="controls">
                     <input type="text" class="form-control" name="subject" value="Urgent - Financial Report for May, 2013">
                  </div>
               </div>
               <div class="inbox-form-group">
                  <textarea name="message" class="form-control" placeholder="your message" style=" height: 250px;"></textarea>
               </div>
               <div class="inbox-compose-btn">
                  <button class="btn blue"><i class="fa fa-check"></i>Send</button>
                  <button class="btn">Discard</button>
                  <button class="btn">Draft</button>
               </div>
               <input type="hidden" name="thread" value="{{$mail->thread}}">
               {{Form::token()}}
            </form>
         </div>
      </div>
   </div>
</div>
@stop
@section('script')
<script></script>
@stop
