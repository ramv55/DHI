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
          @if (count($errors) > 0)
              <div class="alert alert-danger">
                  <strong>Whoops!</strong> There were some problems with your input.
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif

          @if ($message = Session::get('success'))

            <div class="alert alert-success alert-block">

              <button type="button" class="close" data-dismiss="alert">×</button>

                    <strong>{{ $message }}</strong>

              </div>



          @endif

          <div class="form-group">
            <button type="submit" class="btn btn-responsive btn-warning" onclick="goBack()">Back</button>
            <button type="submit" class="btn btn-responsive btn-blue">RUN 5yr Look Back</button>
          </div>
        </div>
      </div>
      {{ Form::open(array('url' => 'addCompanyDet', 'id' => 'addcompForm')) }}
      <div class="row">
        <div class="col-md-6">
          <div class="form-group col-md-7 nopad">
            <label>Company Name</label>
            <input class="form-control required" name="company_name" />
          </div>
          <div class="form-group col-md-3 col-md-offset-1 nopad">
            <label>Customer</label>
            <select class="form-control required" name="comp_customer">
              <option value="">— Select —</option>
              <option value="1">Yes</option>
              <option value="0">No</option>
            </select>
          </div>
          <div class="form-group col-md-7 nopad">
            <label>Contact Name</label>
            <input class="form-control required" name="contact_name"/>
          </div>
          <div class="form-group col-md-4 col-md-offset-1 nopad">
            <label>Phone</label>
            <input class="form-control required" name="company_phone" />
          </div>
          <div class="form-group">
            <label>Email Address</label>
            <input class="form-control required email" name="company_email"/>
          </div>
          <div class="form-group">
            <label>Address</label>
            <input class="form-control required" name="company_address1"/>
          </div>
          <div class="form-group">
            <input class="form-control" name="company_address2"/>
          </div>
          <div class="form-group col-md-4 nopad">
            <input class="form-control required" name="city" placeholder="City"/>
          </div>
          <div class="form-group col-md-2 col-md-offset-1 nopad">
            <input class="form-control required" name="state" placeholder="State"/>
          </div>
          <div class="form-group col-md-4 col-md-offset-1 nopad">
            <input class="form-control required" name="zip" placeholder="Zip Code"/>
          </div>
          <?php
              $alert_settings = DB::table('alert_settings')->first();
           ?>
          <div class="clearfix"></div>
          <div class="form-group nopad">
            <h5 style="font-weight:bold;">Alert Settings</h5>
            <div class="col-md-3 nopad">
              <label for="name">Mile Radius</label>
              <input class="form-control required" name="mile_radius" value="{{ @$alert_settings->mile_radius }}" />
            </div>
            <div class="col-md-3 nopad col-md-offset-1">
              <label for="name">Hail Min. Size</label>
                <input class="form-control required" name="hail_size" value="{{ @$alert_settings->hail_size }}"/>
            </div>
            <div class="col-md-3 nopad col-md-offset-1">
              <label for="name">Wind Min. Mph</label>
              <input class="form-control required" name="wind_size" value="{{ @$alert_settings->wind_speed }}"/>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-12 nopad">
              <div class="table-scrollable">
                <div class="col-md-2">
                  <h4>Properties</h4>
                </div>
                <div class="col-md-4"><a data-toggle="modal" data-href="#new-property" href="#new-property" class="uploadmini"><span class="plusmini">+</span></a></div>
                <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th width="12%" bgcolor="#666665">Property Name</th>
                      <th width="13%" bgcolor="#666665">Address</th>
                      <th width="11%" bgcolor="#666665">City</th>
                      <th width="12%" bgcolor="#666665">ST</th>
                      <th width="13%" bgcolor="#666665">Buildings</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td bgcolor="#f1f2f1">&nbsp;</td>
                      <td bgcolor="#f1f2f1">&nbsp;</td>
                      <td bgcolor="#f1f2f1">&nbsp;</td>
                      <td bgcolor="#f1f2f1">&nbsp;</td>
                      <td bgcolor="#f1f2f1">&nbsp;</td>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12" style="padding:0px;">
              <div class="table-scrollable">
                <div class="col-md-2">
                  <h4>Buildings</h4>
                </div>
                <div class="col-md-4"><a  data-toggle="modal" data-href="#buildings" href="#buildings" class="uploadmini"><span class="plusmini">+</span></a></div>
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
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12 text-center" style="margin:50px 0;">

          <button type="submit" class="btn btn-success" style="margin:0 20px;">SAVE</button>
          <button type="button" data-dismiss="modal" class="btn btn-default" style="margin:0 20px;">CANCEL</button>
        </div>
      </div>
      {{ Form::close() }}
      <!--************************** Add property starts here ********************************-->
      <div class="modal fade in" id="new-property" tabindex="-1" role="dialog" aria-hidden="false">
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
                    <input class="form-control" name="propery_name"/>
                  </div>
                  <div class="form-group col-md-7 nopad">
                    <label>Contact Name</label>
                    <input class="form-control" name="property_contact"/>
                  </div>
                  <div class="form-group col-md-4 col-md-offset-1 nopad">
                    <label>Phone</label>
                    <input class="form-control" name="property_phone"/>
                  </div>
                  <div class="form-group">
                    <label>Email Address</label>
                    <input class="form-control" name="property_email"/>
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <input class="form-control" name="property_address"/>
                  </div>
                  <div class="form-group">
                    <input class="form-control" name="property_address1"/>
                  </div>
                  <div class="form-group col-md-4 nopad">
                    <input class="form-control" name="property_address2"/>
                  </div>
                  <div class="form-group col-md-2 col-md-offset-1 nopad">
                    <input class="form-control" name="property_address3"/>
                  </div>
                  <div class="form-group col-md-4 col-md-offset-1 nopad">
                    <input class="form-control" />
                  </div>
                  <div class="form-group col-md-8 nopad">
                    <h5 style="font-weight:bold;">Property Logo</h5>
                    <p class="text-center">
                      <input type="file" name="property_logo" id="property_logo" />
                      <!-- <em><a href="#" style="color:#999;">Click here to Upload Logo</a></em></p> -->
                  </div>
                  <div class="form-group col-md-4 nopad">
                    <div class="col-md-7 nopad">
                      <label for="name">Customer</label>
                      <select id="select-gear2" class="form-control">
                        <option value="">- Select -</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group col-md-5 nopad">
                    <label>Small Coordinate</label>
                    <input class="form-control" name="small_coordinate"/>
                  </div>
                  <div class="form-group col-md-5 col-md-offset-1 nopad">
                    <label>&nbsp;</label>
                    <input class="form-control" />
                  </div>
                  <div class="form-group col-md-5 nopad">
                    <label>Large Coordinate</label>
                    <input class="form-control" name="large_coordinate"/>
                  </div>
                  <div class="form-group col-md-5 col-md-offset-1 nopad">
                    <label>&nbsp;</label>
                    <input class="form-control" />
                  </div>
                  <div class="form-group col-md-11 nopad">
                    <label for="name" class="col-md-5 nopad line-p">Total Buildings</label>
                    <div class="col-md-7 nopad">
                      <select id="select-gear1" class="form-control">
                        <option>Default</option>
                      </select>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="col-md-12 nopad">
                    <div class="form-group col-md-3 nopad">
                      <label>Small</label>
                      <input class="form-control" name="small"/>
                    </div>
                    <div class="form-group col-md-3 col-md-offset-1 nopad">
                      <label>Medium</label>
                      <input class="form-control" name="medium"/>
                    </div>
                    <div class="form-group col-md-3 col-md-offset-1 nopad">
                      <label>Large</label>
                      <input class="form-control" name="large"/>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="form-group">
                    <div class="fileinput-new thumbnail img-box"> Image </div>
                  </div>
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
      <!--************************** Add property ends here ********************************-->

      <!--************************** Add building starts here ********************************-->
      <div class="modal fade in" id="buildings" tabindex="-1" role="dialog" aria-hidden="false">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">New Building</h4>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Property Name</label>
                    <select id="select-gear18" class="form-control">
                      <option value="">- Select -</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <input class="form-control" name="building_address"/>
                  </div>
                  <div class="form-group">
                    <input class="form-control" name="building_address1"/>
                  </div>
                  <div class="form-group col-md-4 nopad">
                    <input class="form-control" />
                  </div>
                  <div class="form-group col-md-2 col-md-offset-1 nopad">
                    <input class="form-control" name="building_address2"/>
                  </div>
                  <div class="form-group col-md-4 col-md-offset-1 nopad">
                    <input class="form-control" name="building_address3"/>
                  </div>
                </div>
                <div class="col-md-5 col-md-offset-1">
                  <div class="form-group">
                    <label class="col-md-4 nopad line-p">Roof Type</label>
                    <div class="col-md-7">
                      <select id="select-gear15" class="form-control">
                        <option value="">- Select -</option>
                        <option value="low slope">Low Slope</option>
                        <option value="high slope">High Slope</option>
                      </select>
                    </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="form-group">
                    <label class="col-md-4 nopad line-p">Building Size</label>
                    <div class="col-md-7">
                      <select id="select-gear19" class="form-control">
                        <option value="">- select -</option>
                        <option value="small">Small</option>
                        <option value="medium">Medium</option>
                        <option value="large">Large</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" data-dismiss="modal" class="btn btn-cancel">Cancel</button>
              <button type="button" class="btn btn-success">Send</button>
            </div>
          </div>
        </div>
      </div>
      <!--************************** Add building ends here ********************************-->
    </section>
  </aside>
  <!-- right-side -->
</div>
@stop
@section('script')
<script type="text/javascript">
function goBack() {
    window.history.back();
}

$('#addcompForm').validate({
    errorElement: 'div',
    messages: {
      company_name: {
        required: "Please enter Company Name."
      },
      comp_customer: {
        required: "Please select Customer."
      },
      contact_name: {
        required: "Please enter Contact Name."
      },
      company_phone: {
        required: "Please enter Phone Number."
      },
      company_email: {
        required: "Please enter E-mail Address."
      },
      company_address1: {
        required: "Please enter Address."
      },
      city: {
        required: "Please enter City."
      },
      state: {
        required: "Please enter State."
      },
      zip: {
        required: "Please enter Zip code."
      },
      mile_radius: {
        required: "Please enter Mile Radius."
      },
      hail_size: {
        required: "Please enter Hail min. Size."
      },
      wind_size: {
        required: "Please enter Wind Min. Mph."
      }
    }
});
</script>
@stop
