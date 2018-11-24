@extends('layouts.operator')

@push('plugin_css')
    <link href="{{ url('assets/master') }}/lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="{{ url('assets/master') }}/lib/select2/css/select2.min.css" rel="stylesheet">
@endpush

@section('content')

    
    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ route('operator.dashboard') }}">Operator</a>
        <span class="breadcrumb-item active">Schedule</span>
        </nav>
    </div><!-- br-pageheader -->

    <div class="br-pagetitle">
        <i class="icon icon ion-ios-book-outline"></i>
        <div>
        <h4>Schedule</h4>
        <p class="mg-b-0">Manage data Schedule.</p>
        </div>
    </div><!-- d-flex -->

    <div class="br-pagebody">

        <div class="br-section-wrapper">
            <a href="{{ route('operator.schedule.create') }}" class="btn btn-teal btn-with-icon"> 
              <div class="ht-40">
                <span class="icon wd-40"><i class="fa fa-plus"></i></span>
                <span class="pd-x-15">Create New Data</span>
              </div>
            </a><br><br>

            <div class="table-wrapper">
              <table id="datatable1" class="table display responsive nowrap">
                  <thead>
                    <tr>
                      <th class="wd-5p">No</th>
                      <th class="wd-20p">Club</th>
                      <th class="wd-20p">Lapangan</th>
                      <th class="wd-20p">Schedule</th>
                      <th class="wd-10p">Status</th>
                      <th class="wd-25p">Keterangan</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; ?>
                    @foreach ($model as $item)
                      <tr class="{{ $item->table_color }}">
                        <td>{{ $no }}</td>
                        <td>{{ $item->club->nama }}</td>
                        <td>{{ $item->lapangan->nama }}</td>
                        <td>{{ date('d F Y', strtotime($item->tgl)) }}, {{ date('H:i', strtotime($item->start)) }} - {{ date('H:i', strtotime($item->end)) }}</td>
                        <td>{{ $item->status_text }}</td>
                        <td>{{ $item->keterangan }}</td>
                        <?php $no++; ?>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
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

      // Select2
      $('.dataTables_length select').select2({ minimumResultsForSearch: Infinity });

    });
  </script>
@endpush