@extends('layouts.master')

@push('plugin_css')
@endpush

@section('content')
    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ route('master.dashboard') }}">Master</a>
        <a class="breadcrumb-item" href="{{ route('master.club.manage') }}">Club</a>
        <span class="breadcrumb-item active">Foto</span>
        </nav>
    </div><!-- br-pageheader -->

    <div class="br-pagetitle">
        <i class="icon icon ion-ios-book-outline"></i>
        <div>
        <h4>Club</h4>
        <p class="mg-b-0">Create foto club.</p>
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

                {!! Form::open(['route' => ['master.club.foto.store', $club->id], 'method' => 'post', 'files'=>true]) !!}
                <div class="form-layout form-layout-1">
                    <div class="row mg-b-25">
                    <div class="col-lg-8">
                        <div class="form-group mg-b-10-force">
                            <label class="custom-file">
                            <input type="file" name="image" id="image" class="custom-file-input" accept="image/*">
                            <span class="custom-file-control"></span>
                            </label>
                        </div>
                    </div><!-- col-8 -->
                    </div><!-- row -->
        
                    <div class="form-layout-footer">
                    <button class="btn btn-info" type="submit">Save Data</button>
                    <a class="btn btn-secondary" href="{{ route('master.club.foto.manage', ['id'=>$club->id]) }}">Cancel</a>
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