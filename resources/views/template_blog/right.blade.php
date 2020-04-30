	<!-- social widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Follow Our Page</h2>
						</div>
						<div class="social-widget">
							<ul>
								<li>
									<a href="{{ $site_setting->facebook }}" target="_blank" class="social-facebook">
										<i class="fa fa-facebook"></i>

									</a>
								</li>
								<li>
									<a href="{{ $site_setting->twitter }}" target="_blank" class="social-twitter">
										<i class="fa fa-twitter"></i>

									</a>
								</li>
								<li>
									<a href="{{ $site_setting->instagram }}" target="_blank" class="social-instagram">
										<i class="fa fa-instagram"></i>

									</a>
								</li>
							</ul>
						</div>
					</div>
					<!-- /social widget -->

					<!-- category widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Categories</h2>
						</div>
						<div class="category-widget">
							<ul>
								@foreach($categories as $categori)
								<li><a href="{{ route('category.list', $categori->slug)  }}">{{ $categori->name_category }}<span>{{ $categori->posts->where('status',1)->count() }}</span></a></li>
								@endforeach
							</ul>
						</div>
					</div>

					<div class="aside-widget">
			            <div class="section-title">
			                <h2 class="title">Archives</h2>
			            </div>
			            <div class="post post-widget">
			                <ul class="categories">
			                    @foreach($archives as $archive)
			                        <li>
			                            <a href="{{ route('blog.list', ['month' => $archive->month, 'year' => $archive->year]) }}">{{ date("F", strtotime("11-".$archive->month."-11")) . " " . $archive->year }}</a>
			                            <span class="badge pull-right">{{ $archive->post_count }}</span>
			                        </li>
			                    @endforeach
			                </ul>
			            </div>
			        </div>
				
					<!-- /category widget -->


					<!-- post widget -->
					<div class="aside-widget">
						<div class="section-title">
							<h2 class="title">Popular Posts</h2>
						</div>
						@foreach($popular_post as $popular)
						<div class="post post-widget">
							<a class="post-img lazy-load replace" href="{{ route('blog.isi', [ 'slug' => $popular->slug ] ) }}" data-href='{{ asset($popular->medium_size)}}' ><img class="preview" src="{{ asset($popular->medium_size)}}" alt=""></a>
							<div class="post-body">
								<div class="post-category">
									<a href="{{ route('category.list',  $popular->category->slug ) }}">{{ $popular->category->name_category }}</a>
								</div>
								<h3 class="post-title"><a href="{{ route('blog.isi', [ 'slug' => $popular->slug ] ) }}">{{ $popular->title }}</a></h3>
							</div>
						</div>
						@endforeach
					</div>

		<!-- /post widget -->
