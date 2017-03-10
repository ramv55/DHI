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
        <div class="col-md-6 col-md-offset-2">
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
          <h4><strong>Default Alert Settings</strong></h4>
          <hr/>
          {{ Form::open(array('url' => 'settings/alerts', 'id' => 'settingsAlertForm')) }}
          <div class="form-group col-md-2 nopad">
            <label>Mile Radius</label>
            <input class="form-control required" name="mile_radius" id="mile_radius" value="<?=$alerts->mile_radius?>"/>
          </div>
          <div class="form-group col-md-2 col-md-offset-1 nopad">
            <label>Hail Size</label>
            <input class="form-control required" name="hail_size" id="hail_size" value="<?=$alerts->hail_size?>"/>
          </div>
          <div class="form-group col-md-2 col-md-offset-1 nopad">
            <label>Wind Speed</label>
            <input class="form-control required" name="wind_speed" id="wind_speed" value="<?=$alerts->wind_speed?>"/>
          </div>
        </div>
        <div class="col-md-8 text-center">
          <button type="submit" class="btn btn-success">SAVE</button>
        </div>
        {{ Form::close() }}
      </div>
    </section>
  </aside>
  <!-- right-side -->
</div>
@stop
@section('script')
<script type="text/javascript">
$("#settingsAlertForm").validate({
          errorElement: 'div',
          messages: {
            mile_radius: {
              required: "Please enter Mile Radius.",
            },
            hail_size: {
              required: "Please enter Hail Size.",
            },
            wind_speed: {
              required: "Please enter Wind Speed.",
            }
          }
  });

  //restrict to numbers only
  $("#mile_radius, #hail_size, #wind_speed").keydown(function(event) {
          // Allow only backspace and delete
          if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9) {
              // let it happen, don't do anything
          }
          else {
              // Ensure that it is a number and stop the keypress
              if (event.keyCode < 48 || event.keyCode > 57 ) {
                  event.preventDefault();
              }
          }
      });
</script>
@stop
