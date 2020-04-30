@extends('template_blog.main')
	<!-- /HEADER -->
@section('content')

	<div class="page-header">
			<div class="page-header-bg" style="background-image: url('./img/header-2.jpg');" data-stellar-background-ratio="0.5"></div>
			<div class="container">
				<div class="row">
	
					<div class="col-md-offset-1 col-md-10 text-center">
					  <h1 class="text-uppercase">{{ $title }}</h1>
					</div>
			

				</div>
			</div>
		</div>

	<br>
	<div class="row">
		<div class="col-md-8">
	@if($posts->count() > 0)
	@foreach($posts as $list)
		
	
			<div class="post post-row">

					<a class="post-img lazy-load replace" href="{{ route('blog.isi', [ 'slug' => $list->slug ] ) }}" data-href='{{ asset($list->picture)}}'>

					<img class="preview" src="{{ asset($list->picture)}}" alt=""></a>
					<div class="post-body">

						<div class="post-category">
							<a href="{{ route('category.list',  $list->category->slug ) }}">{{ $list->category->name_category }}</a>
					
						</div>
							<h3 class="post-title"><a href="{{ route('blog.isi', [ 'slug' => $list->slug ] ) }}">{{ $list->title }}</a></h3>
						<ul class="post-meta">
							<li><a href="{{ route('author.list', $list->user->slug ) }}">{{ $list->user->name }}</a></li>
							<li>{{ $list->created_at->diffForHumans() }}</li>
						</ul>
						
					</div>
			</div>
			
	@endforeach
	@else
		<center><h1>
		POST YOU ARE LOOKING FOR IS NOT THERE</h1></center>
	@endif
	<div class="text-center">
	{{ $posts->appends(request()->only(['term', 'month', 'year']))->links() }}
	</div>
	</div>


	<div class="col-md-4">
					

					  @include('template_blog.right')

	

	</div>
	</div>



@endsection