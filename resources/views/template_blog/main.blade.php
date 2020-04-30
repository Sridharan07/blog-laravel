<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	@include('template_blog.meta')
		{!! $site_setting->google_analystic !!}

	<title>{{ $site_setting->site_name }}</title>
	<link rel='icon' href='{{ asset($site_setting->nav_logo) }}'>


	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CMuli:400,700" rel="stylesheet">
	
	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="{{ asset('blog/css/bootstrap.min.css') }}" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="{{ asset('blog/css/font-awesome.min.css') }}">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="{{ asset('blog/css/style.css') }}" />
	<script src="{{ asset('blog/js/jquery.min.js')}}"></script>

	<script src="{{ asset('assets/lazyload/js/lazy-load-images.min.js')}}"></script>
	<link rel="stylesheet" href="{{ asset('assets/lazyload/css/lazy-load-images.min.css')}}">





</head>

<body>
	<!-- HEADER -->
	<header id="header">
		<!-- NAV -->
		<div id="nav">
			<!-- Top Nav -->
			<div id="nav-top">
				<div class="container">
					<!-- social -->
					<ul class="nav-social">
						<li><a href="{{ $site_setting->facebook }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
						<li><a href="{{ $site_setting->twitter }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
						<li><a href="{{ $site_setting->google }}" target="_blank"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="{{ $site_setting->instagram }}" target="_blank"><i class="fa fa-instagram"></i></a></li>
					</ul>
					<!-- /social -->

					<!-- logo -->
					<div class="nav-logo">
						<a href="{{ route('blog') }}" class="logo"><img src="{{ asset($site_setting->logo) }}" alt=""></a>
					</div>
					<!-- /logo -->

					<!-- search & aside toggle -->
					<div class="nav-btns">
						<button class="aside-btn"><i class="fa fa-bars"></i></button>
						<button class="search-btn"><i class="fa fa-search"></i></button>
						<div id="nav-search">
							<form action="{{ route('blog.search') }}" method="get">
								@csrf
								<input class="input" name="search" placeholder="Enter your search...">
							</form>
							<button class="nav-close search-close">
								<span></span>
							</button>
						</div>
					</div>
					<!-- /search & aside toggle -->
				</div>
			</div>
			<!-- /Top Nav -->

			<!-- Main Nav -->
			<div id="nav-bottom">
				<div class="container">
					<!-- nav -->
					<ul class="nav-menu">
						<li><a href="{{ route('blog') }}">Home</a></li>

						<li class="has-dropdown">
							<a href="#">Category</a>
							<div class="dropdown">
								<div class="dropdown-body">
									<ul class="dropdown-list">
										@foreach($categories as $category)
										<li><a href="{{ route('category.list', $category->slug )  }}">{{ $category->name_category}}</a></li>
										@endforeach
									</ul>
								</div>
							</div>
						</li>
						<li><a href="{{ route('blog.list') }}">ALL POST</a></li>
						<li><a href="{{ route('blog.about_us') }}">About Us</a></li>
						<li><a href="{{ route('blog.contact_us') }}">Contact Us</a></li>
						
					</ul>
					<!-- /nav -->
				</div>
			</div>
			<!-- /Main Nav -->

			<!-- Aside Nav -->
			<div id="nav-aside">
				<ul class="nav-aside-menu">
					<li><a href="{{ route('blog') }}">Home</a></li>
					<li class="has-dropdown"><a>Categories</a>
						<ul class="dropdown">
							@foreach ($categories as $category)
							<li><a href="{{ route('category.list', $category->slug)  }}">{{ $category->name_category }}</a></li>
							@endforeach
					
						</ul>
					</li>
					<li><a href="{{ route('blog.list') }}">ALL POST</a></li>
					<li><a href="about.html">About Us</a></li>
					<li><a href="{{ route('blog.contact_us') }}">Contacts</a></li>
					
				</ul>
				<button class="nav-close nav-aside-close"><span></span></button>
			</div>
			<!-- /Aside Nav -->
		</div>
		<!-- /NAV -->
	</header>

<div class="section">
		<!-- container -->
		<div class="container">

  @yield('content')

  </div>
		<!-- /container -->
	</div>


  @include('template_blog.footer')

  @include('template_blog.js')