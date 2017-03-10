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
        <div class="col-md-12 nopad">
          <div class="table-scrollable">
            <div class="row">
              <div class="col-sm-9">
                <div class="dataTables_length" id="DataTables_Table_1_length">
                  <button type="button" class="btn btn-responsive button-alignment btn-primary" data-toggle="modal" data-target="#report" style="margin-right:40px;">Show all</button>
                  <button type="button" class="btn btn-responsive button-alignment btn-primary" data-toggle="modal" data-target="#report" style="margin-right:20px;">Customers</button>
                  <button type="button" class="btn btn-responsive button-alignment btn-primary" data-toggle="modal" data-target="#report">Leads</button>
                </div>
              </div>
              <div class="col-sm-3">
                <div id="DataTables_Table_1_filter" class="dataTables_filter">
                  {{ Form::open(array('url' => 'searchcompany')) }}
                  <input class="form-control input-md" placeholder="Search" name="search" aria-controls="DataTables_Table_1" type="search">
                  {{ Form::close() }}
                </div>
              </div>
            </div>
            <table class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th width="12%" bgcolor="#666665">Date</th>
                  <th width="13%" bgcolor="#666665">Customer</th>
                  <th width="11%" bgcolor="#666665">Company</th>
                  <th width="12%" bgcolor="#666665">Address</th>
                  <th width="12%" bgcolor="#666665">City</th>
                  <th width="12%" bgcolor="#666665">State</th>
                  <th width="12%" bgcolor="#666665">Lookbacks</th>
                </tr>
              </thead>
              <tbody>
                @if(count($companies) > 0)
                  @foreach($companies as $res)
                  <tr>
                    <td bgcolor="#f1f2f1">{{ date('m/d/Y', strtotime($res->created_at)) }}</td>
                    <td bgcolor="#f1f2f1">
                      @if($res->customer == 1)
                          {{ "Yes" }}
                       @else
                          {{ "No" }}
                        @endif
                    </td>
                    <td bgcolor="#f1f2f1">
                        <a href="/editcompany/{{ $res->company_id }}">{{ $res->company_name }}</a>
                    </td>
                    <td bgcolor="#f1f2f1">
                      <?php
                          $expaddr  = explode('comp', $res->address);
                          $address = $expaddr[0].', '.@$expaddr[1];
                          echo substr(rtrim($address,","), 0, 30).'..';
                      ?>
                    </td>
                    <td bgcolor="#f1f2f1">{{ $res->city }}</td>
                    <td bgcolor="#f1f2f1">{{ $res->state }}</td>
                    <td bgcolor="#f1f2f1">&nbsp;</td>
                  </tr>
                  @endforeach
                @else
                <tr>
                  <td bgcolor="#f1f2f1" colspan="7">Empty Results</td>
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

    </section>
  </aside>
  <!-- right-side -->
</div>
@stop
