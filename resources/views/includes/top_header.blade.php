<?php $path = Request::path(); ?>
<div class="top-header">
  <div class="logo-section"> <img src="/img/logo.png" class="img-responsive" alt="logo"> </div>
  <div class="heading-section">
    <!--<a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
      <div class="responsive_nav"></div>
      </a>-->
  @if($path == '5yrlookback' || $path == '5yrlookbackinfo')
    <div class="col-md-4">
  @else
    <div class="col-md-3">
  @endif
  <h1>
          @if($path == '/')
              {{ 'Dashboard' }}
          @elseif($path == 'alerts')
            {{ 'Alerts' }}
          @elseif($path == 'companies')
            {{ 'Companies' }}
          @elseif($path == 'properties')
            {{ 'Properties' }}
          @elseif($path == 'inspections')
            {{ 'Inspections' }}
          @elseif($path == '5yrlookback' || $path == '5yrlookbackinfo')
            {{ '5yr Look Back' }}
          @elseif($path == 'settings/password' || $path == 'settings/alerts' || $path == 'settings/logos' || $path == 'settings/inspectors' || $path == 'settings/users' || $path == 'settings/logs')
            {{ 'Settings' }}
          @endif

      </h1>
    </div>
    @if($path == 'companies')
      <div class="col-md-3"><a data-toggle="modal"  href="/addcompany" class="upload"><span class="plus">+</span> Upload CSV</a></div>
      <div class="col-md-4"><a href="#" class="send">Download Sample File</a></div>
    @endif

    @if($path == 'addcompany')
      <div class="col-md-8">
        <h1>Add Company</h1>
      </div>
    @endif

    <?php
      $pattern = '/editcompany/';
      preg_match($pattern, $path, $matches);
      $count = count($matches);
    ?>
    @if($count == 1)
      <div class="col-md-8">
        <h1>Edit Company</h1>
      </div>
    @endif

    @if($path == 'properties')
      <div class="col-md-3"><a data-toggle="modal" href="/addproperty" class="upload"><span  class="plus">+</span> Upload CSV</a></div>
      <div class="col-md-3"><a href="#" class="send">Send Sample File</a></div>
    @endif

    @if($path == 'addproperty')
      <div class="col-md-8">
        <h1>Add Property</h1>
      </div>
    @endif

    @if($path == 'inspections')
      <div class="col-md-4"><a data-toggle="modal" data-href="#req-insp" href="#req-insp" class="upload"><span class="plus">+</span></a></div>
    @endif

    @if($path == '5yrlookback' || $path == '5yrlookbackinfo')
      <div class="col-md-4"><a data-toggle="modal" data-href="#<?php if($path == '5yrlookbackinfo'){ ?>report<?php }else{?>add-5yr<?php } ?>" href="#<?php if($path == '5yrlookbackinfo'){ ?>report<?php }else{?>add-5yr<?php } ?>" class="upload"><span class="plus">+</span> Upload CSV</a></div>
    @endif
  </div>
</div>
