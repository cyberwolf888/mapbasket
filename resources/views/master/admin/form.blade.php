@extends('layouts.master')

@push('plugin_css')
    <link href="{{ url('assets/master') }}/lib/select2/css/select2.min.css" rel="stylesheet">
@endpush

@section('content')

    
    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ route('master.dashboard') }}">Master</a>
        <span class="breadcrumb-item active">Admin</span>
        </nav>
    </div><!-- br-pageheader -->

    <div class="br-pagetitle">
        <i class="icon icon ion-ios-book-outline"></i>
        <div>
        <h4>Admin</h4>
        <p class="mg-b-0">Create data admin.</p>
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

                    {!! Form::open(['route' => isset($update) ? ['master.admin.update', $model->id] :'master.admin.store', 'method' => 'post']) !!}
                    <div class="form-layout form-layout-1">
                      <div class="row mg-b-25">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
                            {!! Form::text('name', $model->name,['id'=>'name','class'=>'form-control','required'=>'']) !!}
                          </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                                {!! Form::email('email', $model->email,['id'=>'email','class'=>'form-control','required'=>'']) !!}
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Password: <span class="tx-danger">*</span></label>
                                {!! Form::password('password',['id'=>'password','class'=>'form-control']) !!}
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Confirm Password: <span class="tx-danger">*</span></label>
                                {!! Form::password('password_confirmation',['id'=>'password_confirmation','class'=>'form-control']) !!}
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                          <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Status: <span class="tx-danger">*</span></label>
                            {!! Form::select('isActive', ['1'=>'Active','0'=>'Suspend'], $model->isActive, ['class'=>'form-control select2','data-placeholder'=>'Choose country']) !!}
                          </div>
                        </div><!-- col-4 -->
                      </div><!-- row -->
          
                      <div class="form-layout-footer">
                        <button class="btn btn-info" type="submit">Save Data</button>
                        <a class="btn btn-secondary" href="{{ route('master.admin.manage') }}">Cancel</a>
                      </div><!-- form-layout-footer -->
                    </div><!-- form-layout -->
                    {!! Form::close() !!}
            </div>

    </div><!-- br-pagebody -->

@endsection

@push('plugin_scripts')
    <script src="{{ url('assets/master') }}/lib/select2/js/select2.min.js"></script>
    
@endpush

@push('scripts')

<script>
    $(function(){
      'use strict';

        // Select2
        $('#select2-a, #select2-b').select2({
          minimumResultsForSearch: Infinity
        });


    });
  </script>
@endpush