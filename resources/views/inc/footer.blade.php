                    
                    </div><!-- / .page-content -->
                    <!-- Main Page Content -->

                    <!-- Footer -->
                    <div class="copyright row">
                        <div class="col-md-6 text-left">
                            &copy; Copyright {{date('Y')}} {{env('APP_NAME')}}.
                        </div>
                    </div><!-- / .copyright -->
                    <!-- / Footer -->

                </div><!-- / .page-container -->


            </main><!-- / .main-content -->

        </div><!-- / .page-wrapper -->
        <!-- / Wrapper Arround The Page -->


        <script src="{{ asset('js/vendor.js') }}"></script>
		<script src="{{ asset('js/app.js') }}"></script>
        <script src="{{asset('webfiles/layout-1/js/app.js')}}"></script>
         <!-- Page's links to JS dependencies goes here. -->
		<script src="{{asset('webfiles/vendor/jquery-validate/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('js/wizard-1.js') }}"></script>
		<script src="{{asset('webfiles/vendor/dropify/js/dropify.js')}}"></script>
		<script>
		
			$('.dropify').dropify();
		
		</script>


    </body>

</html>
