@extends('layout.main_home')
@section('content')
<div class="container">
    <div class="row vertical-offset-100">
        <div class="col-sm-6 col-sm-offset-3  col-md-5 col-md-offset-4 col-lg-4 col-lg-offset-4">
          <div id="container_demo">
                <a class="hiddenanchor" id="toregister"></a>
                <a class="hiddenanchor" id="tologin"></a>
                <a class="hiddenanchor" id="toforgot"></a>
                <div id="wrapper">
                    <div id="login" class="animate form">
                        {{ Form::open(array('url' => 'login', 'id' => 'LoginForm')) }}
                            <h3 class="black_bg">
                                <img src="img/logo.png" alt="josh logo">
                                </h3>
                                <h2 class="modal-title text-center" >Log In</h2>
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <strong>Whoops!</strong> There were some problems with your input.
                                        <ul>

                                                <li>{{ $errors }}</li>

                                        </ul>
                                    </div>
                                @endif
                            <div class="form-group ">
                                <label style="margin-bottom:0;" for="username" class="uname control-label"> <i class="livicon" data-name="user" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i> Username
                                </label>
                                <input id="email" name="email" class="required email" placeholder="Enter E-mail" />
                                <div class="col-sm-12">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label style="margin-bottom:0;" for="password" class="youpasswd"> <i class="livicon" data-name="key" data-size="16" data-loop="true" data-c="#3c8dbc" data-hc="#3c8dbc"></i> Password
                                </label>
                                <input type="password" id="password" class="required" name="password" placeholder="Enter a password" />
                                <div class="col-sm-12">
                                </div>
                            </div>

                            <p class="login button">
                                <input type="submit" value="Log In" class="btn btn-success" />
                            </p>

                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
@section('script')
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.15.0/jquery.validate.js"></script>
<script type="text/javascript">
  $('#LoginForm').validate({
    errorElement : 'div',
    messages: {
      email:{
        required: "Please enter E-mail.",
      },
      password: {
        required: "Please enter Password."
      }
    }
  });
</script>
@stop
