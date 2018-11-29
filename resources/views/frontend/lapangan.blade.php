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
                            '0'=>'Top Rated',
                            '1'=>'The largest',
                            '2'=>'The smallest',
                            ], isset($_GET['order']) ? $_GET['order'] : null, ['id'=>'select_order','class'=>'chosen-select-no-single']) !!}

                        </div>
                    </div>
                </div>
            </div>
            <!-- Sorting / Layout Switcher / End -->

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
                                            <span>{{ substr($item->alamat,0,45) }} . . .</span>
                                            <span>Surface Area : {{ $item->luas }} m2</span>
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
                            {{-- $model->links() --}}
					</div>
				</div>
			</div>
			<!-- Pagination / End -->

		</div>

	<!-- Blog Posts / End -->

        <!-- Widgets -->
        <div class="col-lg-4 col-md-4">
            <div class="sidebar right">

                <!-- Widget -->
                <div class="widget">
                    <h3 class="margin-top-0 margin-bottom-25">Filters</h3>
                    <form method="get" action="" id="form-filters">
                        <input type="hidden" name="order" value="" id="order" />
                        <div class="search-blog-input">
                            <div class="input">
                                <input class="search-field" type="text" placeholder="Type and hit enter" value="<?= isset($_GET['q']) ? $_GET['q'] : '' ?>" name="q" required/>
                            </div>
                        </div>


                    </form>
                    <div class="clearfix"></div>
                </div>
                <!-- Widget / End -->


                <!-- Widget -->
                <div class="widget margin-top-40">

                    <h3>Lapangan Populer</h3>
                    <ul class="widget-tabs">
                        @php
                            $lap_populer = App\Models\Lapangan::where('status',1)->limit(5)->get()->sortByDesc('rating');
                        @endphp

                        @foreach ($lap_populer as $lap)
                            <li>
                                <div class="widget-content">
                                    <div class="widget-thumb">
                                        <a href="{{ route('detail.lapangan', $lap->id) }}"><img src="{{ $lap->thumb_img }}" alt=""></a>
                                    </div>

                                    <div class="widget-text">
                                        <h5><a href="pages-blog-post.html"> {{ $lap->nama }} </a></h5>
                                        <div class="star-rating" data-rating="{{ $lap->rating }}">
                                            <div class="rating-counter">({{ $lap->review()->where('status',1)->count() }} reviews)</div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </li>
                        @endforeach

                    </ul>

                </div>
                <!-- Widget / End-->


                <div class="clearfix"></div>
                <div class="margin-bottom-40"></div>
            </div>
        </div>
	</div>
	<!-- Sidebar / End -->


</div>
</div>



@endsection

@push('plugin_scripts')

@endpush

@push('page_scripts')
    <script>
        $('#select_order').change(function () {
            $('#order').val($('#select_order').val());
            $('#form-filters').submit();
        });
    </script>
@endpush