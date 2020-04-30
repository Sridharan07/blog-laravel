@extends('template_blog.main')
	<!-- /HEADER -->
@section('content')

	<div class="page-header">
			<div class="page-header-bg" style="background-image: url('./img/header-2.jpg');" data-stellar-background-ratio="0.5"></div>
			<div class="container">
				<div class="row">
	
					<div class="col-md-offset-1 col-md-10 text-center">
					  <h1 class="text-uppercase">Contacts</h1>
						<p class="lead">Welcome to the website {{ $site_setting->site_name }} If you have questions or need to contact us, please use the contact below.</p>
					</div>
			

				</div>
			</div>
		</div>

	<br>
	 <div class="row">
		<div class="col-md-8">
			<div class="section-row">
						<div class="section-title">
							<h2 class="title">Contact Information</h2>
						</div>
						<p>Contact list that you can contact</p>
						<ul class="contact">
							<li><i class="fa fa-phone"></i>{{ $site_setting->contact_number }}</li>
							<li><i class="fa fa-envelope"></i> <a href="#">{{ $site_setting->contact_email }}</a></li>
							<li><i class="fa fa-map-marker"></i>{{ $site_setting->address }}</li>
						</ul>
					</div>

					<div class="section-row">
			
			
						{!! $site_setting->gmaps !!}

					</div>

					<!-- <div class="section-row">
						<div class="section-title">
							<h2 class="title">Mail us</h2>
						</div>
						<form>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<input class="input" type="email" name="email" placeholder="Email">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<input class="input" type="text" name="subject" placeholder="Subject">
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<textarea class="input" name="message" placeholder="Message"></textarea>
									</div>
									<button class="primary-button">Submit</button>
								</div>
							</div>
						</form>
					</div> -->
		</div> 


	<div class="col-md-4">
					

					  @include('template_blog.right')

	

	</div>
	</div>



@endsection