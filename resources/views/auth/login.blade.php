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
    </head>

    <body>

		<div id="app" class="login-page">

			<div class="container">
						
				<!-- Login Panel -->
				<div class="panel">
					<div class="row no-gutters">
	
						<div class="col-md-6">

							<div class="panel-body panel-form">

								<h1 class="form-title">Admin Login</h1>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="">{{ __('Email Address') }}</label>
                                            
                                        <div class="input-group input-group-merged input-group-password-toggle">
                                            <input type="text" name="email" class="form-control"  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"  placeholder="Enter email here..." autofocus>
                                            <div class="input-group-append">
                                                <span class="input-group-text bg-white">
                                                    <i class="far fa-envelope"></i>
                                                </span>
                                            </div>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="">Password</label>
                                            
                                        <div class="input-group input-group-merged input-group-password-toggle">
                                            <input type="password" name="password" class="form-control" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"  placeholder="Enter password here..." >

                                            <div class="input-group-append">
                                                <button class="btn btn-white btn-icon btn-password-toggle" type="button">
                                                    <svg class="icon-see" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M12.01 20c-5.065 0-9.586-4.211-12.01-8.424 2.418-4.103 6.943-7.576 12.01-7.576 5.135 0 9.635 3.453 11.999 7.564-2.241 4.43-6.726 8.436-11.999 8.436zm-10.842-8.416c.843 1.331 5.018 7.416 10.842 7.416 6.305 0 10.112-6.103 10.851-7.405-.772-1.198-4.606-6.595-10.851-6.595-6.116 0-10.025 5.355-10.842 6.584zm10.832-4.584c2.76 0 5 2.24 5 5s-2.24 5-5 5-5-2.24-5-5 2.24-5 5-5zm0 1c2.208 0 4 1.792 4 4s-1.792 4-4 4-4-1.792-4-4 1.792-4 4-4z"/></svg>
                                                    <svg class="icon-hide" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M8.137 15.147c-.71-.857-1.146-1.947-1.146-3.147 0-2.76 2.241-5 5-5 1.201 0 2.291.435 3.148 1.145l1.897-1.897c-1.441-.738-3.122-1.248-5.035-1.248-6.115 0-10.025 5.355-10.842 6.584.529.834 2.379 3.527 5.113 5.428l1.865-1.865zm6.294-6.294c-.673-.53-1.515-.853-2.44-.853-2.207 0-4 1.792-4 4 0 .923.324 1.765.854 2.439l5.586-5.586zm7.56-6.146l-19.292 19.293-.708-.707 3.548-3.548c-2.298-1.612-4.234-3.885-5.548-6.169 2.418-4.103 6.943-7.576 12.01-7.576 2.065 0 4.021.566 5.782 1.501l3.501-3.501.707.707zm-2.465 3.879l-.734.734c2.236 1.619 3.628 3.604 4.061 4.274-.739 1.303-4.546 7.406-10.852 7.406-1.425 0-2.749-.368-3.951-.938l-.748.748c1.475.742 3.057 1.19 4.699 1.19 5.274 0 9.758-4.006 11.999-8.436-1.087-1.891-2.63-3.637-4.474-4.978zm-3.535 5.414c0-.554-.113-1.082-.317-1.562l.734-.734c.361.69.583 1.464.583 2.296 0 2.759-2.24 5-5 5-.832 0-1.604-.223-2.295-.583l.734-.735c.48.204 1.007.318 1.561.318 2.208 0 4-1.792 4-4z"/></svg>
                                                </button>
                                            </div>

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror>

                                        </div>
                                    </div>

                                    <div class="form-group form-group-btns text-center">
                                        <div class="row no-gutters">
                                            <div class="col-md-6">
                                                <button type="submit" class="btn btn-block btn-lg btn-rounded btn-primary sharp-top-right">Sign In</button>
                                            </div>
                                            <div class="col-md-6">
                                                <a href="https::/incrediblevoicesmedia.com.ng" class="btn btn-block btn-lg btn-rounded btn-secondary sharp-top-left">Back</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
		
							</div>
	
						</div>
	
						<div class="col-md-6">

							<div class="panel-body panel-image" style="background-image: url({{asset('img/iv22.jpeg')}});">
		
							</div>
	
						</div>
					
					</div><!-- .row -->
				</div><!-- / Login Panel -->
					
			</div><!-- .container -->

		</div>

        <script src="{{asset('webfiles/js/vendor.js')}}"></script>
		<script src="{{ asset('js/app.js') }}"></script>

    </body>

</html> 

