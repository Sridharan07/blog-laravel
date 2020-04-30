@extends('template_blog.main')
	<!-- /HEADER -->
	@section('content')
	<!-- SECTION -->
			@if($post->count() === 0)
			<h1 align="center">SORRY THERE'S NO POST</h1>
			@else
			<!-- row -->
			<div id="hot-post" class="row hot-post">
				<div class="col-md-8 hot-post-left">
					<!-- post -->
					<div class="post post-thumb">
						<a href="{{ route('blog.isi', [ 'slug' => $post_first->slug ] ) }}" data-href='{{ asset($post_first->large_size)}}' class='post-img lazy-load replace'><img class='preview' src="{{ asset($post_first->large_size)}}" alt="" ></a>

						<div class="post-body">
							<div class="post-category">
								<a href=" {{ route('category.list',  $post_first->category->slug)  }} ">{{ $post_first->category->name_category}}</a>
							</div>
							<h3 class="post-title title-lg"><a href="{{ route('blog.isi', [ 'slug' => $post_first->slug ] ) }}">{{ $post_first->title}}</a></h3>
							<ul class="post-meta">
								<li><a href="{{ route('author.list', $post_first->user->slug )}}">{{ $post_first->user->name}}</a></li>
								<li>{{ $post_first->created_at->diffForHumans()}}</li>
							</ul>
						</div>
					</div>
					<!-- /post -->
				</div>
				<div class="col-md-4 hot-post-right">
					<!-- post -->
					@foreach($post_second as $second)
					<div class="post post-thumb">

						<a class="post-img lazy-load replace" href="{{ route('blog.isi', [ 'slug' => $second->slug ] ) }}" data-href="{{ asset($second->medium_size)}}">

						<img class="preview" src="{{ asset($second->medium_size)}}" alt=""></a>

						<div class="post-body">
							<div class="post-category">
								<a href="{{ route('category.list',  $second->category->slug )  }}">{{ $second->category->name_category}}</a>
							</div>
							<h3 class="post-title"><a href="{{ route('blog.isi', [ 'slug' => $second->slug ] ) }}">{{ $second->title}}</a></h3>
							<ul class="post-meta">
								<li><a href="{{ route('author.list', $second->user->slug )}}">{{ $second->user->name}}</a></li>
								<li>{{ $second->created_at->diffForHumans() }}</li>
							</ul>
						</div>
					</div>
					@endforeach
					<!-- /post -->

				
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-8">
					<!-- row -->
					<div class="row">
						<div class="col-md-12">
							<div class="section-title">
								<h2 class="title">Recent posts</h2>
							</div>
						</div>
						<!-- post -->
						@foreach($post_third as $third)
						<div class="col-md-6">
							<div class="post">

								<a class="post-img lazy-load replace" href="{{ route('blog.isi', [ 'slug' => $third->slug ] ) }}" data-href='{{ asset($third->medium_size)}}' >

								<img class="preview" src="{{ asset($third->medium_size)}}" alt=""></a>

								<div class="post-body">
									<div class="post-category">
										<a href="{{ route('category.list',  $third->category->slug)  }}">{{ $third->category->name_category}}</a>
									</div>
									<h3 class="post-title"><a href="{{ route('blog.isi', [ 'slug' => $third->slug ] ) }}">{{ Str::limit($third->title,25)}}</a></h3>
									<ul class="post-meta">
										<li><a href="{{ route('author.list', $third->user->slug )}}">{{ $third->user->name}}</a></li>
										<li>{{ $third->created_at->diffForHumans()}}</li>
									</ul>
								</div>
							</div>
						</div>
						@endforeach
		
					</div>
					<!-- /row -->

					<!-- row -->
					<div class="row">
						<div class="col-md-12">
							<div class="section-title">
								<h2 class="title">Other Posts</h2>
							</div>
						</div>
						@foreach($post_fourth as $fourth)
						<div class="col-md-4">
							<div class="post post-sm">

								<a class="post-img lazy-load replace" href="{{ route('blog.isi', [ 'slug' => $fourth->slug ] ) }}" data-href='{{ asset($fourth->medium_size)}}'>

								<img class="preview" src="{{ asset($fourth->medium_size)}}" alt="" ></a>

								<div class="post-body">
									<div class="post-category">
										<a href="{{ route('category.list',  $fourth->category->slug)  }}">{{ $fourth->category->name_category}}</a>
									</div>
									<h3 class="post-title title-sm"><a href="{{ route('blog.isi', [ 'slug' => $fourth->slug ] ) }}">{{ Str::limit($fourth->title,20)}}</a></h3>
									<ul class="post-meta">
										<li><a href="{{ route('author.list', $fourth->user->slug )}}">{{ $fourth->user->name}}</a></li>
										<li>{{ $fourth->created_at->diffForHumans()}}</li>
									</ul>
								</div>
							</div>
						</div>
						@endforeach
			
					</div>

					<div class="section-row loadmore text-center">
						<a href="{{ route('blog.list') }}" class="primary-button">Load More</a>
					</div>

				

				
				</div>
				<div class="col-md-4">
					

					  @include('template_blog.right')

	

				</div>
			</div>
			<!-- /row -->
			@endif
		
	<!-- /SECTION -->


	<!-- /SECTION -->
	@endsection


	
