@extends('layouts.frontend')

@section('content')
<!-- Titlebar
================================================== -->
<div id="titlebar" class="gradient">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
    
                    <h2>Lapangan</h2><span>List Lapangan</span>
    
                    <!-- Breadcrumbs -->
                    <nav id="breadcrumbs">
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li>Lapangan</li>
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
                
                <!-- Listings Container -->
			<div class="row">

                    @foreach ($model as $item)
                        <!-- Listing Item -->
                        <div class="col-lg-12 col-md-12">
                            <div class="listing-item-container list-layout">
                                <a href="{{ route('detail.lapangan',$item->id) }} " class="listing-item">
                                    
                                    <!-- Image -->
                                    <div class="listing-item-image">
                                        <img src="{{ $item->thumb_img }}" alt="">
                                        <!-- <span class="tag">{{ $item->nama }}</span> -->
                                    </div>
                                    
                                    <!-- Content -->
                                    <div class="listing-item-content">
                                        <!-- <div class="listing-badge now-open">Now Open</div> -->
        
                                        <div class="listing-item-inner">
                                            <h3>{{ $item->nama }}</h3>
                                            <span>{{ $item->alamat }}</span>
                                            <div class="star-rating" data-rating="{{ $item->rating }}">
                                                <div class="rating-counter">({{ $item->review()->where('status',1)->count() }} reviews)</div>
                                            </div>
                                        </div>
        
                                        <!-- <span class="like-icon"></span> -->
                                    </div>
                                </a>
                            </div>
                        </div>
                        <!-- Listing Item / End -->
                    @endforeach
                
    
                </div>
                <!-- Listings Container / End -->


			<!-- Pagination -->
			<div class="clearfix"></div>
			<div class="row">
				<div class="col-md-12">
					<!-- Pagination -->
					<div class="pagination-container margin-bottom-40">
                            {{ $model->links() }}
					</div>
				</div>
			</div>
			<!-- Pagination / End -->

		</div>

	<!-- Blog Posts / End -->

    @include('frontend.widget')
	</div>
	<!-- Sidebar / End -->


</div>
</div>



@endsection

@push('plugin_scripts')

@endpush

@push('page_scripts')
@endpush