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
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-4 margin_10 col-md-offset-1">
                    <!-- Trans label pie charts strats here-->
                    <div class="redbg no-radius">
                        <div class="panel-body squarebox square_boxs">
                            <div class="col-xs-12 pull-left nopadmar">

                                       <div class="text-sec red">
                                       10
                                     </div>
                                     <h4 class="alert-heading-red ">Alerts Last 7 Days</h4>
                             </div>
                        </div>
                    </div>
                </div>
                  <div class="col-lg-3 col-md-4 col-sm-4 margin_10 col-md-offset-2">
                    <!-- Trans label pie charts strats here-->
                    <div class="redbg no-radius">
                        <div class="panel-body squarebox square_boxs">
                            <div class="col-xs-12 pull-left nopadmar">

                                       <div class="text-sec blue">
                                       32
                                     </div>
                                     <h4 class="alert-heading-blue ">Outstanding Alerts</h4>
                             </div>
                        </div>
                    </div>
                </div>





            </div>
            <div class="row">
  <div class="col-md-12 ">
    <div class="table-scrollable">
        <div class="row"><div class="col-sm-9" ><div class="dataTables_length" id="DataTables_Table_1_length"><a class="show-link" data-toggle="modal" data-href="#req-insp" href="#req-insp">Show All</a></div></div><div class="col-sm-3"><div id="DataTables_Table_1_filter" class="dataTables_filter"><input class="form-control input-md" value="search field" placeholder="" aria-controls="DataTables_Table_1" type="search"></div></div></div>

                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th width="8%" bgcolor="#666665">Date</th>
                                          <th width="9%" bgcolor="#666665">Hail</th>
                                          <th width="9%" bgcolor="#666665">Wind</th>
                                          <th width="10%" bgcolor="#666665">Map It</th>
                                          <th width="10%" bgcolor="#666665">Customer</th>
                                          <th width="9%" bgcolor="#666665">Company</th>
                                          <th width="18%" bgcolor="#666665">Property</th>
                                          <th width="16%" bgcolor="#666665">City</th>
                                          <th width="10%" bgcolor="#666665">ST</th>
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
      <div class="clearfix"></div>
      <div class="row" style="padding:12px 0px;">
            <div class="col-sm-9" >
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
          <div class="col-sm-3" >
          <div class="dataTables_length pull-right" id="inline_edit_length"><label class="col-md-4 line-p">Show </label>
          <div class="col-md-8"><select  id="select-gear14" class="form-control" ><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select></div></div>
              </div>

        </div>
  </div>
          <div class="modal fade in" id="req-insp" tabindex="-1" role="dialog" aria-hidden="false">
                    <div class="modal-dialog modal-md">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title">Request an Inspection</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">

                                         <div class="col-md-12">
                                       <div class="form-group">
                                    <label>Company Name</label>
                                    <p class="em-txt"><em>Company Name Displayed Here</em></p>
                                </div>

                                <div class="form-group">
                                      <label>Property Name</label>
                                    <p class="em-txt"><em>Property Name Displayed Here</em></p>
                                </div>

                                    </div>
                                    <div class="col-md-6">
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" class="minimal-blue" />
                                    </label>

                                    <label>All Buildings</label>
                                </div>
                                   <div class="form-group">
                                    <label>
                                        <input type="checkbox" class="minimal-blue" />
                                    </label>

                                    <label>#101</label>
                                </div>
                                    <div class="form-group">
                                    <label>
                                        <input type="checkbox" class="minimal-blue" />
                                    </label>

                                    <label>#102</label>
                                </div>
                                    <div class="form-group">
                                    <label>
                                        <input type="checkbox" class="minimal-blue" />
                                    </label>

                                    <label>#103</label>
                                </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                    <label>
                                        <input type="checkbox" class="minimal-blue" />
                                    </label>

                                    <label>#104</label>
                                </div>
                                    <div class="form-group">
                                    <label>
                                        <input type="checkbox" class="minimal-blue" />
                                    </label>

                                    <label>#105</label>
                                </div>
                                </div>
                                <div class="clearfix"></div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                    <label>Insurance Company</label>
                                        <input class="form-control" />


                                </div>

                                </div>

                                <div class="col-md-6">

                                    <div class="form-group">
                                    <label>Claim Number</label>
                                        <input class="form-control" />


                                </div>

                                </div>
                                <div class="col-md-6">

                                    <div class="form-group">
                                    <label>Assign an Inspector</label>
                                        <select class="form-control" id="select-gear7">
                                        <option>— Select —</option>

                                    </select>


                                </div>

                                </div>

                                <div class="col-md-6">
                                       <div class="form-group">
                                    <label>Inspection Type</label>
                                    <select class="form-control" id="select-gear7">
                                        <option>— Select —</option>

                                    </select>
                                </div>
                                </div>
                                <div class="col-md-12">

                                <div class="form-group">
                                    <label>Notes to Inspector</label>
                                    <textarea class="form-control resize_vertical" rows="2"></textarea>
                                </div>


                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn btn-cancel">Cancel</button>
                                <button type="button" class="btn btn-send">Send</button>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
    </aside>
    <!-- right-side -->
</div>
@stop
