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
      {{ Form::open(array('url' => 'updateCompanyDet', 'id' => 'updatecompForm')) }}
      <div class="row">
        <div class="col-md-6">
          <div class="form-group col-md-7 nopad">
            <label>Company Name</label>
            <input type="hidden" name="id" value="<?=$getcompany->company_id?>" />
            <input class="form-control required" name="company_name" value="<?=$getcompany->company_name?>"/>
          </div>
          <div class="form-group col-md-3 col-md-offset-1 nopad">
            <label>Customer</label>
            <select class="form-control required" name="comp_customer">
              <option value="">— Select —</option>
              <option value="1" <?php if($getcompany->customer == 1) echo 'selected'; ?>>Yes</option>
              <option value="0" <?php if($getcompany->customer == 0) echo 'selected'; ?>>No</option>
            </select>
          </div>
          <div class="form-group col-md-7 nopad">
            <label>Contact Name</label>
            <input class="form-control required" name="contact_name" value="<?=$getcompany->contact_name?>"/>
          </div>
          <div class="form-group col-md-4 col-md-offset-1 nopad">
            <label>Phone</label>
            <input class="form-control required" name="company_phone" value="<?=$getcompany->phone?>"/>
          </div>
          <div class="form-group">
            <label>Email Address</label>
            <input class="form-control required email" name="company_email" value="<?=$getcompany->email?>"/>
          </div>
          <?php
              $address = $getcompany->address;
              $expaddress = explode('comp', $address);
           ?>
          <div class="form-group">
            <label>Address</label>
            <input class="form-control required" name="company_address1" value="<?=$expaddress[0]?>"/>
          </div>
          <div class="form-group">
            <input class="form-control" name="company_address2" value="<?=@$expaddress[1]?>"/>
          </div>
          <div class="form-group col-md-4 nopad">
            <input class="form-control required" name="city" placeholder="City" value="<?=$getcompany->city?>"/>
          </div>
          <div class="form-group col-md-2 col-md-offset-1 nopad">
            <input class="form-control required" name="state" placeholder="State" value="<?=$getcompany->state?>"/>
          </div>
          <div class="form-group col-md-4 col-md-offset-1 nopad">
            <input class="form-control required" name="zip" placeholder="Zip Code" value="<?=$getcompany->zipcode?>"/>
          </div>

          <div class="clearfix"></div>
          <div class="form-group nopad">
            <h5 style="font-weight:bold;">Alert Settings</h5>
            <div class="col-md-3 nopad">
              <label for="name">Mile Radius</label>
              <input class="form-control required" name="mile_radius" value="{{ $getcompany->min_radius }}" />
            </div>
            <div class="col-md-3 nopad col-md-offset-1">
              <label for="name">Hail Min. Size</label>
                <input class="form-control required" name="hail_size" value="{{ $getcompany->min_hail_size }}"/>
            </div>
            <div class="col-md-3 nopad col-md-offset-1">
              <label for="name">Wind Min. Mph</label>
              <input class="form-control required" name="wind_size" value="{{ $getcompany->min_wind_size }}"/>
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
                    <?php
                    $propdetails = DB::table('property_details')
                        ->where('company_id', $getcompany->company_id)
                        ->orderBy('property_id', 'desc')
                        ->get();
                        foreach ($propdetails as $getPropdetails) {
                     ?>
                    <tr>
                      <td bgcolor="#f1f2f1"><a data-toggle="modal" data-href="#edit-property" href="#edit-property"><?=$getPropdetails->property_name?></a></td>
                      <td bgcolor="#f1f2f1">
                          <?php
                              $address = explode('prop', $getPropdetails->address);
                              echo substr($address[0].", ".$address[1], 0, 12).'..';

                           ?>
                      </td>
                      <td bgcolor="#f1f2f1"><?=$getPropdetails->city?></td>
                      <td bgcolor="#f1f2f1"><?=$getPropdetails->state?></td>
                      <td bgcolor="#f1f2f1"><?=$getPropdetails->total_buildings?></td>
                    </tr>
                    <!-- Edit Property Details Starts Here -->

                    <div class="modal fade in" id="edit-property" tabindex="-1" role="dialog" aria-hidden="false">
                      <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h4 class="modal-title">Update Property</h4>
                          </div>

                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group" >
                                  <label>Property Name</label>
                                  <input class="form-control required" id="prop_edit_name" name="property_name" value="<?=$getPropdetails->property_name?>"/>
                                </div>
                                <div class="form-group col-md-7 nopad">
                                  <label>Contact Name</label>
                                  <input class="form-control required" id="property_edit_contact" name="property_contact" value="<?=$getPropdetails->contact_name?>"/>
                                </div>
                                <div class="form-group col-md-4 col-md-offset-1 nopad">
                                  <label>Phone</label>
                                  <input class="form-control required" id="property_edit_phone" name="property_phone" value="<?=$getPropdetails->phone?>"/>
                                </div>
                                <div class="form-group">
                                  <label>Email Address</label>
                                  <input class="form-control required" id="property_edit_email" name="property_email" value="<?=$getPropdetails->email?>"/>
                                </div>
                                <?php
                                    $expPropAddress = explode('prop', $getPropdetails->address);
                                 ?>
                                <div class="form-group">
                                  <label>Address</label>
                                  <input class="form-control required" id="property_edit_address" name="property_address" value="<?=$expPropAddress[0]?>"/>
                                </div>
                                <div class="form-group">
                                  <input class="form-control" id="property_edit_address1" name="property_address1" value="<?=$expPropAddress[1]?>"/>
                                </div>
                                <div class="form-group col-md-4 nopad">
                                  <input class="form-control required" id="prop_edit_city" name="prop_city" placeholder="City" value="<?=$getPropdetails->city?>"/>
                                </div>
                                <div class="form-group col-md-2 col-md-offset-1 nopad">
                                  <input class="form-control required" id="prop_edit_state" name="prop_state" placeholder="State" value="<?=$getPropdetails->state?>"/>
                                </div>
                                <div class="form-group col-md-4 col-md-offset-1 nopad">
                                  <input class="form-control required" id="prop_edit_zipcode" name="prop_zipcode" placeholder="Zip Code" value="<?=$getPropdetails->zipcode?>"/>
                                </div>
                                <div class="form-group col-md-8 nopad">
                                  <h5 style="font-weight:bold;">Property Logo</h5>
                                  <p class="text-center">
                                    <input type="file" name="edit_image" id="edit_image" class="<?php if($getPropdetails->prop_img == ''){ ?>required<?php } ?>" />
                                    <!-- <em><a href="#" style="color:#999;">Click here to Upload Logo</a></em></p> -->
                                </div>
                                <div class="form-group col-md-4 nopad">
                                  <div class="col-md-7 nopad">
                                    <label for="name">Customer</label>
                                    <select  id="prop_edit_customer" name="prop_customer" class="form-control required">
                                      <option value="">- Select -</option>
                                      <option value="1" <?php if($getPropdetails->customer == 1) echo 'selected'; ?>>Yes</option>
                                      <option value="0" <?php if($getPropdetails->customer == 0) echo 'selected'; ?>>No</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <?php
                                  $small_coordinate = explode(' ', $getPropdetails -> small_coordinate);
                                  $large_coordinate = explode(' ', $getPropdetails -> large_coordinate);
                               ?>
                              <div class="col-md-6">
                                <div class="form-group col-md-5 nopad">
                                  <label>Small Coordinate</label>
                                  <input class="form-control required" id="edit_small_latitude" name="small_latitude" placeholder="Latitude" value="<?=$small_coordinate[0]?>"/>
                                </div>
                                <div class="form-group col-md-5 col-md-offset-1 nopad">
                                  <label>&nbsp;</label>
                                  <input class="form-control required" id="edit_small_longitude" name="small_longitude" placeholder="Longitude" value="<?=$small_coordinate[1]?>"/>
                                </div>
                                <div class="form-group col-md-5 nopad">
                                  <label>Large Coordinate</label>
                                  <input class="form-control required" id="edit_large_latitude" name="large_latitude" placeholder="Latitude" value="<?=$large_coordinate[0]?>"/>
                                </div>
                                <div class="form-group col-md-5 col-md-offset-1 nopad">
                                  <label>&nbsp;</label>
                                  <input class="form-control required" id="edit_large_longitude" name="large_longitude" placeholder="Longitude" value="<?=$large_coordinate[1]?>"/>
                                </div>

                                <div class="col-md-12 nopad">
                                  <div class="form-group col-md-3 nopad">
                                    <label>Small</label>
                                    <input class="form-control required" id="edit_small" name="small" value="<?=$getPropdetails->small?>"/>
                                  </div>
                                  <div class="form-group col-md-3 col-md-offset-1 nopad">
                                    <label>Medium</label>
                                    <input class="form-control required" id="edit_medium" name="medium" value="<?=$getPropdetails->medium?>"/>
                                  </div>
                                  <div class="form-group col-md-3 col-md-offset-1 nopad">
                                    <label>Large</label>
                                    <input class="form-control required" id="edit_large" name="large" value="<?=$getPropdetails->large?>"/>
                                  </div>
                                </div>
                                <div id="total_count" class="red" style="display: none;">Please enter Small / Medium / Large fields.</div>
                                <div class="clearfix"></div>
                                <div class="form-group col-md-11 nopad">
                                  <label for="name" class="col-md-5 nopad line-p">Total Buildings</label>
                                  <div class="col-md-7 nopad">
                                    <input class="form-control" id="edit_total_buildings" name="total_buildings" value="<?=$getPropdetails->total_buildings?>" readonly/>
                                  </div>
                                </div>

                                <div class="clearfix"></div>
                                <div class="form-group">
                                  <div class="fileinput-new thumbnail img-box">
                                        <img src="/uploads/properties/<?=$getPropdetails->prop_img?>" alt="Property Image" width="150" height="90"/>
                                   </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-cancel">Cancel</button>
                            <button type="button" id="update_property" class="btn btn-success">Update</button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Edit Property Details Ends Here -->
                    <script type="text/javascript">

                    $('#update_property').click(function(e){
                        var prop_edit_name        = $('#prop_edit_name').val();
                        var property_edit_contact = $('#property_edit_contact').val();
                        var property_edit_phone   = $('#property_edit_phone').val();
                        var property_edit_email   = $('#property_edit_email').val();
                        var property_edit_address = $('#property_edit_address').val();
                        var property_edit_address1= $('#property_edit_address1').val();
                        var prop_edit_city        = $('#prop_edit_city').val();
                        var prop_edit_state       = $('#prop_edit_state').val();
                        var prop_edit_zipcode     = $('#prop_edit_zipcode').val();
                        var edit_image            = $('#edit_image').val();
                        var prop_edit_customer    = $('#prop_edit_customer').val();
                        var edit_small_latitude   = $('#edit_small_latitude').val();
                        var edit_small_longitude  = $('#edit_small_longitude').val();
                        var edit_large_latitude   = $('#edit_large_latitude').val();
                        var edit_large_longitude  = $('#edit_large_longitude').val();
                        var edit_small            = $('#edit_small').val();
                        var edit_medium           = $('#edit_medium').val();
                        var edit_large            = $('#edit_large').val();
                        var edit_total_buildings  = $('#edit_total_buildings').val();

                        var formData = new FormData();
                        formData.append('file', $('#attachment')[0].files[0]);

                    			$.ajax({
                            type: 'POST',
                            url: '{{ url("/updateproperty") }}',
                            data:'_token=<?php echo csrf_token(); ?>&id=<?=$getPropdetails->property_id?>&property_name='+prop_edit_name+'&property_contact='+property_edit_contact+'&property_phone='+property_edit_phone+'&property_email='+property_edit_email+'&property_address='+property_edit_address+'&property_address1='+property_edit_address1+'&prop_city='+prop_edit_city+'&prop_state='+prop_edit_city+'&prop_zipcode='+prop_edit_zipcode+'&prop_customer='+prop_edit_customer+'&small_latitude='+edit_small_latitude+'&small_longitude='+edit_small_longitude+'&large_latitude='+edit_large_latitude+'&large_longitude='+edit_large_longitude+'&total_buildings='+edit_total_buildings+'&small='+edit_small+'&medium='+edit_medium+'&large='+edit_large,
                            cache: false,
                            async: false,
                            beforeSend: function(xhr){
                              $.ajax({
                               url : 'upload.php',
                               type : 'POST',
                               data : formData,
                               processData: false,  // tell jQuery not to process the data
                               contentType: false,  // tell jQuery not to set contentType
                               success : function(data) {
                               }
                             });
                            },
                            success: function(res){
                                alert(res);
                            }
                          });

                    	});


                    </script>
                    <?php
                        }
                     ?>
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
          <button type="button" class="btn btn-danger" style="margin:0 20px;" id="deletebtn">DELETE</button>
          <button type="submit" class="btn btn-success" style="margin:0 20px;">SAVE</button>
          <button type="button" data-dismiss="modal" class="btn btn-default" style="margin:0 20px;" id="cancelbtn">CANCEL</button>
        </div>
      </div>
      {{ Form::close() }}
      <!--************************** Add property starts here ********************************-->

      {{ Form::open(array('url' => 'addProperty', 'files' => true, 'id' => 'addPropertyForm')) }}
      <div class="modal fade in" id="new-property" tabindex="-1" role="dialog" aria-hidden="false">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">New Property</h4>
            </div>
            <input type="hidden" name="id" value="<?=$getcompany->company_id?>" />
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group" >
                    <label>Property Name</label>
                    <input class="form-control required" name="property_name" />
                  </div>
                  <div class="form-group col-md-7 nopad">
                    <label>Contact Name</label>
                    <input class="form-control required" name="property_contact" />
                  </div>
                  <div class="form-group col-md-4 col-md-offset-1 nopad">
                    <label>Phone</label>
                    <input class="form-control required" name="property_phone" />
                  </div>
                  <div class="form-group">
                    <label>Email Address</label>
                    <input class="form-control required" name="property_email" />
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <input class="form-control required" name="property_address" />
                  </div>
                  <div class="form-group">
                    <input class="form-control" name="property_address1" />
                  </div>
                  <div class="form-group col-md-4 nopad">
                    <input class="form-control required" name="prop_city" placeholder="City" />
                  </div>
                  <div class="form-group col-md-2 col-md-offset-1 nopad">
                    <input class="form-control required" name="prop_state" placeholder="State" />
                  </div>
                  <div class="form-group col-md-4 col-md-offset-1 nopad">
                    <input class="form-control required" name="prop_zipcode" placeholder="Zip Code" />
                  </div>
                  <div class="form-group col-md-8 nopad">
                    <h5 style="font-weight:bold;">Property Logo</h5>
                    <p class="text-center">
                      <input type="file" name="image" id="image" class="required" />
                      <!-- <em><a href="#" style="color:#999;">Click here to Upload Logo</a></em></p> -->
                  </div>
                  <div class="form-group col-md-4 nopad">
                    <div class="col-md-7 nopad">
                      <label for="name">Customer</label>
                      <select id="select-gear2" name="prop_customer" class="form-control required">
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
                    <input class="form-control required" name="small_latitude" placeholder="Latitude" />
                  </div>
                  <div class="form-group col-md-5 col-md-offset-1 nopad">
                    <label>&nbsp;</label>
                    <input class="form-control required" name="small_longitude" placeholder="Longitude" />
                  </div>
                  <div class="form-group col-md-5 nopad">
                    <label>Large Coordinate</label>
                    <input class="form-control required" name="large_latitude" placeholder="Latitude" />
                  </div>
                  <div class="form-group col-md-5 col-md-offset-1 nopad">
                    <label>&nbsp;</label>
                    <input class="form-control required" name="large_longitude" placeholder="Longitude" />
                  </div>

                  <div class="col-md-12 nopad">
                    <div class="form-group col-md-3 nopad">
                      <label>Small</label>
                      <input class="form-control required" id="small" name="small" />
                    </div>
                    <div class="form-group col-md-3 col-md-offset-1 nopad">
                      <label>Medium</label>
                      <input class="form-control required" id="medium" name="medium" />
                    </div>
                    <div class="form-group col-md-3 col-md-offset-1 nopad">
                      <label>Large</label>
                      <input class="form-control required" id="large" name="large" />
                    </div>
                  </div>
                  <div id="total_count" class="red" style="display: none;">Please enter Small / Medium / Large fields.</div>
                  <div class="clearfix"></div>
                  <div class="form-group col-md-11 nopad">
                    <label for="name" class="col-md-5 nopad line-p">Total Buildings</label>
                    <div class="col-md-7 nopad">
                      <input class="form-control" id="total_buildings" name="total_buildings"  readonly/>
                    </div>
                  </div>

                  <div class="clearfix"></div>
                  <div class="form-group">
                    <div class="fileinput-new thumbnail img-box">
                     </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" data-dismiss="modal" class="btn btn-cancel">Cancel</button>
              <button type="submit" class="btn btn-success">Save</button>
            </div>
          </div>
        </div>
      </div>
      {{ Form::close() }}
      <!--************************** Add property ends here ********************************-->

      <!--************************** Add building starts here ********************************-->
      {{ Form::open(array('url' => 'addBuilding', 'id' => 'addBuildingForm')) }}
      <div class="modal fade in" id="buildings" tabindex="-1" role="dialog" aria-hidden="false">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">New Building</h4>
            </div>
            <?php
                $building = DB::table('building_details')
                                ->where('')
             ?>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Property Name</label>
                    <?php
                        $properties = DB::table('property_details')
                                            ->where('company_id', $getcompany->company_id)
                                            ->orderBy('property_id', 'desc')
                                            ->get();

                     ?>
                    <select id="select-gear18" class="form-control required" name="build_prop_id">
                      <option value="">- Select -</option>
                      <?php   foreach($properties as $getpropertylist){ ?>
                        <option value="<?=@$getpropertylist->property_id?>"><?=@$getpropertylist->property_name?></option>
                        <?php } ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Address</label>
                    <input class="form-control required" name="building_address"/>
                  </div>
                  <div class="form-group">
                    <input class="form-control" name="building_address1"/>
                  </div>
                  <div class="form-group col-md-4 nopad">
                    <input class="form-control required" name="build_city" placeholder="City" />
                  </div>
                  <div class="form-group col-md-2 col-md-offset-1 nopad">
                    <input class="form-control required" name="build_state" placeholder="State"/>
                  </div>
                  <div class="form-group col-md-4 col-md-offset-1 nopad">
                    <input class="form-control required" name="build_zipcode" placeholder="Zip Code"/>
                  </div>
                </div>
                <div class="col-md-5 col-md-offset-1">
                  <div class="form-group">
                    <label class="col-md-4 nopad line-p">Roof Type</label>
                    <div class="col-md-7">
                      <select id="select-gear15" class="form-control required" name="roof_type">
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
                      <select id="select-gear19" class="form-control required" name="building_size">
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
              <button type="submit" class="btn btn-success">Send</button>
            </div>
          </div>
        </div>
      </div>
      {{ Form::close() }}
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

$('#addBuildingForm').validate({
    errorElement: 'div',
    messages: {
        build_prop_id: {
          required: "Please select Property Name."
        },
        building_address: {
          required: "Please enter Address."
        },
        build_city: {
          required: "Please enter City."
        },
        build_state: {
          required: 'Please enter State.'
        },
        build_zipcode: {
          required: 'Please enter Zip Code.'
        },
        roof_type: {
          required: 'Please select Roof Type.'
        },
        building_size: {
          required: 'Please select Building Size.'
        }
    }
});

$('#updatecompForm').validate({
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

$('#cancelbtn').click(function(){
  window.location.href = '/companies';
});

$('#deletebtn').click(function(){
  $.ajax({
    type: "GET",
    url: "{{ url('/deleteCompany') }}",
    data: 'id=<?=$getcompany->company_id?>',
    cache: false,
    async:false,
    success: function(data)
    {
      if(data.status == 'success'){
        window.location.href = '/companies';
      }
    }
  });
});

$('#addPropertyForm').validate({
  errorElement: 'div',
  messages: {
    property_name: {
      required: "Please enter Property Name."
    },
    property_contact: {
      required: "Please enter Property Contact."
    },
    property_phone: {
      required: "Please enter Property Phone Number."
    },
    property_email: {
      required: "Please enter E-mail address."
    },
    property_address: {
      required: "Please enter Property Address."
    },
    prop_city: {
      required: "Please enter Property City."
    },
    prop_state: {
      required: "Please enter Property State."
    },
    prop_zipcode: {
      required: "Please enter Property Zip Code."
    },
    image: {
      required: "Please enter Property Logo."
    },
    prop_customer: {
      required: "Please select Customer."
    },
    small_latitude: {
      required: "Please enter Latitude."
    },
    small_longitude: {
      required: "Please enter Longitude."
    },
    large_latitude: {
      required: "Please enter Latitude."
    },
    large_longitude: {
      required: "Please enter Longitude."
    }
  }
});

$('#total_buildings').click(function(){
  var small = $('#small').val();
  var medium = $('#medium').val();
  var large = $('#large').val();
  if(small == '' || medium == '' || large == ''){
      $('#total_count').show();
  }else{
    var total = parseInt(small) + parseInt(medium) + parseInt(large);
    $('#total_count').hide();
    $('#total_buildings').val(total);
  }
});
</script>
@stop
