@include('inc/header')

<header>
    <div class="row">
        <div class="col-md-6">
            <h1 class="mb-0">Candidates</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0 mt-3 p-0 breadcrumbs-chevron">
                    <li class="breadcrumb-item"><a href="{{ route('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Candidates</a></li>
                </ol>
            </nav>
        </div>
    </div>
</header>


<!-- Custom Animated Justified Tabs -->
<div class="panel panel-light">
    <div class="panel-header">
        <h1 class="panel-title">{{ $edition->name .' '. $edition->year }} Candidates</h1>
    </div>
    <div class="panel-body">
        <div class="row">

            <div class="col-md-12 my-2">
                <ul class="nav nav-tabs nav-fill tabs-underlined nav-tabs-animated" id="custom-animated-justified-tabs-list" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-animated-justified-tab-1" data-toggle="tab" href="#custom-animated-justified-tab-content-1" role="tab" aria-controls="custom-animated-justified-tab-content-1" aria-selected="true">Adult Candidates</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-animated-justified-tab-2" data-toggle="tab" href="#custom-animated-justified-tab-content-2" role="tab" aria-controls="custom-animated-justified-tab-content-2" aria-selected="false">Kid Candidates</a>
                    </li>
                    <li class="nav-floor"></li>
                </ul>
                <div class="tab-content p-4" id="custom-animated-justified-tabs-content">
                    <div class="tab-pane fade show active" id="custom-animated-justified-tab-content-1" role="tabpanel" aria-labelledby="custom-animated-justified-tab-1">
                        <h4 class="mb-3">Adult Candidates</h4>
                        <hr>
                    
                        <div class="row">
                        @foreach($candidates->where('category', 'adult') as $candidate)
							<div class="col-md-4">

								<div class="card mt-24 card-user-profile-2">
									<div class="card-header">
										<h6 class="card-title">Una Blick</h6>
										<div class="dropdown">
											<button class="btn btn-link dropdown-toggle dropdown-nocaret" type="button" id="dropdownMenuButtonDefault" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i class="fas fa-ellipsis-v"></i>
											</button>
											<div class="dropdown-menu" aria-labelledby="dropdownMenuButtonDefault">
												<a href="#" class="dropdown-item" data-toggle="modal" data-target="#view-modal">
													<i class="fas fa-user"></i>
													<span>View</span>
												</a>
												<a href="#" class="dropdown-item">
													<i class="fas fa-trash-alt"></i>
													<span>Delete</span>
												</a>
											</div>
										</div>
									</div>
									<div class="card-body">
										<div class="col-avatar">
											<div class="user-avatar">
												<img src="../../../assets/avatars/15.jpg" class="avatar avatar rounded-circle" alt="Avatar image">
											</div>
										</div>
										<div class="col-info">
											<h6 class="user-name mb-3"><span class="badge badge-success">Featured Author</span></h6>
											<p>
												A professional UX designer, looking for inspiration...
											</p>
											
											<div class="social-btns">
												<a href="#" class="btn btn-light">
													<i class="fab fa-whatsapp"></i>
												</a>
												<a href="#" class="btn btn-light">
													<i class="fab fa-twitter"></i>
												</a>
												<a href="#" class="btn btn-light">
													<i class="fab fa-instagram"></i>
												</a>
											</div>
										</div>
									</div>
								</div>

							</div>

                            {{-- view candidates modal --}}
                            <div class="modal fade show" tabindex="-1" role="dialog" id="view-modal">
                                <div class="modal-dialog modal-dialog-centered" role="document" style=" max-width: 360px;">
                                    <div class="modal-content modal-form">
                                        <div class="modal-body pb-4">
                                            <div class="icon-box">
                                                <i class="fas fa-user"></i>
                                            </div>

                                            <form class="pt-3">

                                                <div class="form-group">
                                                    <label for="">Email</label>

                                                    <div class="input-group input-group-merged input-group-password-toggle">
                                                        <input type="text" class="form-control" placeholder="Enter email here...">
                                                        <div class="input-group-append">
                                                            <span class="input-group-text bg-white">
                                                                <i class="far fa-envelope"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="form-group">
                                                    <label for="">Password</label>

                                                    <div class="input-group input-group-merged input-group-password-toggle">
                                                        <input type="password" class="form-control" placeholder="Enter password here...">
                                                        <div class="input-group-append">
                                                            <button class="btn btn-white btn-icon btn-password-toggle" type="button">
                                                                <svg class="icon-see" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M12.01 20c-5.065 0-9.586-4.211-12.01-8.424 2.418-4.103 6.943-7.576 12.01-7.576 5.135 0 9.635 3.453 11.999 7.564-2.241 4.43-6.726 8.436-11.999 8.436zm-10.842-8.416c.843 1.331 5.018 7.416 10.842 7.416 6.305 0 10.112-6.103 10.851-7.405-.772-1.198-4.606-6.595-10.851-6.595-6.116 0-10.025 5.355-10.842 6.584zm10.832-4.584c2.76 0 5 2.24 5 5s-2.24 5-5 5-5-2.24-5-5 2.24-5 5-5zm0 1c2.208 0 4 1.792 4 4s-1.792 4-4 4-4-1.792-4-4 1.792-4 4-4z"></path></svg>
                                                                <svg class="icon-hide" width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M8.137 15.147c-.71-.857-1.146-1.947-1.146-3.147 0-2.76 2.241-5 5-5 1.201 0 2.291.435 3.148 1.145l1.897-1.897c-1.441-.738-3.122-1.248-5.035-1.248-6.115 0-10.025 5.355-10.842 6.584.529.834 2.379 3.527 5.113 5.428l1.865-1.865zm6.294-6.294c-.673-.53-1.515-.853-2.44-.853-2.207 0-4 1.792-4 4 0 .923.324 1.765.854 2.439l5.586-5.586zm7.56-6.146l-19.292 19.293-.708-.707 3.548-3.548c-2.298-1.612-4.234-3.885-5.548-6.169 2.418-4.103 6.943-7.576 12.01-7.576 2.065 0 4.021.566 5.782 1.501l3.501-3.501.707.707zm-2.465 3.879l-.734.734c2.236 1.619 3.628 3.604 4.061 4.274-.739 1.303-4.546 7.406-10.852 7.406-1.425 0-2.749-.368-3.951-.938l-.748.748c1.475.742 3.057 1.19 4.699 1.19 5.274 0 9.758-4.006 11.999-8.436-1.087-1.891-2.63-3.637-4.474-4.978zm-3.535 5.414c0-.554-.113-1.082-.317-1.562l.734-.734c.361.69.583 1.464.583 2.296 0 2.759-2.24 5-5 5-.832 0-1.604-.223-2.295-.583l.734-.735c.48.204 1.007.318 1.561.318 2.208 0 4-1.792 4-4z"></path></svg>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>

                    </div>
                    <div class="tab-pane fade" id="custom-animated-justified-tab-content-2" role="tabpanel" aria-labelledby="custom-animated-justified-tab-2">
                        <h4 class="mb-3">Kid Candidates</h4>
                        <hr>
                
                        <div class="row">
                            @foreach($candidates->where('category', 'kiddies') as $candidate)
							<div class="col-md-4">
                            
								<div class="card mt-24 card-user-profile-2">
									<div class="card-header">
										<h6 class="card-title">Una Blick</h6>
										<div class="dropdown">
											<button class="btn btn-link dropdown-toggle dropdown-nocaret" type="button" id="dropdownMenuButtonDefault" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i class="fas fa-ellipsis-v"></i>
											</button>
											<div class="dropdown-menu" aria-labelledby="dropdownMenuButtonDefault">
												<a href="#" class="dropdown-item">
													<i class="fas fa-user"></i>
													<span>Profile</span>
												</a>
												<a href="#" class="dropdown-item">
													<i class="fas fa-trash-alt"></i>
													<span>Delete</span>
												</a>
											</div>
										</div>
									</div>
									<div class="card-body">
										<div class="col-avatar">
											<div class="user-avatar">
												<img src="../../../assets/avatars/15.jpg" class="avatar avatar rounded-circle" alt="Avatar image">
											</div>
										</div>
										<div class="col-info">
											<h6 class="user-email text-lowercase mb-2"><a href="https://exon.arsaland.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="10657e713e727c79737b50777d71797c3e737f7d">[email&#160;protected]</a></h6>
											<h6 class="user-name mb-3"><span class="badge badge-success">Featured Author</span></h6>
											<p>
												A professional UX designer, looking for inspiration...
											</p>
											
											<div class="social-btns">
												<a href="#" class="btn btn-light">
													<i class="fab fa-whatsapp"></i>
												</a>
												<a href="#" class="btn btn-light">
													<i class="fab fa-twitter"></i>
												</a>
												<a href="#" class="btn btn-light">
													<i class="fab fa-instagram"></i>
												</a>
											</div>
										</div>
									</div>
								</div>

							</div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div><!-- / Custom Animated Justified Tabs -->




@include('inc/footer')