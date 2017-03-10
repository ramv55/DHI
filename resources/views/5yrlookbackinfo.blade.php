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
        <div class="col-md-6">
          <div class="form-group" >
            <label>Company Name</label>
            <input class="form-control" />
          </div>
          <div class="form-group" >
            <label>Property Name</label>
            <input class="form-control" />
          </div>
          <div class="form-group col-md-7 nopad">
            <label>Property Contact</label>
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
          <div class="form-group" >
            <h5 style="font-weight:bold;">Property Logo</h5>
            <p class="text-center"><em><a href="#"  style="color:#999;">Click here to Upload Logo</a></em></p>
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
          <div class="form-group col-md-5 nopad">
            <label class="col-md-5 nopad line-p" for="name">Roof Type</label>
            <div class="col-md-7 nopad">
              <select id="select-gear1" class="form-control">
                <option>Option</option>
              </select>
            </div>
          </div>
          <div class="form-group col-md-5 col-md-offset-1 nopad">
            <label class="col-md-5 nopad" for="name">Report Logo</label>
            <div class="col-md-7 nopad">
              <select id="select-gear2" class="form-control">
                <option>Option</option>
              </select>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="form-group col-md-5 nopad">
            <label class="col-md-7 nopad line-p" for="name">Total Buildings</label>
            <div class="col-md-5 nopad"> <span style="line-height:20px; color:#999; "><em>Displays Calculated Total</em></span> </div>
          </div>
          <div class="col-md-5 col-md-offset-1 nopad">
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
          <div class="form-group col-md-5 nopad">
            <label>Small Estimate Amount</label>
            <input class="form-control" value="$" />
          </div>
          <div class="form-group col-md-5 col-md-offset-1 nopad">
            <label>Large Estimate Amount</label>
            <input class="form-control" value="$" />
          </div>
          <div class="clearfix"></div>
          <div class="form-group text-center" style="margin-top:10px;">
            <div class="fileinput-new thumbnail img-box"> Image </div>
          </div>
        </div>
        <div class="col-md-12 text-center" style="margin:50px 0">
          <button type="button" class="btn btn-success" style="margin:0 20px;">ADD</button>
          <button type="button" class="btn btn-default" style="margin:0 20px;">CLEAR</button>
          <button type="button" class="btn btn-info" style="margin:0 20px;">SEND INFO</button>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 ">
          <div class="table-scrollable">
            <h4 style="padding:10px">Properties Included</h4>
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th width="20%" bgcolor="#666665">Property Name</th>
                  <th width="29%" bgcolor="#666665">City</th>
                  <th width="12%" bgcolor="#666665">State</th>
                  <th width="19%" bgcolor="#666665">Small Estimate</th>
                  <th width="20%" bgcolor="#666665">Large Estimate</th>
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
      <div class="modal fade in" id="report" tabindex="-1" role="dialog" aria-hidden="false">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Email 5yr Look Back Report</h4>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Send to (add email address, seperate multiples with a semicolon)</label>
                    <textarea class="form-control resize_vertical" rows="2"></textarea>
                  </div>
                  <div class="form-group">
                    <label>Notes to Receipent/s</label>
                    <textarea class="form-control resize_vertical" rows="2"></textarea>
                  </div>
                </div>
                <div class="col-md-6" style="line-height:45px;">
                  <div class="form-group">
                    <label class="col-md-5" style="padding:0px">DHI Logo</label>
                    <div class="col-md-6">
                      <select id="select-gear15" class="form-control">
                        <option>Main</option>
                      </select>
                    </div>
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
