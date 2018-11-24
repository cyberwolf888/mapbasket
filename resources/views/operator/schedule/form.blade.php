@extends('layouts.operator')

@push('plugin_css')
    <link href="{{ url('assets/master') }}/lib/select2/css/select2.min.css" rel="stylesheet">
    <link href="{{ url('assets/master') }}/lib/jt.timepicker/jquery.timepicker.css" rel="stylesheet">
    <style>
        input:read-only {
            background-color: #FFF !important;
        }
    </style>
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
        <p class="mg-b-0">Create data Schedule.</p>
        </div>
    </div><!-- d-flex -->

    <div class="br-pagebody">

            <div class="br-section-wrapper">
                    @if (count($errors) > 0)
                        @foreach ($errors->all() as $error) 
                        <div class="alert alert-danger" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            {{ $error }}
                        </div><!-- alert -->
                        @endforeach
                    @endif

                    {!! Form::open(['route' => 'operator.schedule.store', 'method' => 'post']) !!}
                    <div class="form-layout form-layout-1">
                      <div class="row mg-b-25">
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Lapangan: <span class="tx-danger">*</span></label>
                                {!! Form::select('id_lapangan', App\Models\Lapangan::where('status',1)->pluck('nama','id'), $model->id_lapangan, ['class'=>'form-control select2','data-placeholder'=>'Choose country']) !!}
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label class="form-control-label">Date: <span class="tx-danger">*</span></label>
                            {!! Form::text('tgl', $model->tgl,['id'=>'tgl','class'=>'form-control fc-datepicker','required'=>'','readonly']) !!}
                          </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label class="form-control-label">Start: <span class="tx-danger">*</span></label>
                                {!! Form::text('start', $model->start,['id'=>'start','class'=>'form-control time-picker','required'=>'']) !!}
                            </div>
                        </div><!-- col-2 -->
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label class="form-control-label">End: <span class="tx-danger">*</span></label>
                                {!! Form::text('end', $model->end,['id'=>'end','class'=>'form-control time-picker','required'=>'']) !!}
                            </div>
                        </div><!-- col-2 -->
                        
                      </div><!-- row -->
          
                      <div class="form-layout-footer">
                        <button class="btn btn-info" type="submit">Save Data</button>
                        <a class="btn btn-secondary" href="{{ route('operator.schedule.manage') }}">Cancel</a>
                      </div><!-- form-layout-footer -->
                    </div><!-- form-layout -->
                    {!! Form::close() !!}
            </div>

    </div><!-- br-pagebody -->

@endsection

@push('plugin_scripts')
    <script src="{{ url('assets/master') }}/lib/select2/js/select2.min.js"></script>
    <script src="{{ url('assets/master') }}/lib/jt.timepicker/jquery.timepicker.js"></script>
    
@endpush

@push('scripts')

<script>
    $(function(){
      'use strict';

        // Select2
        $('#select2-a, #select2-b').select2({
          minimumResultsForSearch: Infinity
        });

        $('.time-picker').timepicker({ 'timeFormat': 'H:i' });
        $('.fc-datepicker').datepicker({
                showOtherMonths: true,
                selectOtherMonths: true
                });
    });
  </script>
@endpush