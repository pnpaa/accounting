
  <!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
    <!-- BEGIN HEADER INNER -->
    <div class="page-header-inner">
        <!-- BEGIN LOGO -->
        <div class="page-logo ">
            <a href="{{URL::to('/')}}">
            <img src="{{asset('assets/front-page/images/pnpaa-logo-small.png')}}" alt="logo" class="logo-default hatch"/>
            </a>
            <div class="menu-toggler sidebar-toggler">
            </div>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
        <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
        </a>
        <!-- END RESPONSIVE MENU TOGGLER -->
        <!-- BEGIN TOP NAVIGATION MENU -->
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <!-- BEGIN NOTIFICATION DROPDOWN -->
                <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <i class="icon-bell"></i>
                      <?php $n=getUpdatesNotications();?>
                      @if(count($n) > 0 )
                        <span class="badge badge-default floating">
                       {{{ count($n) }}} </span>
                      @endif
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <p>
                                 You have {{{count($n)}}} new notifications
                            </p>
                        </li>
                        <li>
                      @if(count($n) > 0 )
                            <ul class="dropdown-menu-list scroller updates-notifier" style="height: 250px;">
                               @foreach($n as $v)
                                <li data-id="{{{$v->id}}}">
                                    <a href="{{{route('updates.index')}}}">
                                    <span class="label label-sm label-icon label-info">
                                    <i class="fa fa-bullhorn"></i>
                                    </span>
                                     {{($v->update_title)}}
                                     <span class="time">
                                    {{{ dateMonth($v->created_at)}}} </span>
                                    </a>
                                </li>
                                @endforeach

                            </ul>
                          @endif
                        </li>
                        <li class="external">
                            <a href="{{{route('updates.index')}}}">
                            See all notifications <i class="m-icon-swapright"></i>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- END NOTIFICATION DROPDOWN -->

                <!-- BEGIN TODO DROPDOWN -->
                <li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <i class="icon-calendar"></i>
                    <?php $tasks=getTaskNotications();?>
                    @if($tasks->count()>0)
                    <span class="badge badge-default floating">
                   {{{$tasks->count()}}} </span>
                    @endif
                    </a>
                    <ul class="dropdown-menu extended tasks">
                       @if($tasks->count()>0)
                        <li>
                            <p>
                                 You have {{{$tasks->count()}}} new tasks

                            </p>
                        </li>
                        <li>
                            <ul class="dropdown-menu-list scroller task-notifier" style="height: 250px;">
                               @foreach($tasks as $task)
                               <li data-id="{{{$task->id}}}">
                                    <a href="{{{route('tasks.index')}}}">
                                    <span class="task">
                                    <span class="desc">
                                   {{{$task->task_title}}} assigned by {{{getUserName($task->task_setter,true)}}} </span>
                                    <span class="time">{{{dateForHumans($task->created_at)}}}</span>
                                   </span>
                                    </a>
                               </li>
                               @endforeach

                            </ul>
                        </li>
                       @endif
                        <li class="external">
                            <a href="{{{route('tasks.index')}}}">
                            See all tasks <i class="m-icon-swapright"></i>
                            </a>
                        </li>
                    </ul>

                </li>
                <!-- END TODO DROPDOWN -->
                <!-- BEGIN USER LOGIN DROPDOWN -->
                <li class="dropdown dropdown-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <img alt="" class="img-circle" src="{{{asset('assets/uploads/'.(Auth::user()->user_photo?Auth::user()->user_photo:'asas.jpg'))}}}"/>
                    <span class="username username-hide-on-mobile">
                   {{{Auth::user()->first_name}}} </span>
                    <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{{route('users.edit',Auth::user()->id)}}}">
                            <i class="icon-user"></i> My Profile </a>
                        </li>
                        <li>
                            <a href="{{{route('updates.index')}}}">
                            <i class="icon-calendar"></i> My Calendar </a>
                        </li>

                        <li>
                            <a href="{{{route('tasks.index')}}}">
                            <i class="icon-check"></i> My Tasks
                                   @if($tasks->count()>0)
                                    <span class="badge badge-success floating">
                                   {{{$tasks->count()}}} </span>
                                    @endif
                            </a>
                        </li>
                        <li class="divider">
                        </li>
                        {{--<li>
                            <a href="extra_lock.html">
                            <i class="icon-lock"></i> Lock Screen </a>
                        </li>--}}
                        <li>
                            <a href="{{{route('logout')}}}">
                            <i class="icon-key"></i> Log Out </a>
                        </li>
                    </ul>
                </li>
                <!-- END USER LOGIN DROPDOWN -->

            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>
<!-- END HEADER -->




