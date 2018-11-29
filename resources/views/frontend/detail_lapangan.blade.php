@extends('layouts.frontend')

@section('content')
    
<!-- Slider
================================================== -->
<div class="listing-slider mfp-gallery-container margin-bottom-0">
    @foreach ($model->foto as $foto)
        <a href="{{ url('assets/images/lapangan/'.$foto->id_lapangan.'/'.$foto->file) }}" data-background-image="{{ url('assets/images/lapangan/'.$foto->id_lapangan.'/thumb_'.$foto->file) }}" class="item mfp-gallery" title="Title 1"></a>
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
					<div class="star-rating" data-rating="{{ $model->rating }}">
						<div class="rating-counter"><a href="#listing-reviews">({{ $model->review()->where('status',1)->count() }} reviews)</a></div>
					</div>
				</div>
			</div>

			<!-- Listing Nav -->
			<div id="listing-nav" class="listing-nav-container">
				<ul class="listing-nav">
					<li><a href="#listing-overview" class="active">Overview</a></li>
					<li><a href="#listing-location">Location</a></li>
					<li><a href="#listing-reviews">Reviews</a></li>
					<li><a href="#add-review">Add Review</a></li>
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
				<h3 class="listing-desc-headline margin-top-75 margin-bottom-20">Reviews <span>({{ $model->review()->where('status',1)->count() }})</span></h3>

				<div class="clearfix"></div>

				<!-- Reviews -->
				<section class="comments listing-reviews">
					<ul>
						@php
							$reviews = $model->review()->where('status',1)->paginate(5);
						@endphp
						@foreach ($reviews as $review)
							<li>
								<div class="avatar"><img src="{{ $review->club->thumb_img }}" alt="" /> </div>
								<div class="comment-content"><div class="arrow-comment"></div>
									<div class="comment-by">{{ $review->club->nama }}<span class="date">{{ date('F Y', strtotime($review->created_at)) }} </span>
										<div class="star-rating" data-rating="{{ $review->rating }}"></div>
									</div>
									<p>{{ $review->review }}</p>
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
							{{ $reviews->links() }}
						</div>
					</div>
				</div>
				<div class="clearfix"></div>
				<!-- Pagination / End -->
			</div>


			<!-- Add Review Box -->
			<div id="add-review" class="add-review-box">

				<!-- Add Review -->
				<h3 class="listing-desc-headline margin-bottom-20">Add Review</h3>
				
				<span class="leave-rating-title">Your rating for this listing</span>
	
				<!-- Review Comment -->
				<form id="add-comment" class="add-comment" action="{{ route('post.review') }}" method="post">
					@csrf
					@if (count($errors) > 0)
						<div class="notification error closeable">
							@foreach ($errors->all() as $error) 
								<p>{{ $error }}</p>
							@endforeach
							<a class="close"></a>
						</div><!-- alert -->
					@endif
					
					@can('operator-access')
					<input type="hidden" name="id_lapangan" value="{{ $model->id }}" >
					<input type="hidden" name="id_club" value="{{ Auth::user()->club->id }}" >
					@endcan

					<!-- Rating / Upload Button -->
					<div class="row">
						<div class="col-md-6">
							<!-- Leave Rating -->
							<div class="clearfix"></div>
							<div class="leave-rating margin-bottom-30">
								<input type="radio" name="rating" id="rating-1" value="1"/>
								<label for="rating-1" class="fa fa-star" data-rating = "1"></label>
								<input type="radio" name="rating" id="rating-2" value="2"/>
								<label for="rating-2" class="fa fa-star" data-rating = "2"></label>
								<input type="radio" name="rating" id="rating-3" value="3"/>
								<label for="rating-3" class="fa fa-star" data-rating = "3"></label>
								<input type="radio" name="rating" id="rating-4" value="4"/>
								<label for="rating-4" class="fa fa-star" data-rating = "4"></label>
								<input type="radio" name="rating" id="rating-5" value="5"/>
								<label for="rating-5" class="fa fa-star" data-rating = "5"></label>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>

					<fieldset>

						<div>
							<label>Review:</label>
							<textarea cols="40" rows="3" name="review" id="review"></textarea>
						</div>

					</fieldset>

					@can('operator-access')
						@if($model->can_review(Auth::user()->club->id))
							<button class="button">Submit Review</button>
						@else
							<mark class="color">You have already submit a review.</mark>
						@endif
					
					@else
					<mark class="color">Pleae Sign in to write a review.</mark>
					@endcan

					<div class="clearfix"></div>
				</form>

			</div>
			<!-- Add Review Box / End -->


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
                        <li>{{ substr($schedule->club->nama,0,20) }}<span>{{ date('D, d M',strtotime($schedule->tgl)) }}, {{ date('H:i',strtotime($schedule->start )) }} - {{ date('H:i',strtotime($schedule->end )) }}</span></li>
                    @endforeach
                    
				</ul>
			</div>
			<!-- Opening Hours / End -->

			<!-- Opening Hours -->
			<div class="boxed-widget opening-hours margin-top-35">
				<h3><i class="sl sl-icon-map"></i> Surface Area</h3>
				<h4>{{ $model->luas }} m2</h4>
			</div>
			<!-- Opening Hours / End -->

			<!-- Share / Like -->
			<div class="listing-share margin-top-40 margin-bottom-40 no-border">
					<!-- Share Buttons -->
					<ul class="share-buttons margin-top-40 margin-bottom-0">
						<li><a class="fb-share" href="https://www.facebook.com/sharer/sharer.php?u={{ route('detail.lapangan', $model->id) }}" target="_blank"><i class="fa fa-facebook"></i> Share</a></li>
						<li><a class="twitter-share" href="https://twitter.com/home?status={{ route('detail.lapangan', $model->id) }}" target="_blank"><i class="fa fa-twitter"></i> Tweet</a></li>
						<li><a class="gplus-share" href="https://plus.google.com/share?url={{ route('detail.lapangan', $model->id) }}" target="_blank"><i class="fa fa-google-plus"></i> Share</a></li>
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