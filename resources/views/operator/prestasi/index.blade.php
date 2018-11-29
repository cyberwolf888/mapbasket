@extends('layouts.operator')

@push('plugin_css')
    <link href="{{ url('assets/master') }}/lib/datatables/jquery.dataTables.css" rel="stylesheet">
    <link href="{{ url('assets/master') }}/lib/select2/css/select2.min.css" rel="stylesheet">
@endpush

@section('content')


    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{ route('operator.dashboard') }}">Operator</a>
            <span class="breadcrumb-item active">Prestasi</span>
        </nav>
    </div><!-- br-pageheader -->

    <div class="br-pagetitle">
        <i class="icon icon ion-ios-book-outline"></i>
        <div>
            <h4>Club</h4>
            <p class="mg-b-0">Manage Prestasi club.</p>
        </div>
    </div><!-- d-flex -->

    <div class="br-pagebody">

        <div class="br-section-wrapper">
            <a href="{{ route('operator.prestasi.create') }}" class="btn btn-teal btn-with-icon">
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
                        <th class="wd-30p">Prestasi</th>
                        <th class="wd-10p">Action</th>
                    </tr>
                    </thead>
                    <tbody>
					<?php $no = 1; ?>
                    @foreach ($model as $item)
                        <tr>
                            <td>{{ $no }}</td>
                            <td>{{ $item->prestasi }}</td>
                            <td>
                                <a href="{{ route('operator.prestasi.delete', ['id' => $item->id]) }}" class="btn btn-danger btn-icon"><div><i class="fa fa-trash"></i></div></a>
                            </td>
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