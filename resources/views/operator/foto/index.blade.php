@extends('layouts.operator')

@push('plugin_css')
@endpush

@section('content')
    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ route('operator.dashboard') }}">Operator</a>
        <a class="breadcrumb-item" href="{{ route('operator.dashboard') }}">Club</a>
        <span class="breadcrumb-item active">Foto</span>
        </nav>
    </div><!-- br-pageheader -->

    <div class="br-pagetitle">
        <i class="icon icon ion-ios-book-outline"></i>
        <div>
        <h4>Foto Club {{ $club->nama }}</h4>
        <p class="mg-b-0">Manage foto club.</p>
        </div>
    </div><!-- d-flex -->

    <div class="br-pagebody">

        <div class="br-section-wrapper">
            <a href="{{ route('operator.foto.create') }}" class="btn btn-teal btn-with-icon">
              <div class="ht-40">
                <span class="icon wd-40"><i class="fa fa-plus"></i></span>
                <span class="pd-x-15">Create New Data</span>
              </div>
            </a><br><br>
            <div class="table-wrapper">
                <div class="form-layout form-layout-2">
                    <div class="row no-gutters">
                      @foreach ($model as $item)
                        <div class="col-md-3" style="margin-right:10px;">
                            <figure class="overlay">
                                <img src="{{ url('assets/images/club/'.$item->id_club.'/thumb_'.$item->file) }}" class="img-fluid" alt="">
                                <figcaption class="overlay-body d-flex align-items-end justify-content-center">
                                  <div class="img-option">
                                    <a href="{{ route('operator.foto.delete', $item->id) }}" class="img-option-link"><div><i class="icon ion-close"></i></div></a>
                                  </div>
                                </figcaption>
                              </figure>
                              
                        </div>
                      @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div><!-- br-pagebody -->
@endsection

@push('plugin_scripts')
@endpush

@push('scripts')
<script>
    $(function(){
      'use strict';

    });
  </script>
@endpush