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
                                    <h6 class="card-title">{{ $candidate->fullname }}</h6>
                                    <div class="dropdown">
                                        <button class="btn btn-link dropdown-toggle dropdown-nocaret" type="button" id="dropdownMenuButtonDefault" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonDefault">
                                            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#viewAdultCandidate">
                                                <i class="fas fa-eye"></i>
                                                <span>View Candidate</span>
                                            </a>
                                            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#makeAdultContestant">
                                                <i class="fas fa-check"></i>
                                                <span>Make Contestant</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="col-avatar">
                                        <div class="user-avatar">
                                            <img src="{{ $candidate->image }}" class="avatar avatar rounded-circle" alt="Avatar image">
                                        </div>
                                    </div>
                                    <div class="col-info">
                                        <h6 class="user-email text-lowercase mb-2"><a href="">{{ $candidate->email }}</a></h6>
                                        <h6 class="user-name mb-3"><span class="badge badge-success">Nickname: {{ $candidate->nickname }}</span></h6>
                                        <p>
                                            Age: {{ $candidate->age }} <br>
                                            Phone number: {{ $candidate->phone_number}} <br>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" tabindex="-1" role="dialog" id="makeAdultContestant">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Candidates 0{{ $candidate->id}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="#333333" viewBox="0 0 24 24" width="24" height="24"><path d="M16.24 14.83a1 1 0 0 1-1.41 1.41L12 13.41l-2.83 2.83a1 1 0 0 1-1.41-1.41L10.59 12 7.76 9.17a1 1 0 0 1 1.41-1.41L12 10.59l2.83-2.83a1 1 0 0 1 1.41 1.41L13.41 12l2.83 2.83z"/></svg>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <hr>
                                        <div class="card mb-4 card-5">
                                            <div class="row no-gutters">
                                                <div class="col-md-4 col-img" style="background-image: url({{ $candidate->image }})"></div>
                                                <div class="col-md-8">
                                                    <div class="card-header">
                                                        <div>
                                                            <h5 class="card-title">{{ $candidate->fullname }}</h5>
                                                        </div>
                                                        <span class="badge badge-primary-light">Adult</span>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="card-text">
                                                            <p><strong>Age:</strong> {{ $candidate->age }}</p>
                                                            <p><strong>Nickname:</strong> {{ $candidate->nickname }}</p>
                                                        </div>
                                                        <form action="{{ route('makeContestant') }}" class="last-form" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="hidden" name="edition_id" value="{{ $candidate->edition_id}}">
                                                            <input type="hidden" name="candidate_id" value="{{ $candidate->id }}">
                                                            
                                                            <h6>Upload Contestant Contest Image</h6>
                                                            <div class="form-group row">
                                                                <code class="col-md-8 pt-2">Maximum file size="3MB"</code>
                                                                <div class="col-md-8 mt-4">
                                                                    <input type="file" name="image" class="dropify" data-max-file-size="3M"  data-allowed-file-extensions="jpg png" data-default-file="{{asset('img/placeholder.jpg')}}">
                                                                </div>
                                                            </div>
                                                            
                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" tabindex="-1" role="dialog" id="viewAdultCandidate">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Candidates 0{{ $candidate->id}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="#333333" viewBox="0 0 24 24" width="24" height="24"><path d="M16.24 14.83a1 1 0 0 1-1.41 1.41L12 13.41l-2.83 2.83a1 1 0 0 1-1.41-1.41L10.59 12 7.76 9.17a1 1 0 0 1 1.41-1.41L12 10.59l2.83-2.83a1 1 0 0 1 1.41 1.41L13.41 12l2.83 2.83z"/></svg>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <hr>
                                        <div class="card mb-4 card-5">
                                            <div class="row no-gutters">
                                                <div class="col-md-4 col-img" style="background-image: url({{ $candidate->image }})"></div>
                                                <div class="col-md-8">
                                                    <div class="card-header">
                                                        <div>
                                                            <h5 class="card-title">{{ $candidate->fullname }}</h5>
                                                        </div>
                                                        <span class="badge badge-primary-light">Adult</span>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="card-text">
                                                            <p><strong>Age:</strong> {{ $candidate->age }}</p>
                                                            <p><strong>Nickname:</strong> {{ $candidate->nickname }}</p>
                                                            <p><strong>Tribe:</strong> {{$candidate->tribe }}</p>
                                                            <p><strong>State of Origin:</strong> {{$candidate->state_of_origin}}</p>
                                                            <p><strong>Address:</strong> {{$candidate->address}}</p>
                                                            <p><strong>Phone Number:</strong> {{$candidate->phone_number}}</p>
                                                            <p><strong>Skills:</strong> {{$candidate->skills}}</p>
                                                            <p><strong>Languages:</strong> {{$candidate->languages}}</p>
                                                            <p><strong>Occupation:</strong> {{$candidate->occupation}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
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
                            @foreach($candidates->where('category', 'kiddies') as $kidCandidate)
							<div class="col-md-4">
                            
								<div class="card mt-24 card-user-profile-2">
									<div class="card-header">
										<h6 class="card-title">{{ $kidCandidate->fullname }}</h6>
										<div class="dropdown">
											<button class="btn btn-link dropdown-toggle dropdown-nocaret" type="button" id="dropdownMenuButtonDefault" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i class="fas fa-ellipsis-v"></i>
											</button>
											<div class="dropdown-menu" aria-labelledby="dropdownMenuButtonDefault">
												<a href="#" class="dropdown-item" data-toggle="modal" data-target="#viewCandidate">
													<i class="fas fa-eye"></i>
													<span>View Candidate</span>
												</a>
												<a href="#" class="dropdown-item" data-toggle="modal" data-target="#makeContestant">
													<i class="fas fa-check"></i>
													<span>Make Contestant</span>
												</a>
											</div>
										</div>
									</div>
									<div class="card-body">
										<div class="col-avatar">
											<div class="user-avatar">
												<img src="{{ $kidCandidate->image }}" class="avatar avatar rounded-circle" alt="Avatar image">
											</div>
										</div>
										<div class="col-info">
											<h6 class="user-email text-lowercase mb-2"><a href="">{{ $kidCandidate->guardian_email }}</a></h6>
											<h6 class="user-name mb-3"><span class="badge badge-success">Nickname: {{ $kidCandidate->nickname }}</span></h6>
											<p>
                                                Age: {{ $kidCandidate->age }} <br>
												Guardian Phone number: {{ $kidCandidate->guardian_phone_number}} <br>
											</p>
										</div>
									</div>
								</div>
							</div>

                            <div class="modal fade" tabindex="-1" role="dialog" id="makeContestant">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Candidates 0{{ $kidCandidate->id}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="#333333" viewBox="0 0 24 24" width="24" height="24"><path d="M16.24 14.83a1 1 0 0 1-1.41 1.41L12 13.41l-2.83 2.83a1 1 0 0 1-1.41-1.41L10.59 12 7.76 9.17a1 1 0 0 1 1.41-1.41L12 10.59l2.83-2.83a1 1 0 0 1 1.41 1.41L13.41 12l2.83 2.83z"/></svg>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <hr>
                                            <div class="card mb-4 card-5">
                                                <div class="row no-gutters">
                                                    <div class="col-md-4 col-img" style="background-image: url({{ $kidCandidate->image }})"></div>
                                                    <div class="col-md-8">
                                                        <div class="card-header">
                                                            <div>
                                                                <h5 class="card-title">{{ $kidCandidate->fullname }}</h5>
                                                            </div>
                                                            <span class="badge badge-primary-light">Kiddies</span>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="card-text">
                                                                <p><strong>Age:</strong> {{ $kidCandidate->age }}</p>
                                                                <p><strong>Nickname:</strong> {{ $kidCandidate->nickname }}</p>
                                                            </div>
                                                            <form action="{{ route('makeContestant') }}" class="last-form" method="post" enctype="multipart/form-data">
                                                                @csrf
                                                                <input type="hidden" name="edition_id" value="{{ $kidCandidate->edition_id}}">
                                                                <input type="hidden" name="candidate_id" value="{{ $kidCandidate->id }}">
                                                                
                                                                <h6>Upload Contestant Contest Image</h6>
                                                                <div class="form-group row">
                                                                    <code class="col-md-8 pt-2">Maximum file size="3MB"</code>
                                                                    <div class="col-md-8 mt-4">
                                                                        <input type="file" name="image" class="dropify" data-max-file-size="3M"  data-allowed-file-extensions="jpg png" data-default-file="{{asset('img/placeholder.jpg')}}">
                                                                    </div>
                                                                </div>
                                                                
                                                                <button type="submit" class="btn btn-primary">Submit</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="modal fade" tabindex="-1" role="dialog" id="viewCandidate">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Candidates 0{{ $kidCandidate->id}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="#333333" viewBox="0 0 24 24" width="24" height="24"><path d="M16.24 14.83a1 1 0 0 1-1.41 1.41L12 13.41l-2.83 2.83a1 1 0 0 1-1.41-1.41L10.59 12 7.76 9.17a1 1 0 0 1 1.41-1.41L12 10.59l2.83-2.83a1 1 0 0 1 1.41 1.41L13.41 12l2.83 2.83z"/></svg>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <hr>
                                            <div class="card mb-4 card-5">
                                                <div class="row no-gutters">
                                                    <div class="col-md-4 col-img" style="background-image: url({{ $kidCandidate->image }})"></div>
                                                    <div class="col-md-8">
                                                        <div class="card-header">
                                                            <div>
                                                                <h5 class="card-title">{{ $kidCandidate->fullname }}</h5>
                                                            </div>
                                                            <span class="badge badge-primary-light">Kiddies</span>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="card-text">
                                                                <p><strong>Age:</strong> {{ $kidCandidate->age }}</p>
                                                                <p><strong>Nickname:</strong> {{ $kidCandidate->nickname }}</p>
                                                                <p><strong>Tribe:</strong> {{$kidCandidate->tribe }}</p>
                                                                <p><strong>State of Origin:</strong> {{$kidCandidate->state_of_origin}}</p>
                                                                <p><strong>Guardian Name:</strong> {{ $kidCandidate->guardian_name }}</p>
                                                                <p><strong>Guardian Email:</strong> {{ $kidCandidate->guardian_email }}</p>
                                                                <p><strong>Guardian Phone Number:</strong> {{ $kidCandidate->guardian_phone_number }}</p>
                                                                <p><strong>Relationship:</strong> {{ $kidCandidate->relationship }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
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