@extends('template_blog.main')
	<!-- /HEADER -->
	@section('content')
		<!-- PAGE HEADER -->
		<div id="post-header" class="page-header">
			<div class="page-header-bg" style="background-image: url('{{ asset($post->picture) }}');" data-stellar-background-ratio="0.5"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-10">
						<div class="post-category">
							<a href="category.html">{{ $post->category->name_category }}</a>
						</div>
						<h1>{{ $post->title }}</h1>
						<ul class="post-meta">
							<li><a href="{{ route('author.list', $post->user->slug ) }}">{{ $post->user->name }}</a></li>
							<li>{{ $post->created_at->format('d F Y') }}</li>
							<!-- <li><i class="fa fa-comments"></i> 3</li>-->
							<li><i class="fa fa-eye"></i> {{ $post->view }}</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- /PAGE HEADER -->
	</header>
	<!-- /HEADER -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-8">


					<!-- post content -->
					<div class="section-row">
						{!! $post->content !!}
					</div>
					<!-- /post content -->

					<!-- post tags -->
					<div class="section-row">
						<div class="post-tags">
							<ul>
								<li>TAGS:</li>
								@foreach($post->tags as $tag)
								<li><a href="{{ route('tag.list', $tag->slug ) }}">{{ $tag->tag }}</a></li>
								@endforeach
							</ul>
						</div>
					</div>

					<div id="disqus_thread"></div>
					<script>
					var disqus_config = function () {
					this.page.url = '{{ url($post->slug) }}';  
					this.page.identifier = '{{ '/'.$post->slug }}'; 
					};
					(function() { // DON'T EDIT BELOW THIS LINE
						var d = document, s = d.createElement('script');
						s.src = 'https://cms-ta2n2pfsfc.disqus.com/embed.js';
						s.setAttribute('data-timestamp', +new Date());
						(d.head || d.body).appendChild(s);
					})();
					</script>
					<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                           
					<!-- /post tags -->
				</div>



				<div class="col-md-4">


					  @include('template_blog.right')



				</div>

			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>

		
	@endsection


