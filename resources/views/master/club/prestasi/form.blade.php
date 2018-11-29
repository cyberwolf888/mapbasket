@extends('layouts.master')

@push('plugin_css')
@endpush

@section('content')
    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
            <a class="breadcrumb-item" href="{{ route('master.dashboard') }}">Master</a>
            <a class="breadcrumb-item" href="{{ route('master.club.manage') }}">Club</a>
            <span class="breadcrumb-item active">Prestasi</span>
        </nav>
    </div><!-- br-pageheader -->

    <div class="br-pagetitle">
        <i class="icon icon ion-ios-book-outline"></i>
        <div>
            <h4>Club</h4>
            <p class="mg-b-0">Create Prestasi club.</p>
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

            {!! Form::open(['route' => ['master.club.prestasi.store', $club->id], 'method' => 'post', 'files'=>true]) !!}
            <div class="form-layout form-layout-1">
                <div class="row mg-b-25">
                    <div class="col-lg-8">
                        <div class="form-group">
                            <label class="form-control-label">Prestasi: <span class="tx-danger">*</span></label>
                            {!! Form::text('prestasi', null,['id'=>'prestasi','class'=>'form-control','required'=>'']) !!}
                        </div>
                    </div><!-- col-8 -->
                </div><!-- row -->

                <div class="form-layout-footer">
                    <button class="btn btn-info" type="submit">Save Data</button>
                    <a class="btn btn-secondary" href="{{ route('master.club.prestasi.manage', ['id'=>$club->id]) }}">Cancel</a>
                </div><!-- form-layout-footer -->
            </div><!-- form-layout -->
            {!! Form::close() !!}
        </div>

    </div><!-- br-pagebody -->

@endsection

@push('plugin_scripts')
@endpush

@push('scripts')
@endpush