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
        <div class="col-md-1">
          <h4>Inspectors</h4>
        </div>
        <div class="col-md-4"><a href="#add-inspector" data-toggle="modal" class="uploadmini"><span class="plusmini">+</span></a></div>
      </div>
      <div class="row">
        <div class="col-md-8">
          <div class="table-scrollable">
            {{ Form::open(array('url' => 'settings/inspectors', 'method' => 'GET')) }}
            <div class="row">
              <div class="col-sm-4 pull-right">
                <div id="DataTables_Table_1_filter" class="dataTables_filter">
                  <input class="form-control input-md" name="search" id="search" value="<?=Input::get('search')?>" placeholder="Search" aria-controls="DataTables_Table_1" type="search">
                </div>
              </div>
            </div>
            {{ Form::close() }}
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th width="12%" bgcolor="#666665">First Name</th>
                  <th width="13%" bgcolor="#666665">Last Name </th>
                  <th width="11%" bgcolor="#666665">Email Address </th>
                </tr>
              </thead>
              <tbody>
                @if(count($inspectors) > 0)
                <?php $i = 1; ?>
                  @foreach($inspectors as $getinspectors)
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
                  <td <?=$bg?>><?=$getinspectors->firstname?></td>
                  <td <?=$bg?>><?=$getinspectors->lastname?></td>
                  <td <?=$bg?>><a data-toggle="modal" data-href="#edit-inspectors<?=$i?>" href="#edit-inspectors<?=$i?>"><?=$getinspectors->email?></a></td>
                </tr>

                <!--************************ Edit Inspectors starts here ************************-->
                <div class="modal fade in" id="edit-inspectors<?=$i?>" tabindex="-1" role="dialog" aria-hidden="false">
                  <div class="modal-dialog modal-md">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title">Edit an Inspection</h4>
                      </div>
                    {{ Form::open(array('url' => 'updateInspectors')) }}
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group col-md-6 nopad" >
                              <label>First Name</label>
                              <input class="form-control required" name="firstname" id="firstname<?=$i?>" value="<?=$getinspectors->firstname?>">
                            </div>
                            <div class="form-group col-md-5 col-md-offset-1 nopad" >
                              <label>Last Name</label>
                              <input class="form-control required" name="lastname" id="lastname<?=$i?>" value="<?=$getinspectors->lastname?>">
                              <input type="hidden" name="id" value="<?=$getinspectors->inspector_id?>" />
                            </div>



                            <div class="form-group">
                              <label>Inspector's Email Address</label>
                              <input class="form-control required email" name="email" id="email<?=$i?>" value="<?=$getinspectors->email?>">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <a href="javascript:void(0)" id="deleteinspector<?=$i?>" class="pull-left"><img src="/img/delete-icon.png" width="28" height="34" alt="delete-icon"></a>
                        <button type="button" data-dismiss="modal" class="btn btn-cancel">Cancel</button>
                        <button type="submit" id="updateInspectors<?=$i?>" class="btn btn-success">Update</button>
                      </div>
                    {{ Form::close() }}
                    </div>
                  </div>
                </div>
                <!--************************ Edit Inspectors ends here ************************-->
                <script type="text/javascript">
                $('#deleteinspector<?=$i?>').click(function(){

                if (confirm("Do you want to delete?")){

                      window.location.href = '/deleteinspectors/<?=$getinspectors->inspector_id?>';

                }
                });
                </script>

                <?php $i++; ?>

              @endforeach
            @else
              <tr>
                <td bgcolor="#f1f2f1" colspan="3" style="text-align:center;">Empty Inspectors</td>
              </tr>
            @endif
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
      <!-- ************************* Add inspector starts here ******************************-->
      <div class="modal fade in" id="add-inspector" tabindex="-1" role="dialog" aria-hidden="false">
        <div class="modal-dialog modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              <h4 class="modal-title">Add an Inspection</h4>
            </div>
            {{ Form::open(array('url' => 'settings/inspectors', 'id' => 'addInspectorsForm')) }}
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group col-md-6 nopad" >
                    <label>First Name</label>
                    <input class="form-control required" name="firstname" id="firstname">
                  </div>
                  <div class="form-group col-md-5 col-md-offset-1 nopad" >
                    <label>Last Name</label>
                    <input class="form-control required" name="lastname" id="lastname">
                  </div>
                  <div class="form-group">
                    <label>Inspector's Email Address</label>
                    <input class="form-control required email" name="email" id="email">
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" data-dismiss="modal" class="btn btn-cancel">Cancel</button>
              <button type="submit" class="btn btn-success">SAVE</button>
            </div>
            {{ Form::close() }}
          </div>
        </div>
      </div>
      <!-- ************************* Add inspector ends here ******************************-->
    </section>
  </aside>
  <!-- right-side -->
</div>
@stop
@section('script')
  <script type="text/javascript">
    $('#addInspectorsForm').validate({
      errorElement: 'div',
      messages: {
        firstname: {
          required: "Please enter First Name.",
        },
        lastname: {
          required: "Please enter Last Name.",
        },
        email: {
          required: "Please enter E-mail."
        }
      }
    });

$('#show').change(function(){
    var val = $(this).val();
    window.location.href = '{{ Request::url() }}?lists='+val;
  });

  </script>
@stop
