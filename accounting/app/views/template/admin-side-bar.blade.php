<!--	BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
   <div class="page-sidebar navbar-collapse collapse">
      <!-- BEGIN SIDEBAR MENU -->
      <ul class="page-sidebar-menu page-sidebar-menu-light page-sidebar-menu-hover-submenu" data-auto-scroll="true" data-slide-speed="200">
         <li class="sidebar-search-wrapper">
            <!-- BEGIN RESPONSIVE QUICK SEARCH FORM -->
          {{-- <form class="sidebar-search " action="#" >
               <a href="javascript:;" class="remove">
               <i class="icon-close"></i>
               </a>
               <div class="input-group">
                  <input type="text" class="form-control" placeholder="Search...">
                  <span class="input-group-btn">
                  <a href="javascript:;" class="btn submit"><i class="icon-magnifier"></i></a>
                  </span>
               </div>
            </form>--}}
            <!-- END RESPONSIVE QUICK SEARCH FORM -->
         </li>
         <li class="start <?php echo ( Route::currentRouteName() == '')?'active':'';?>">
            <a href="{{route('dashboard')}}">
            <i class="icon-home"></i>
            <span class="title">Dashboard  </span>
            <span class="selected"></span>
            <span class="arrow open"></span>
            </a>
         </li>
         <li class="<?php echo ( Route::currentRouteName() == 'analysis')?'active':'';?>">
            <a href="{{route('analysis')}}">
            <i class="icon-bar-chart"></i>
            <span class="title">Analysis</span>
            <span class="arrow "></span>
            </a>
         </li>
         <li class="<?php echo ( Route::currentRouteName() == 'timeline')?'active':'';?>">
            <a href="{{route('timeline')}}">
            <i class="icon-clock"></i>
            <span class="title">Overview</span>
            <span class="arrow "></span>
            </a>
         </li>
         <!-- BEGIN FRONTEND THEME LINKS -->
         <li class="<?php echo (explode('.',Route::currentRouteName())[0]== 'transaction')?'active':'';?> ">
            <a href="javascript:;">
            <i class="icon-briefcase"></i>
            <span class="title">
            Transactions </span>
            <span class="arrow">
            </span>
            </a>
            <ul class="sub-menu">
               <li class="tooltips" data-container="body" data-placement="right" data-html="true" >
                  <a href="{{{route('transaction.index')}}}">
                  <span class="title">
                  All Transactions </span>
                  </a>
               </li>
               <li class="tooltips" data-container="body" data-placement="right" data-html="true" >
                  <a href="{{{route('transaction.create')}}}">
                  <span class="title">
                  Add New </span>
                  </a>
               </li>
            </ul>
         </li>
         <!-- END FRONTEND THEME LINKS -->
         <li class="<?php echo ((explode('.',Route::currentRouteName())[0]== 'users')|| Route::currentRouteName() == 'create-bulk' ||(explode('.',Route::currentRouteName())[0]== 'committee') )?'active':'';?> ">
            <a href="javascript:;">
            <i class="icon-user"></i>
            <span class="title">
            Users</span>
            <span class="arrow">
            </span>
            </a>
            <ul class="sub-menu">
               <li class="tooltips" data-container="body" data-placement="right" data-html="true" >
                  <a href="{{{route('users.index')}}}">
                  <span class="title">
                  All Users</span>
                  </a>
               </li>
               <li class="tooltips" data-container="body" data-placement="right" data-html="true" >
                  <a href="{{{route('users.create')}}}">
                  <span class="title">
                  Add New </span>
                  </a>
               </li>
                <li class="tooltips" data-container="body" data-placement="right" data-html="true" >
                  <a href="{{URL::to('create-bulk')}}">
                  <span class="title">
                  Create Bulk </span>
                  </a>
               </li>
               <li class="disabled"></li>
               <li class="tooltips" data-container="body" data-placement="right" data-html="true" >
                  <a href="{{{route('committee.index')}}}">
                  <span class="title">
                  All Committees</span>
                  </a>
               </li>
            </ul>
         </li>
         <li class="<?php echo (explode('.',Route::currentRouteName())[0]== 'updates')?'active':'';?> " >
            <a href="{{{ route('updates.index') }}}">
            <i class="icon-calendar"></i>
            <span class="title">
            Updates</span>
            <span class="arrow">
            </span>
            </a>
         </li>
         <li class="<?php echo (explode('.',Route::currentRouteName())[0]== 'tasks')?'active':'';?> ">
            <a href="{{{route('tasks.index')}}}">
            <i class="icon-check"></i>
            <span class="title">
            Tasks</span>
            <span class="arrow">
            </span>
            </a>
         </li>
         <li class="<?php echo (explode('.',Route::currentRouteName())[0]== 'notifications')?'active':'';?> ">
            <a href="{{{route('notifications.index')}}}">
            <i class="icon-envelope"></i>
            <span class="title">
            Inquiry</span>
            <span class="arrow">
            </span>
            </a>
         </li>
         <li class="<?php echo ( Route::currentRouteName() == 'receipts')?'active':'';?> ">
            <a href="{{{route('receipts')}}}">
            <i class="fa fa-file-text-o"></i>
            <span class="title">
            Receipts</span>
            <span class="arrow">
            </span>
            </a>
         </li>
         <li class="<?php echo (explode('.',Route::currentRouteName())[0]== 'settings')?'active':'';?> ">
            <a href="{{{route('settings.index')}}}">
               <i class="icon-settings"></i>
               <span class="title">
               Settings</span>
            </a>
         </li>
         <li class="last <?php echo (explode('.',Route::currentRouteName())[0]== 'trash')?'active':'';?> ">
            <a href="{{{route('trash.index')}}}">
               <i class="icon-trash"></i>
               <span class="title">
               Trash</span>
            </a>
         </li>
         <li class="divider"></li>

      </ul>
      <!-- END SIDEBAR MENU -->
   </div>
</div>
<!-- END SIDEBAR-->