@extends('template.main')

@section('css')
{{HTML::style('assets/dashboard/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}
{{HTML::style('assets/dashboard/global/plugins/bootstrap-toastr/toastr.min.css')}}

@stop

@section('content')
<h3 class="page-title">
  PNPAA Inquiries
</h3>
<div class="page-bar">
  <ul class="page-breadcrumb">
    <li>
      <i class="fa fa-home"></i>
      <a href="{{{route('dashboard')}}}">Home</a>
      <i class="fa fa-angle-right"></i>
    </li>
    <li class="active">
      Inquiry
    </li>
  </ul>
</div>

<div class="row" ng-app="inquiryApp">
 <div ng-controller="inquiryController">
     <div class="col-md-12 index">
        <table class="table table-hover" id="inquiryTable">
          <thead>
            <tr>
              <th>Name</th>
              <th>Subject</th>
              <th>Email</th>
              <th>Message</th>
              <th>Date</th>
              <th class="no-sort">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($inquiries as $inquiry)

              @if($inquiry->type ==0)
                <tr class="r-{{ $inquiry->id }}">
                  <td class="n-{{ $inquiry->id }}">{{{ $inquiry->name }}}  </td>
                      <td class="s-{{ $inquiry->id }}">{{{ $inquiry->subject }}} </td>
                      <td class="e-{{ $inquiry->id }}">{{{ $inquiry->email }}} </td>
                      <td class="m-{{ $inquiry->id }}">{{{ $inquiry->message }}} </td>
                      <td class="d-{{ $inquiry->id }}">{{{ dateMonth($inquiry->created_at) }}} </td>
                  <td style="width: 10%;"><button class="btn green-meadow" ng-click="view({{ $inquiry->id }})">View</button><button ng-click="delete({{ $inquiry->id }})" class="btn btn-danger">Delete</button></td>
               </tr>
              @endif
            @endforeach
           </tbody>
         </table>
    </div>
    <div class="clearfix">
    </div>
   <div class="col-md-12 view hidden">
           <div class="col-md-10 col-md-offset-1">
            <button type="button" class="btn btn-info" ng-click="index()" >Back</button>
        {{--      <div class="form-goup">
                    <label for="">Name</label>
                    <p>[[ data.name ]]</p>
             </div>
              <div class="form-goup">
                    <label for="">Subject</label>
                    <p>[[ data.subject ]]</p>
             </div>
              <div class="form-goup">
                    <label for="">Email</label>
                    <p>[[ data.email ]]</p>
             </div>
              <div class="form-goup">
                    <label for="">Message</label>
                    <p>[[ data.message ]]</p>
             </div> --}}
             <div class="clearfix">
             </div>
             <br>
          <ul style="list-style: none;">
                <li>
                  <div class="alert alert-info">
                     <p>From:  [[ data.name ]] << [[ data.email ]] >></p>
                    <strong>[[ data.subject ]] </strong>
                     <p>
                    [[ data.message ]]
                    </p>
                  </div>
                </li>
               @foreach ($inquiries as $inquiry)

                    @if ($inquiry->type  == 1)
                      <li class="admin key" data-email="{{$inquiry->email}}">
                    <div class="alert alert-success">
                    @else
                      <li class="inquirer  key" data-email="{{$inquiry->email}}">
                    <div class="alert alert-info">
                    @endif
                      <strong>{{$inquiry->subject}}</strong> <p>{{$inquiry->message}}</p>
                      <p class="text-right">{{dateMonth($inquiry->created_at)}}</p>
                    </div>
                     </li>

               @endforeach
             </ul>
             <div class="clearfix">
             </div>
             <h3>Reply to this message</h3>
             <form action="#" id="replyForm"  onsubmit="return false;" accept-charset="utf-8">
              {{Form::token()}}
               <div class="form-goup">
                      <label for="">Subject</label>
                      <input type="text" class="form-control"  name="subject" value="" placeholder="">
               </div>
                <div class="form-goup">
                      <label for="">Message</label>
                      <textarea name="message"    class="form-control"></textarea>
                </div>
                <br/>
                <div class="form-goup">
                      <button type="submit" class="btn green-meadow" ng-click="reply()">Send</button>
                </div>
              </form>

           </div>
   </div>
   <div class="clearfix">
   </div>
   <div class="col-md-12 delete hidden">
           <div class="col-md-10 col-md-offset-1">
            <button type="button" class="btn btn-info" ng-click="index()" >Back</button>
             <div class="form-goup">
                    <label for="">Name</label>
                    <p>[[ data.name ]]</p>
             </div>
              <div class="form-goup">
                    <label for="">Subject</label>
                    <p>[[ data.subject ]]</p>
             </div>
              <div class="form-goup">
                    <label for="">Email</label>
                    <p>[[ data.email ]]</p>
             </div>
             <div class="form-goup">
                    <label for="">Message</label>
                    <p>[[ data.message ]]</p>
             </div>
             <div class="form-goup">
                      <button type="button"  ng-click="destroy([[data.id]])" class="btn btn-danger">Delete</button>
               </div>
           </div>
   </div>
 </div>
</div>

@stop
@section('script')
 {{ HTML::script('assets/dashboard/global/plugins/bootstrap-toastr/toastr.min.js') }}
<!-- END PAGE LEVEL SCRIPTS -->
{{ HTML::script('assets/dashboard/admin/pages/scripts/ui-toastr.js') }}
{{ HTML::script('assets/dashboard/global/scripts/metronic.js') }}
{{ HTML::script('assets/dashboard/admin/layout/scripts/layout.js') }}
{{ HTML::script('assets/dashboard/global/plugins/datatables/media/js/jquery.dataTables.min.js') }}
{{ HTML::script('assets/dashboard/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js') }}
{{ HTML::script('assets/js/jquery.validation.min.js') }}
{{ HTML::script('assets/js/custom-validation.js') }}
 <script type="text/javascript">
   jQuery(document).ready(function() {
     Metronic.init();
     Layout.init();
    // UIToastr.init();
  });
 $('#inquiryTable').dataTable({
    "aoColumnDefs":[{
      "bSortable":false,
      "aTargets":['no-sort']
    }]
   });
 </script>



@stop