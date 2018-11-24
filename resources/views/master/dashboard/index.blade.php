@extends('layouts.master')

@push('plugin_css')
    <link href="{{ url('assets/master') }}/lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="{{ url('assets/master') }}/lib/select2/css/select2.min.css" rel="stylesheet">
@endpush

@section('content')

    
    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ route('master.dashboard') }}">Master</a>
        <span class="breadcrumb-item active">Dashboard</span>
        </nav>
    </div><!-- br-pageheader -->

    <div class="br-pagetitle">
        <i class="icon icon ion-ios-book-outline"></i>
        <div>
        <h4>Dashboard</h4>
        <p class="mg-b-0">Manage Dashboard.</p>
        </div>
    </div><!-- d-flex -->

    <div class="br-pagebody">
        <div class="row row-sm">
          <div class="col-sm-6 col-xl-3">
            <div class="bg-info rounded overflow-hidden">
              <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                <i class="ion ion-ios-basketball tx-60 lh-0 tx-white op-7"></i>
                <div class="mg-l-20">
                  <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Club</p>
                  <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">{{ App\Models\Club::count() }}</p>
                </div>
              </div>
              <div id="ch1" class="ht-50 tr-y-1"></div>
            </div>
          </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
            <div class="bg-purple rounded overflow-hidden">
              <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                <i class="ion ion-ios-location tx-60 lh-0 tx-white op-7"></i>
                <div class="mg-l-20">
                  <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Lapangan</p>
                  <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">{{ App\Models\Lapangan::count() }}</p>
                </div>
              </div>
              <div id="ch3" class="ht-50 tr-y-1"></div>
            </div>
          </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="bg-teal rounded overflow-hidden">
              <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                <i class="ion ion-ios-list tx-60 lh-0 tx-white op-7"></i>
                <div class="mg-l-20">
                  <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Schedule</p>
                  <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">{{ App\Models\Schedule::count() }}</p>
                </div>
              </div>
              <div id="ch2" class="ht-50 tr-y-1"></div>
            </div>
          </div><!-- col-3 -->
          <div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
            <div class="bg-primary rounded overflow-hidden">
              <div class="pd-x-20 pd-t-20 d-flex align-items-center">
                <i class="ion ion-chatbubble tx-60 lh-0 tx-white op-7"></i>
                <div class="mg-l-20">
                  <p class="tx-10 tx-spacing-1 tx-mont tx-semibold tx-uppercase tx-white-8 mg-b-10">Review</p>
                  <p class="tx-24 tx-white tx-lato tx-bold mg-b-0 lh-1">{{ App\Models\Review::count() }}</p>
                </div>
              </div>
              <div id="ch4" class="ht-50 tr-y-1"></div>
            </div>
          </div><!-- col-3 -->
        </div><!-- row -->

        <div class="row row-lg mg-t-20">
            <div class="col-lg-12">
                <div class="br-section-wrapper">
                        <h6 class="br-section-label">Last 5 Schedule</h6>
                        <div class="table-wrapper">
                            <table id="datatable1" class="table display responsive nowrap">
                                <thead>
                                    <tr>
                                    <th class="wd-5p">No</th>
                                    <th class="wd-20p">Club</th>
                                    <th class="wd-25p">Lapangan</th>
                                    <th class="wd-25p">Schedule</th>
                                    <th class="wd-15p">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    @foreach ($schedule as $item)
                                    <tr class="{{ $item->table_color }}">
                                        <td>{{ $no }}</td>
                                        <td>{{ $item->club->nama }}</td>
                                        <td>{{ $item->lapangan->nama }}</td>
                                        <td>{{ date('d F Y', strtotime($item->tgl)) }}, {{ date('H:i', strtotime($item->start)) }} - {{ date('H:i', strtotime($item->end)) }}</td>
                                        <td>{{ $item->status_text }}</td>
                                        
                                        <?php $no++; ?>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
        </div>

        <div class="row row-lg mg-t-20">
                <div class="col-lg-12">
                    <div class="br-section-wrapper">
                            <h6 class="br-section-label">Last 5 Review</h6>
                            <div class="table-wrapper">
                                <table id="datatable2" class="table display responsive nowrap">
                                    <thead>
                                        <tr>
                                        <th class="wd-5p">No</th>
                                        <th class="wd-20p">Club</th>
                                        <th class="wd-25p">Lapangan</th>
                                        <th class="wd-25p">Review</th>
                                        <th class="wd-15p">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        @foreach ($review as $item)
                                        <tr class="{{ $item->table_color }}">
                                            <td>{{ $no }}</td>
                                            <td>{{ $item->club->nama }}</td>
                                            <td>{{ $item->lapangan->nama }}</td>
                                            <td>{{ strlen($item->review) > 50 ? substr($item->review,0,50)."..." : $item->review }}</td>
                                            <td>{{ $item->status_text }}</td>
                                          
                                            <?php $no++; ?>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        

    </div><!-- br-pagebody -->



@endsection

@push('plugin_scripts')
    <script src="{{ url('assets/master') }}/lib/datatables/jquery.dataTables.js"></script>
    <script src="{{ url('assets/master') }}/lib/datatables-responsive/dataTables.responsive.js"></script>
    <script src="{{ url('assets/master') }}/lib/select2/js/select2.min.js"></script>
@endpush

@push('scripts')
<script>
    $(function(){
      'use strict';

      $('#datatable1').DataTable({
        responsive: true,
        language: {
          searchPlaceholder: 'Search...',
          sSearch: '',
          lengthMenu: '_MENU_ items/page',
        }
      });

      $('#datatable2').DataTable({
        responsive: true,
        language: {
          searchPlaceholder: 'Search...',
          sSearch: '',
          lengthMenu: '_MENU_ items/page',
        }
      });

      // Select2
      $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });
      
     
    });

  </script>
@endpush