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
        <div class="col-md-12">
          <div class="form-group">
            <button type="submit" class="btn btn-responsive btn-warning">Back</button>
            <button type="submit" class="btn btn-responsive btn-blue">RUN 5yr Look Back</button>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="form-group col-md-7 nopad">
            <label>Company Name</label>
            <input class="form-control" />
          </div>
          <div class="form-group col-md-3 col-md-offset-1 nopad">
            <label>Customer</label>
            <select id="select-gear17" class="form-control">
              <option>— Select —</option>
            </select>
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
          <div class="clearfix"></div>
          <div class="form-group text-center" style="margin-top:10px;">
            <div class="fileinput-new thumbnail img-box"> Image </div>
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
            <label class="col-md-7 nopad line-p" for="name">Total Buildings</label>
            <div class="col-md-5 nopad"> <span style="line-height:20px; color:#999; "><em>Displays Calculated Total</em></span> </div>
          </div>
          <div class="col-md-5 col-md-offset-1 nopad">
            <div class="form-group col-md-3 nopad line-h">
              <label>Small</label>
              <input class="form-control" />
            </div>
            <div class="form-group col-md-3 col-md-offset-1 nopad line-h">
              <label>Medium</label>
              <input class="form-control" />
            </div>
            <div class="form-group col-md-3 col-md-offset-1 nopad line-h">
              <label>Large</label>
              <input class="form-control" />
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 nopad">
              <div class="table-scrollable">
                <div class="col-md-2">
                  <h4>Buildings</h4>
                </div>
                <div class="col-md-4"><a href="#" class="uploadmini"><span class="plusmini">+</span></a></div>
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th width="12%" bgcolor="#666665">Property Name</th>
                      <th width="13%" bgcolor="#666665">Building #</th>
                      <th width="11%" bgcolor="#666665">City</th>
                      <th width="12%" bgcolor="#666665">Size</th>
                      <th width="13%" bgcolor="#666665">Roof</th>
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
          <div class="clearfix"></div>
          <div class="form-group col-md-7 nopad">
            <h5 style="font-weight:bold;">Alert Settings</h5>
            <div class="col-md-3 nopad">
              <label for="name">Mile Radius</label>
              <select class="form-control" id="select-gear5">
                <option>— Select —</option>
              </select>
            </div>
            <div class="col-md-3 nopad col-md-offset-1">
              <label for="name">Hail Min. Size</label>
              <select class="form-control" id="select-gear5">
                <option>— Select —</option>
              </select>
            </div>
            <div class="col-md-3 nopad col-md-offset-1">
              <label for="name">Wind Min. Mph</label>
              <select class="form-control" id="select-gear6">
                <option>— Select —</option>
              </select>
            </div>
          </div>
          <div class="form-group col-md-5 nopad">
            <h5 style="font-weight:bold;">Logo</h5>
            <p class="text-center"><em><a href="#"  style="color:#999;">Click here to Upload Logo</a></em></p>
          </div>
        </div>
        <div class="col-md-12 text-center" style="margin:50px 0;">
          <button type="button" class="btn btn-danger" style="margin:0 20px;">DELETE</button>
          <button type="button" class="btn btn-success" style="margin:0 20px;">SAVE</button>
          <button type="button" data-dismiss="modal" class="btn btn-default" style="margin:0 20px;">CANCEL</button>
        </div>
      </div>
      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-5 nopad">
          <div class="table-scrollable">
            <div class="col-md-5">
              <h4>Alerts</h4>
            </div>
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th width="12%" bgcolor="#666665">Date</th>
                  <th width="13%" bgcolor="#666665">Status</th>
                  <th width="11%" bgcolor="#666665">Hail</th>
                  <th width="12%" bgcolor="#666665">Wind</th>
                  <th width="13%" bgcolor="#666665">Map It</th>
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
        <div class="col-md-5 col-md-offset-1 nopad">
          <div class="table-scrollable">
            <div class="col-md-5">
              <h4>Inspections</h4>
            </div>
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th width="12%" bgcolor="#666665">Date</th>
                  <th width="13%" bgcolor="#666665">Status</th>
                  <th width="11%" bgcolor="#666665">Hail</th>
                  <th width="12%" bgcolor="#666665">Wind</th>
                  <th width="13%" bgcolor="#666665">Ground</th>
                  <th width="13%" bgcolor="#666665">Roof</th>
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
                </tr>
                <tr class="odd">
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
                </tr>
                <tr class="odd">
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
      </div>
    </section>
  </aside>

</div>
@stop
