@include('inc/header')

<header>
    <div class="row">
        <div class="col-md-6">
            <h1 class="mb-0">Contestants</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0 mt-3 p-0 breadcrumbs-chevron">
                    <li class="breadcrumb-item"><a href="{{ route('home')}}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Contestants</a></li>
                </ol>
            </nav>
        </div>
    </div>
</header>



<!-- Boxed Tabs -->
<div class="panel panel-light panel-tabbable tabbable-box">
    <div class="panel-header">
        <h1 class="panel-title">{{ $edition->name .' '. $edition->year }} Contestants</h1>
    </div>
    <div class="panel-header">
        <div class="panel-toolbar">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#boxed-tabs-tab-1" role="tab" aria-selected="false">
                       Adult Contestants
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#boxed-tabs-tab-2" role="tab" aria-selected="false">
                        Kid Contestants
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="panel-body">
        
        <div class="tab-content">
            <div class="tab-pane fade show active" id="boxed-tabs-tab-1" aria-expanded="true">
                <h4 class="mb-3">Adult Contestants</h4>  
                <div class="row">
                    @foreach($contestants as $contestant)
                        @if($contestant->candidate->category == 'adult')
                            <div class="col-md-4">
                                
                                <div class="card mt-24 card-user-profile-2 {{ $contestant->status == 0 ? 'bg-warning' : ''}}">
                                    <div class="card-header">
                                        <h6 class="card-title">{{ $contestant->candidate->fullname }}</h6>
                                        <div class="dropdown">
                                            <button class="btn btn-link dropdown-toggle dropdown-nocaret" type="button" id="dropdownMenuButtonDefault" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonDefault">
                                                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#viewAdultCandidate">
                                                    <i class="fas fa-eye"></i>
                                                    <span>View Contestant</span>
                                                </a>
                                                <a href="#" class="dropdown-item" data-toggle="modal" data-target="#disqualifyAdultContestant">
                                                    <i class="fas fa-times text-danger"></i>
                                                    <span>Disqualify Contestant</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="col-avatar">
                                            <div class="user-avatar">
                                                <img src="{{ $contestant->image }}" class="avatar avatar rounded-circle" alt="Avatar image">
                                            </div>
                                        </div>
                                        <div class="col-info">
                                            <h6 class="user-email text-lowercase mb-2"><a href="">{{ $contestant->candidate->email }}</a></h6>
                                            <h6 class="user-name mb-3"><span class="badge badge-success">Nickname: {{ $contestant->candidate->nickname }}</span></h6>
                                            <p>
                                                Age: {{ $contestant->candidate->age }} <br>
                                                Phone number: {{ $contestant->candidate->phone_number}} <br>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" tabindex="-1" role="dialog" id="disqualifyAdultContestant">
                                <div class="modal-dialog modal-dialog-centered modal-confirm confirm-danger">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <div class="icon-box">
                                                <i class="fa fa-times"></i>
                                            </div>
                                            <h4 class="modal-title">Are you sure?</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p class="text-center">Do you really want to disqualify this contestant? This process cannot be undone.</p>
                                        </div>
                                        <div class="modal-footer row">
                                            <div class="col-md-6 px-2">
                                                <button class="btn my-1 btn-secondary btn-block" data-dismiss="modal">No</button>
                                            </div>
                                            <div class="col-md-6 px-2">
                                                <form action="{{ route('disqualifyContestant') }}" class="last-form" method="post">
                                                    @csrf
                                                    <input type="hidden" name="contestant_id" value="{{ $contestant->id}}">
                                                    <button class="btn my-1 btn-danger btn-block">YES</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" tabindex="-1" role="dialog" id="viewAdultCandidate">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Candidates 0{{ $contestant->id}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="#333333" viewBox="0 0 24 24" width="24" height="24"><path d="M16.24 14.83a1 1 0 0 1-1.41 1.41L12 13.41l-2.83 2.83a1 1 0 0 1-1.41-1.41L10.59 12 7.76 9.17a1 1 0 0 1 1.41-1.41L12 10.59l2.83-2.83a1 1 0 0 1 1.41 1.41L13.41 12l2.83 2.83z"/></svg>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <hr>
                                            <div class="card mb-4 card-5">
                                                <div class="row no-gutters">
                                                    <div class="col-md-4 col-img" style="background-image: url({{ $contestant->image }})"></div>
                                                    <div class="col-md-8">
                                                        <div class="card-header">
                                                            <div>
                                                                <h5 class="card-title">{{ $contestant->candidate->fullname }}</h5>
                                                            </div>
                                                            <span class="badge badge-primary-light">Adult</span>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="card-text">
                                                                <p><strong>Age:</strong> {{ $contestant->candidate->age }}</p>
                                                                <p><strong>Nickname:</strong> {{ $contestant->candidate->nickname }}</p>
                                                                <p><strong>Tribe:</strong> {{$contestant->candidate->tribe }}</p>
                                                                <p><strong>State of Origin:</strong> {{$contestant->candidate->state_of_origin}}</p>
                                                                <p><strong>Address:</strong> {{$contestant->candidate->address}}</p>
                                                                <p><strong>Phone Number:</strong> {{$contestant->candidate->phone_number}}</p>
                                                                <p><strong>Skills:</strong> {{$contestant->candidate->skills}}</p>
                                                                <p><strong>Languages:</strong> {{$contestant->candidate->languages}}</p>
                                                                <p><strong>Occupation:</strong> {{$contestant->candidate->occupation}}</p>
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
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="boxed-tabs-tab-2" aria-expanded="true">
                <h4 class="mb-3">Kid Contestants</h4>
                <div class="row">
                    @foreach($contestants as $kidContestant)
                        @if($kidContestant->candidate->category == 'kiddies')
                        <div class="col-md-4">
                            
                            <div class="card mt-24 card-user-profile-2 {{ $kidContestant->status == 0 ? 'bg-danger' : ''}}">
                                <div class="card-header">
                                    <h6 class="card-title">{{ $kidContestant->candidate->fullname }}</h6>
                                    <div class="dropdown">
                                        <button class="btn btn-link dropdown-toggle dropdown-nocaret" type="button" id="dropdownMenuButtonDefault" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonDefault">
                                            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#viewContestant">
                                                <i class="fas fa-eye"></i>
                                                <span>View Contestant</span>
                                            </a>
                                            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#disqualifyContestant">
                                                <i class="fas fa-times text-danger"></i>
                                                <span>Disqualify Contestant</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="col-avatar">
                                        <div class="user-avatar">
                                            <img src="{{ $kidContestant->image }}" class="avatar avatar rounded-circle" alt="Avatar image">
                                        </div>
                                    </div>
                                    <div class="col-info">
                                        <h6 class="user-email text-lowercase mb-2"><a href="">{{ $kidContestant->candidate->guardian_email }}</a></h6>
                                        <h6 class="user-name mb-3"><span class="badge badge-success">Nickname: {{ $kidContestant->candidate->nickname }}</span></h6>
                                        <p>
                                            Age: {{ $kidContestant->candidate->age }} <br>
                                            Guardian Phone number: {{ $kidContestant->candidate->guardian_phone_number}} <br>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" tabindex="-1" role="dialog" id="disqualifyContestant">
                            <div class="modal-dialog modal-dialog-centered modal-confirm confirm-danger">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <div class="icon-box">
                                            <i class="fa fa-times"></i>
                                        </div>
                                        <h4 class="modal-title">Are you sure?</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p class="text-center">Do you really want to disqualify this contestant? This process cannot be undone.</p>
                                    </div>
                                    <div class="modal-footer row">
                                        <div class="col-md-6 px-2">
                                            <button class="btn my-1 btn-secondary btn-block" data-dismiss="modal">No</button>
                                        </div>
                                        <div class="col-md-6 px-2">
                                            <form action="{{ route('disqualifyContestant') }}" class="last-form" method="post">
                                                @csrf
                                                <input type="hidden" name="contestant_id" value="{{ $kidContestant->id}}">
                                                <button class="btn my-1 btn-danger btn-block">YES</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="modal fade" tabindex="-1" role="dialog" id="viewContestant">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Contestant 0{{ $kidContestant->id}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="#333333" viewBox="0 0 24 24" width="24" height="24"><path d="M16.24 14.83a1 1 0 0 1-1.41 1.41L12 13.41l-2.83 2.83a1 1 0 0 1-1.41-1.41L10.59 12 7.76 9.17a1 1 0 0 1 1.41-1.41L12 10.59l2.83-2.83a1 1 0 0 1 1.41 1.41L13.41 12l2.83 2.83z"/></svg>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <hr>
                                        <div class="card mb-4 card-5">
                                            <div class="row no-gutters">
                                                <div class="col-md-4 col-img" style="background-image: url({{ $kidContestant->image }})"></div>
                                                <div class="col-md-8">
                                                    <div class="card-header">
                                                        <div>
                                                            <h5 class="card-title">{{ $kidContestant->candidate->fullname }}</h5>
                                                        </div>
                                                        <span class="badge badge-primary-light">Kiddies</span>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="card-text">
                                                            <p><strong>Age:</strong> {{ $kidContestant->candidate->age }}</p>
                                                            <p><strong>Nickname:</strong> {{ $kidContestant->candidate->nickname }}</p>
                                                            <p><strong>Tribe:</strong> {{$kidContestant->candidate->tribe }}</p>
                                                            <p><strong>State of Origin:</strong> {{$kidContestant->candidate->state_of_origin}}</p>
                                                            <p><strong>Guardian Name:</strong> {{ $kidContestant->candidate->guardian_name }}</p>
                                                            <p><strong>Guardian Email:</strong> {{ $kidContestant->candidate->guardian_email }}</p>
                                                            <p><strong>Guardian Phone Number:</strong> {{ $kidContestant->candidate->guardian_phone_number }}</p>
                                                            <p><strong>Relationship:</strong> {{ $kidContestant->candidate->relationship }}</p>
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
                        @endif
                    @endforeach
                </div>
                
            </div>
        </div>
        
    </div>
</div> <!-- Boxed Tabs -->



@include('inc/footer')