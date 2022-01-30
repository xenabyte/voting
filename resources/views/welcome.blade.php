<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>Incredible Voices Media | Cultural Epic</title>
        <meta name="description" content="Incredible Voices Media | Cultural Epic">

        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" type="image/png" href="{{asset('favico.ico') }}" sizes="32x32">
	    <link rel="apple-touch-icon" href="{{asset('favico.ico') }}">

        <link rel="stylesheet" href="{{asset('webfiles/css/vendor.css')}}">

       <!-- Fontawesome -->
		<link rel="stylesheet" href="{{asset('webfiles/css/font-awesome/5.13.1/css/all.min.css')}}"/>
        <!-- Dosis & Poppins Fonts -->
        <link href="{{asset('webfiles/css/fonts.googleapis.com/css2df2a.css?family=Dosis:wght@200;300;400;500;523;600;700;800&amp;family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap')}}" rel="stylesheet">

        <link rel="stylesheet" href="{{asset('webfiles/layout-1/css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/auth.css') }}">
		<link rel="stylesheet" href="{{asset('webfiles/vendor/dropify/css/dropify.css') }}">
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script type="text/javascript">

            window.ROOT_URL = "{{ url('/') }}"

        </script>
    </head>

    <body>
		@include('sweet::alert')

		<div id="app" class="login-page login-page-3">

			<div class="container">
						
				<!-- Login Panel -->
				<div class="panel shadow-lg">
					<div class="row no-gutters">
	
						<div class="col-md-2">

							<div class="panel-body panel-image" style="background-image: url('../../assets/auth/6047404.svg');">
		
							</div>
	
						</div>
	
						<div class="col-md-10">

							<div class="panel-body bg-white">

								<h1 class="form-title">{{ ucwords($category) }} Registration</h1>
                                <hr>
                                <div class="tabs-slider steps-6">
							
									<!-- Slider Animation -->
									<div class="panel">
				
										<ul class="nav nav-tabs nav-fill nav-custom-2 nav-custom-2">
											@if(empty($newCandidate))
												<li class="nav-item nav-item-active">
													<a class="nav-link" data-toggle="tab" href="#tabs-content-1" role="tab" aria-controls="tabs-content-1" aria-selected="true">
														<i class="fas fa-user-alt fa-2x"></i>
														<span>Bio Data</span>
													</a>
												</li>
												@if($category == 'kiddies')
												<li class="nav-item">
													<a class="nav-link" data-toggle="tab" href="#tabs-content-2" role="tab" aria-controls="tabs-content-2" aria-selected="true">
														<i class="fas fa-user-shield fa-2x"></i>
														<span>Guardian Data</span>
													</a>
												</li>
												@else
												<li class="nav-item">
													<a class="nav-link" data-toggle="tab" href="#tabs-content-2" role="tab" aria-controls="tabs-content-2" aria-selected="true">
														<i class="fas fa-user-check fa-2x"></i>
														<span>Personal Information</span>
													</a>
												</li>
												@endif
												<li class="nav-item">
													<a class="nav-link" data-toggle="tab" href="#tabs-content-3" role="tab" aria-controls="tabs-content-3" aria-selected="true">
														<i class="fas fa-camera-retro fa-2x"></i>
														<span>Upload Image</span>
													</a>
												</li>
												<li class="nav-item">
													<a class="nav-link" data-toggle="tab" href="#tabs-content-4" role="tab" aria-controls="tabs-content-4" aria-selected="true">
														<i class="fas fa-shield-alt fa-2x"></i> 
														<span>Terms and Conditions</span>
													</a>
												</li>
											@else
												<li class="nav-item nav-item-active">
													<a class="nav-link" data-toggle="tab" href="#tabs-content-1" role="tab" aria-controls="tabs-content-1" aria-selected="true">
														<i class="fas fa-credit-card fa-2x"></i>
														<span>Payment</span>
													</a>
												</li>
											@endif
										</ul>
										
										<div class="panel-body">
											
											<div class="row">
			
												<form action="{{ route('addCandidates') }}" class="col-md-12 my-2" method="post" enctype="multipart/form-data">
													@csrf
													<input type="hidden" name="category" value="{{ $category }}">
													<div id="tabs-content">
														<div class="tab-content">
															@if(empty($newCandidate))
																<div class="tab-pane fade show active" id="tabs-content-1" aria-expanded="true">

																	<div class="mx-auto" style="max-width: 500px;">

																		<h5>Bio Data</h5>
																		<hr>
																		<div class="form-group">
																			<label for="">Fullname</label>
																			<div class="input-group input-group-squared">
																				<input type="text" name="fullname" class="form-control" placeholder="Enter fullname here...">
																			</div>
																		</div>

																		<div class="form-group">
																			<label for="">Nickname</label>
																			<div class="input-group input-group-squared">
																				<input type="text" name="nickname" class="form-control" placeholder="Enter nickname here...">
																			</div>
																		</div>

																		<div class="form-group">
																			<label for="">Age</label>
																			<div class="input-group input-group-squared">
																				<input type="text" name="age" class="form-control" placeholder="Enter age here...">
																			</div>
																		</div>

																		<div class="form-group">
																			<label for="">Tribe</label>
																			<div class="input-group input-group-squared">
																				<input type="text" name="tribe" class="form-control" placeholder="Enter tribe here...">
																			</div>
																		</div>

																		<div class="form-group">
																			<label for="">State of Origin</label>
																			<div class="input-group input-group-squared">
																				<select name="state" id="state_of_origin" class="form-control">
																					<option value="" selected="selected" >- Select State of Origin -</option>
																					<option value='Abia'>Abia</option>
																					<option value='Adamawa'>Adamawa</option>
																					<option value='AkwaIbom'>AkwaIbom</option>
																					<option value='Anambra'>Anambra</option>
																					<option value='Bauchi'>Bauchi</option>
																					<option value='Bayelsa'>Bayelsa</option>
																					<option value='Benue'>Benue</option>
																					<option value='Borno'>Borno</option>
																					<option value='Cross River'>Cross River</option>
																					<option value='Delta'>Delta</option>
																					<option value='Ebonyi'>Ebonyi</option>
																					<option value='Edo'>Edo</option>
																					<option value='Ekiti'>Ekiti</option>
																					<option value='Enugu'>Enugu</option>
																					<option value='FCT'>FCT</option>
																					<option value='Gombe'>Gombe</option>
																					<option value='Imo'>Imo</option>
																					<option value='Jigawa'>Jigawa</option>
																					<option value='Kaduna'>Kaduna</option>
																					<option value='Kano'>Kano</option>
																					<option value='Katsina'>Katsina</option>
																					<option value='Kebbi'>Kebbi</option>
																					<option value='Kogi'>Kogi</option>
																					<option value='Kwara'>Kwara</option>
																					<option value='Lagos'>Lagos</option>
																					<option value='Nasarawa'>Nasarawa</option>
																					<option value='Niger'>Niger</option>
																					<option value='Ogun'>Ogun</option>
																					<option value='Ondo'>Ondo</option>
																					<option value='Osun'>Osun</option>
																					<option value='Oyo'>Oyo</option>
																					<option value='Plateau'>Plateau</option>
																					<option value='Rivers'>Rivers</option>
																					<option value='Sokoto'>Sokoto</option>
																					<option value='Taraba'>Taraba</option>
																					<option value='Yobe'>Yobe</option>
																					<option value='Zamfara'>Zamafara</option>
																				</select>
																			</div>
																		</div>

																		<div class="field-row">
																			<div class="form-group text-right">
																				<button type="button" class="btn btn-primary px-5 wizard-navigator" data-target="tabs-content-2">Next</button>
																			</div>
																		</div>
																		
																	</div>

																</div>
																@if($category == 'kiddies')
																<div class="tab-pane fade" id="tabs-content-2" aria-expanded="true">

																	<div class="mx-auto" style="max-width: 500px;">

																		<h5>Guardian Data</h5>
				
																		<div class="form-group">
																			<label for="">Guardian Name</label>
																			<div class="input-group input-group-squared">
																				<input type="text" name="guardian_name" class="form-control" placeholder="Enter guardian name here...">
																			</div>
																		</div>

																		<div class="form-group">
																			<label for="">Guardian Email</label>
																			<div class="input-group input-group-squared">
																				<input type="text" name="guardian_email" class="form-control" placeholder="Enter guardian email here...">
																			</div>
																		</div>


																		<div class="form-group">
																			<label for="">Guardian Address</label>
																			<div class="input-group input-group-squared">
																				<input type="text" name="guardian_address" class="form-control" placeholder="Enter guardian address here...">
																			</div>
																		</div>

																		<div class="form-group">
																			<label for="">Guardian Phone Number</label>
																			<div class="input-group input-group-squared">
																				<input type="text" name="guardian_phone_number" class="form-control" placeholder="Enter guardian phone number here...">
																			</div>
																		</div>

																		<div class="form-group">
																			<label for="">Relationship</label>
																			<div class="input-group input-group-squared">
																				<input type="text" name="relationship" class="form-control" placeholder="Enter your relationship with contestant here...">
																			</div>
																		</div>
									
																		<div class="field-row">
																			<div class="form-group text-right">
																				<button type="button" class="btn btn-secondary ml-2 wizard-navigator" data-target="tabs-content-1">Back</button>
																				<button type="button" class="btn btn-primary px-5 wizard-navigator" data-target="tabs-content-3">Next</button>
																			</div>
																		</div>

																	</div>
				
																</div>
																@else

																<div class="tab-pane fade" id="tabs-content-2" aria-expanded="true">

																	<div class="mx-auto" style="max-width: 500px;">

																		<h5>Personal info</h5>

																		<div class="form-group">
																			<label for="">Email</label>
																			<div class="input-group input-group-squared">
																				<input type="text" name="email" class="form-control" placeholder="Enter email here...">
																			</div>
																		</div>


																		<div class="form-group">
																			<label for="">Address</label>
																			<div class="input-group input-group-squared">
																				<input type="text" name="address" class="form-control" placeholder="Enter address here...">
																			</div>
																		</div>

																		<div class="form-group">
																			<label for="">Phone Number</label>
																			<div class="input-group input-group-squared">
																				<input type="text" name="phone_number" class="form-control" placeholder="Enter phone number here...">
																			</div>
																		</div>

																		<div class="form-group">
																			<label for="">Aquired Skill(s)</label>
																			<div class="input-group input-group-squared">
																				<input type="text" name="skills" class="form-control" placeholder="Enter your skill(s) separated by comma (,) here...">
																			</div>
																		</div>

																		<div class="form-group">
																			<label for="">Other Language(s) Spoken</label>
																			<div class="input-group input-group-squared">
																				<input type="text" name="languages" class="form-control" placeholder="Enter your language(s) separated by comma (,) here...">
																			</div>
																		</div>

																		<div class="form-group">
																			<label for="">Occupation</label>
																			<br>
																			<code>Occupation(if student) specify the name of school, e.g Student(Federal University Lokoja)</code>
																			<div class="input-group input-group-squared">
																				<input type="text" name="occupation" class="form-control" placeholder="Enter your Occupation here...">
																			</div>
																		</div>
									
																		<div class="field-row">
																			<div class="form-group text-right">
																				<button type="button" class="btn btn-secondary ml-2 wizard-navigator" data-target="tabs-content-1">Back</button>
																				<button type="button" class="btn btn-primary px-5 wizard-navigator" data-target="tabs-content-3">Next</button>
																			</div>
																		</div>

																	</div>
				
																</div>
																@endif

																<div class="tab-pane fade" id="tabs-content-3" aria-expanded="true">

																	<div class="mx-auto" style="max-width: 500px;">

																		<h5>Upload Image</h5>
				
																		<div class="form-group row">
																			<code class="col-md-12 pt-2">Maximum file size="3MB"</code>
																			<div class="col-md-12 mt-4">
																				<input type="file" name="image" class="dropify" data-max-file-size="3M"  data-allowed-file-extensions="jpg png" data-default-file="{{asset('img/placeholder.jpg')}}">
																			</div>
																		</div>

																		<div class="field-row">
																			<div class="form-group text-right">
																				<button type="button" class="btn btn-secondary ml-2 wizard-navigator" data-target="tabs-content-2">Back</button>
																				<button type="button" class="btn btn-primary px-5 wizard-navigator" data-target="tabs-content-4">Next</button>
																			</div>
																		</div>

																	</div>
				
																</div>
																
																@if($category == 'kiddies')
																<div class="tab-pane fade" id="tabs-content-4" aria-expanded="true">

																	<div class="mx-auto" style="max-width: 500px;">
																		<h5>Terms and conditions</h5>
																		<p>Please note that all registration and Grand Finale for the {{date("Y")}} edition is online.  Registration fee and the tally  votes and other fees for all contestants are <strong>Non-Refundable</strong> ,</p>
																		<p>Please note that there will be three stages in this competition which are <strong>social media likes , youtube view and tallyvote</strong> <br> The brand will own the photos and video shoots to promote the pageant and <strong> we want to clearify that you understand and agree with rules and regulation.</strong></p> 
																		<p></p>
																		<h6>IMPORTANT</h6>
																		<p>We reserve the right to remove from the contestant without any prior notice, any delegate who in the organizer's opinion jeopardize the security and peace of other contestants, official functions, or is a bad influence on the smooth running of the event and the brand during their reign. </p>

																		<h6>ATTESTATION</h6>
																		<p><i>I as a Parent/Guardian,  if my ward/ Child happens to be the winner of cultural epic pageant 2022, I Undertake with idea from the organizers  to do ensure my child/ward carry out a  community Reach out pet project.  If  we don't do any pet project within the period of reign, I shall refund to the brand 50% of the winning sum given to my ward/child
																		I will within my power and effort be ready to work with the brand and her activities on everything that is positive and will bring good to the betterment of the brand and to my ward/child.</i></p>
								
																		<br><hr>
																		<div class="input-group input-group-squared">
																			<input type="checkbox" required class="form-control"> <h6>I agree and understand the terms and conditions</h6>
																		</div>
																		<br><hr>
																		<div class="field-row">
																			<div class="form-group text-right">
																				<button type="button" class="btn btn-secondary ml-2 wizard-navigator" data-target="tabs-content-3">Back</button>
																				<button type="Submit" class="btn btn-primary px-5 wizard-navigator"">Submit</button>
																			</div>
																		</div>

																	</div>
				
																</div>
																@else

																<div class="tab-pane fade" id="tabs-content-4" aria-expanded="true">

																	<div class="mx-auto" style="max-width: 500px;">

																		<h5>Terms and conditions</h5>
				
																		<p>Please note that all registration and Grand Finale for the {{date("Y")}} edition is online.  Registration fee and the tally  votes and other fees for all contestants are Non-Refundable,</p>
																		<p>Please note that there will be three stages in this competition which are <strong>social media likes , youtube view and tallyvote</strong> <br> The brand will own the photos and video shoots to promote the pageant and <strong> we want to clearify that you understand and agree with rules and regulation.</strong></p> 
																		<p></p>
																		<h6>IMPORTANT</h6>
																		<p>We reserve the right to remove from the contestant without any prior notice, any delegate who in the organizer's opinion jeopardize the security and peace of other contestants, official functions, or is a bad influence on the smooth running of the event and the brand during their reign. </p>

																		<h6>ATTESTATION</h6>
																		<p><i>You, if it happen to be the winner of cultural epic pageant 2022, Undertake to do a community Reach out pet project, if you don't do my pet project within the period of reign, I shall refund to the brand 50% of the winning sum. you will within your power and effort be ready to work with the brand and her activities on everything that is positive and will bring good to the betterment of the brand.</i></p>
								
																		<br><hr>
																		<div class="input-group input-group-squared">
																			<input type="checkbox" required class="form-control"> <h6>I agree and understand the terms and conditions</h6>
																		</div>
																		<hr>

																		<br><hr>
																		<div class="field-row">
																			<div class="form-group text-right">
																				<button type="button" class="btn btn-secondary ml-2 wizard-navigator" data-target="tabs-content-3">Back</button>
																				<button type="Submit" class="btn btn-primary px-5 wizard-navigator">Submit</button>
																			</div>
																		</div>

																	</div>
				
																</div>

																@endif
														
															@else
																<div class="tab-pane fade show active" id="tabs-content-1" aria-expanded="true">
																	<input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
																	<input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> {{-- required --}}
																	<input type="hidden" name="metadata" value="{{ json_encode($array = [
																			'email' => $category == 'kiddies' ? $newCandidate['guardian_email'] : $newCandidate['email'],
																			'category' => $category,
																			'edition_id' => $newCandidate['edition_id'],
																			'fullname' => $newCandidate['fullname'],
																			'nickname' => $newCandidate['nickname'],
																			'age' => $newCandidate['age'],
																			'tribe' => $newCandidate['tribe'],
																			'state_of_origin'=> $newCandidate['state_of_origin'],
																			'guardian_name'=> $newCandidate['guardian_name'],
																			'guardian_email' => $newCandidate['guardian_email'],
																			'guardian_address' => $newCandidate['guardian_address'],
																			'guardian_phone_number' => $newCandidate['guardian_phone_number'],
																			'relationship'=> $newCandidate['relationship'],
																			'email'=> $newCandidate['email'],
																			'address' =>$newCandidate['address'],
																			'phone_number' => $newCandidate['phone_number'],
																			'skills' => $newCandidate['skills'],
																			'languages'=> $newCandidate['languages'],
																			'occupation'=> $newCandidate['occupation'],
																			'image' => $newCandidate['image']
																		]) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
																	<input type="hidden" n	ame="amount" value="{{ $category == 'kiddies' ? ($edition->registration_amount - 500)*100 : $edition->registration_amount * 100 }}">
																	<input type="hidden" name="email" value="{{ $category == "kiddies" ? $newCandidate['guardian_email'] : $newCandidate['email'] }}">

																	<div class="mx-auto" style="max-width: 500px;">
																		<div class="row">
									
																			<div class="col-md-12">
										
																				<div class="card mb-4 card-6">
																					<div class="card-header">
																						<img src="{{ $newCandidate['image'] }}" class="avatar rounded-circle" alt="Avatar image">
																						<div>
																							<span class="user-name">{{ $newCandidate['fullname'] }}</span>
																							<span class="badge badge-primary-light">Age: {{ $newCandidate['age'] }} || {{ $category }} Category</span>
																						</div>
																					</div>
																					<div class="card-body">
																						<hr>
																						<p class="card-text">
																							Email: {{ $category == "kiddies" ? $newCandidate['guardian_email'] : $newCandidate['email'] }} <br>
																							Phone Number: {{ $category == "kiddies" ? $newCandidate['guardian_phone_number'] : $newCandidate['phone_number'] }} <br>
																							Address: {{ $category == "kiddies" ? $newCandidate['guardian_address'] : $newCandidate['address'] }} <br>
																						</p>
																						<hr>
																						<h3 class="text-center">NGN{{ $category == 'kiddies' ? ($edition->registration_amount - 500) : $edition->registration_amount }}</h3>
																						<hr>
																					</div>
																				</div>
										
																			</div>
																		</div>

																		<div class="field-row text-center">
																			<div class="form-group">
																				<button type="Submit" class="btn btn-primary px-5 wizard-navigator" >Pay Now</button>
																			</div>
																		</div>
																		
																	</div>

																</div>
															@endif														
														</div>
													</div>

												</form>
			
											</div>
										</div>
									</div><!-- / Slider Animation -->

								</div>

							</div>
	
						</div>
					
					</div><!-- .row -->
				</div><!-- / Login Panel -->

                <br>
					
			</div><!-- .container -->

		</div>

        <script src="{{ asset('js/vendor.js') }}"></script>
		<script src="{{ asset('js/app.js') }}"></script>
         <!-- Page's links to JS dependencies goes here. -->
		<script src="{{asset('webfiles/vendor/jquery-validate/jquery.validate.min.js') }}"></script>
        <script src="{{asset('webfiles/vendor/layout-1/js/app.js') }}"></script>
        <script src="{{ asset('js/wizard-1.js') }}"></script>
		<script src="{{asset('webfiles/vendor/dropify/js/dropify.js')}}"></script>
		<script>
		
			$('.dropify').dropify();
		
		</script>

    </body>

</html> 