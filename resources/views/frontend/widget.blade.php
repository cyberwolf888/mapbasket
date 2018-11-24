<!-- Widgets -->
<div class="col-lg-4 col-md-4">
		<div class="sidebar right">

			<!-- Widget -->
			<div class="widget">
				<h3 class="margin-top-0 margin-bottom-25">Search</h3>
				<form action="{{ route('home') }}" method="GET">
				<div class="search-blog-input">
					<div class="input">
						<input class="search-field" type="text" placeholder="Type and hit enter" value="" name="q" required/>
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