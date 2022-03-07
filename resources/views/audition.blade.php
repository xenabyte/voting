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
        <link rel="stylesheet" href="{{asset('webfiles/css/errors/errors.css') }}">
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script type="text/javascript">

            window.ROOT_URL = "{{ url('/') }}"

        </script>
    </head>

    <body>
		@include('sweet::alert')

        <div id="app" class="error-pages error-page-4">

			<!-- Error Panel -->
			<div class="panel">
				<div class="row no-gutters">

					<div class="col-md-6"><div class="example-area justify-content-start" style="min-height: 477px;" data-title="Contestants">

                        <div class="carousel-width">
                            <div id="carouselExampleWithCaptions" class="carousel slide panel-body panel-image" data-ride="carousel">
                            
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="{{asset('img/iv22.jpeg')}}" class="d-block w-100" alt="">
                                    </div>
                                    @foreach($contestants as $contestant)
                                        @if($contestant->candidate->category == $category &&  $contestant->status == 1)
                                        <div class="carousel-item">
                                            <img src="{{ env('APP_URL').'/'.$contestant->image }}" class="d-block w-100" alt="">
                                            <div class="carousel-caption  d-md-block">
                                                <h3>{{ $contestant->candidate->nickname }}</h3>
                                            </div>
                                        </div>
                                        @endif
                                    @endforeach
                                      
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleWithCaptions" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleWithCaptions" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>

                    </div>

                        
					</div>

					<div class="col-md-6 col-error">

						<div class="panel-body " style="margin-top:40%">

							<div style="width: 100%;">
								<h1 style="font-size: 40px" class="error-code text-danger">We are unvieling the {{ $category }} contestants in Audition</h1>
								<h2 class="error-title">Start picking your favourite</h2>
							</div>
	
						</div>

					</div>
				
				</div><!-- .row -->
			</div><!-- / Error Panel -->
					
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