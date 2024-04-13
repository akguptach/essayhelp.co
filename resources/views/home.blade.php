@extends('layout.app')
@section('content')
<style>.select2-container .select2-selection--single {height: 52px !important;}
.select2-container--default .select2-selection--single {    background-color: #fff;    border: 1px solid #868685;    border-radius: 30px;}
.select2-container--default .select2-selection--single .select2-selection__rendered {    color: #444;    line-height: 52px;}
.select2-container--default .select2-selection--single .select2-selection__arrow {    height: 48px;    position: absolute;    top: 1px;    right: 1px;    width: 20px;}
.select2-container .select2-selection--single .select2-selection__rendered {
    display: block;
    padding-left: 20px;
    padding-right: 20px;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}
#marquee1 {	overflow-x: marquee-line;	marquee-style: scroll;	marquee-direction: backward;}
.task-form .btn{
	padding:.45rem 1rem;
}
</style>
	<div class="masthead">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="masthead-left">
						<h1>The <br>student's key <br>to <span>success <br>since 2011</span></h1>
						<p>Get help with anything from a short essay to exam notes, proofreading and editing or your full dissertation.</p>
						
						<a href="order.html" class="btn btn-primary mb-4 w-100 d-md-none">Order Now</a>

						<p class="tu-text">Our writers are graduates of <span>top universities.</span></p>
							<div class="overflow-hidden tu-marquee">
							    <div class="horizontal-marquee">
								    
							        <img src="https://s3-alpha-sig.figma.com/img/7a96/b67a/ad66c59d0d2c65348c0d05ef4fcccd94?Expires=1713744000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=C0F6IY2LXNsXQNWonQs~6zvgJaHUlmCNFhOH2jEejQXuWXL33TzfGRqy5pLO6SWqq~QCz1xk7HDK62uWcapj7BLWFCDRBlZgwaiVuuYxG11hiU29vyqK~45e6CuYXQQvIi8hQYDMHKjTa~T~I1rLwNkXwzw1YCX8tXw1-KDpvEoBEaeyjylWJtT4hVQl35c~IUapbFdk~r-MRgSUDM839yBrDGy~31jfkhfjkuWEYmgeN2lexFAIgguj~Fh29KrM9LNOh7W~esfIiW0ZVfpt~lUKe8BXQl0bjLNBWQx-45msiloL9X6PuAE7OAQTEpbcFIFoYEuNLJeJZcZr4e4nUw__"  alt="Essay Help" title="Essay Help"  height="85">
									<img src="https://s3-alpha-sig.figma.com/img/0d44/3070/f792e30751b5a59cc888ba08e1474aab?Expires=1713744000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=KR4JoPGkkd5fwqnRJYPyPIa5Dsy~UvZrDZSU4MRMgRWuJ7B6MNqi-w9pjDM6knrpMzpWYpjUptCSMqVPj-uYawFGYPA1z5FFwkJyn6EzoBacXhmBgokOzqR6JmTlIdx9e-SWXodygMSoghdkKALQfQFWiW8p~RIT-7P1ltsObTDtGXfZaLpXk6Bhcwju5S~FO1-iTssFRiih7eNb7DVc73h7TpqU4GM8lQn~85jm5J~A3bhZfSiQfSz7COkgroGXISfpkPp0sy~Fmt-IohOJNNxe5lhQHw1h2dxDVykE-7NOxNPTj5fvbkDqKgrk~G0589oyEQfZUbBHAAH~lgf6Ww__" alt="Essay Help" title="Essay Help"   height="85">
									<img src="https://s3-alpha-sig.figma.com/img/9dc9/71cb/96300ec3d2f0c50740b49be3e7e8e39b?Expires=1713744000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=Yu-OfU0eoPm26IdnRlzMm6PS2lrf0V30dFFuMCkCHilFpHSw6T25fSHNuxEecYW25HaUKvy2ScHSHRr-7lv99iOqhSeO2qxC4mE7cdWokt3Bu-Zz-CpwAPjmajYpV8hkBTVRTpcFClEuB8Gp13CQHxKkCEoDT58yDslQIrCpE5YFW6qT~o1SBrPOYvVpfhluG6CHKWsWdEwbLavpEPO17mdg4JnxYEbDCxgOaJJ2-XYwFuNR~tqY1u-g6oAGKFtmK6kVv7HehJp1PQ2GBmgBVsqkh-c5ESnzaYHSJD6DRigy7tXHrwSDybTNMo5QUDjVbMshQwPXZg~NFE155Tw~zQ__"  alt="Essay Help" title="Essay Help"  height="85">
									
									<img src="https://s3-alpha-sig.figma.com/img/9088/39c2/520508ceadfec51cef36229ee09eb651?Expires=1713744000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=kxnCFGyTJH5MhEVb6UEsj~5wcfr3rleSxKzymERD2aHE9MWBfOQUYz-6NtnNY28NY7JlvrjdOzxh2MBoQ5fH1~QE6NSbWfwSfdk20Fsj884hJ0JauY5AKhNclQ7io9N8Mv0E~O1AbdJ57ZgIDAzqsvzN9g2I-rA1Fl8kkBNlCMQmXdXF4QE8~4dMYSr8q05X2s5SNFlrGEC-APlgBdzUsTA4kG2rv9FqiCWVI91ugDL4WyQRXkzuaFMvPwvlBnw0rcp45REr96zg-ZOhuqkWBlQtLMKFR8IzMyxW8qc8xZ~TGqdhzUVz5hWqXY08wQ90T0wyhljgKJZDEEfSttLSyA__" alt="Essay Help" title="Essay Help"  height="85">
									<img src="https://s3-alpha-sig.figma.com/img/2c7c/8596/40d27b41901f379a5e6fd9346c3bf0ab?Expires=1713744000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=Z3dcr1MVoN3ASYjWabT5XT5U6c8sbuxjgK-bC4ocC2gdDr7Hz0FxCX6whgCutBLlYU1-97LB2E65y~b9xXTgV8cCB49ragxPniM-6OJKdOm5VcxUffmQVnLKpW3jOznQHN6J4iR1E0k59Q1c2EgWN1Pex~w2-GuyWqvIqHKjb7y4DuIqOvG6L4yEBDdN~Wfhx0O-eqQOlveDHKD7kCAlHulsSGlqcJurKkggTnL9Mq8HivKQaDyE-xEvZzB66AnsKGjxq1NNqMVWUxW9FDkHQ5JLkF2K3PH7aOCV6HPlGOrOPFKoLs8LyJ5h3s7b~zE~5sz8QUCWLvyhHTGk6KkjEQ__" alt="Essay Help" title="Essay Help"   height="85">
									
									<img src="https://s3-alpha-sig.figma.com/img/39e7/5019/b1bb0859e28d9159590c917fb2b01263?Expires=1713744000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=XCKHckUG5VFvTAW4tK0iY12ZYf3ZCevjMaSs8NnpVypsKEYSaZMqKL4iEL6OIJcVSyWo4TfwR9ZP1KNXCz1qc57m3uoncCdJ7Nw21KeTTrxRL0jlTP68AcJA7rSEmOkYdRQq3Xq3ZztNADzyhrr~Y6HZKe70wlVtIbv3b~495~pqqjU4n3nwL8o1X2r~3BN28ZzU-m7Vn~ANyITH~o84ITwpIsZwWsL1jrBv~gd-C5q5pymP-2ajh3eo2yBB4xNwCkUUfQckacjAldY~AWJ1mlIQBAV2oix52odtQfQXwyFz~gPZtmLiPh3pLi0lXj4nlJ2TKolbpyWrOVUsQnDcjg__" alt="Essay Help" title="Essay Help"  height="85">
									<img src="https://s3-alpha-sig.figma.com/img/d9b3/bd03/64ed0f04611d7b8a22f8a8ea0f8ffd30?Expires=1713744000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=ikbDZnSdS0aFBpUGsg8rTQMzjey4eNzV~4IOD1oad-wQ1dQ2EZEa~KCc~r2W4tv~4Z3YEZzBgZ9NLtjwYXTUKGuZoL1ht~lrXwrDo119sIY2II~KR5UBjPSywVqSAFHbO~5hCtpoLidGkDcOichQPCGObF97WKWC-mWK8BoGPpue78AHKOnyWmesJJNQU4kVQBTptSTFtT-ei1cO7kESWLO7rRYWuj0g3n-176cFwOU~p1v5jJ1QuZopmkgnzlT8KnWCLRA1LQkuqiFRfPTbblvF4VnDGsh3bjuRHyuAteiFAciBMCO-tCr~GpPs9Pag8d~5piWiseMTqCUusIzLdw__" alt="Essay Help" title="Essay Help" height="85">
									<img src="https://s3-alpha-sig.figma.com/img/6bd2/1709/801a96e48b3095a18ca5b3c9652ef974?Expires=1713744000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=IwdSlaCa~TgG2RH8RBfEvLXY1J~UfyvE3QkF-ApogJ1HV7Gbyh0F-Mavxq6xfHe1lLuEue2M6UCXDVLjRvksFQIFcb9Zz0FQFzVwT2QZg8NdY919thVuOwJeXb8ot~XUzmQnQMzKjXczDtBjF8kzI16ntiiqMG-ZUvFpZjrl7pWaGtXmRaaRlsRvdIOPCxj7wwbS3IulojhHtL3JJWFGOl2tXDqA7TE20U~wFxyLqs-LJmsES~c0JBOZJdMrppa0InJj1oGyk3xpNxzyH6WnmJwrRr0vuVcWC036P~-Fhcw~JjwEghQrmCDLlGRffq97GRQ5tUVLTlRw~AFBDrff2w__" alt="Essay Help" title="Essay Help" height="85">
									
									<img src="https://s3-alpha-sig.figma.com/img/83c4/64f8/a50c0b78df78d3c869ab941c5d9365d6?Expires=1713744000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=PHc4frDSEAfW5BGGyCUPW9zGD-vDBOcg8hPA-ffVAGvX6Ef65rQu6o7BIJuRuWy4CQFc~2Ze9sHSnldz1hrCKo~kvnnvwskqbK0FhlGfX4~jM-rJdMxPgF-u5Fsgy6guQoue5GnCn9X2Le2q75X~zlg5zQzXU3ytRFopeQYHZViFi8VC3iHJSUX~deuhp0bnKf5x855o9zOTamepFMwR3ng8PHkTMnSuueVF1AOP9Za0p92YF5KQqkmpL2XcMtFF147EajiDPH-NmnPcXHWXmJz47Q1qYnS1rjTZL4ZYsh3b9CNxgaSXL3l8IlsatLeNzA~z5NK6d~kndTfIz2K5gA__" alt="Essay Help" title="Essay Help" height="85">
									<img src="https://s3-alpha-sig.figma.com/img/953e/617b/94941f80921b28b2b2e4666bc44d45a2?Expires=1713744000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=P4lih0ZJHbmTyIoGG-vmXJWHMeFF4TgqmrY4XXmFNuT9GRcxbzGbSeVzOzJW7IfZItB0IXEJ0kDOy05F9BFcA4uwAfRKfkzGwELfmPXRQiOAXu3IwNUJT4kH4XS54zc9NKaXpPeXr0cLdZKbWGaXsKZDKfk-JEdjbjCzx1jsLJDS-LAFc2dfN1kmDerC9Bck5WvL9vWSKZxUvZymucckV-E74~ltPJIffWc7DjK0iASbrjRJs7FrlTnOincAxwiW7G-BKQ8Ow5QN4o8jpqeDkL4nrd2cb9OGo3LSwr8BW8TEuhW3R-slVm18dyLOfAcCHfMcc-7RMrhdHC~xY6Mi~w__" alt="Essay Help" title="Essay Help" height="85">
									<img src="https://s3-alpha-sig.figma.com/img/b752/3c79/bf687669ae2fd3104159806b67940be3?Expires=1713744000&Key-Pair-Id=APKAQ4GOSFWCVNEHN3O4&Signature=bTSYFmaeUuVeREkCwqxrUvXxdfbDTIxvTvGn7ny8cixfQlBXlHrpR0fliuDA0T1lgpC9Ne9gE5vORfyy0CX9Nee9hFdFMybZnG8NLXyxbEXQx7Nln5TPhE1mwAZ5q3jdBhRDvRQh-35-ZHwVNK3ZdgQ0ouoIVDmU7Y6sd15zSMqDSae1plCISUm3Q4V6sWNcHND-tVLkzEyZqdm2IUuN2uOeoz3lLMK2qrFJSDPyb2uGN5UlvKOO3qAcLxvLSzWWugnWf97CRMPDpBRpEBMLD2DRdjxUCMHSzft14eBoOR0Y82lAaNdlEYDHfm2fBpf1dxn6YPNZBTfDIJQnrZhfxA__" alt="Essay Help" title="Essay Help" height="85">
										
										
									
							        
							    </div>
							</div>	
					<!--	<picture id="marquee1">
							<source media="(min-width:768px)" srcset="{{ asset('images/universities-logo.jpg') }}">
							<img src="{{ asset('images/universities-logo.jpg') }}" class="img-fluid" alt="Essay Help" title="Essay Help" width="520" height="78">
						</picture> -->
					</div>
				</div>
				<div class="col-lg-6">
					<div class="task-form">
						<h2>Whats Your Task?</h2>
						<form action="{{ route('order') }}" method="GET">
							<div class="row">
							<div class="col-md-6">
								<div class="form-group mb-3">
								<label for="subject" class="form-label">Subject</label>
								<select class="form-control form-select select2" id="subject_id" name="subject_id" aria-label="Subject" required >
								<option selected>Select subject</option>
								    @if(!empty($subjects)):
											@foreach ($subjects as $subject1)
												<option value="<?= $subject1['id'];?>"><?= $subject1['subject_name'];?></option>
											@endforeach 
										@endif
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group mb-3">
									<label for="referencing_style_id" class="form-label">Referencing Style</label>
									<select class="form-control form-select select2" id="referencing_style_id" name="referencing_style_id" required>
									<option value="">Select Referencing Style</option>
										@if(!empty($referencings)):                                                    
												@foreach ($referencings as $referencing)
												<option value="<?= $referencing['id'];?>"><?= $referencing['style'];?></option>  
												@endforeach
										@endif
									</select>
								</div>
							</div>
							<div class="col-md-6">                                        
								<div class="form-group mb-3">
								<label for="taskType" class="form-label">Task type</label>
									<select class="form-control form-select select2" id="task_type_id" name="task_type_id" aria-label="taskType" required >
									<option value="" selected>Select task type</option>                                                @if(!empty($task_types)):                                                    
										@foreach ($task_types as $task_type)
										<option value="<?= $task_type['id'];?>"><?= $task_type['type_name'];?></option>
										@endforeach 
									@endif 
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group mb-3">                                            
									<label for="wordCount" class="form-label">Word count</label>
									<div class="input-group mb-3">
										<button class="btn btn-outline-secondary btn-minus" onclick="minus(this)" type="button">-</button>
											<input type="text" class="form-control" placeholder="" aria-label="taskDate text with button addon" aria-describedby="button-addon1" value="200" id="no_of_words" name="no_of_words" required style="text-align: center;">
										<button class="btn btn-outline-secondary btn-plus" onclick="add(this)" type="button">+</button>
									</div>
								</div>
							</div>                                    
							<div class="col-md-6">
								<div class="form-group mb-3">                                            
									<label for="studylabel_id" class="form-label">Level of study</label>
									<select class="form-control form-select select2" id="studylabel_id" name="studylabel_id" required  >                                                
										<option selected value="">Select level of study</option>                                                @if(!empty($levels)):                                                    
											@foreach ($levels as $level)
												<option value="<?= $level['id'];?>"><?= $level['level_name'];?></option>
											@endforeach
										@endif
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group mb-3">
									<label for="grade_id" class="form-label">Desired grades</label>
									<select class="form-control form-select select2" id="grade_id" name="grade_id" required>
									<option selected value="">Select grade</option>
									@if(!empty($grades)):
										@foreach ($grades as $grade)
										<option value="<?= $grade['id'];?>"><?= $grade['grade_name'];?></option>
										@endforeach
									@endif 
									</select>
								</div>
							</div>                                    
								
								
								<div class="col-12">
									<button type="submit" class="btn btn-primary w-100">Proceed To Order</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>		

			<div class="row">
				<div class="col-12">
					<div class="review-block">
						<div class="review-logo-list">
							<div class="review-logo">
								<picture>
									<source media="(min-width:768px)" srcset="{{ asset('images/trustpilot-logo.svg') }}">
									<img src="{{ asset('images/trustpilot-logo.svg') }}" class="img-fluid" loading="lazy" alt="Essay Help" title="Essay Help" width="150" height="30">
								</picture>
								<p class="review-rating"><span>4.6</span> 257 Reviews</p>
							</div>
							<div class="review-logo">
								<picture>
									<source media="(min-width:768px)" srcset="{{ asset('images/sitejabber-logo.jpg') }}">
									<img src="{{ asset('images/sitejabber-logo.jpg') }}" class="img-fluid" loading="lazy" alt="Essay Help" title="Essay Help" width="150" height="30">
								</picture>
								<p class="review-rating"><span>4.7</span> 653 Reviews</p>
							</div>
							<div class="review-logo">
								<picture>
									<source media="(min-width:768px)" srcset="{{ asset('images/reviews-logo.svg') }}">
									<img src="{{ asset('images/reviews-logo.svg') }}" class="img-fluid" loading="lazy" alt="Essay Help" title="Essay Help" width="150" height="30">
								</picture>
								<p class="review-rating"><span>4.6</span> 489 Reviews</p>
							</div>
						</div>
						<h2><b>15,000+</b> students trust Eassyhelp</h2>
					</div>
				</div>
			</div>
		</div>
	</div>
<section class="we-make-sec">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="hiw-head">
						<h2 class="head-title">Why <span>Essay Help</span>?</h2>
						
					</div>
				</div>
			</div>
			<div class="row gy-4 mt-2 mt-md-5">
				<div class="col-md-4">
					<div class="work-card h-100">
						<picture>
							<source media="(min-width:768px)" srcset="{{ asset('images/rocket-icon.svg') }}">
							<img src="{{ asset('images/rocket-icon.svg') }}" class="img-fluid" loading="lazy" alt="Essay Help" title="Essay Help"
								width="90" height="90">
						</picture>
						<div class="card-body text-center">
							<h3 class="card-title">On time delivery</h3>
							<p>Our writers make sure that all orders are submitted prior to the deadline so that you can proofread your paper before handing it over to your tutor.</p>
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="work-card h-100">
						<picture>
							<source media="(min-width:768px)" srcset="{{ asset('images/setting-icon.svg') }}">
							<img src="{{ asset('images/setting-icon.svg') }}" class="img-fluid" loading="lazy" alt="Essay Help" title="Essay Help"
								width="90" height="90">
						</picture>
						<div class="card-body text-center">
							<h3 class="card-title">Verified Tutors</h3>
							<p>All tutor profiles are meticulously checked: diplomas, identity and background. ony profiles demostrating academic excellence are retained. Also, all reviews visible on tutor accounts are purely authentic.</p>
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="work-card h-100">
						<picture>
							<source media="(min-width:768px)" srcset="{{ asset('images/rocket-icon.svg') }}">
							<img src="{{ asset('images/rocket-icon.svg') }}" class="img-fluid" loading="lazy" alt="Essay Help" title="Essay Help"
								width="90" height="90">
						</picture>
						<div class="card-body text-center">
							<h3 class="card-title">100% plagiarism free!</h3>
							<p>All Essay Help papers are scanned for duplicate content and are guaranteed plagiarism free.</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="work-card h-100">
						<picture>
							<source media="(min-width:768px)" srcset="{{ asset('images/setting-icon.svg') }}">
							<img src="{{ asset('images/setting-icon.svg') }}" class="img-fluid" loading="lazy" alt="Essay Help" title="Essay Help"
								width="90" height="90">
						</picture>
						<div class="card-body text-center">
							<h3 class="card-title">World's top essay provider</h3>
							<p>We are widely recognised as being the best provider of student writing services in the World</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="work-card h-100">
						<picture>
							<source media="(min-width:768px)" srcset="{{ asset('images/rocket-icon.svg') }}">
							<img src="{{ asset('images/rocket-icon.svg') }}" class="img-fluid" loading="lazy" alt="Essay Help" title="Essay Help" width="90" height="90">
						</picture>
						<div class="card-body text-center">
							<h3 class="card-title">Free amendments</h3>
							<p>We provide unlimited free revisions until you are satisfied with the work.</p>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="work-card h-100">
						<picture>
							<source media="(min-width:768px)" srcset="{{ asset('images/setting-icon.svg') }}">
							<img src="{{ asset('images/setting-icon.svg') }}" class="img-fluid" loading="lazy" alt="Essay Help" title="Essay Help" width="90" height="90">
						</picture>
						<div class="card-body text-center">
							<h3 class="card-title">100% Confidentiality Guaranteed</h3>
							<p>Our aim is your complete confidentiality.</p>
						</div>
					</div>
				</div>

			</div>

			<div class="text-center mt-4 mt-md-5 mb-4 ">
				<a class="btn btn-primary" href="#" role="link">Get started</a>
			</div>
		</div>
	</section>	
<section class="we-make-sec">
  <div class="container" style="background: #FEFFF5;padding-top: 10px;">
    <div class="row">
      <div class="col-md-6 mb-5">
        <div class="wm-right" style="padding-top: 17%;">
          <h2>We Make <br><span>Students Happy </span></h2>
          <h3 class="mb-4">Still in Two Minds?<br> The Proof is in Numbers!</h3>
          
          <p>With Essay Help, it has never been easier to get the grades you've always wanted. Our world-class academics are ready to help.</p>
          <a class="btn btn-primary d-none d-md-inline-flex" href="#" role="link">Get started</a>
        </div>

      </div>
      <div class="col-md-6">
        <div class="testimonial-slider">         
            <div class="row">
			    <div class="col-md-6">
				<div class="card student-reveiw-card h-100">
				  <picture>
						<img src="https://essayhelp.co/images/youtube.png" class="img-fluid card-img" alt="Essay Help" title="Essay Help" loading="lazy">
					  </picture>

				  <div class="sr-block" style="margin-top:10px;">
					
					<div class="sr-list">
					  <ul class="student-rating" data-rate="5" style="padding-left:2px;">
						<li>Start 1</li>
						<li>Start 2</li>
						<li>Start 3</li>
						<li>Start 4</li>
						<li>Start 5</li>
					  </ul>
					</div>
				  </div>
				  <div class="card-body p-0">
					
					<div class="student-name">John De marli. <span>Sep 01, 2023</span></div>
				  </div>              
				</div>          
			    </div>
				<div class="col-md-6">
				<div class="card student-reveiw-card h-100">
				  <div class="d-flex sr-block">
					<div class="student-photo">
					  <picture>
						<source media="(min-width:768px)" srcset="{{ asset('images/stundent-1.png') }}">
						<img src="{{ asset('images/stundent-1.png') }}" class="img-fluid" loading="lazy" alt="Essay Help" title="Essay Help" width="65" height="65">
					  </picture>
					</div>

					<div class="sr-list">
					  <ul class="student-rating" data-rate="3">
						<li>Start 1</li>
						<li>Start 2</li>
						<li>Start 3</li>
						<li>Start 4</li>
						<li>Start 5</li>
					  </ul>
					</div>
				  </div>
				  <div class="card-body p-0">
					<p class="card-text">My academic superhero arrived in the form of affordable, easy-to-use support. Courses conquered, stress conquered.</p>
					<div class="student-name">John De marli. <span>Sep 01, 2023</span></div>
				  </div>              
				</div>          
			    </div>
			    <div class="col-md-6">
				<div class="card student-reveiw-card h-100">
				  <div class="d-flex sr-block">
					<div class="student-photo">
					  <picture>
						<source media="(min-width:768px)" srcset="{{ asset('images/stundent-1.png') }}">
						<img src="{{ asset('images/stundent-1.png') }}" class="img-fluid" loading="lazy" alt="Essay Help" title="Essay Help" width="65" height="65">
					  </picture>
					</div>

					<div class="sr-list">
					  <ul class="student-rating" data-rate="4">
						<li>Start 1</li>
						<li>Start 2</li>
						<li>Start 3</li>
						<li>Start 4</li>
						<li>Start 5</li>
					  </ul>
					</div>
				  </div>
				  <div class="card-body p-0">
					<p class="card-text">My academic superhero arrived in the form of affordable, easy-to-use support. Courses conquered, stress conquered.</p>
					<div class="student-name">John De marli. <span>Sep 01, 2023</span></div>
				  </div>              
				</div>          
                </div>
			    <div class="col-md-6">
				<div class="card student-reveiw-card h-100">
				  <picture>
						<img src="https://essayhelp.co/images/youtube.png" class="img-fluid card-img" alt="Essay Help" title="Essay Help" loading="lazy">
					  </picture>

				  <div class="sr-block" style="margin-top:10px;">
					
					<div class="sr-list">
					  <ul class="student-rating" data-rate="5" style="padding-left:2px;">
						<li>Start 1</li>
						<li>Start 2</li>
						<li>Start 3</li>
						<li>Start 4</li>
						<li>Start 5</li>
					  </ul>
					</div>
				  </div>
				  <div class="card-body p-0">
					
					<div class="student-name">John De marli. <span>Sep 01, 2023</span></div>
				  </div>              
				</div>  
                
				</div>
				
			</div>
		</div>

        <a class="btn btn-primary w-100 mt-4 d-md-none" href="#" role="link">Get started</a>
      </div>
    </div>

  </div>
</section>	
    <section class="mt-3">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="hiw-head">
						<h2 class="head-title">How it <span>works</span>?</h2>
						<p class="text-center">Get the perfect essay from EssayHelp in just three easy steps</p>
					</div>
				</div>
			</div>
			<div class="row gy-4 mt-2 mt-md-5">
				<div class="col-md-4">
					<div class="work-card h-100">
						<picture>
							<source media="(min-width:768px)" srcset="{{ asset('images/search-icon.svg') }}">
							<img src="{{ asset('images/search-icon.svg') }}" class="img-fluid" loading="lazy" alt="Essay Help" title="Essay Help"
								width="90" height="90">
						</picture>
						<div class="card-body text-center">
							<h3 class="card-title">Fill-in the details</h3>
							<p>Provide all the necessary details. Once you complete the order form and pay to write your essay, we will immediately start working on it.</p>
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="work-card h-100">
						<picture>
							<source media="(min-width:768px)" srcset="{{ asset('images/setting-icon.svg') }}">
							<img src="{{ asset('images/setting-icon.svg') }}" class="img-fluid" loading="lazy" alt="Essay Help" title="Essay Help"
								width="90" height="90">
						</picture>
						<div class="card-body text-center">
							<h3 class="card-title">Your writer assigned</h3>
							<p>Our team will review your order and select an expert essay writer to work on your paper.</p>
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="work-card h-100">
						<picture>
							<source media="(min-width:768px)" srcset="{{ asset('images/rocket-icon.svg') }}">
							<img src="{{ asset('images/rocket-icon.svg') }}" class="img-fluid" loading="lazy" alt="Essay Help" title="Essay Help"
								width="90" height="90">
						</picture>
						<div class="card-body text-center">
							<h3 class="card-title">Writing magic happens</h3>
							<p>Our experts are working tirelessly to write your paper. Then it will go through our quality assurance team.</p>
						</div>
					</div>
				</div>

			</div>

			<div class="text-center mt-4 mt-md-5 mb-4 ">
				<a class="btn btn-primary" href="#" role="link">Get started</a>
			</div>
		</div>
	</section>		
	<section class="mb-5">
		<div class="container">
			<div class="assign-box">
				<div class="row">
					<div class="col-md-6 d-flex flex-column justify-content-end">
						<div class="assign-content">
							<h2>All assignments can be done on time</h2>
							<p>Fast and professional help from certified <br> experts on Essay Help</p>
							<a class="btn btn-primary" href="#" role="button">Get started</a>
						</div>
					</div>
					<div class="col-md-6 text-center">
						<picture>
							<img src="{{ asset('images/img-01.png') }}" class="img-fluid card-img modal-img" alt="Essay Help" title="Essay Help" loading="lazy" width="542" height="415">
						</picture>
					</div>
				</div>	
			</div>
		</div>
	</section>		
	
	<section class="how-it-works-sec mb-5" style="background-color: #F5F8FE;">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="hiw-head">
						<h2 class="head-title">Why To Choose<br> <span> EssayHelp</span>?</h2>
						<h3>Because your Grades Matter!</h3>
						<p class="black text-center">The best UK based academic essay writers work for us. Each of them hold a minimum of a 2:1 UK Bachelor’s degree whilst 85% also hold a masters or PhD.</p>
					</div>
				</div>

			</div>
			<div class="row">
				<div class="col-sm-12 col-md-4">
					<div class="work-card h-100">
						<picture>
							<source media="(min-width:768px)" srcset="{{ asset('images/grade-icon.png') }}">
							<img src="{{ asset('images/grade-icon.png') }}" class="img-fluid" loading="lazy" alt="Essay Help" title="Essay Help" width="86" height="86">
						</picture>
						<div class="card-body text-center">
							<h3 class="card-title">Grade Gaurantee</h3>
							<p>In order to be successful, we understand the importance of good grades. We can guarantee your work will be written to the grade standard of your choosing.</p>
						</div>
					</div>
				</div>

				<div class="col-sm-12 col-md-4">
					<div class="blue-card h-100">
						<div class="work-card h-100">
							<picture>
								<source media="(min-width:768px)" srcset="{{ asset('images/support-icon.png') }}">
								<img src="{{ asset('images/support-icon.png') }}" class="img-fluid" loading="lazy" alt="Essay Help" title="Essay Help" width="86" height="86">
							</picture>
							<div class="card-body text-center">
								<h3 class="card-title">24/7 Support</h3>
								<p>We are available 24/7 via live chat, WhatsApp, e-mail and social media platforms.</p>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-12 col-md-4">
					<div class="work-card h-100">
						<picture>
							<source media="(min-width:768px)" srcset="{{ asset('images/quality-icon.png') }}">
							<img src="{{ asset('images/quality-icon.png') }}" class="img-fluid" loading="lazy" alt="Essay Help" title="Essay Help" width="86" height="86">
						</picture>
						<div class="card-body text-center">
							<h3 class="card-title">Quality Checked and Plagiarism Free</h3>
							<p>Our work goes through a rigorous quality check by our Quality Assurance Team.</p>
						</div>
					</div>
				</div>
			</div>		
		
		</div>
	</section>		
	
	<section class="mb-5">
		<div class="container">
			<div class="main-testimonial">
				<div class="slider slider-for">
					<div>
						<img src="{{ asset('images/youtube.png') }}" class="img-fluid card-img" alt="Essay Help" title="Essay Help" loading="lazy" width="542" height="415">
					</div>
					<div>
							<img src="{{ asset('images/youtube.png') }}" class="img-fluid card-img" alt="Essay Help" title="Essay Help" loading="lazy" width="542" height="415">
					</div>
					<div>
							<img src="{{ asset('images/youtube.png') }}" class="img-fluid card-img" alt="Essay Help" title="Essay Help" loading="lazy" width="542" height="415">
					</div>                
				</div>
				<div class="slider slider-nav">
					<div>                    
						<div class="card student-reveiw-card h-100">
							<div class="d-flex sr-block">
								<div class="student-photo">
									<picture>
										<source media="(min-width:768px)" srcset="{{ asset('images/mentor-1.png') }}">
										<img src="{{ asset('images/mentor-1.png') }}" class="img-fluid" loading="lazy" alt="Essay Help" title="Essay Help" width="65" height="65">
									</picture>
								</div>
								<div class="sr-list">
									<ul class="student-rating" data-rate="5">
										<li>Start 1</li>
										<li>Start 2</li>
										<li>Start 3</li>
										<li>Start 4</li>
										<li>Start 5</li>
									</ul>
								</div>
							</div>
							<div class="card-body p-0">
								<p class="card-text">My academic superhero arrived in the form of affordable, easy-to-use support. Courses conquered, stress conquered.</p>
								<div class="student-name">John De marli. <span>Sep 01, 2023</span></div>
							</div>              
						</div>
					</div>
					<div>                    
						<div class="card student-reveiw-card h-100">
							<div class="d-flex sr-block">
								<div class="student-photo">
									<picture>
										<source media="(min-width:768px)" srcset="{{ asset('images/student-2.png') }}">
										<img src="{{ asset('images/student-2.png') }}" class="img-fluid" loading="lazy" alt="Essay Help" title="Essay Help" width="65" height="65">
									</picture>
								</div>
								<div class="sr-list">
									<ul class="student-rating" data-rate="3">
										<li>Start 1</li>
										<li>Start 2</li>
										<li>Start 3</li>
										<li>Start 4</li>
										<li>Start 5</li>
									</ul>
								</div>
							</div>
							<div class="card-body p-0">
								<p class="card-text">My academic superhero arrived in the form of affordable, easy-to-use support. Courses conquered, stress conquered.</p>
								<div class="student-name">John De marli. <span>Sep 01, 2023</span></div>
							</div>              
						</div>
					</div>
					<div>                    
						<div class="card student-reveiw-card h-100">
							<div class="d-flex sr-block">
								<div class="student-photo">
									<picture>
										<source media="(min-width:768px)" srcset="{{ asset('images/student-2.png') }}">
										<img src="{{ asset('images/student-2.png') }}" class="img-fluid" loading="lazy" alt="Essay Help" title="Essay Help" width="65" height="65">
									</picture>
								</div>
								<div class="sr-list">
									<ul class="student-rating" data-rate="3">
										<li>Start 1</li>
										<li>Start 2</li>
										<li>Start 3</li>
										<li>Start 4</li>
										<li>Start 5</li>
									</ul>
								</div>
							</div>
							<div class="card-body p-0">
								<p class="card-text">My academic superhero arrived in the form of affordable, easy-to-use support. Courses conquered, stress conquered.</p>
								<div class="student-name">John De marli. <span>Sep 01, 2023</span></div>
							</div>              
						</div>
					</div>                
				</div>            
			</div>
			<div class="row gy-4">
				<div class="col-md-6">
					<div class="card tu-card h-100">
						<h2>Take control of your assignment workload with our experts</h2>
						<picture>
							<img src="{{ asset('images/girl.png') }}" class="img-fluid tu-img" alt="Essay Help" title="Essay Hel"
								loading="lazy" width="555" height="531">
						</picture>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card tu-card boy h-100">
						<h2>High quality delivery and 100% safe payments</h2>
						<picture>
							<img src="{{ asset('images/boy.png') }}" class="img-fluid tu-img" alt="Essay Help" title="Essay Hel"
								loading="lazy" width="555" height="531">
						</picture>
					</div>
				</div>
			</div>
			<div class="tu-second-block">
				<div class="row">
					<div class="col-md-6">
						<div class="tu-content">
							<h3>The Choice of students from <br> <span>Top Universities</span></h3>
							<p>TRUSTED BY 100,000 + STUDENTS FROM TOP-RATED UNIVERSITIES</p>
							<a class="btn btn-primary d-none d-md-block" href="#" role="button">Get started</a>
						</div>
					</div>
					<div class="col-md-6">
						<div class="overflow-hidden">
							<div class="verticle-marquee">
								<img src="{{ asset('images/tu-logo.png') }}" class="card-img-top mb-3" alt="Essay Help" title="Essay Hel" loading="lazy" width="474" height="464">
								
								<img src="{{ asset('images/tu-logo.png') }}" class="card-img-top" alt="Essay Help" title="Essay Hel" loading="lazy" width="474" height="464">
							</div>
						</div>
						<a class="btn btn-primary d-md-none w-100 mt-4" href="#" role="button">Get started</a>
					</div>
				</div>
			</div>
		</div>
	</section>		
	<section class="trophy-sec">
		<div class="container">
			<div class="trophy-box">
				<div class="card border-0">
					<picture>
						<source media="(min-width:768px)" srcset="{{ asset('images/trophy.png') }}">
						<img src="{{ asset('images/trophy-mobile.png') }}" class="img-fluid card-img" alt="Essay Help" title="Essay Help"
							width="1116" height="825">
					</picture>
					<div class="card-img-overlay">
						<div class="trophy-content">
							<h2 class="card-title">Grade-Boosting Essays: </h2>
							<p class="card-text">Our Precision Writers Hit Your Academic Target Every Time</p>
							<a class="btn btn-primary" href="#" role="button">Get started</a>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>		
	<section class="">
		<div class="container">
			<div class="wc-box">
				<div class="hiw-head">
					<h2 class="head-title">We can <span>assist</span> you with</h2>
				</div>
				<ul class="nav row row-cols-2 row-cols-lg-4 g-2 g-lg-3 wc-list gy-4">
					<li>
						<a href="#" class="nav-link">Assignment</a>
					</li>
					<li>
						<a href="#" class="nav-link">Case Study</a>
					</li>
					<li>
						<a href="#" class="nav-link">Research Paper</a>
					</li>
					<li>
						<a href="#" class="nav-link">Critical Thinking</a>
					</li>
					<li>
						<a href="#" class="nav-link">Thesis</a>
					</li>
					<li>
						<a href="#" class="nav-link">Term Paper</a>
					</li>
					<li>
						<a href="#" class="nav-link">FAQ</a>
					</li>
					<li>
						<a href="#" class="nav-link">Research Proposal</a>
					</li>
					<li>
						<a href="#" class="nav-link">Article Review</a>
					</li>
					<li>
						<a href="#" class="nav-link">Presentation</a>
					</li>
					<li>
						<a href="#" class="nav-link">Annotated Bibliography</a>
					</li>
					<li>
						<a href="#" class="nav-link">Business Plan</a>
					</li>
					<li>
						<a href="#" class="nav-link">Dissertation</a>
					</li>
				</ul>
			    
			</div>
		</div>
	</section>	
	
	<x-layout.faq />
	<script>
		$(function(){
			$('.select2').select2({  placeholder: 'Select an option'});
			add = function(obj) { 
				var count = $(obj).siblings('input').val();
				$(obj).siblings('input').val(parseInt(++count));
			}
			minus = function(obj) {
			var count = $(obj).siblings('input').val();
			if (count > 0) {
				$(obj).siblings('input').val(parseInt(count - 1));
				}
			}
		});
		</script>
@endsection