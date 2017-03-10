@extends('layout.main')
@section('content')
@include('includes.top_header')
<div class="wrapper row-offcanvas row-offcanvas-left">
  <!-- Left side column. contains the logo and sidebar -->
  @include('includes.sidebar')
  <!-- Right side column. Contains the navbar and content of the page -->
  <aside class="right-side">
    <section class="content">
      <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-4 margin_10">
          <!-- Trans label pie charts strats here-->
          <div class="redbg no-radius">
            <div class="panel-body squarebox square_boxs">
              <div class="col-xs-12 pull-left nopadmar">
                <div class="text-sec red"> 10 </div>
                <h4 class="alert-heading-red ">Alerts Last 7 Days</h4>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-4 margin_10">
          <!-- Trans label pie charts strats here-->
          <div class="redbg no-radius">
            <div class="panel-body squarebox square_boxs">
              <div class="col-xs-12 pull-left nopadmar">
                <div class="text-sec blue"> 32 </div>
                <h4 class="alert-heading-blue ">Outstanding Alerts</h4>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-4 margin_10">
          <!-- Trans label pie charts strats here-->
          <div class="redbg no-radius">
            <div class="panel-body squarebox square_boxs">
              <div class="col-xs-12 pull-left nopadmar">
                <div class="text-sec orange"> 15 </div>
                <h4 class="alert-heading-orange ">Inspections Open</h4>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-4 col-sm-4 margin_10">
          <!-- Trans label pie charts strats here-->
          <div class="redbg no-radius">
            <div class="panel-body squarebox square_boxs">
              <div class="col-xs-12 pull-left nopadmar">
                <div class="text-sec green"> 05 </div>
                <h4 class="alert-heading-green ">Inspections Ready to Send</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--/row-->

      <div class="row">
        <div class="col-lg-12">
          <!-- Tracking charts strats here-->
          <div class="panel panel-primary">
            <div class="panel-body">
              <h4 style="margin:10px;"><strong>Companies</strong></h4>
              <div id="spline-chart" class="flotChart"></div>
            </div>
          </div>
        </div>
        <div class="col-lg-12">
          <!-- Tracking charts strats here-->
          <div class="panel panel-primary">
            <div class="panel-body">
              <h4 style="margin:10px;"><strong>Properties</strong></h4>
              <div id="bar-chart" class="flotChart1"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6">
          <!-- Stack charts strats here-->
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title"> <i class="livicon" data-name="barchart" data-size="16" data-loop="true" data-c="#fff" data-hc="#fff"></i> Stacked Bar Chart </h3>
              <span class="pull-right"> <i class="glyphicon glyphicon-chevron-up showhide clickable"></i> <i class="glyphicon glyphicon-remove removepanel clickable"></i> </span> </div>
            <div class="panel-body">
              <div id="bar-chart-stacked" class="flotChart1"></div>
            </div>
          </div>
        </div>
      </div>
      <!-- row -->

      <!-- row -->

    </section>
  </aside>
  <!-- right-side -->
</div>
@stop
