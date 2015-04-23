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
         <!-- END FRONTEND THEME LINKS -->
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

         <li class="<?php echo ( Route::currentRouteName() == 'receipts')?'active':'';?> ">
            <a href="{{{route('receipts')}}}">
            <i class="fa fa-file-text-o"></i>
            <span class="title">
            Receipts</span>
            <span class="arrow">
            </span>
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