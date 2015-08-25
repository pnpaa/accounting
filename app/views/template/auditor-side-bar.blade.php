<!--  BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
   <div class="page-sidebar navbar-collapse collapse">
      <!-- BEGIN SIDEBAR MENU -->
      <ul class="page-sidebar-menu page-sidebar-menu-light page-sidebar-menu-hover-submenu" data-auto-scroll="true" data-slide-speed="200">
          <li class="<?php echo ( Route::currentRouteName() == null)?'active':'';?> ">
            <a href="javascript:;">
            <i class="icon-briefcase"></i>
            <span class="title">
            Transactions    </span>
            <span class="arrow">
            </span>
            </a>
            <ul class="sub-menu">
               <li class="tooltips" data-container="body" data-placement="right" data-html="true" >
                  <a href="{{{URL::to('transactions/receive')}}}">
                  <span class="title">
                 Receive </span>
                  </a>
               </li>
               <li class="tooltips" data-container="body" data-placement="right" data-html="true" >
                  <a href="{{{URL::to('transactions/forward')}}}">
                  <span class="title">
                 Forward to PN </span>
                  </a>
               </li>
            </ul>
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