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

					<div class="col-md-6">

						<div class="panel-body panel-image" style="background-image: url({{asset('img/iv22.jpeg')}});">
	
						</div>

					</div>

					<div class="col-md-6 col-error">

						<div class="panel-body panel-error">

							<div>
								<h1 style="font-size: 45px" class="error-code text-danger">The wait is finally over</h1>
								<h2 class="error-title">Shush! Let's get started</h2>
                                
								<a href="{{ url('/registration/kiddies') }}" class="btn btn-info">Kiddies Registration</a>

                                <a href="{{ url('/registration/adult') }}" class="btn btn-warning">Adult Registration</a>
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