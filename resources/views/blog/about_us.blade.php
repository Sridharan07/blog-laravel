@extends('template_blog.main')
	<!-- /HEADER -->
@section('content')

	<div class="page-header">
			<div class="page-header-bg" style="background-image: url('./img/header-2.jpg');" data-stellar-background-ratio="0.5"></div>
			<div class="container">
				<div class="row">
	
					<div class="col-md-offset-1 col-md-10 text-center">
					  <h1 class="text-uppercase">About Us</h1>
						
					</div>
			

				</div>
			</div>
		</div>

	<br>
	 <div class="row">
		<div class="col-md-8">
			<div class="section-row">
				{!! $site_setting->about_us !!}
			</div>					
		</div> 


	<div class="col-md-4">
					

					  @include('template_blog.right')

	

	</div>
	</div>



@endsection