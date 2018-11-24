@extends('layouts.frontend')

@section('content')
    
<!-- Slider
================================================== -->
<div class="listing-slider mfp-gallery-container margin-bottom-0">
    @foreach ($model->foto as $foto)
        <a href="{{ url('assets/images/club/'.$foto->id_club.'/'.$foto->file) }}" data-background-image="{{ url('assets/images/club/'.$foto->id_club.'/thumb_'.$foto->file) }}" class="item mfp-gallery" title="Title 1"></a>
    @endforeach
</div>


<!-- Content
================================================== -->
<div class="container">
	<div class="row sticky-wrapper">
		<div class="col-lg-8 col-md-8 padding-right-30">

			<!-- Titlebar -->
			<div id="titlebar" class="listing-titlebar">
				<div class="listing-titlebar-title">
					<h2>{{ $model->nama }} </h2>
					<span>
						<a href="#listing-location" class="listing-address">
							<i class="fa fa-map-marker"></i>
							{{ $model->alamat }}
						</a>
					</span>
				</div>
			</div>

			<!-- Listing Nav -->
			<div id="listing-nav" class="listing-nav-container">
				<ul class="listing-nav">
					<li><a href="#listing-overview" class="active">Overview</a></li>
					<li><a href="#listing-location">Location</a></li>
					<li><a href="#listing-reviews">News</a></li>
				</ul>
			</div>
			
			<!-- Overview -->
			<div id="listing-overview" class="listing-section">

				<!-- Description -->

				<p>
					{{ $model->keterangan}}
				</p>

			</div>
		
			<!-- Location -->
			<div id="listing-location" class="listing-section">
				<h3 class="listing-desc-headline margin-top-60 margin-bottom-30">Location</h3>

				<div id="singleListingMap-container">
                <div id="singleListingMap" data-latitude="{{ $model->lat }}" data-longitude="{{ $model->long }}" data-map-icon="im im-icon-Football-2"></div>
					<a href="#" id="streetView">Street View</a>
				</div>
			</div>
				
			<!-- Reviews -->
			<div id="listing-reviews" class="listing-section">
				<h3 class="listing-desc-headline margin-top-75 margin-bottom-20">News <span>({{ $model->news()->where('status',1)->count() }})</span></h3>

				<div class="clearfix"></div>

				<!-- Reviews -->
				<section class="comments listing-reviews">
					<ul>
						@php
							$news = $model->news()->where('status',1)->orderBy('created_at','desc')->paginate(5);
						@endphp
						@foreach ($news as $new)
							<li>
								<div class="avatar"><img src="{{ $new->club->thumb_img }}" alt="" /> </div>
								<div class="comment-content"><div class="arrow-comment"></div>
									<div class="comment-by">{{ $new->club->nama }}<span class="date">{{ date('d F Y', strtotime($new->created_at)) }} </span>
										
									</div>
									<p>{{ $new->keterangan }}</p>
								</div>
							</li>
						@endforeach

					 </ul>
				</section>

				<!-- Pagination -->
				<div class="clearfix"></div>
				<div class="row">
					<div class="col-md-12">
						<!-- Pagination -->
						<div class="pagination-container margin-top-30">
							{{ $news->links() }}
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
				<!-- Pagination / End -->
			</div>
		</div>


		<!-- Sidebar
		================================================== -->
		<div class="col-lg-4 col-md-4 margin-top-75 sticky">

				
		

			<!-- Opening Hours -->
			<div class="boxed-widget opening-hours margin-top-35">
				<div class="listing-badge now-open">Active</div>
				<h3><i class="sl sl-icon-clock"></i> Training Schedule</h3>
				<ul>
                    @foreach ($model->active_schedule as $schedule)
                        <li>{{ $schedule->lapangan->nama }} <span>{{ date('D, d M',strtotime($schedule->tgl)) }}, {{ date('H:i',strtotime($schedule->start )) }} - {{ date('H:i',strtotime($schedule->end )) }}</span></li>
                    @endforeach
                    
				</ul>
			</div>
			<!-- Opening Hours / End -->

			<!-- Share / Like -->
			<div class="listing-share margin-top-40 margin-bottom-40 no-border">
					<!-- Share Buttons -->
					<ul class="share-buttons margin-top-40 margin-bottom-0">
						<li><a class="fb-share" href="https://www.facebook.com/sharer/sharer.php?u={{ route('detail.club', $model->id) }}" target="_blank"><i class="fa fa-facebook"></i> Share</a></li>
						<li><a class="twitter-share" href="https://twitter.com/home?status={{ route('detail.club', $model->id) }}" target="_blank"><i class="fa fa-twitter"></i> Tweet</a></li>
						<li><a class="gplus-share" href="https://plus.google.com/share?url={{ route('detail.club', $model->id) }}" target="_blank"><i class="fa fa-google-plus"></i> Share</a></li>
						<!-- <li><a class="pinterest-share" href="#"><i class="fa fa-pinterest-p"></i> Pin</a></li> -->
					</ul>
					<div class="clearfix"></div>
			</div>

		</div>
		<!-- Sidebar / End -->

	</div>
</div>

@endsection

@push('plugin_scripts')
    <!-- Maps -->
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('MAP_API_KEY') }}&amp;libraries=places"></script>
    <script type="text/javascript" src="{{ url('assets/frontend') }}/scripts/infobox.min.js"></script>
    <script type="text/javascript" src="{{ url('assets/frontend') }}/scripts/markerclusterer.js"></script>
    <script type="text/javascript" src="{{ url('assets/frontend') }}/scripts/maps.js"></script>	

@endpush

@push('page_scripts')
@endpush