@extends('layout.main')
@section('content')
@include('includes.top_header')
<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    @include('includes.sidebar')
    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">

        <section class="content">
          <!-- Second Data Table -->
          <div class="row">
        <div class="col-md-12 nopad">
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
            <div class="col-md-1">
              <h4>Users</h4>
            </div>
            <div class="col-md-2 nopad"><a data-toggle="modal" data-href="#adduser" href="#adduser" class="uploadmini"><span class="plusmini">+</span></a></div>
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th width="12%" bgcolor="#666665">First Name</th>
                  <th width="13%" bgcolor="#666665">Last Name </th>
                  <th width="11%" bgcolor="#666665">Email Address </th>
                  <th width="12%" bgcolor="#666665">User Role </th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $i = 0;
                   if(count($users) > 0){
                    foreach ($users as $res) {
                      if($i%2 != 0){
                        $rwclass = 'odd';
                        $bg = '';
                      }else {
                        $rwclass = '';
                        $bg = 'bgcolor="#f1f2f1"';

                      }
                 ?>
                <tr class="<?=$rwclass?>">
                  <td <?=$bg?>><?=$res->firstname?></td>
                  <td <?=$bg?>><?=$res->lastname?></td>
                  <td <?=$bg?>><a data-toggle="modal" data-href="#edit-user<?=$i?>" href="#edit-user<?=$i?>"><?=$res->email?></a></td>
                  <td <?=$bg?>>
                    <?php
                    if($res->role == 0){
                      echo 'Admin';
                    }elseif($res->role == 1){
                      echo 'General';
                    }elseif($res->role == 2){
                      echo 'Read Only';
                    }
                    ?>
                  </td>

                  <!-- ***************************** Edit user popup stats here ********************************* -->
                  <div class="modal fade in" id="edit-user<?=$i?>" tabindex="-1" role="dialog" aria-hidden="false">
                                <div class="modal-dialog modal-md">
                                  {{ Form::open(array('url' => 'updateuser')) }}
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title">Edit User</h4>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                <label>First Name</label>
                                                <input class="form-control required" id="firstname<?=$i?>" name="firstname" value="<?=$res->firstname?>">
                                                </div>

                                              <input type="hidden" value="<?=$res->user_id?>" name="user_id" />
                                              </div>
                                                    <div class="col-md-6">
                                                   <div class="form-group">
                                                <label>Last Name</label>
                                                <input class="form-control required" id="lastname<?=$i?>" name="lastname" value="<?=$res->lastname?>">
                                            </div>

                                                </div>

                                                     <div class="col-md-12">
                                                   <div class="form-group">
                                                <label>Email Address</label>
                                                <input class="form-control required email" id="email<?=$i?>" name="email" value="<?=$res->email?>">
                                            </div>

                                                </div>
                                                <div class="col-md-6">
                                            <div class="form-group">
                                                <label>User Role</label>
                                                <select class="form-control required" id="user_role<?=$i?>" name="user_role">
                                                    <option value="">-- Select --</option>
                                                    <option value="0" <?php if($res->role == 0) echo 'selected'; ?>>Admin</option>
                                                    <option value="1" <?php if($res->role == 1) echo 'selected'; ?>>General</option>
                                                    <option value="2" <?php if($res->role == 2) echo 'selected'; ?>>Read Only</option>
                                                </select>
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input class="form-control required" type="password" id="password<?=$i?>" name="password">
                                                </div>


                                              </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                        <a href="javascript:void(0)" id="deleteuser<?=$i?>" class="pull-left"><img src="/img/delete-icon.png" width="28" height="34" alt="delete-icon"></a>
                                            <button type="button" data-dismiss="modal" class="btn btn-cancel">Close</button>
                                            <button type="submit" class="btn btn-success" id="updatebtnuser<?=$i?>">Save</button>
                                        </div>
                                    </div>
                                  {{ Form::close() }}
                                </div>
                            </div>
                      <!-- ***************************** Edit user popup ends here ********************************* -->
                </tr>

                <script>

                $('#deleteuser<?=$i?>').click(function(){

                  if (confirm("Do you want to delete?")){

                      window.location.href = '/deleteuser/<?=$res->user_id?>';

                  }

                });


                </script>
                <?php
                  $i++;
              }
            }else {
            ?>
            <tr>
              <td bgcolor="#f1f2f1" colspan="4" style="text-align:center;">Empty Results</td>
            </tr>
            <?php
            }
                 ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="clearfix"></div>
        <div class="row" style="padding:12px 0px;">
              <div class="col-sm-10" >

                  <div class="dataTables_paginate paging_simple_numbers" id="inline_edit_paginate">
                    <?php $link_limit = 7; ?>

                @if ($paginator->lastPage() > 1)
                    <ul class="pagination pull-left">

                        <li class="paginate_button previous {{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}" id="inline_edit_previous"><a href="{{ $paginator->url(1) }}" aria-controls="inline_edit" data-dt-idx="0" tabindex="0">FIRST</a></li>
                              <li class="paginate_button previous {{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}" id="inline_edit_previous"><a href="{{ $paginator->url($paginator->currentPage()-1) }}" aria-controls="inline_edit" data-dt-idx="0" tabindex="0">PREV</a></li>
                              @for ($i = 1; $i <= $paginator->lastPage(); $i++)
                              <?php
                                    $half_total_links = floor($link_limit / 2);
                                    $from = $paginator->currentPage() - $half_total_links;
                                    $to = $paginator->currentPage() + $half_total_links;
                                    if ($paginator->currentPage() < $half_total_links) {
                                       $to += $half_total_links - $paginator->currentPage();
                                    }
                                    if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
                                        $from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
                                    }
                              ?>
                                @if ($from < $i && $i < $to)
                                  <li class="paginate_button {{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
                                      <a href="{{ $paginator->url($i) }}" aria-controls="inline_edit" data-dt-idx="1" tabindex="0">{{ $i }}</a>
                                  </li>
                                @endif
                            @endfor
                              <li class="paginate_button next {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}" id="inline_edit_next"><a href="{{ $paginator->url($paginator->currentPage()+1) }}" aria-controls="inline_edit" data-dt-idx="4" tabindex="0">NEXT</a></li>

                              <li class="paginate_button next {{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}" id="inline_edit_next"><a href="{{ $paginator->url($paginator->lastPage()) }}" aria-controls="inline_edit" data-dt-idx="4" tabindex="0">LAST</a></li>
                        </ul>
                    @endif
              </div>
                </div>
            <div class="col-sm-2" style="line-height:40px;">
            <div class="dataTables_length pull-right" id="inline_edit_length"><label class="col-md-4">Show </label>
            <div class="col-md-8">
              <select id="show" class="form-control">
                    <option value="10" <?php if(Input::get('lists') == 10) echo 'selected'; ?>>10</option>
                    <option value="25" <?php if(Input::get('lists') == 25) echo 'selected'; ?>>25</option>
                    <option value="50" <?php if(Input::get('lists') == 50) echo 'selected'; ?>>50</option>
                    <option value="100" <?php if(Input::get('lists') == 100) echo 'selected'; ?>>100</option>
              </select>
          </div></div>
                </div>

          </div>
      </div>
      <!-- ***************************** Add user popup stats here ********************************* -->
      <div class="modal fade in" id="adduser" tabindex="-1" role="dialog" aria-hidden="false">
                    <div class="modal-dialog modal-md">
                      {{ Form::open(array('url' => 'adduser', 'id' => 'addUserForm')) }}
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title">Add User</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-group">
                                    <label>First Name</label>
                                    <input class="form-control required" id="firstname" name="firstname">
                                </div>


                                  </div>
                                        <div class="col-md-6">
                                       <div class="form-group">
                                    <label>Last Name</label>
                                    <input class="form-control required" id="lastname" name="lastname">
                                </div>

                                    </div>

                                      <div class="col-md-12">
                                       <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="form-control required email" id="email" name="email">
                                    <span id="emailErrorMsg" style="color: #ff0000;display: none;">E-mail already exists.</span>
                                </div>

                                    </div>
                                    <div class="col-md-6">
                                <div class="form-group">
                                    <label>User Role</label>
                                    <select class="form-control required" id="user_role" name="user_role">
                                        <option value="">-- Select --</option>
                                        <option value="0">Admin</option>
                                        <option value="1">General</option>
                                        <option value="2">Read Only</option>
                                    </select>
                                </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label>Password</label>
                                    <input class="form-control required" type="password" id="password" name="password">
                                </div>


                                  </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn btn-cancel">Close</button>
                                <button type="submit" class="btn btn-success" id="addbtnuser">Save</button>
                            </div>
                        </div>
                      </form>
                    </div>
                </div>
          <!-- ***************************** Add user popup ends here ********************************* -->
        </section>
    </aside>
    <!-- right-side -->
</div>
@stop

@section('script')
<script>


$("#addUserForm").validate({
          errorElement: 'div',
          messages: {
            firstname: {
              required: "Please enter First Name.",
            },
            lastname: {
              required: "Please enter Last Name.",
            },
            email: {
              required: "Please enter E-mail.",
            },
            user_role: {
              required: "Please select User role."
            },
            password: {
              required: "Please enter password."
            }
          }
        });


$('#show').change(function(){
    var val = $(this).val();
    window.location.href = '{{ Request::url() }}?lists='+val;
  });
</script>
@stop
