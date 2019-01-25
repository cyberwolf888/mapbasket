@extends('layouts.frontend')

@section('content')
<!-- Titlebar
================================================== -->
<div id="titlebar" class="gradient">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
    
                    <h2>Club</h2><span>List Club</span>
    
                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li>Club</li>
                        </ul>
                    </nav>
    
                </div>
            </div>
        </div>
    </div>

<!-- Content
================================================== -->
<div class="container">

	<!-- Blog Posts -->
	<div class="blog-page">
	<div class="row">
		<div class="col-lg-8 col-md-8 padding-right-30">

            <!-- Sorting / Layout Switcher -->
            <div class="row margin-bottom-25">

                <div class="col-md-6 col-xs-6">
                    <!-- Layout Switcher -->
                    <div class="layout-switcher">
                    </div>
                </div>

                <div class="col-md-6 col-xs-6">
                    <!-- Sort by -->
                    <div class="sort-by">
                        <div class="sort-by-select">

                            {!! Form::select('select_order', [
                            '0'=>'Default Order',
                            '1'=>'Lowest Member Fee',
                            '2'=>'Highest Member Fee',
                            '3'=>'Most Trophy',
                            '4'=>'Newest Club',
                            '5'=>'Oldest Club'
                            ], isset($_GET['order']) ? $_GET['order'] : null, ['id'=>'select_order','class'=>'chosen-select-no-single']) !!}

                        </div>
                    </div>
                </div>
            </div>
            <!-- Sorting / Layout Switcher / End -->
                
                <!-- Listings Container -->
			<div class="row">
                    <?php $index = 0 ?>
                    @foreach ($model as $item)
                        <?php
                            $view = true;
                            if(count($jarak) > 0){
                            	$radius = $_GET['radius']*1000;
                                if($jarak[$index]->distance->value > $radius){
	                                $view = false;
                                }
                            }
                        ?>

                        @if($view)
                        <!-- Listing Item -->
                        <div class="col-lg-12 col-md-12">
                            <div class="listing-item-container list-layout">
                                <a href="{{ route('detail.club',$item->id) }} " class="listing-item">
                                    
                                    <!-- Image -->
                                    <div class="listing-item-image">
                                        <img src="{{ $item->thumb_img }}" alt="">
                                        <!-- <span class="tag">{{ $item->nama }}</span> -->
                                    </div>
                                    
                                    <!-- Content -->
                                    <div class="listing-item-content">
                                        @if($item->recruitment == 1)
                                            <div class="listing-badge now-open">Open</div>
                                        @endif
        
                                        <div class="listing-item-inner">
                                            <h3>{{ $item->nama}}</h3>
                                            <span>{{ substr($item->alamat,0,45) }} . . .</span><br>
                                            <span>Total Member : {{ $item->jml_anggota }}</span>
                                            @if(!is_null($item->pelatih))
                                                <br>
                                                <span>Coach : {{ $item->pelatih }}</span>
                                            @endif

                                            @if(!is_null($item->iuran))
                                                <br>
                                                <span>Member Fee : {{ $item->txt_iuran }}</span>
                                            @endif

                                            @if(count($jarak) > 0)
                                                <br>
                                                <span>Jarak : {{ $jarak[$index]->distance->text }} ({{$jarak[$index]->duration->text}})</span>
                                            @endif

                                        </div>
        
                                        <!-- <span class="like-icon"></span> -->
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!-- Listing Item / End -->
                        @endif
                        <?php $index++; ?>
                    @endforeach
                
    
                </div>
                <!-- Listings Container / End -->


			<!-- Pagination -->
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-md-12">
					<!-- Pagination -->
					<div class="pagination-container margin-bottom-40">
                            {{-- $model->links() --}}
					</div>
				</div>
			</div>
			<!-- Pagination / End -->

		</div>

	<!-- Blog Posts / End -->

        <!-- Sidebar
            ================================================== -->
        <div class="col-lg-3 col-md-4">
            <div class="sidebar">

                <!-- Widget -->
                <div class="widget margin-bottom-40">
                    <h3 class="margin-top-0 margin-bottom-30">Filters</h3>
                    <form method="get" action="" id="form-filters">
                        <input type="hidden" name="lat" value="" id="startLat" />
                        <input type="hidden" name="lon" value="" id="startLon" />
                        <input type="hidden" name="order" value="" id="order" />

                        <!-- Row -->
                        <div class="row with-forms">
                            <!-- Cities -->
                            <div class="col-md-12">
                                <input type="text" placeholder="Club name?" value="<?= isset($_GET['q']) ? $_GET['q'] : '' ?>" name="q"/>
                            </div>
                        </div>
                        <!-- Row / End -->


                        <!-- Row -->
                        <div class="row with-forms">
                            <!-- Type -->
                            <div class="col-md-12">
                                {!! Form::select('recruitment', ['0'=>'All Recruitment','1'=>'Open','2'=>'Closed'], isset($_GET['recruitment']) ? $_GET['recruitment'] : null, ['class'=>'chosen-select']) !!}
                            </div>
                        </div>
                        <!-- Row / End -->

                        <!-- Row -->
                        <div class="row with-forms">
                            <!-- Type -->
                            <div class="col-md-12">
                                {!! Form::select('coach', ['0'=>'All Status','1'=>'Have a coach','2'=>'Don\'t have a coach'], isset($_GET['coach']) ? $_GET['coach'] : null, ['class'=>'chosen-select']) !!}
                            </div>
                        </div>
                        <!-- Row / End -->

                        <!-- Row -->
                        <div class="row with-forms">
                            <!-- Type -->
                            <div class="col-md-12">
                                {!! Form::select('difable', ['0'=>'All Person','1'=>'Difable Only','2'=>'Normal Only'], isset($_GET['difable']) ? $_GET['difable'] : null, ['class'=>'chosen-select']) !!}
                            </div>
                        </div>
                        <!-- Row / End -->

                        <br>

                        <!-- Area Range -->
                        <div class="range-slider">
                            <input name="radius" class="distance-radius" type="range" min="1" max="100" step="1" value="<?= isset($_GET['radius']) ? $_GET['radius'] : 10 ?>" data-title="Radius around selected destination">
                        </div>

                        <button class="button fullwidth margin-top-25" type="button" id="btn_update">Update</button>
                    </form>
                </div>
                <!-- Widget / End -->

            </div>
        </div>
        <!-- Sidebar / End -->
	</div>
	<!-- Sidebar / End -->


</div>
</div>



@endsection

@push('plugin_scripts')

@endpush

@push('page_scripts')
    <script>
        $(document).ready(function () {
            var startPos;
            var geoOptions = {
                timeout: 10 * 1000
            };

            var geoSuccess = function(position) {
                startPos = position;
                $("#startLat").val(startPos.coords.latitude);
                $("#startLon").val(startPos.coords.longitude);
                //console.log('Lat: ' + startPos.coords.latitude);
                //console.log('Lng: ' + startPos.coords.longitude);
            };
            var geoError = function(error) {
                console.log('Error occurred. Error code: ' + error.code);
                // error.code can be:
                //   0: unknown error
                //   1: permission denied
                //   2: position unavailable (error response from location provider)
                //   3: timed out
            };

            navigator.geolocation.getCurrentPosition(geoSuccess, geoError, geoOptions);

            $('#btn_update').click(function () {
                $('#order').val($('#select_order').val());
                $('#form-filters').submit();
            });

            $('#select_order').change(function () {
                $('#order').val($('#select_order').val());
                $('#form-filters').submit();
            });
        });
    </script>
@endpush