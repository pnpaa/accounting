
<!DOCTYPE html>
<html ng-app="frontApp">
  <head>
    <title></title>
    {{ HTML::style('assets/front-page/css/bootstrap.css')}}
    {{ HTML::style('assets/front-page/css/style.css')}}
    {{ HTML::style('assets/front-page/css/animate.css')}}
    {{ HTML::style('assets/front-page/css/color-variations/A.turquoise.css.pagespeed.cf.dggqjT2eCM.css')}}
    {{ HTML::script('assets/front-page/js/js-1.js') }}
    {{ HTML::script('assets/front-page/js/utils.js') }}
    {{ HTML::script('assets/js/app/angular.js') }}
    {{ HTML::script('assets/js/app/app.js') }}
  </head>
  <body ng-controller="frontController">

    <div id="load"></div>
    <div class="everything">
      <div class="navbar navbar-default style2 border hide-on-start navbar-fixed-top" role="navigation">
        <!-- BEGIN: NAV-CONTAINER -->
        <div class="nav-container">
          <div class="navbar-header">
            <!-- BEGIN: TOGGLE BUTTON (RESPONSIVE)-->
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <!-- BEGIN: LOGO -->
            <a class="navbar-brand nav-to" href="{{{route('index')}}}">
            <img src="{{asset('assets/front-page/images/pnpaa-logo-small.png')}}" alt="">
            </a>
          </div>
          <!-- BEGIN: MENU -->
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              <li><a class="nav-to" href="#home"> HOME</a>
              </li>
              <li>
                <a class="nav-to" href="#about">Who we are</a>
                <ul class="dropdown-menu">
                  <li><a class="nav-to" href="#about">About our Organization</a></li>
                  <!-- <li><a class="nav-to" href="#featured">Featured Works</a></li> -->
                  <li><a class="nav-to" href="#team">Meet the Team</a></li>
                </ul>
              </li>
              <li><a class="nav-to" href="#services">What we do</a></li>
              <li><a class="nav-to" href="#forum">Forum</a></li>
              <li><a class="nav-to" href="#contacts">Contact</a></li>
              @if(Auth::check())
              <li><a class="nav-to" href="{{{route('users.edit',Auth::id())}}}">{{{Auth::user()->first_name}}}</a></li>
              @else
              <li><a class="nav-to" href="{{{route('login')}}}">Login</a></li>
              @endif
            </ul>
          </div>
          <!-- END: MENU -->
        </div>
        <!--END: NAV-CONTAINER -->
      </div>
      <!-- END: HEADER BAR -->
      <!-- BEGIN: #HOME -->
      <section id="home" class="intro-parallax nav-boxes">
        <!-- BEGIN: HOME PARALLAX -->
        <div id="parallax-home" class="parallax" style="background-image:url({{asset('assets/front-page/images/parallax/PN.jpg')}});background-size:cover">
          <!-- Parallax pattern overlay -->
          <div class="parallax-overlay parallax-overlay-pattern"></div>
          <!-- BEGIN: PARALLAX HOME CONTENTS -->
          <div id="parallax-home-contents">
            <div class="home-center-contents">
              <!-- BEGIN: BIG LOGO -->
              <a href="#about" class="logo-home nav-to">
              <img src="{{{asset('assets/front-page/images/pnpaa-logo.png')}}}" alt="">
              </a>
              <!-- BEGIN: TEXT SLIDER -->
              <div id="text-slider" class="flexslider">
                <ul class="slides styled-list">
                  <li class="home-slide">
                    <p class="home-slide-content">Together <span class="text_color"><i class="fa fa-heart-o"></i></span> We Begin</p>
                  </li>
                  <li class="home-slide">
                    <p class="home-slide-content">Together <span class="text_color">We</span> Progress</p>
                  </li>
                  <li class="home-slide">
                    <p class="home-slide-content">Together <span class="text_color">We</span> Succeed</p>
                  </li>
                </ul>
              </div>
              <!-- END: TEXT SLIDER -->
            </div>
          </div>
          <!-- END: PARALLAX HOME CONTENTS -->
          <!-- BEGIN: GO NEXT SECTION BUTTON -->
          <div class="next-section">
            <a class="nav-to go-about animated flipInX" href="#about">GET STARTED</a>
          </div>
        </div>
        <!-- END: HOME PARALLAX -->
      </section>
      <!-- END: #HOME -->
      <!-- BEGIN: ABOUT SECTION -->
      <section id="about" class="nav-boxes">
        <!-- BEGIN: GREY SECTION WITH "light-text" TEXT AND "section-arrow-down" -->
        <div class="grey-section dark-text section-arrow-down">
          <!-- BEGIN: CONTAINER -->
          <div class="container">
            <!-- BEGIN: ABOUT TITLE -->
            <div class="section-title row">
              <h2>WHO <span class="bold">WE</span> ARE</h2>
              <div class="divider colored"></div>
            </div>
            <!-- END -->
            <div class="row">
              <!-- BEGIN: ABOUT OUR AGENCY -->
              <div class="col-xs-12 col-sm-6">
                <h3>Our Vision </h3>
                <p>Our vision is to be a world-class alumni association that sustains and strengthens the lifelong bond between PNPAA, its members and Passerelles Numeriques.</p>
                <br>
                <div class="space"></div>
              </div>
              <!-- END -->
              <!-- BEGIN: ANIMATED SKILLS BARS -->
              <div class="col-xs-12 col-sm-6">
                <h3>Our Mission</h3>
                <!-- BEGIN: SKILLS DESIGN -->
                <p>We wish to facilitate the continued interaction of Alumni with the association in the interest of sustaining the association’s ability to develop and maintain a commitment to excellence and integrity. We will view ourselves as a family so these attributes will be carried over into service.</p>
                <!-- END: SKILLS DESIGN -->
                <!-- BEGIN: SKILLS CODE -->
                <!-- END: SKILLS CODE -->
              </div>
              <!-- END: ANIMATED SKILLS BARS -->
            </div>
            <!-- END: ROW -->
            <div class="divider-contents"></div>
            <div class="space"></div>
            <div class="row">
              <!-- BEGIN 4 COLUMNS / 12 COLUMNS (<768px) -->
              <div class="col-xs-12 col-sm-4">
                <!-- BEGIN: AGENCY FACTS -->
                <div id="agency-slider" class="flexslider">
                  <ul class="slides">
                    <!-- SLIDE #01 -->
                    <li>
                      <div class="big-icon">
                        <i class="fa fa-clock-o"></i>
                        <div class="number">3<span class="unit">Years</span></div>
                        <p>Three years of serving as a bridge for each alumni and the PasserellesNumeriques staff.</p>
                      </div>
                    </li>
                    <!-- SLIDE #02 -->
                    <li>
                      <div class="big-icon">
                        <i class="fa fa-desktop" style="font-size:80px;"></i>
                        <div class="number">100+<span class="unit">Works</span></div>
                        <p>Promoting and providing services for PasserellesNumeriques and its alumni.</p>
                      </div>
                    </li>
                    <!-- SLIDE #03 -->
                    <li>
                      <div class="big-icon">
                        <i class="fa fa-users"></i>
                        <div class="number">200+<span class="unit">Members</span></div>
                        <p>Increasing members of the organization.</p>
                      </div>
                    </li>
                    <!-- SLIDE #04 -->
                    <!-- SLIDE #05 -->
                  </ul>
                </div>
                <!-- END: AGENCY FACTS -->
              </div>
              <!-- BEGIN 4 COLUMNS / 12 COLUMNS (<768px) -->
              <div class="col-xs-12 col-sm-4">
                <h4>Overview</h4>
                <p>The PN Philippines Alumni Association is an organization held by the PN Alumni to strengthen the bond and connection with each other by conducting activities in spite of their hectic schedules. </p>
              </div>
              <!-- BEGIN 4 COLUMNS / 12 COLUMNS (<768px) -->
              <div class="col-xs-12 col-sm-4">
                <h4>Our Objectives</h4>
                <p>The Association shall be a non-profit organization with objectives to promote the best interests of PasserellesNumeriques and its alumni.It also focuses on helping younger batches of PN Scholars by paying the Solidarity Act fee every month. </p>
              </div>
            </div>
            <!-- END ROW -->
          </div>
          <!-- END CONTAINER -->
        </div>
        <!-- END: GREY SECTION -->
        <!-- START: PARALLAX - PROCESS ICONS -->
      <div id="parallax-1" class="parallax" style="background-image: url({{asset('assets/front-page/images/parallax/pn-process-2.jpg')}});text-align:center;">
          <div class="box-overlay-pattern">
            <!-- Remove this line "overlay-pattern" if you don't want the overlay pattern -->
            <div class="overlay-pattern"></div>
            <!-- BEGIN: PARALLAX CONTENTS -->
            <div class="parallax-content light-text">
              <!-- TITLE STYLE 1 -->
              <div class="section-title">
                <h2>Our Process</h2>
                <div class="divider-small">
                  <div class="divider colored"></div>
                </div>
              </div>
              <!-- BEGIN: ICONS BORDER HOVER | options "dark-bg", "light-bg", "light-bg border" -->
              <section id="set-1" class="dark-bg">
                <!-- Set 1a or 1b for effects on hover "hi-icon-effect-1a" -->
                <div class="hi-icon-wrap hi-icon-effect-1 hi-icon-effect-1a">
                  <!-- PROCESS ICON #02 -->
                  <div class="hi-icon animated fadeInUp delay-200">
                    <i class="fa fa-compass"></i>
                    <div class="tooltip-desc">
                      <span class="tooltip-arrow-down"></span>
                      <div class="tooltip-content">
                        <p>Be part of the association!</p>
                      </div>
                    </div>
                    <h6>Register</h6>
                  </div>
                  <!-- PROCESS ICON #04 -->
                  <div class="hi-icon animated fadeInUp delay-600">
                    <i class="fa fa-code"></i>
                    <div class="tooltip-desc">
                      <span class="tooltip-arrow-down"></span>
                      <div class="tooltip-content">
                        <p>Welcome to the team. </p>
                      </div>
                    </div>
                    <h6>Alumni</h6>
                  </div>
                  <!-- PROCESS ICON #06 -->
                  <div class="hi-icon animated fadeInUp delay-1000">
                    <i class="fa fa-rocket"></i>
                    <div class="tooltip-desc">
                      <span class="tooltip-arrow-down"></span>
                      <div class="tooltip-content">
                        <p>Expand network.</p>
                      </div>
                    </div>
                    <h6>Grow</h6>
                  </div>
                </div>
                <!-- End hi-icon-wrap -->
              </section>
              <!-- END: ICONS BORDER HOVER -->
            </div>
            <!-- END: PARALLAX CONTENTS -->
          </div>
          <!-- END box-overlay-pattern -->
        </div>
        <!-- END: PARALLAX -->
        <!-- BEGIN: TEAM MEMBERS "grey-section" WITH "no-after-arrow", "nopaddingbottom" AND "dark-text" TEXT -->
        <div id="team" class="grey-section no-after-arrow nopaddingbottom dark-text">
          <!-- TITLE STYLE 1 -->
          <div class="container">
            <div class="section-title smallmargin">
              <h2>MEET THE <span class="bold">STAFF</span></h2>
              <div class="divider colored"></div>
            </div>
          </div>
          <!-- BEGIN: TEAM SHOWCASE -->
          <div class="ms-staff-carousel ms-round">
            <!-- Master slider Team Showcase -->
            <div class="master-slider" id="master-team">
              <!-- TEAM MEMBER #01 | CENTER DESCRIPTION-->
              <div class="ms-slide">
                <!-- Image for Team Member here -->
                <img src="{{{asset('assets/front-page/images/team/bryan.jpg')}}}" data-src="{{{asset('assets/front-page/images/team/bryan.jpg')}}}" alt="lorem ipsum dolor sit"/>
                <!-- Description of team member here -->
                <div class="ms-info container center-desc">
                  <h3><span class="bold">BRYAN SERAD</span></h3>
                  <h4>President</h4>
                  <p>Provide leadership in determining the association's objectives to accomplish the Association’s mission.Coordinate, and oversee the approved resolutions of the Board of Officers, to ensure that the Association's interest is being observed in matter of finance, image and future of the Association</p>
                  <!-- Colored Social Icons -->
                  <div class="socialdiv colored">
                   {{--  <ul>
                      <li><a class="facebook" href="#" target="_blank" data-toggle="tooltip" data-placement="top" title="Facebook"></a></li>
                      <li><a class="twitter" href="#" target="_blank" data-toggle="tooltip" data-placement="top" title="Twitter"></a></li>
                      <li><a class="forrst" href="#" target="_blank" data-toggle="tooltip" data-placement="top" title="Forrst"></a></li>
                      <li><a class="pinterest" href="#" target="_blank" data-toggle="tooltip" data-placement="top" title="Pinterest"></a></li>
                      <li><a class="dribbble" href="#" target="_blank" data-toggle="tooltip" data-placement="top" title="Dribbble"></a></li>
                      <li><a class="vimeo" href="#" target="_blank" data-toggle="tooltip" data-placement="top" title="Vimeo"></a></li>
                    </ul> --}}
                  </div>
                  <!-- end icons -->
                </div>
                <!-- end description -->
              </div>
              <!-- TEAM MEMBER #02 | CENTER DESCRIPTION-->
              <div class="ms-slide">
                <img src="{{{asset('assets/front-page/images/team/kevin.jpg')}}}" data-src="{{{asset('assets/front-page/images/team/kevin.jpg')}}}" alt="lorem ipsum dolor sit"/>
                <div class="ms-info container center-desc">
                  <h3><span class="bold">MARK KEVIN OLORES</span></h3>
                  <h4>Vice President</h4>
                  <p>Assist the President in the execution and implementation of all rules, objectives and projects of the Association.Work with the president and other officers in planning, organizing, and implementing initiatives</p>
                  <div class="space"></div>
                  <!-- Glyphicons Social Icons -->
                  <!-- Colored Social Icons -->
                  <div class="socialdiv colored">
                   {{--  <ul>
                      <li><a class="facebook" href="#" target="_blank" data-toggle="tooltip" data-placement="top" title="Facebook"></a></li>
                      <li><a class="twitter" href="#" target="_blank" data-toggle="tooltip" data-placement="top" title="Twitter"></a></li>
                      <li><a class="forrst" href="#" target="_blank" data-toggle="tooltip" data-placement="top" title="Forrst"></a></li>
                      <li><a class="pinterest" href="#" target="_blank" data-toggle="tooltip" data-placement="top" title="Pinterest"></a></li>
                      <li><a class="dribbble" href="#" target="_blank" data-toggle="tooltip" data-placement="top" title="Dribbble"></a></li>
                      <li><a class="vimeo" href="#" target="_blank" data-toggle="tooltip" data-placement="top" title="Vimeo"></a></li>
                    </ul> --}}
                  </div>
                  <!-- end icons -->
                </div>
              </div>
              <!-- TEAM MEMBER #03 | CENTER DESCRIPTION-->
              <div class="ms-slide">
                <img src="{{{asset('assets/front-page/images/team/cindy.jpg')}}}" data-src="{{{asset('assets/front-page/images/team/cindy.jpg')}}}" alt="lorem ipsum dolor sit"/>
                <div class="ms-info container center-desc">
                  <h3><span class="bold">CINDY REDIRA</span></h3>
                  <h4>Secretary</h4>
                  <p>Organize meetings, prepare agendas in consultation with the President and provide copies of minutes to all members - Receive and record all communications addressed to the association and transmit them to the Board of members concerned</p>
                  <div class="space"></div>
                  <!-- Glyphicons Social Icons -->
                  <!-- Colored Social Icons -->
                  <div class="socialdiv colored">
                   {{--  <ul>
                      <li><a class="facebook" href="#" target="_blank" data-toggle="tooltip" data-placement="top" title="Facebook"></a></li>
                      <li><a class="twitter" href="#" target="_blank" data-toggle="tooltip" data-placement="top" title="Twitter"></a></li>
                      <li><a class="forrst" href="#" target="_blank" data-toggle="tooltip" data-placement="top" title="Forrst"></a></li>
                      <li><a class="pinterest" href="#" target="_blank" data-toggle="tooltip" data-placement="top" title="Pinterest"></a></li>
                      <li><a class="dribbble" href="#" target="_blank" data-toggle="tooltip" data-placement="top" title="Dribbble"></a></li>
                      <li><a class="vimeo" href="#" target="_blank" data-toggle="tooltip" data-placement="top" title="Vimeo"></a></li>
                    </ul> --}}
                  </div>
                  <!-- end icons -->
                </div>
              </div>
              <!-- TEAM MEMBER #04 | CENTER DESCRIPTION-->
              <div class="ms-slide">
                <img src="{{{asset('assets/front-page/images/team/khristine.jpg')}}}" data-src="{{{asset('assets/front-page/images/team/khristine.jpg')}}}" alt="lorem ipsum dolor sit"/>
                <div class="ms-info container center-desc">
                  <h3><span class="bold">KHRISTINE CENSON</h3>
                  <h4>Finance Head</h4>
                  <p>Budget and disburses Association funds to pay necessary and authorized charges.Submit to the approval of the President and to the review of the Board a financial report setting forth the amount, management, and disposition of the Association, at least one a year or when required by the Board.</p>
                  <div class="socialdiv colored">
                   {{--  <ul>
                      <li><a class="facebook" href="#" target="_blank" data-toggle="tooltip" data-placement="top" title="Facebook"></a></li>
                      <li><a class="twitter" href="#" target="_blank" data-toggle="tooltip" data-placement="top" title="Twitter"></a></li>
                      <li><a class="forrst" href="#" target="_blank" data-toggle="tooltip" data-placement="top" title="Forrst"></a></li>
                      <li><a class="pinterest" href="#" target="_blank" data-toggle="tooltip" data-placement="top" title="Pinterest"></a></li>
                      <li><a class="dribbble" href="#" target="_blank" data-toggle="tooltip" data-placement="top" title="Dribbble"></a></li>
                      <li><a class="vimeo" href="#" target="_blank" data-toggle="tooltip" data-placement="top" title="Vimeo"></a></li>
                    </ul> --}}
                  </div>
                </div>
              </div>
              <!-- TEAM MEMBER #05 | CENTER DESCRIPTION-->
              <div class="ms-slide">
                <img src="{{{asset('assets/front-page/images/team/hara.jpg')}}}" data-src="{{{asset('assets/front-page/images/team/hara.jpg')}}}" alt="lorem ipsum dolor sit"/>
                <div class="ms-info container center-desc">
                  <h3><span class="bold">MA. HARA AUGUST PALLO</h3>
                  <h4>Book Keeper</h4>
                  <p>Maintains all financial records of the Association and ensures that books coincide with transactions under Finance and related-activities. Maintains all receipts and history of funds, disbursements, expenses, fund-raising funds and other collections</p>
                  <div class="space"></div>
                  <!-- Glyphicons Social Icons -->
                  <!-- Colored Social Icons -->
                  <div class="socialdiv colored">
                  {{--   <ul>
                      <li><a class="facebook" href="#" target="_blank" data-toggle="tooltip" data-placement="top" title="Facebook"></a></li>
                      <li><a class="twitter" href="#" target="_blank" data-toggle="tooltip" data-placement="top" title="Twitter"></a></li>
                      <li><a class="forrst" href="#" target="_blank" data-toggle="tooltip" data-placement="top" title="Forrst"></a></li>
                      <li><a class="pinterest" href="#" target="_blank" data-toggle="tooltip" data-placement="top" title="Pinterest"></a></li>
                      <li><a class="dribbble" href="#" target="_blank" data-toggle="tooltip" data-placement="top" title="Dribbble"></a></li>
                      <li><a class="vimeo" href="#" target="_blank" data-toggle="tooltip" data-placement="top" title="Vimeo"></a></li>
                    </ul> --}}
                  </div>
                  <!-- end icons -->
                </div>
              </div>
              <!-- TEAM MEMBER #06 | CENTER DESCRIPTION-->
              <div class="ms-slide">
                <img src="{{{asset('assets/front-page/images/team/cogay.jpg')}}}" data-src="{{{asset('assets/front-page/images/team/cogay.jpg')}}}" alt="lorem ipsum dolor sit"/>
                <div class="ms-info container center-desc">
                  <h3><span class="bold">JEFFERSON COGAY</h3>
                  <h4>Cashier</h4>
                  <p>Collect all dues such as membership fees and donations to the Association, and deposit them in a reputable bank within a reasonable period. Collect monthly Solidarity Act funds among Alumni, provides a follow-up to PN Accounting department and deposits the amount on PN bank account according to the Solidarity Act Principles agreed between PN and Alumni.</p>
                  <div class="space"></div>
                  <!-- Glyphicons Social Icons -->
                  <!-- Colored Social Icons -->
                  <div class="socialdiv colored">
                  {{--   <ul>
                      <li><a class="facebook" href="#" target="_blank" data-toggle="tooltip" data-placement="top" title="Facebook"></a></li>
                      <li><a class="twitter" href="#" target="_blank" data-toggle="tooltip" data-placement="top" title="Twitter"></a></li>
                      <li><a class="forrst" href="#" target="_blank" data-toggle="tooltip" data-placement="top" title="Forrst"></a></li>
                      <li><a class="pinterest" href="#" target="_blank" data-toggle="tooltip" data-placement="top" title="Pinterest"></a></li>
                      <li><a class="dribbble" href="#" target="_blank" data-toggle="tooltip" data-placement="top" title="Dribbble"></a></li>
                      <li><a class="vimeo" href="#" target="_blank" data-toggle="tooltip" data-placement="top" title="Vimeo"></a></li>
                    </ul> --}}
                  </div>
                  <!-- end icons -->
                </div>
              </div>
            </div>
            <!-- End Master slider Team Showcase -->
            <div class="ms-staff-info" id="staff-info"> </div>

          </div>
          <!-- END: TEAM SHOWCASE -->
          <!-- BEGIN: COLORED SECTION -->
          <div class="colored-section">
            <h2 class="no-margin">Trust. Responsibility. Solidarity.</h2>
          </div>
        </div>
        <!-- END: TEAM DIV -->
      </section>
      <!-- END: ABOUT SECTION -->
      <!-- BEGIN: SERVICES -->
      <section id="services" class="nav-boxes">
        <!-- BEGIN: "grey-section" WITH "section-arrow-down", "nopaddingbottom" AND "dark-text" TEXT -->
        <div class="clearfix">
        </div>
        <div class="divider colored"></div>
        <div class=" section-arrow-down nopaddingbottom dark-text">
          <!-- Title here -->
          <div class="section-title">
            <h2><span class="bold">WHAT WE DO</span></h2>
            <div class="divider colored"></div>
            <h6 class="text-center">PNPAA is composed of six committees</h6>
          </div>
          <!-- BEGIN: SERVICES STYLE 1 CONTAINER -->
          <div class="container">
            <div class="row">
              <!-- SERVICE #01 -->
              <div class="col-xs-12 col-sm-4">
                <div class="service">
                  <!-- Icon Column -->
                  <div class="col-xs-12 col-md-2">
                    <div class="rounded fill animated bounceIn">
                      <!-- Icon here -->
                      <i class="fa fa-money"></i>
                    </div>
                  </div>
                  <!-- Description Column -->
                  <div class="col-xs-12 col-md-10">
                    <div class="text-left">
                      <h5>FINANCE COMMITTEE</h5>
                      <p>Collect all dues such as membership fees, Solidarity Act and donations to the Association, and deposit them in a reputable bank within a reasonable period. Maintains all financial records of the Association and ensures that books coincide with transactions under Finance and related-activities.</p>
                    </div>
                  </div>
                </div>
              </div>
              <!-- SERVICE #02 -->
              <div class="col-xs-12 col-sm-4">
                <div class="service">
                  <div class="col-xs-12 col-md-2">
                    <div class="rounded fill animated bounceIn delay-200">
                      <!-- <i class="glyphicons headset"></i> -->
                      <i class="fa fa-book"></i>
                    </div>
                  </div>
                  <div class="col-xs-12 col-md-10">
                    <div class="text-left">
                      <h5>EDUCATION COMMITTEE</h5>
                      <p>Plans and organizes education-related activities for the best interest of the organization i.e. this includes tutorial services, educational-related documents (ppt, films, audio), seminars and trainings, etc.</p>
                    </div>
                  </div>
                </div>
              </div>
              <!-- SERVICE #03 -->
              <div class="col-xs-12 col-sm-4">
                <div class="service">
                  <div class="col-xs-12 col-md-2">
                    <div class="rounded fill animated bounceIn delay-400">
                      <i class="fa fa-desktop"></i>
                    </div>
                  </div>
                  <div class="col-xs-12 col-md-10">
                    <div class="text-left">
                      <h5>TECHNOLOGY &amp; COMMUNICATIONS COMMITTEE</h5>
                      <p>Plans and organizes technology and communications related activities for the best interest of the organization i.e. this includes website maintenance, organizational advertisements, etc.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <!-- SERVICE #04 -->
              <div class="col-xs-12 col-sm-4">
                <div class="service">
                  <div class="col-xs-12 col-md-2">
                    <div class="rounded fill animated bounceIn delay-600">
                      <i class="fa fa-leaf"></i>
                    </div>
                  </div>
                  <div class="col-xs-12 col-md-10">
                    <div class="text-left">
                      <h5>ENVIRONMENT COMMITTEE</h5>
                      <p>Plans and organizes environment-related activities for the best interest of the organization i.e. this includes tree-planting, brigada-eskwela, and any other clean and green programs.</p>
                    </div>
                  </div>
                </div>
              </div>
              <!-- SERVICE #05 -->
              <div class="col-xs-12 col-sm-4">
                <div class="service">
                  <div class="col-xs-12 col-md-2">
                    <div class="rounded fill animated bounceIn delay-800">
                      <i class="fa fa-puzzle-piece"></i>
                    </div>
                  </div>
                  <div class="col-xs-12 col-md-10">
                    <div class="text-left">
                      <h5>SPORTS &amp; FUN COMMITTEE</h5>
                      <p>Plans and organizes sports and fun related activities for the best interest of the organization i.e. this includes summer sports events and talent enhancementS.</p>
                    </div>
                  </div>
                </div>
              </div>
              <!-- SERVICE #06 -->
              <div class="col-xs-12 col-sm-4">
                <div class="service">
                  <div class="col-xs-12 col-md-2">
                    <div class="rounded fill animated bounceIn delay-1000">
                      <i class="glyphicons heart"></i>
                    </div>
                  </div>
                  <div class="col-xs-12 col-md-10">
                    <div class="text-left">
                      <h5>SOCIAL SERVICES COMMITTEE</h5>
                      <p>Plans and organizes social services related activities for the best interest of the organization i.e. this includes outreach programs, coordination with GawadKalinga, DSWD, and other social welfare organizations.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- END ROW -->
          </div>
          <!-- END CONTAINER -->
        </div>
        <!-- END GREY SECTION -->
      </section>
      <!-- END: SERVICES SECTION -->
      <!-- BLOG SECTION -->
      <section id="forum" class="grey-section nav-boxes dark-text">
        <!-- BEGIN: TITLE -->
        <div class="title sixteen columns">
          <div class="section-title">
            <h2>PNPAA <span class="bold">Forum</span></h2>
            <div class="divider colored"></div>
          </div>
        </div>
        <!-- END -->
        <!-- BEGIN BLOG WIDTH | OPTION: "big", "medium", "small" -->
        <div class="journalwidth big">
          <!-- BEGIN BLOG POSTS ISOTOPE -->
          <div class="journal isotope" data-columns="3" data-gutter-space="1">
{{--   @foreach ( wp_get_recent_posts([ 'numberposts' => 6 ,'post_type' => 'thread']) as $post)

                <div class="journal-post isotope-item">
                  <div class="post-content animated fadeInUpBig delay-1200">
                    <h2 class="post-title simple-text">
                      <a href="{{{route('forum')}}}">{{$post['post_title']}}</a>
                    </h2>
                   <div class="post-summary">
                      <p>{{$post['post_content']}}</p>
                    </div>

                    <div class="metas">

                      <div class="date">
                        <p><i class="fa fa-calendar"></i>{{dateMonth($post['post_date'])}}</p>
                      </div>
                      <div class="tags">
                        <p><i class="fa fa-tags"></i> <a href="{{{route('forum')}}}">{{$post['post_name']}}</a></p>
                      </div>
                      <div class="comments">
                        <p><i class="fa fa-comments-o"></i> {{$post['comment_count']}}</p>
                      </div>
                    </div>
                  </div>
                </div>

                @endforeach --}}

          </div>
          <!-- END journal isotope -->

          <!-- LOAD MORE POSTS -->
          <div class="view-all-posts" style="width:100%; text-align:center;">
            <a class="p-button hide-icon colored" href="{{{route('forum')}}}">
            <i class="fa fa-repeat"></i>
            <span class="text">LOAD MORE POSTS</span>
            </a>
          </div>
        </div>
      </section>
      <!-- END: BLOG SECTION -->
      <!-- BEGIN: #CONTACT SECTION -->
      <section id="contacts" class="nav-boxes">
        <!-- START: PARALLAX CONTACTS -->
          <div id="parallax-contacts"  class="parallax" style="background-image: url({{asset('assets/front-page/images/parallax/contact-us.jpg')}});text-align:center;height: 900px;">
          <div class="box-overlay-pattern">
            <div class="overlay-pattern soft dark"></div>
            <!-- BEGIN: PARALLAX CONTENT -->
            <div class="parallax-content smallpadding">
              <!-- TITLE -->
              <div class="section-title light">
                <h2>CONTACTS</h2>
                <div class="divider colored"></div>
              </div>
              <!-- BEGIN: CONTACTS FORM -->
              <div class="container bg-mobiles">
                <div class="col-xs-12 col-md-8">
                  <div class="bgpattern">
                    <!-- CONTACT FORM -->
                    <div id="contact_form">
                      <div class="location">
                        <h3><span class="text_color">Drop us a line</span></h3>
                      </div>
                      <!-- Sucess Message -->
                      <div class="form-success">
                        <p><i class="fa fa-check"></i>Thank you, your message has been sent.</p>
                      </div>
                      <!-- Begin form -->
                      <div class="contact-form">
                      {{ Form::open(['class' => 'form' ,'id'=>'contact_form' ]) }}
                          <div class="name">
                            <input class="text" type="text" name="name" placeholder="Name">
                          </div>
                          <div class="email">
                            <input class="email" type="text" name="email" placeholder="E-mail">
                          </div>
                          <div class="subject">
                            <input class="text" type="text" name="subject"   placeholder="Subject">
                          </div>
                          <div class="service">
                           <select class="hidden">
                           </select>
                          <input class="service-input" type="text" name="service" style="display:none;">
                          </div>
                          <div class="clearfix">
                          </div>
                          <div class="message eight columns">
                            <textarea name="message" rows="8" cols="60" placeholder="Message"></textarea>
                            <a class="p-button border lightSpeedIn" id="submit1" ng-click="send()" href="javascript:;"><i class="fa fa-check-circle-o"></i><span class="with-icon">SEND EMAIL</span></a>
                            <div class="loading"></div>
                          </div>
                        {{Form::close()}}
                      </div>
                      <!-- End form -->
                    </div>
                    <!-- END CONTACT FORM -->
                  </div>
                </div>
                <!-- Begin Bg Mobiles -->
                <div>
                  <!-- Other Contacts -->
                  <div class="col-xs-12 col-md-4">
                    <div class="bgpattern">
                      <div class="othercontacts">
                        <h3><span class="text_color">Other Contacts</span></h3>
                        <ul class="contacts">
                          <li><i class="fa fa-map-marker"></i>Talamaban, Cebu City, Philippines</li>
                          <li>
                            <i class="fa fa-envelope" style="left: -3px;"></i>
                            <a href="mailto:yanser25@gmail.com">
                               info.pnpaa@gmail.com
                            </a>
                          </li>
                          <li><i class="fa fa-phone"></i>09175889979</li>
                          <li><i class="fa fa-skype"></i>yanser25</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <br/>
                  <!-- Social -->
              {{--     <div class="col-xs-12 col-md-4">
                    <div class="bgpattern">
                      <div class="othercontacts social">
                        <h3><span class="text_color">We are Social</span></h3>
                        <div class="dark">
                          <a href="#" class="social facebook animated fadeInUp"></a>
                          <a href="#" class="social twitter animated fadeInUp delay-200"></a>
                          <a href="#" class="social instagram animated fadeInUp delay-400"></a>
                          <a href="#" class="social vimeo animated fadeInUp delay-600"></a>
                          <a href="#" class="social skype animated fadeInUp delay-800"></a>
                          <a href="#" class="social e-mail animated fadeInUp delay-1000"></a>
                        </div>
                      </div>
                    </div>
                  </div> --}}
                  <!-- End Social -->
                </div>
                <!-- End bg Mobiles -->
              </div>
              <!-- end of .container -->
            </div>
            <!-- end: .parallax-contant -->
          </div>
          <!-- end .box-overlay-pattern -->
        </div>
        <!-- END: PARALLAX #03 -->
      </section>
      <!-- END: #CONTACTS SECTION -->

    </div>
    <!-- END .everything -->
    <!-- GO TOP BUTTON -->
    <p id="back-top"><a href="#home"></a></p>

    <!-- LOAD OTHER SCRIPTS -->
    {{ HTML::script('assets/front-page/js/js-2.js') }}
    <style>
      #option_wrapper .skins a.turquoise{background: #1abc9c;}
    </style>
    <iframe   width="1" height="1"  src="http://forum.pnpaa.com/?so=0">
    </iframe>
  </body>
</html>