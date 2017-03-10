@extends('layout.main')
@section('content')
@include('includes.top_header')
<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    @include('includes.sidebar')
    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">

        <!-- Main content -->
        <section class="content">

          <div class="row" >
        <div class="col-md-8">
          <div class="table-scrollable">
            <div class="row"><div class="col-sm-8"><h4>Logs</h4></div><div class="col-sm-3 pull-right"><div id="DataTables_Table_1_filter" class="dataTables_filter"><input class="form-control input-md" value="search field" placeholder="" aria-controls="DataTables_Table_1" type="search"></div></div></div>
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th width="12%" bgcolor="#666665">Date - Time</th>
                  <th width="13%" bgcolor="#666665">User Name</th>
                  <th width="11%" bgcolor="#666665">Function Performed</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td bgcolor="#f1f2f1">&nbsp;</td>
                  <td bgcolor="#f1f2f1">&nbsp;</td>
                  <td bgcolor="#f1f2f1">&nbsp;</td>
                </tr>
                <tr class="odd">
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td bgcolor="#f1f2f1">&nbsp;</td>
                  <td bgcolor="#f1f2f1">&nbsp;</td>
                  <td bgcolor="#f1f2f1">&nbsp;</td>
                </tr>
                <tr class="odd">
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-sm-6" >
                <div class="dataTables_paginate paging_simple_numbers" id="inline_edit_paginate">
              <ul class="pagination pull-left">
              <li class="paginate_button previous disabled" id="inline_edit_previous"><a href="#" aria-controls="inline_edit" data-dt-idx="0" tabindex="0">FIRST</a></li>
                    <li class="paginate_button active"><a href="#" aria-controls="inline_edit" data-dt-idx="1" tabindex="0">1</a></li>
                    <li class="paginate_button next" id="inline_edit_next"><a href="#" aria-controls="inline_edit" data-dt-idx="4" tabindex="0">NEXT</a></li>
                  </ul>
            </div>
              </div>
          <div class="col-sm-2">
          <div class="dataTables_length pull-right" id="inline_edit_length"><label class="col-md-4 line-p">Show </label>
          <div class="col-md-8"><select  id="select-gear14" class="form-control" ><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select></div></div>
              </div>

        </div>
      </div>
     </section>
    </aside>
    <!-- right-side -->
</div>
@stop
