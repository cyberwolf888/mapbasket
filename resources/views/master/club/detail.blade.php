@extends('layouts.master')

@push('plugin_css')
@endpush

@section('content')

    
    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ route('master.dashboard') }}">Master</a>
        <span class="breadcrumb-item active">Club</span>
        </nav>
    </div><!-- br-pageheader -->

    <div class="br-pagetitle">
        <i class="icon icon ion-ios-book-outline"></i>
        <div>
        <h4>Club</h4>
        <p class="mg-b-0">Detail data Club.</p>
        </div>
    </div><!-- d-flex -->

    <div class="br-pagebody">

            <div class="br-section-wrapper">
                <div id="map1" class="ht-300 ht-sm-400 bd bg-gray-100"></div>
            </div>
            <br>

            <div class="br-section-wrapper">
                <div class="form-layout form-layout-2">
                    <div class="row no-gutters">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label">Name:</label>
                                <input class="form-control" type="text" value="{{ $model->nama }}" readonly>
                            </div>
                        </div><!-- col-3 -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label">Email:</label>
                                <input class="form-control" type="text" value="{{ $model->user->email }}" readonly>
                            </div>
                        </div><!-- col-3 -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label">Phone:</label>
                                <input class="form-control" type="text" value="{{ $model->telp }}" readonly>
                            </div>
                        </div><!-- col-3 -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-control-label">Status:</label>
                                <input class="form-control" type="text" value="{{ $model->status == 1 ? 'Available' : 'Unavailable' }}" readonly>
                            </div>
                        </div><!-- col-3 -->

                        <div class="col-md-6">
                            <div class="form-group bd-t-0-force">
                                    <label class="form-control-label">Address:</label>
                                    <input class="form-control" type="text" value="{{ $model->alamat }}" readonly>
                            </div>
                        </div><!-- col-6 -->
                        <div class="col-md-3 mg-t--1 mg-md-t-0">
                            <div class="form-group mg-md-l--1">
                                    <label class="form-control-label">Latitude:</label>
                                    <input class="form-control" type="text" value="{{ $model->lat }}" readonly>
                            </div>
                        </div><!-- col-3 -->
                        <div class="col-md-3 mg-t--1 mg-md-t-0">
                            <div class="form-group mg-md-l--1">
                                    <label class="form-control-label">Longitude:</label>
                                    <input class="form-control" type="text" value="{{ $model->long }}" readonly>
                            </div>
                        </div><!-- col-3 -->

                        
                        <div class="col-md-12">
                            <div class="form-group mg-md-l--1 bd-t-0-force">
                                <label class="form-control-label">Keterangan:</label>
                                <input class="form-control" type="text" value="{{ $model->keterangan }}" readonly>
                            </div>
                        </div><!-- col-12 -->
                    </div><!-- row -->

                    <div class="form-layout-footer bd pd-20 bd-t-0">
                        <a class="btn btn-secondary" href="{{ route('master.club.manage') }}">Back</a>
                    </div>
                </div>
            </div>

    </div><!-- br-pagebody -->

@endsection

@push('plugin_scripts')
    <script src="http://maps.google.com/maps/api/js?key={{ env('MAP_API_KEY') }}"></script>
    <script src="{{ url('assets/master') }}/lib/gmaps/gmaps.js"></script>
    
@endpush

@push('scripts')

<script>
    $(function(){
      'use strict';

        var geocoder = new google.maps.Geocoder();
        var clat = <?= $model->lat ?>;
        var clng = <?=  $model->long ?>;
        var map = new GMaps({
          el: '#map1',
          lat: clat,
          lng: clng
        });

        
        map.addMarker({
            lat: clat,
            lng: clng,
            title: 'Lima',
            draggable: false,
            dragend: function(e){
                if(console.log){
                    console.log(e.latLng.lat().toFixed(6));
                    console.log(e.latLng.lng().toFixed(6));
                    $('#lat').val(e.latLng.lat().toFixed(6));
                    $('#long').val(e.latLng.lng().toFixed(6));
                    geocodePosition(this.getPosition());
                }
            }
        });

        function geocodePosition(pos) {
            geocoder.geocode({
                latLng: pos
            }, function(responses) {
                if (responses && responses.length > 0) {
                    //document.getElementById('alamat').innerHTML = responses[0].formatted_address;
                    $('#alamat').val(responses[0].formatted_address);
                    //marker.formatted_address = responses[0].formatted_address;
                    console.log(responses[0].formatted_address);
                } else {
                    document.getElementById('alamat').innerHTML = '';
                    //marker.formatted_address = 'Cannot determine address at this location.';
                }
                //infowindow.setContent(marker.formatted_address + "<br>coordinates: " + marker.getPosition().toUrlValue(6));
                //infowindow.open(map, marker);
            });
        }

    });
  </script>
@endpush