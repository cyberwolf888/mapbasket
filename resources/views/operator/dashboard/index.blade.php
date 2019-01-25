@extends('layouts.operator')

@push('plugin_css')
    <link href="{{ url('assets/master') }}/lib/select2/css/select2.min.css" rel="stylesheet">
@endpush

@section('content')

    
    <div class="br-pageheader">
        <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ route('operator.dashboard') }}">Operator</a>
        <span class="breadcrumb-item active">Club</span>
        </nav>
    </div><!-- br-pageheader -->

    <div class="br-pagetitle">
        <i class="icon icon ion-ios-book-outline"></i>
        <div>
        <h4>Dashboard</h4>
        <p class="mg-b-0">Dashboard club.</p>
        </div>
    </div><!-- d-flex -->

    <div class="br-pagebody">

            <div class="br-section-wrapper">
                <div id="map1" class="ht-300 ht-sm-400 bd bg-gray-100"></div>
            </div>
            <br>

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

                    {!! Form::open(['route' => 'operator.dashboard', 'method' => 'post']) !!}
                    <div class="form-layout form-layout-1">
                      <div class="row mg-b-25">
                        <div class="col-lg-4">
                          <div class="form-group">
                            <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
                            {!! Form::text('nama', $model->nama,['id'=>'nama','class'=>'form-control','required'=>'']) !!}
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

                        
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                            {!! Form::email('email', $model->user->email,['id'=>'email','class'=>'form-control','required'=>'']) !!}
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Telp: <span class="tx-danger">*</span></label>
                            {!! Form::text('telp', $model->telp,['id'=>'telp','class'=>'form-control','required'=>'']) !!}
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-3">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Status: <span class="tx-danger">*</span></label>
                            {!! Form::select('status', ['1'=>'Available','0'=>'Unavailable'], $model->status, ['class'=>'form-control select2','data-placeholder'=>'Choose country']) !!}
                        </div>
                    </div><!-- col-4 -->
                      <div class="col-lg-3">
                          <div class="form-group mg-b-10-force">
                              <label class="form-control-label">Recruitment: <span class="tx-danger">*</span></label>
                              {!! Form::select('recruitment', ['1'=>'Open','0'=>'Closed'], $model->recruitment, ['class'=>'form-control select2']) !!}
                          </div>
                      </div><!-- col-4 -->

                      <div class="col-lg-3">
                          <div class="form-group">
                              <label class="form-control-label">Team Coach: </label>
                              {!! Form::text('pelatih', $model->pelatih,['id'=>'pelatih','class'=>'form-control']) !!}
                          </div>
                      </div><!-- col-3 -->
                      <div class="col-lg-3">
                          <div class="form-group">
                              <label class="form-control-label">Total Member: <span class="tx-danger">*</span></label>
                              {!! Form::text('jml_anggota', $model->jml_anggota,['id'=>'jml_anggota','class'=>'form-control','required'=>'']) !!}
                          </div>
                      </div><!-- col-3 -->
                      <div class="col-lg-3">
                          <div class="form-group">
                              <label class="form-control-label">Member Fee: <span class="tx-danger">*</span></label>
                              {!! Form::text('iuran', $model->iuran,['id'=>'iuran','class'=>'form-control','required'=>'']) !!}
                          </div>
                      </div><!-- col-3 -->
                      <div class="col-lg-3">
                          <div class="form-group">
                              <label class="form-control-label">Fee type: <span class="tx-danger">*</span></label>
                              {!! Form::select('type_iuran', ['1'=>'Monthly','2'=>'Weekly'], $model->type_iuran, ['class'=>'form-control select2']) !!}
                          </div>
                      </div><!-- col-3 -->

                        
                        <div class="col-lg-6">
                          <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Address: <span class="tx-danger">*</span></label>
                            {!! Form::text('alamat', $model->alamat,['id'=>'alamat','class'=>'form-control','required'=>'']) !!}
                          </div>
                        </div><!-- col-6 -->
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="form-control-label">Latitude: <span class="tx-danger">*</span></label>
                                {!! Form::text('lat', $model->lat,['id'=>'lat','class'=>'form-control','required'=>'','readonly']) !!}
                            </div>
                        </div><!-- col-3 -->
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label class="form-control-label">Longitude: <span class="tx-danger">*</span></label>
                                {!! Form::text('long', $model->long,['id'=>'long','class'=>'form-control','required'=>'','readonly']) !!}
                            </div>
                        </div><!-- col-3 -->

                      <div class="col-lg-3">
                          <div class="form-group">
                              <label class="form-control-label">Difable Person: <span class="tx-danger">*</span></label>
                              {!! Form::select('difable', ['1'=>'Accept','0'=>'Decline'], $model->difable, ['class'=>'form-control select2']) !!}
                          </div>
                      </div><!-- col-3 -->

                        <div class="col-lg-12">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Keterangan: <span class="tx-danger">*</span></label>
                                {!! Form::textarea('keterangan', $model->keterangan,['id'=>'keterangan','class'=>'form-control','required'=>'']) !!}
                            </div>
                        </div><!-- col-12 -->
                      </div><!-- row -->
          
                      <div class="form-layout-footer">
                        <button class="btn btn-info" type="submit">Save Data</button>
                      </div><!-- form-layout-footer -->
                    </div><!-- form-layout -->
                    {!! Form::close() !!}
            </div>

    </div><!-- br-pagebody -->

@endsection

@push('plugin_scripts')
    <script src="{{ url('assets/master') }}/lib/select2/js/select2.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?key={{ env('MAP_API_KEY') }}"></script>
    <script src="{{ url('assets/master') }}/lib/gmaps/gmaps.js"></script>
    
@endpush

@push('scripts')

<script>
    $(function(){
      'use strict';

        // Select2
        $('#select2-a, #select2-b').select2({
          minimumResultsForSearch: Infinity
        });

        var geocoder = new google.maps.Geocoder();
        var clat = <?= $model->lat ?>;
        var clng = <?= $model->long ?>;
        var map = new GMaps({
          el: '#map1',
          lat: clat,
          lng: clng
        });

        
        map.addMarker({
            lat: clat,
            lng: clng,
            title: 'Lima',
            draggable: true,
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