@extends('template.main')

@section('css')
{{HTML::style('assets/dashboard/global/plugins/fancybox/source/jquery.fancybox.css')}}
{{HTML::style('assets/dashboard/admin/pages/css/portfolio.css')}}
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
      <!-- BEGIN PAGE CONTENT-->
      <div class="row"   >
        <div class="col-md-12">
          <div class="tabbable tabbable-custom boxless">

            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <!-- BEGIN FILTER -->
                <div class="margin-top-10">
                <input class="search form-control" data-filter=".payee, .transaction-date"   placeholder="Search" />

                  <ul class="mix-filter">
                    <li class="filter" data-filter="all">
                       All
                    </li>
                    <li class="filter" data-filter="2012">
                      batch 2012
                    </li>
                    <li class="filter" data-filter="2013">
                      batch 2013
                    </li>
                    <li class="filter" data-filter="2014">
                      batch 2014
                    </li>
                    <li class="filter" data-filter="2015">
                       batch 2015
                    </li>
                  </ul>
                  <button type="button" id="filter">Filter</button>
             <!--       <select name="" class="mix-filter form-control">
                     <option class="filter" data-filter="all">All</option>
                     <option class="filter" data-filter="2012">2012</option>
                     <option class="filter" data-filter="2013">2013</option>
                     <option class="filter" data-filter="2014">2014</option>
                     <option class="filter" data-filter="2015">2015</option>

                   </select> -->

                  <div class="row mix-grid" id="receipt">
                     @foreach ($transactions as $transaction)
                      <div class="col-md-3 col-sm-4 mix   ">
                        <div class="mix-inner receipt item payee" >
                            <div class="row">

                              <div class="col-md-12">
                                <div class="col-md-6">
                                  <img src="{{asset('assets/front-page/images/pnpaa-logo-small.png')}}" alt="logo">
                                </div>
                                <div class="col-md-6 item transaction-date">
                                  <p>Date : {{{ dateMonth($transaction->transaction_date)}}} </p>
                                </div>
                                <div class="col-md-12">
                                  <p class="payee">Payee : {{{getUserName($transaction->user_id,true)}}} </p>
                                  <p class="received-from">Recieved From : {{{getUserName($transaction->transaction_setter,true)}}} </p>
                                  <p>On : {{{ dateMonth($transaction->transaction_date)}}} </p>
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
                            <h4>{{{getUserName($transaction->user_id,true)}}} is paying for {{{$transaction->transaction_purpose}}} nga tag {{{$transaction->transaction_amount}}}</h4>
                            {{--<a class="mix-link">
                            <i class="fa fa-link"></i>
                            </a>
                            <a class="mix-preview fancybox-button" href="http://localhost:8000/assets/front-page/images/pnpaa-logo-small.png" title="Project Name" data-rel="fancybox-button">
                            <i class="fa fa-search"></i>
                            </a>--}}
                          </div>
                        </div>
                      </div>
                     @endforeach

                  {{--  <div class="col-md-3 col-sm-4 mix test">
                      <div class="mix-inner">
                        <img class="img-responsive" src="../../assets/admin/pages/media/works/img2.jpg" alt="">
                        <div class="mix-details">
                          <h4>Cascusamus et iusto accusamus</h4>
                          <a class="mix-link">
                          <i class="fa fa-link"></i>
                          </a>
                          <a class="mix-preview fancybox-button" href="../../assets/admin/pages/media/works/img2.jpg" title="Project Name" data-rel="fancybox-button">
                          <i class="fa fa-search"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-sm-4 mix test">
                      <div class="mix-inner">
                        <img class="img-responsive" src="../../assets/admin/pages/media/works/img3.jpg" alt="">
                        <div class="mix-details">
                          <h4>Cascusamus et iusto accusamus</h4>
                          <a class="mix-link">
                          <i class="fa fa-link"></i>
                          </a>
                          <a class="mix-preview fancybox-button" href="../../assets/admin/pages/media/works/img3.jpg" title="Project Name" data-rel="fancybox-button">
                          <i class="fa fa-search"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-sm-4 mix category_1 category_2">
                      <div class="mix-inner">
                        <img class="img-responsive" src="../../assets/admin/pages/media/works/img4.jpg" alt="">
                        <div class="mix-details">
                          <h4>Cascusamus et iusto accusamus</h4>
                          <a class="mix-link">
                          <i class="fa fa-link"></i>
                          </a>
                          <a class="mix-preview fancybox-button" href="../../assets/admin/pages/media/works/img4.jpg" title="Project Name" data-rel="fancybox-button">
                          <i class="fa fa-search"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-sm-4 mix category_2 category_1">
                      <div class="mix-inner">
                        <img class="img-responsive" src="../../assets/admin/pages/media/works/img5.jpg" alt="">
                        <div class="mix-details">
                          <h4>Cascusamus et iusto accusamus</h4>
                          <a class="mix-link">
                          <i class="fa fa-link"></i>
                          </a>
                          <a class="mix-preview fancybox-button" href="../../assets/admin/pages/media/works/img5.jpg" title="Project Name" data-rel="fancybox-button">
                          <i class="fa fa-search"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-sm-4 mix category_1 category_2">
                      <div class="mix-inner">
                        <img class="img-responsive" src="../../assets/admin/pages/media/works/img6.jpg" alt="">
                        <div class="mix-details">
                          <h4>Cascusamus et iusto accusamus</h4>
                          <a class="mix-link">
                          <i class="fa fa-link"></i>
                          </a>
                          <a class="mix-preview fancybox-button" href="../../assets/admin/pages/media/works/img6.jpg" title="Project Name" data-rel="fancybox-button">
                          <i class="fa fa-search"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-sm-4 mix category_2 category_3">
                      <div class="mix-inner">
                        <img class="img-responsive" src="../../assets/admin/pages/media/works/img1.jpg" alt="">
                        <div class="mix-details">
                          <h4>Cascusamus et iusto accusamus</h4>
                          <a class="mix-link">
                          <i class="fa fa-link"></i>
                          </a>
                          <a class="mix-preview fancybox-button" href="../../assets/admin/pages/media/works/img1.jpg" title="Project Name" data-rel="fancybox-button">
                          <i class="fa fa-search"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-sm-4 mix category_1 category_2">
                      <div class="mix-inner">
                        <img class="img-responsive" src="../../assets/admin/pages/media/works/img2.jpg" alt="">
                        <div class="mix-details">
                          <h4>Cascusamus et iusto accusamus</h4>
                          <a class="mix-link">
                          <i class="fa fa-link"></i>
                          </a>
                          <a class="mix-preview fancybox-button" href="../../assets/admin/pages/media/works/img2.jpg" title="Project Name" data-rel="fancybox-button">
                          <i class="fa fa-search"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-sm-4 mix category_3">
                      <div class="mix-inner">
                        <img class="img-responsive" src="../../assets/admin/pages/media/works/img4.jpg" alt="">
                        <div class="mix-details">
                          <h4>Cascusamus et iusto accusamus</h4>
                          <a class="mix-link">
                          <i class="fa fa-link"></i>
                          </a>
                          <a class="mix-preview fancybox-button" href="../../assets/admin/pages/media/works/img4.jpg" title="Project Name" data-rel="fancybox-button">
                          <i class="fa fa-search"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-3 col-sm-4 mix category_1">
                      <div class="mix-inner">
                        <img class="img-responsive" src="../../assets/admin/pages/media/works/img3.jpg" alt="">
                        <div class="mix-details">
                          <h4>Cascusamus et iusto accusamus</h4>
                          <a class="mix-link">
                          <i class="fa fa-link"></i>
                          </a>
                          <a class="mix-preview fancybox-button" href="../../assets/admin/pages/media/works/img3.jpg" title="Project Name" data-rel="fancybox-button">
                          <i class="fa fa-search"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                    --}}
                  </div>
                </div>
                <!-- END FILTER -->
              </div>

            </div>
          </div>
        </div>


      </div>

@stop
@section('script')
{{ HTML::script('assets/dashboard/global/plugins/jquery-mixitup/jquery.mixitup.min.js') }}
{{ HTML::script('assets/dashboard/global/plugins/fancybox/source/jquery.fancybox.pack.js') }}
{{ HTML::script('assets/dashboard/admin/pages/scripts/portfolio.js') }}
{{ HTML::script('assets/dashboard/global/scripts/metronic.js') }}
{{ HTML::script('assets/dashboard/admin/layout/scripts/layout.js') }}
{{ HTML::script('assets/js/app/protractor.js') }}

<script>
jQuery(document).ready(function() {
   Metronic.init(); // init metronic core components
   Layout.init(); // init current layout
   $('.mix-grid').mixitup();
   var $container = $('#receipt').isotope({
      // options
    });

   $('.search').keyup(function(event) {
      var filterValue = $(this).attr('data-filter');
      $container.isotope({ filter: filterValue });
   });

});
</script>
@stop