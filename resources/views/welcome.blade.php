@extends('_core')

@section('content')

<div class="container">

	{{-- INTRO --}}
	<div class="row mt-5">
		<div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
			<div class="box">
				<h4>Why TheScienceBreaker?</h4>
				<p>TheScienceBreaker promotes the dialogue and the dissemination of a scientific culture so that society-relevant opinions can be discussed and decisions may be taken accordingly. Discover our mission.</p>
			</div>
			<div class="box">
				<h4>What is a Break?</h4>
				<p>We publish short lay summaries, called Breaks, where scientific papers are explained by scientists, called Breakers, directly involved in the field of research.</p>
			</div>
		</div>
		<div class="col-lg-7 col-md-6 col-sm-12 col-xs-12">
			<div class="d-flex align-items-baseline justify-content-between">
				<h4>Latest published Breaks</h4>
				<span class="text-muted"><small>Today, October 08 2017</small></span>
			</div>
			<div class="box">
				<table id="latest-breaks" class="mt-2">
					<tr>
						<th>
							<img src="/images/breaks_icons/microbiology.svg">
						</th>
						<td>
							<p>
								<a href="">Red in Tooth and Claw: another weapon against antibiotic resistance</a>
							</p>
							<p><small><strong>Written by: Nicholas A. Isley</strong></small></p>
							<p><small>Published: October 3, 2017 in Microbiology</small></p>
						</td>
					</tr>

					<tr>
						<th>
							<img src="/images/breaks_icons/evolutionbehaviour.svg">
						</th>
						<td>
							<p>
								<a href="">Saving the injured: The value of rescued veterans in a predatory ant species</a>
							</p>
							<p><small><strong>Written by: Nicholas A. Isley</strong></small></p>
							<p><small>Published: October 3, 2017 in Microbiology</small></p>
						</td>
					</tr>

					<tr>
						<th>
							<img src="/images/breaks_icons/evolutionbehaviour.svg">
						</th>
						<td>
							<p>
								<a href="">How cats conquered the Ancient world: a 9,000-years DNA tale</a>
							</p>
							<p><small><strong>Written by: Nicholas A. Isley</strong></small></p>
							<p><small>Published: October 3, 2017 in Microbiology</small></p>
						</td>
					</tr>

					<tr>
						<th>
							<img src="/images/breaks_icons/evolutionbehaviour.svg">
						</th>
						<td>
							<p>
								<a href="">The daily life of Neandertals</a>
							</p>
							<p><small><strong>Written by: Nicholas A. Isley</strong></small></p>
							<p><small>Published: October 3, 2017 in Microbiology</small></p>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>

	{{-- BY SUBJECT --}}
	<div class="row mt-5">
		<div class="col-12">
			<h4>Breaks by subject</h4>
		</div>
			<div class="d-flex flex-row justify-content-center align-items-center flex-wrap mt-4" id="subject-icons">
				<div class="icon-wrapper">
					<img src="/images/breaks_icons/earthspace.svg">
					<div>
						<h5>Earth & Space</h5>
						<h5>5 Breaks</h5>
					</div>
				</div>
				<div class="icon-wrapper">
					<img src="/images/breaks_icons/evolutionbehaviour.svg">
					<div>
						<h5>Evolution & Behaviour</h5>
						<h5>5 Breaks</h5>
					</div>
				</div>
				<div class="icon-wrapper">
					<img src="/images/breaks_icons/healthphysiology.svg">
					<div>
						<h5>Health & Physiology</h5>
						<h5>14 Breaks</h5>
					</div>
					
				</div>
				<div class="icon-wrapper">
					<img src="/images/breaks_icons/mathsphysicschemistry.svg">
					<div>
						<h5>Maths, Physics & Chemistry</h5>
						<h5>9 Breaks</h5>
					</div>
				</div>
				<div class="icon-wrapper">
					<img src="/images/breaks_icons/microbiology.svg">
					<div>
						<h5>Microbiolody</h5>
						<h5>24 Breaks</h5>
					</div>
				</div>
				<div class="icon-wrapper">
					<img src="/images/breaks_icons/neurobiology.svg">
					<div>
						<h5>Neurobiology</h5>
						<h5>18 Breaks</h5>
					</div>
				</div>
				<div class="icon-wrapper">
					<img src="/images/breaks_icons/plantbiology.svg">
					<div>
						<h5>Plant Biology</h5>
						<h5>31 Breaks</h5>
					</div>
				</div>
			</div>

	</div>

	{{-- APP --}}
	<div class="row mt-7">
		<div class="d-flex col-12 justify-content-center align-items-center" id="app-container">
			<div>
				<img src="/images/ios-app/iphone.svg">
			</div>
			<div class="text-center">
				<h4>Check out our new</h4>
				<h3 class="text-orange"><strong>Mobile App!</strong></h3>
				<img src="/images/ios-app/apple-store.svg" class="mt-2" id="apple-store-icon">
			</div>	
		</div>
	</div>

	{{-- DISCUSSION --}}
	<div class="row hidden-sm-down mt-7" id="discussion-container">
		<div class="col-7">
			<h4>Join the discussion!</h4>
			<p>TheScienceBreaker is an open-access environment where everyone, scientists and laypeople, can meet and discuss about the latest scientific discoveries. For each and every Break, you may join the discussion-space below each published Break and help us build a better future with more dialogues and less walls!</p>
		</div>
		<div class="col-4 offset-1">
			<i class="fa fa-comments-o" aria-hidden="true"></i>
		</div>
	</div>

@endsection