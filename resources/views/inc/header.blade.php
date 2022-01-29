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
        <link rel="stylesheet" href="{{asset('css/plyr.css') }}">
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


        <script type="text/javascript">

            window.ROOT_URL = "{{ url('/') }}"

        </script>
    </head>

    <body>

        @include('sweet::alert')

        <!-- Wrapper Arround The Page -->
        <div class="page-wrapper sidebar-open ">

            <!-- Sidebar -->
            <nav id="sidebar" class="sidebar">
                <div class="sidebar-brand">
                    <img src="{{asset('logo.png') }}" class="img" style="width: 70%; height: 100%" width="100" height="100" alt="">
                </div>
                <hr>
                <ul class="sidebar-menu">
                    <li class="active current">
                        <a href="{{ url('/') }}">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M 16 5 C 12.1 5 9 8.1 9 12 C 9 14.4375 10.209961 16.561523 12.070312 17.8125 C 8.5100119 19.34733 6 22.893578 6 27 L 8 27 C 8 22.6 11.6 19 16 19 C 17.2 19 18.400391 19.300781 19.400391 19.800781 C 19.700391 19.200781 20 18.599609 20.5 18.099609 C 20.300978 18.000099 20.095641 17.921082 19.892578 17.833984 C 21.77227 16.586133 23 14.452401 23 12 C 23 8.1 19.9 5 16 5 z M 16 7 C 18.8 7 21 9.2 21 12 C 21 14.8 18.8 17 16 17 C 13.2 17 11 14.8 11 12 C 11 9.2 13.2 7 16 7 z M 25 18 C 22.8 18 21 19.8 21 22 L 21 24 L 18 24 L 18 32 L 32 32 L 32 24 L 29 24 L 29 22 C 29 19.8 27.2 18 25 18 z M 25 20 C 26.1 20 27 20.9 27 22 L 27 24 L 23 24 L 23 22 C 23 20.9 23.9 20 25 20 z M 20 26 L 30 26 L 30 30 L 20 30 L 20 26 z"/></svg>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://tau.edu.ng">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M 16 5.9375 L 15.625 6.0625 L 5.625 10.0625 L 3.3125 11 L 5.625 11.9375 L 9.53125 13.5 L 5.625 15.0625 L 3.3125 16 L 5.625 16.9375 L 9.53125 18.5 L 5.625 20.0625 L 3.3125 21 L 5.625 21.9375 L 15.625 25.9375 L 16 26.0625 L 16.375 25.9375 L 26.375 21.9375 L 28.6875 21 L 26.375 20.0625 L 22.46875 18.5 L 26.375 16.9375 L 28.6875 16 L 26.375 15.0625 L 22.46875 13.5 L 26.375 11.9375 L 28.6875 11 L 26.375 10.0625 L 16.375 6.0625 Z M 16 8.09375 L 23.28125 11 L 16 13.90625 L 8.71875 11 Z M 12.25 14.59375 L 15.625 15.9375 L 16 16.0625 L 16.375 15.9375 L 19.75 14.59375 L 23.28125 16 L 16 18.90625 L 8.71875 16 Z M 12.25 19.59375 L 15.625 20.9375 L 16 21.0625 L 16.375 20.9375 L 19.75 19.59375 L 23.28125 21 L 16 23.90625 L 8.71875 21 Z"/></svg>
                            <span>Website</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M 6 3 L 6 29 L 26 29 L 26 3 Z M 8 5 L 24 5 L 24 27 L 8 27 Z M 10 7 L 10 13 L 22 13 L 22 7 Z M 12 9 L 20 9 L 20 11 L 12 11 Z M 11 15 L 11 17 L 13 17 L 13 15 Z M 15 15 L 15 17 L 17 17 L 17 15 Z M 19 15 L 19 17 L 21 17 L 21 15 Z M 11 19 L 11 21 L 13 21 L 13 19 Z M 15 19 L 15 21 L 17 21 L 17 19 Z M 19 19 L 19 21 L 21 21 L 21 19 Z M 11 23 L 11 25 L 13 25 L 13 23 Z M 15 23 L 15 25 L 17 25 L 17 23 Z M 19 23 L 19 25 L 21 25 L 21 23 Z"/></svg>
                            <span>Student Portal</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M 6 4 L 6 28 L 26 28 L 26 4 Z M 8 6 L 24 6 L 24 11 L 8 11 Z M 8 13 L 24 13 L 24 19 L 8 19 Z M 8 21 L 24 21 L 24 26 L 8 26 Z"/></svg>
                            <span>Tau Directory</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M 5 5 L 5 27 L 27 27 L 27 5 L 5 5 z M 7 7 L 15 7 L 15 15 L 7 15 L 7 7 z M 17 7 L 25 7 L 25 15 L 17 15 L 17 7 z M 7 17 L 15 17 L 15 25 L 7 25 L 7 17 z M 17 17 L 25 17 L 25 25 L 17 25 L 17 17 z"/></svg>
                            <span>E-Library</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><path d="M 10 5 L 10 7 L 12 7 C 13.667969 7 15 8.332031 15 10 L 15 14 L 12 14 L 12 16 L 15 16 L 15 22 C 15 23.667969 13.667969 25 12 25 L 10 25 L 10 27 L 12 27 C 13.632813 27 15.085938 26.1875 16 24.96875 C 16.914063 26.1875 18.367188 27 20 27 L 22 27 L 22 25 L 20 25 C 18.332031 25 17 23.667969 17 22 L 17 16 L 20 16 L 20 14 L 17 14 L 17 10 C 17 8.332031 18.332031 7 20 7 L 22 7 L 22 5 L 20 5 C 18.367188 5 16.914063 5.8125 16 7.03125 C 15.085938 5.8125 13.632813 5 12 5 Z"/></svg>
                            <span>Webmail</span>
                        </a>
                    </li>
                </ul>
                <hr>

                <div class="sidebar-footer">
                    <img src="{{asset('webfiles/svg/undraw/undraw_fitness_tracker_3033.svg')}}" alt="Download App" class="img-responsive">

                    <h6>Coming Soon!</h6>

                    <a href="#" role="button" class="btn btn-icon btn-square btn-dark">
                        <i class="fab fa-apple"></i>
                    </a>
                    <a href="#" role="button" class="btn btn-icon btn-square btn-dark">
                        <i class="fab fa-google-play"></i>
                    </a>
                </div>
            </nav>
            <!-- / Sidebar -->

            <main class="main-content">

                <div class="sidebar-backdrop"></div>

                <div class="page-container">
                    <!-- Header Nav -->
                    <div class="navigation-wrapper">

                        <nav class="navbar navbar-top navbar-expand-lg navbar-light bg-white">
                            <div class="container-fluid">
                                <button class="navbar-toggler navbar-toggler-css navbar-menu-toggler collapsed sidebar-toggler">
                                    <span class="line"></span>
                                    <span class="line"></span>
                                    <span class="line"></span>
                                </button>
                                <button class="navbar-toggler navbar-toggler-css-reverse navbar-menu-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbar-top-collapsible" aria-controls="navbar-top-collapsible" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="line"></span>
                                    <span class="line"></span>
                                    <span class="line"></span>
                                </button>
                            </div>
                        </nav>

                        <nav class="navbar navbar-toolbar navbar-expand-lg navbar-light">
                            <div class="container-fluid">
                                <ul class="navbar-nav navbar-menu-primary">
                                    
                                </ul>
                            </div>
                        </nav>

                    </div>
                    <!-- / Header Nav -->

