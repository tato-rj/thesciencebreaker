<footer class="container-fluid mt-5 p-5">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-6 col-sm-12 col-xs-12">
				<div class="d-flex align-items-center mb-4">
					<h5 class="m-0 mr-4"><strong>FOLLOW US</strong></h5>
					<div class="d-flex align-items-center justify-content-center social">
						<i class="fa fa-facebook" aria-hidden="true"></i>
						<i class="fa fa-twitter" aria-hidden="true"></i>
						<i class="fa fa-google-plus" aria-hidden="true"></i>
					</div>	
				</div>
				<div class="d-flex align-items-top">
					<ul class="p-0">
						<p>PRESENTATION</p>
						<li>about</li>
						<li>mission</li>
						<li>the team</li>
						<li>partners</li>
					</ul>
					<ul>
						<p>BREAKS</p>
						<li>health & physiology</li>
						<li>neurobiology</li>
						<li>earth & space</li>
						<li>evolution & behaviour</li>
						<li>plant biology</li>
						<li>microbiology</li>
						<li>maths, physics & chemistry</li>
					</ul>
					<ul>
						<p>FOR BREAKERS</p>
						<li>general information</li>
						<li>F.A.Q</li>
						<li>available articles</li>
					</ul>
					<ul>
						<p>CONTACT US</p>
						<li>submit a break</li>
						<li>ask a question</li>
						<li>privacy policy</li>
					</ul>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
				{{-- SUBSCRIBE --}}
				<div>
					<h5><strong>SUBSCRIBE</strong></h5> <p class="text-muted">Stay up-to-date with the latest published Breaks!</p>
					<form method="POST">
						{{ csrf_field() }}
						<div class="form-group">
							<input type="email" class="form-control" id="subscribe" placeholder="Enter email">
							<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
						</div>
						<button type="submit" class="btn btn-theme-green btn-block">Submit</button>
					</form>
				</div>
			</div>
		</div>
	
		<div class="mt-4 text-center">
			<ul class="credits pt-4">
				<li>30, Quai Ernest-Ansermet 1211 Genève 4<i class="fa fa-circle" aria-hidden="true"></i></li>
				<li>© TheScienceBreaker 2015 - 2017. All rights reserved<i class="fa fa-circle" aria-hidden="true"></i></li>
				<li>powered by LeftLane<i class="fa fa-circle" aria-hidden="true"></i></li>
				<li><a href="/admin/dashboard">Admin Login</a></li>
			</ul>
		</div>
	</div>
</footer>