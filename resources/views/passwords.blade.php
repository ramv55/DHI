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

        <h4 class="text-center">Reset Admin Password</h4>
        <div class="col-md-3 col-xs-offset-5 text-center">
                              {{ Form::open(array('url' => 'settings/password', 'id' => 'adminpwdForm')) }}
                                    <div class="form-group">
                                        <input class="form-control required" name="password" id="password" type="password" placeholder="New Password" />
                                 </div>
                                    <div class="form-group">
                                        <input class="form-control required" type="password" name="retype_pwd" id="retype_pwd" placeholder="New Password Again" />
                                 </div>
                            <button type="submit" class="btn btn-success">Save</button>
                            {{ Form::close() }}
                                </div>
        </section>
    </aside>
    <!-- right-side -->

</div>

@stop
@section('script')
<script>
$("#adminpwdForm").validate({
          errorElement: 'div',
          rules: {
            password : {
            minlength : 5
          },
          retype_pwd : {
              minlength : 5,
              equalTo : '#password'
          }
          },
          messages: {
            password: {
              required: "Please enter New Password."
            },
            retype_pwd: {
              required: "Please enter New Password Again."
            }
          }
        });
</script>
@stop
