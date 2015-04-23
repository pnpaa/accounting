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
            <li class="inbox <?php echo (Route::currentRouteName() == 'mail.index')?'active':'';?>">
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
         @foreach ($mails as $mail)
            @if ($mail->type == 0)
            <div class="inbox-header inbox-view-header">
               <h1 class="pull-left">{{$mail->subject}} <a href="#">
                  Inbox </a>
               </h1>
               <div class="pull-right">
                  <i class="fa fa-print"></i>
               </div>
            </div>

            <div class="inbox-view-info">
               <div class="row">
                  <div class="col-md-7">
                     <img src="../../assets/admin/layout/img/avatar1_small.jpg">
                     <span class="bold">
                     {{getUserName($mail->sender,true)}} </span>
                     <span>
                     &lt;asasdev@pnpaa.com&gt; </span>
                     to <span class="bold">
                     me </span>
                     on  {{ dateMonth($mail->created_at)}}
                  </div>
                  <div class="col-md-5 inbox-info-btn">
                     <div class="btn-group">
                        <a href="{{URL::to('mailler/reply/'.$mail->id)}}" > <button data-messageid="{{$mail->id}}" class="btn blue reply-btn  ">
                        <i class="fa fa-reply"></i> Reply </button>  </a>
                        <button class="btn  blue dropdown-toggle  pull-right" data-toggle="dropdown">
                        <i class="fa fa-angle-down"></i>
                        </button>
                        <ul class="dropdown-menu pull-right">
                           <li>
                              <a href="{{URL::to('mailler/reply/'.$mail->id)}}" data-messageid="{{$mail->id}}" class="reply-btn">
                              <i class="fa fa-reply"></i> Reply </a>
                           </li>
                           <li>
                              <a href="#">
                              <i class="fa fa-arrow-right reply-btn"></i> Forward </a>
                           </li>
                           <li>
                              <a href="#">
                              <i class="fa fa-print"></i> Print </a>
                           </li>
                           <li class="divider">
                           </li>
                           <li>
                              <a href="#">
                              <i class="fa fa-ban"></i> Spam </a>
                           </li>
                           <li>
                              <a href="#">
                              <i class="fa fa-trash-o"></i> Delete </a>
                           </li>
                           <li>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            <div class="inbox-view">
               {{ $mail->message }}
            </div>
            @endif
            @endforeach
            <div class="clearfix">
            </div>
            <div class="inbox-replies pt-25">
               <ul class="thread-replies p-0">
                  @foreach ($mails as $mail)
                  @if ($mail->type == 1)
                  <li>
                  <div class="alert alert-success">
                           <strong>Title!</strong>{{ $mail->message }}
                  </div>

                  </li>
                  @endif
                  @endforeach
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>
@stop
@section('script')
<script></script>
@stop