@extends('layout.main')
@section('content')
@include('includes.top_header')
<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    @include('includes.sidebar')
    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">

        <section class="content">

          <!-- Second Data Table -->
          <div class="row">
  <div class="col-md-12 ">
    <div class="table-scrollable">
        <div class="row"><div class="col-sm-9" ><div class="dataTables_length" id="DataTables_Table_1_length"><button type="button" class="btn btn-responsive button-alignment btn-primary" >Show all</button></div></div><div class="col-sm-3"><div id="DataTables_Table_1_filter" class="dataTables_filter"><input class="form-control input-md" value="search field" placeholder="" aria-controls="DataTables_Table_1" type="search"></div></div></div>

                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th width="12%" bgcolor="#666665">Date</th>
                                          <th width="13%" bgcolor="#666665">Status</th>
                                          <th width="11%" bgcolor="#666665">Company</th>
                                          <th width="11%" bgcolor="#666665">Property Name</th>
                                          <th width="11%" bgcolor="#666665">City</th>
                                          <th width="11%" bgcolor="#666665">1 YR</th>
                                          <th width="11%" bgcolor="#666665">2 YR</th>
                                          <th width="11%" bgcolor="#666665">3 YR</th>
                                          <th width="11%" bgcolor="#666665">5 Yr</th>
                                          <th width="11%" bgcolor="#666665">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td bgcolor="#f1f2f1">&nbsp;</td>
                                            <td bgcolor="#f1f2f1">&nbsp;</td>
                                            <td bgcolor="#f1f2f1">&nbsp;</td>
                                            <td bgcolor="#f1f2f1">&nbsp;</td>
                                            <td bgcolor="#f1f2f1">&nbsp;</td>
                                            <td bgcolor="#f1f2f1">&nbsp;</td>
                                            <td bgcolor="#f1f2f1">&nbsp;</td>
                                            <td bgcolor="#f1f2f1">&nbsp;</td>
                                            <td bgcolor="#f1f2f1">&nbsp;</td>
                                            <td bgcolor="#f1f2f1">&nbsp;</td>
                                      </tr>
                                        <tr class="odd">
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                            <td>&nbsp;</td>
                                        </tr>
                                       <tr>
                                            <td bgcolor="#f1f2f1">&nbsp;</td>
                                            <td bgcolor="#f1f2f1">&nbsp;</td>
                                            <td bgcolor="#f1f2f1">&nbsp;</td>
                                            <td bgcolor="#f1f2f1">&nbsp;</td>
                                            <td bgcolor="#f1f2f1">&nbsp;</td>
                                            <td bgcolor="#f1f2f1">&nbsp;</td>
                                            <td bgcolor="#f1f2f1">&nbsp;</td>
                                            <td bgcolor="#f1f2f1">&nbsp;</td>
                                            <td bgcolor="#f1f2f1">&nbsp;</td>
                                            <td bgcolor="#f1f2f1">&nbsp;</td>
                                      </tr>
                                        <tr class="odd">
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                          <td>&nbsp;</td>
                                        </tr>
                                    </tbody>
            </table>
      </div>
      </div>
      <div class="row">
            <div class="col-sm-10" >
                <div class="dataTables_paginate paging_simple_numbers" id="inline_edit_paginate">
              <ul class="pagination pull-left">
              <li class="paginate_button previous disabled" id="inline_edit_previous"><a href="#" aria-controls="inline_edit" data-dt-idx="0" tabindex="0">FIRST</a></li>
                    <li class="paginate_button previous disabled" id="inline_edit_previous"><a href="#" aria-controls="inline_edit" data-dt-idx="0" tabindex="0">PREV</a></li>
                    <li class="paginate_button active"><a href="#" aria-controls="inline_edit" data-dt-idx="1" tabindex="0">1</a></li>
                    <li class="paginate_button next" id="inline_edit_next"><a href="#" aria-controls="inline_edit" data-dt-idx="4" tabindex="0">NEXT</a></li>

                    <li class="paginate_button next" id="inline_edit_next"><a href="#" aria-controls="inline_edit" data-dt-idx="4" tabindex="0">LAST</a></li>
                  </ul>
            </div>
              </div>
          <div class="col-sm-2">
          <div class="dataTables_length pull-right" id="inline_edit_length"><label class="col-md-4 line-p">Show </label>
          <div class="col-md-8"><select  id="select-gear14" class="form-control" ><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select></div></div>
              </div>

        </div>
  </div>
  <div class="modal fade in" id="add-5yr" tabindex="-1" role="dialog" aria-hidden="false">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title">Add 5yr Look Back</h4>
                            </div>
                            <div class="modal-body">
                            <p>You can perform a 5yr look back on a company with all itʼs properties or a single property.</p>
                                <div class="row">

                                         <div class="col-md-8 col-md-offset-2">
                                <div class="form-group">
                                    <label class="nopad">Company Name</label>

                                    <select id="select-gear15" class="form-control">
                                        <option>&#8212;Select&#8212;</option>

                                    </select>
                                   <p class="text-center">OR</p>
                                </div>

                                <div class="form-group">
                                    <label class="nopad">Property Name</label>

                                    <select id="select-gear15" class="form-control">
                                        <option>&#8212;Select&#8212;</option>

                                    </select>

                                </div>
                                <div class="col-md-12 nopadmar" >
                                    <div class="form-group col-md-3 nopadmar marg-r">
                                      <label>Small</label>
                                      <input class="form-control">
                                    </div>
                                    <div class="form-group col-md-3 nopadmar marg-r" >
                                      <label>Medium</label>
                                      <input class="form-control">
                                    </div>
                                    <div class="form-group col-md-3 nopadmar">
                                      <label>Large</label>
                                      <input class="form-control">
                                    </div>
                              </div>
                                </div>
                                </div>
                            </div>
                            <div class="modal-footer" style="text-align:center">
                                <button type="button" data-dismiss="modal" class="btn btn-cancel">Cancel</button>
                                <button type="button" class="btn btn-success" id="next">Next</button>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </aside>
    <!-- right-side -->
</div>
@stop
@section('script')
  <script>
      $(document).ready(function(){
        $('#next').click(function(){
            window.location.href = '/5yrlookbackinfo';
        });
      });
  </script>
@stop
