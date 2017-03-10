<?php $path = Request::path();?>
<aside class="left-side sidebar-offcanvas">
  <section class="sidebar ">
    <div class="page-sidebar sidebar-nav">
      <div class="clearfix"></div>
      <!-- BEGIN SIDEBAR MENU -->
      <ul id="menu" class="page-sidebar-menu">
        <li class="<?php if($path == '/') echo 'active'; ?>"> <a href="/"> <i><img src="/img/<?php if($path == '/'){ ?>dashboard-icon-active.jpg<?php }else{ ?>dashboard-icon.jpg <?php } ?>" alt="dashboard" width="30" style="margin-right:10px;"></i> <span class="title">Dashboard</span> </a> </li>

        <li class="<?php if($path == 'alerts') echo 'active'; ?>"> <a href="/alerts"> <i><img src="/img/<?php if($path == 'alerts'){ ?>alerts-icon-active.jpg<?php }else{?>alerts-icon.jpg<?php } ?>" alt="alerts" width="30" style="margin-right:10px;"></i> <span class="title">Alerts</span> </a></li>
        <?php
          $pattern = '/editcompany/';
          preg_match($pattern, $path, $matches);
          $count = count($matches);
        ?>
        <li class="<?php if($path == 'companies' || $path == 'addcompany' || $count == 1) echo 'active'; ?>"> <a href="/companies"> <i><img src="/img/<?php if($path == 'companies' || $path == 'addcompany' || $count == 1){ ?>companies-active.jpg<?php }else{?>companies.jpg<?php } ?>" alt="companies" width="22" style="margin-right:16px;"></i> <span class="title">Companies</span> </a></li>

        <li class="<?php if($path == 'properties' || $path == 'addproperty' || $path == 'editproperty') echo 'active';?>"> <a href="/properties"> <i><img src="/img/<?php if($path == 'properties' || $path == 'addproperty' || $path == 'editproperty'){ ?>properties-icon-active.jpg<?php }else{?>properties-icon.jpg<?php } ?>" alt="properties" width="30" style="margin-right:10px;"></i> <span class="title">Properties</span> </a></li>

        <li class="<?php if($path == 'inspections') echo 'active'; ?>"> <a href="/inspections"> <i><img src="/img/<?php if($path == 'inspections'){ ?>inspections-active.jpg<?php }else{?>inspections.jpg<?php } ?>" alt="inspections" width="28" style="margin-right:12px;"></i> <span class="title">Inspections</span> </a></li>

        <li class="<?php if($path == '5yrlookback' || $path == '5yrlookbackinfo') echo 'active'; ?>"> <a href="/5yrlookback"> <i><img src="/img/<?php if($path == '5yrlookback'){ ?>5yr-look-back-active.jpg<?php }else{ ?>5yr-look-back.jpg<?php } ?>" alt="5yr-look-back" width="30" style="margin-right:10px;"></i> <span class="title">5yr look back</span> </a></li>

        <li class="settingsdropdown"> <a href="#"> <i><img src="/img/settings-icon.jpg" alt="settings" width="30" style="margin-right:10px;"></i> <span class="title">Settings</span> </a>
          <ul class="sub-menu">
            <li> <a href="/settings/password" class="settingspassword"> Password</a></li>
            <li> <a href="/settings/alerts" class="settingalerts"> Alerts</a></li>
            <li> <a href="/settings/logos" class="settingslogos"> Logos</a></li>
            <li> <a href="/settings/inspectors" class="settingsinspections"> Inspectors</a></li>
            <li> <a href="/settings/users" class="settingsusers">Users</a></li>
            <li> <a href="/settings/logs" class="settingslogs"> Logs</a></li>
          </ul>
        </li>
      </ul>
      <!-- END SIDEBAR MENU -->
    </div>
  </section>
  <!-- /.sidebar -->
</aside>
<script>
  @if($path == 'settings/password')
      $('.settingsdropdown').addClass('settingsdropdown active');
      $('.settingspassword').css({'color' : '#FFF !important', 'background' : '#202a3b !important'});
  @endif

  @if($path == 'settings/alerts')
      $('.settingsdropdown').addClass('settingsdropdown active');
      $('.settingalerts').css({'color' : '#FFF !important', 'background' : '#202a3b !important'});
  @endif

  @if($path == 'settings/logos')
      $('.settingsdropdown').addClass('settingsdropdown active');
      $('.settingslogos').css({'color' : '#FFF !important', 'background' : '#202a3b !important'});
  @endif

  @if($path == 'settings/inspectors')
      $('.settingsdropdown').addClass('settingsdropdown active');
      $('.settingsinspections').css({'color' : '#FFF !important', 'background' : '#202a3b !important'});
  @endif

  @if($path == 'settings/users')
      $('.settingsdropdown').addClass('settingsdropdown active');
      $('.settingsusers').css({'color' : '#FFF !important', 'background' : '#202a3b !important'});
  @endif

  @if($path == 'settings/logs')
      $('.settingsdropdown').addClass('settingsdropdown active');
      $('.settingslogs').css({'color' : '#FFF !important', 'background' : '#202a3b !important'});
  @endif
</script>
