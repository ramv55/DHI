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
        <div class="col-md-12 nopad">
          <div class="table-scrollable">
            <div class="row">
              <div class="col-sm-9">
                <div class="dataTables_length" id="DataTables_Table_1_length">
                  <button type="button" class="btn btn-responsive button-alignment btn-primary" data-toggle="modal" data-target="#report" style="margin-right:40px;">Show all</button>
                  <button type="button" class="btn btn-responsive button-alignment btn-primary" data-toggle="modal" data-target="#report" style="margin-right:20px;">Customers</button>
                  <button type="button" class="btn btn-responsive button-alignment btn-primary" data-toggle="modal" data-target="#report">Leads</button>
                </div>
              </div>
              <div class="col-sm-3">
                <div id="DataTables_Table_1_filter" class="dataTables_filter">
                  <input class="form-control input-md" value="search field" placeholder="" aria-controls="DataTables_Table_1" type="search">
                </div>
              </div>
            </div>
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th width="12%" bgcolor="#666665">Property Name</th>
                  <th width="13%" bgcolor="#666665">Customer</th>
                  <th width="11%" bgcolor="#666665">Company</th>
                  <th width="12%" bgcolor="#666665">Address</th>
                  <th width="12%" bgcolor="#666665">City</th>
                  <th width="12%" bgcolor="#666665">ST</th>
                  <th width="12%" bgcolor="#666665">Open Alert</th>
                  <th width="12%" bgcolor="#666665">Past Alert</th>
                  <th width="12%" bgcolor="#666665">Inspections</th>
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
                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="row" >
          <div class="col-sm-10" >
            <div class="dataTables_paginate paging_simple_numbers" id="inline_edit_paginate">
              <ul class="pagination pull-left">
                <li class="paginate_button previous disabled" id="inline_edit_previous"><a href="#" aria-controls="inline_edit" data-dt-idx="0" tabindex="0">FIRST</a></li>
                <li class="paginate_button previous disabled" id="inline_edit_previous"><a href="#" aria-controls="inline_edit" data-dt-idx="0" tabindex="0">PREV</a></li>
                <li class="paginate_button active"><a href="#" aria-controls="inline_edit" data-dt-idx="1" tabindex="0">1</a></li>
                <li class="paginate_button next" id="inline_edit_next"><a href="#" aria-controls="inline_edit" data-dt-idx="4" tabindex="0">NEXT</a></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-2 nopad">
            <div class="dataTables_length pull-right" id="inline_edit_length">
              <label class="col-md-4 line-p">Show </label>
              <div class="col-md-8">
                <select  id="select-gear14" class="form-control" >
                  <option value="10">10</option>
                  <option value="25">25</option>
                  <option value="50">50</option>
                  <option value="100">100</option>
                </select>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal fade in" id="property" tabindex="-1" role="dialog" aria-hidden="false">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">New Property</h4>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group" >
                    <label>Property Name</label>
                    <input class="form-control" />
                  </div>
                  <div class="form-group col-md-7 nopad">
                    <label>Contact Name</label>
                    <input class="form-control" />
                  </div>
                  <div class="form-group col-md-4 col-md-offset-1 nopad">
                    <label>Phone</label>
                    <input class="form-control" />
                  </div>
                  <div class="form-group">
                    <label>Email Address</label>
                    <input class="form-control" />
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <input class="form-control" />
                  </div>
                  <div class="form-group">
                    <input class="form-control" />
                  </div>
                  <div class="form-group col-md-4 nopad">
                    <input class="form-control" />
                  </div>
                  <div class="form-group col-md-2 col-md-offset-1 nopad">
                    <input class="form-control" />
                  </div>
                  <div class="form-group col-md-4 col-md-offset-1 nopad">
                    <input class="form-control" />
                  </div>
                  <div class="form-group col-md-8 nopad">
                    <h5 style="font-weight:bold;">Property Logo</h5>
                    <p class="text-center"><em><a href="#" style="color:#999;">Click here to Upload Logo</a></em></p>
                  </div>
                  <div class="form-group col-md-4" style="padding:0px !important">
                    <div class="col-md-7 nopad">
                      <label for="name">Customer</label>
                      <select id="select-gear2" class="form-control">
                        <option>No</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group col-md-5 nopad">
                    <label>Small Coordinate</label>
                    <input class="form-control" />
                  </div>
                  <div class="form-group col-md-5 col-md-offset-1 nopad">
                    <label>&nbsp;</label>
                    <input class="form-control" />
                  </div>
                  <div class="form-group col-md-5 nopad">
                    <label>Large Coordinate</label>
                    <input class="form-control" />
                  </div>
                  <div class="form-group col-md-5 col-md-offset-1 nopad">
                    <label>&nbsp;</label>
                    <input class="form-control" />
                  </div>
                  <div class="form-group col-md-8 nopad">
                    <label class="col-md-7 nopad line-p"  for="name">Total Buildings</label>
                    <div class="col-md-5 nopad"> <span style="line-height:20px; color:#999; "><em>Displays Calculated Total</em></span> </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-md-12 nopad">
                    <div class="form-group col-md-3 nopad">
                      <label>Small</label>
                      <input class="form-control" />
                    </div>
                    <div class="form-group col-md-3 col-md-offset-1 nopad">
                      <label>Medium</label>
                      <input class="form-control" />
                    </div>
                    <div class="form-group col-md-3 col-md-offset-1 nopad">
                      <label>Large</label>
                      <input class="form-control" />
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="form-group">
                    <div class="fileinput-new thumbnail img-box"> Image </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 ">
                <div class="table-scrollable">
                  <h4 style="margin:10px">Buildings</h4>
                  <table class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th bgcolor="#666665" width="12%">Address</th>
                        <th bgcolor="#666665" width="13%">Address2</th>
                        <th bgcolor="#666665" width="11%">Size</th>
                        <th bgcolor="#666665" width="11%">Roof</th>
                        <th bgcolor="#666665" width="11%">Inspections</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
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
                      </tr>
                      <tr>
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
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" data-dismiss="modal" class="btn btn-cancel">Cancel</button>
              <button type="button" class="btn btn-success">Save</button>
            </div>
          </div>
        </div>
      </div>
    </section>
  </aside>
  <!-- right-side -->
</div>
@stop
