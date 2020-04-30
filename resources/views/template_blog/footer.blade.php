<!-- FOOTER -->
	<footer id="footer">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-3">
					<div class="footer-widget">
						<div class="footer-logo">
							<a href="https://www.youtube.com/channel/UCXFdc68srZQ-ok4I1-pHs2g" class="logo" alt="Made By Fadhil Darma Putera Z | Tahu Coding" target="_blank"><img src="{{ asset('assets/cms.png')}}"   width="250px"></a>
						</div>
						<p>A content management system is a software application that can be used to manage the creation and modification of digital content. CMSs are typically used for enterprise content management and web content management.</p>
						<ul class="contact-social">
							<li><a href="{{ $site_setting->facebook }}" target="_blank" class="social-facebook"><i class="fa fa-facebook"></i></a></li>
							<li><a href="{{ $site_setting->twitter }}" target="_blank" class="social-twitter"><i class="fa fa-twitter"></i></a></li>
							<li><a href="{{ $site_setting->google }}" target="_blank" class="social-google-plus"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="{{ $site_setting->instagram }}" target="_blank" class="social-instagram"><i class="fa fa-instagram"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-3">
					<div class="footer-widget">
						<h3 class="footer-title">Categories</h3>
						<div class="category-widget">
							<ul>
								@foreach($categories as $categori)
								<li><a href="{{ route('category.list',  $categori->slug ) }}">{{ $categori->name_category }}<span>{{ $categori->posts->where('status',1)->count() }}</span></a></li>
								@endforeach
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="footer-widget">
						<h3 class="footer-title">Tags</h3>
						<div class="tags-widget">
							<ul>
								@foreach($tags as $tag)
								<li><a href="{{ route('tag.list', $tag->slug ) }}">{{ $tag->tag }} - {{ $tag->post->where('status', 1)->count() }}</a></li>					
								@endforeach
							</ul>
						</div>
					</div>
				</div>
				<!--<div class="col-md-3">
					<div class="footer-widget">
						<h3 class="footer-title">Newsletter</h3>
						<div class="newsletter-widget">
							<form>
								<p>Nec feugiat nisl pretium fusce id velit ut tortor pretium.</p>
								<input class="input" name="newsletter" placeholder="Enter Your Email">
								<button class="primary-button">Subscribe</button>
							</form>
						</div>
					</div>
				</div>-->

			</div>
			<!-- /row -->

			<!-- row -->
			<div class="footer-bottom row">
				<div class="col-md-6 col-md-push-6">
					<ul class="footer-nav">
						<li><a href="{{ route('blog') }}">Home</a></li>
						<li><a href="{{ route('blog.about_us') }}">About Us</a></li>
						<li><a href="{{ route('blog.contact_us') }}">Contacts</a></li>
					
					</ul>
				</div>
				<div class="col-md-6 col-md-pull-6">
					<div class="footer-copyright">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="#" target="_blank">Sridhar</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					</div>
				</div>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</footer>
	<!-- /FOOTER -->

	

</body>

</html>