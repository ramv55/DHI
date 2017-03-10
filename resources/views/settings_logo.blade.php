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
    <hr/>
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
          <div class="table-scrollable">
                <div class="col-md-2">
                  <h4>Logos</h4>
                </div>
            <div class="col-md-4"><a data-toggle="modal" data-href="#adduser" href="#addlogo" class="uploadmini">+</span></a></div>
            <table width="80%" align="center" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th width="29%" bgcolor="#666665">Name</th>
                  <th width="71%" bgcolor="#666665">Logo</th>
                </tr>
              </thead>
              <tbody>

                @if(count($results) > 0)
                <?php $i = 1; ?>
                  @foreach($results as $getRes)
                    <?php
                      if($i%2 != 0){
                        $rwclass = 'odd';
                        $bg = '';
                      }else {
                        $rwclass = '';
                        $bg = 'bgcolor="#f1f2f1"';

                      }
                    ?>
                <tr class="<?=$rwclass?>">
                  <td <?=$bg?>><a data-toggle="modal" data-href="#editlogo<?=$i?>" href="#editlogo<?=$i?>"><?=$getRes->name?></a></td>
                  <td <?=$bg?>><img src="/uploads/<?=$getRes->logo_img?>" width="136" height="32" alt="img"></td>
                </tr>

                <!--***************************** Edit Logo starts here *************************-->
                <div class="modal fade in" id="editlogo<?=$i?>" tabindex="-1" role="dialog" aria-hidden="false">
                                  <div class="modal-dialog modal-md">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                              <h4 class="modal-title">Add Logo</h4>
                                          </div>

                                          {{ Form::open(array('url' => 'updatelogo','files' => true, 'id' => 'editLogoForm')) }}
                                          <div class="modal-body">
                                              <div class="row">
                                                  <div class="col-md-12">
                                                  <div class="form-group">
                                                  <label>Name</label>
                                                  <input class="form-control" name="names" id="names" value="<?=$getRes->name?>"/>
                                              </div>
                                              </div>
                                                      <div class="col-md-12">
                                                     <div class="form-group">
                                                  <label class="col-md-12 nopad">Upload a Logo</label>
                                                  <input name="images" id="images" type="file" class="col-md-6 nopad line-h">
                                                  <input type="hidden" name="id" value="<?=$getRes->logo_id?>" />
                                                  <img src="/uploads/<?=$getRes->logo_img?>" width="136" height="32" alt="img">
                                              </div>
                                              </div>

                                              </div>
                                          </div>
                                          <div class="modal-footer">
                                            <a href="javascript:void(0)" id="deletelogo<?=$i?>" class="pull-left"><img src="/img/delete-icon.png" width="28" height="34" alt="delete-icon"></a>
                                          	<button type="button" data-dismiss="modal" class="btn btn-cancel">Close</button>
                                              <button type="submit" class="btn btn-success">Update Logo</button>
                                          </div>
                                          {{ Form::close() }}
                                      </div>
                                  </div>
                              </div>

                    <!--***************************** Edit Logo ends here *************************-->
                    <script type="text/javascript">
                    $('#editLogoForm').validate({
                      errorElement: 'div',
                      messages: {
                          names<?=$i?>: {
                            required: 'Please enter Name.',
                          },
                          images<?=$i?>: {
                            required: 'Please select Image.'
                          }
                      }
                    });

                      $('#deletelogo<?=$i?>').click(function(){
                          if (confirm("Do you want to delete?")){

                                window.location.href = '/deleteLogo/<?=$getRes->logo_id?>';

                          }
                      });
                    </script>
                <?php $i++; ?>

              @endforeach
            @else
              <tr>
                <td bgcolor="#f1f2f1" colspan="2" style="text-align:center;">Empty Logos</td>
              </tr>
            @endif
              </tbody>
            </table>
            </div>
            </div>
      </div>
      <!--***************************** Add Logo starts here *************************-->
      <div class="modal fade in" id="addlogo" tabindex="-1" role="dialog" aria-hidden="false">
                        <div class="modal-dialog modal-md">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                    <h4 class="modal-title">Add Logo</h4>
                                </div>

                                {{ Form::open(array('url' => 'settings/logos','files' => true, 'id' => 'addLogoForm')) }}
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                        <div class="form-group">
                                        <label>Name</label>
                                        <input class="form-control required" name="name" id="name"/>
                                    </div>
                                    </div>
                                            <div class="col-md-12">
                                           <div class="form-group">
                                        <label>Upload a Logo</label>
                                        <input name="image" id="image" type="file" class="required">
                                    </div>
                                    </div>

                                    </div>
                                </div>
                                <div class="modal-footer">
                                	<button type="button" data-dismiss="modal" class="btn btn-cancel">Close</button>
                                    <button type="submit" class="btn btn-success">Upload</button>
                                </div>
                                {{ Form::close() }}
                            </div>
                        </div>
                    </div>

          <!--***************************** Add Logo ends here *************************-->
</section>
  </aside>
  <!-- right-side -->
</div>
@stop
@section('script')
<script type="text/javascript">
  $('#addLogoForm').validate({
    errorElement: 'div',
    messages: {
        name: {
          required: 'Please enter Name.',
        },
        image: {
          required: 'Please select Image.'
        }
    }
  });
</script>
@stop
