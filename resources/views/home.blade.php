@include('inc/header')

<header>
    <div class="row">
        <div class="col-md-6">
            <h1 class="mb-0">Dashboard</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0 mt-3 p-0 breadcrumbs-chevron">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                </ol>
            </nav>
        </div>
    </div>
</header>

<div class="row">

    <div class="col-md-8">

        <div class="card card-promotion-wide-3 mt-24" style="background-image: url({{ $setting->edition->banner }})">
            <div class="card-overlay" style="background-color: #000003ef;"></div>
            <!-- <img src="../../assets/backgrounds/cosmic-timetraveler-LgrGHYZzBSk-unsplash.jpg" alt=""> -->
            <div class="card-body text-white">
                <span class="badge badge-danger">Active Edition</span>
                <h3 class="card-heading mt-3">{{ $edition->name .' '. $edition->year }} - {{ $setting->stage }} STAGE</h3>
                <p class="card-text">
                    {{ $edition->tagline }}
                </p>
                <a href="#" class="btn btn-sm btn-light px-5 btn-uppercase" data-toggle="modal" data-target="#changeModal">Change Stage</a>
            </div>
        </div>
        
    </div>

    <div class="col-md-4">
        <div class="panel panel-light">
            <div class="panel-header">
                <h1 class="panel-title">All Editions</h1>
            </div>
            <div class="panel-body p-0">
												
                <ul class="list-group channels-list only-separator-borders">
                    @foreach($allEditions as $singleEdition)
                        <li class="list-group-item">
                            <div class="item-col item-img">
                                <img src="{{ $singleEdition->banner }}" class="img-fluid">
                            </div>
                            <div class="item-col item-descriptions">
                                <a href="#" class="item-title">{{ $singleEdition->name }}</a>
                                <small>Year: {{ $singleEdition->year }}</small>
                                <small>Tagline: {{ $singleEdition->tagline }}</small>
                            </div>
                            <div class="item-col">
                                @if($singleEdition->id != $setting->edition_id)
                                <a href="{{ url('/activateEdition')}}/{{ $singleEdition->id }}" class="btn btn-outline-dark btn-sm">
                                    Make Edition Active
                                </a>
                                @else
                                    <h5>Active Edition</h5>
                                @endif
                            </div>
                            <div class="dropdown ml-auto">
                                <button class="btn dropdown-toggle dropdown-nocaret" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#"><i class="fas fa-i-cursor"></i> Edit</a>
                                    <a class="dropdown-item" href="#"><i class="fas fa-trash"></i> Remove</a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>

            </div>
            <div class="panel-footer">
                <div class="panel-toolbar">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createEditionModal">Create New Edition</button>
                </div>
            </div>
        </div>
    </div>  
</div>


<!--  Report - Dark -->
<div class="panel widget-7 bg-dark">
    <div class="panel-header">
        <h3 class="panel-title">Report</h3>
    </div>
    <div class="panel-body">

        <div class="row no-gutters">

            <div class="col-md-4">

                <div class="widget-col">
                    <div class="widget-icon">
                        <i class="fas fa-users"></i>
                    </div>

                    <div class="widget-content">
                        <div class="widget-header">
                            <h6 class="widget-title">Kiddies</h6>
                            <div class="widget-stats counter">{{ $candidates->where('category', 'kiddies')->count() }}</div>
                        </div>

                        <div class="widget-body">
                            <p>
                                Registered candidates in the kiddies category.
                            </p>
                        </div>
                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="widget-col">
                    <div class="widget-icon">
                        <i class="fas fa-users"></i>
                    </div>

                    <div class="widget-content">
                        <div class="widget-header">
                            <h6 class="widget-title">Adult</h6>
                            <div class="widget-stats counter">{{ $candidates->where('category', 'adult')->count() }}</div>
                        </div>

                        <div class="widget-body">
                            <p>
                               Registered candidates in the adult category.
                            </p>
                        </div>
                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="widget-col">
                    <div class="widget-icon">
                        <i class="fas fa-dollar-sign"></i>
                    </div>

                    <div class="widget-content">
                        <div class="widget-header">
                            <h6 class="widget-title">Total Payments</h6>
                            <div class="widget-stats counter">{{ number_format($payments->sum('amount', 2)) }}</div>
                        </div>

                        <div class="widget-body">
                            <p>
                                Payment from both registration and voting
                            </p>
                        </div>
                    </div>

                </div>

            </div>

        </div>
            
    </div>

</div><!-- /  Report - Dark -->

<div class="modal fade" tabindex="-1" role="dialog" id="changeModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change Stage</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#333333" viewBox="0 0 24 24" width="24" height="24"><path d="M16.24 14.83a1 1 0 0 1-1.41 1.41L12 13.41l-2.83 2.83a1 1 0 0 1-1.41-1.41L10.59 12 7.76 9.17a1 1 0 0 1 1.41-1.41L12 10.59l2.83-2.83a1 1 0 0 1 1.41 1.41L13.41 12l2.83 2.83z"/></svg>
                </button>
            </div>
            <form action="{{ route('updateStage') }}" method="post">
                @csrf
                <div class="modal-body">
                    <p class="text-center">Are you sure you want to change pagentry stage?</p>
                    <p class="text-center">Pagentry is currently in <strong>{{ $setting->stage }}</strong> stage.</p>
                    <div class="form-group">
                        <label for="">Stage</label>
                        <div class="input-group input-group-squared">
                            <select name="stage" class="form-control">
                                <option value="" selected="selected" >- Select Stage -</option>
                                <option value='REGISTRATION'>REGISTRATION</option>
                                <option value='AUDITION'>AUDITION</option>
                                <option value='CONTEST PROCESS'>CONTEST PROCESS</option>
                                <option value='VOTING'>VOTING</option>
                                <option value='COMPLETE'>COMPLETE</option>
                            </select>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-success">OK</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="createEditionModal">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Create Edition</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#333333" viewBox="0 0 24 24" width="24" height="24"><path d="M16.24 14.83a1 1 0 0 1-1.41 1.41L12 13.41l-2.83 2.83a1 1 0 0 1-1.41-1.41L10.59 12 7.76 9.17a1 1 0 0 1 1.41-1.41L12 10.59l2.83-2.83a1 1 0 0 1 1.41 1.41L13.41 12l2.83 2.83z"/></svg>
                </button>
            </div>
            <form action="{{ route('createEdition') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <p class="text-center">You are about to create a new edition.</p>
                    <hr>
                    <div class="form-group">
                        <label for="">Edition Name</label>
                        <div class="input-group input-group-squared">
                            <input type="text" name="name" class="form-control" placeholder="Enter edition name here...">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Edition Year</label>
                        <div class="input-group input-group-squared">
                            <input type="year" name="year" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Edition Tagline</label>
                        <div class="input-group input-group-squared">
                            <input type="text" name="tagline" class="form-control" placeholder="Enter edition tagline here...">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Registration Amount</label>
                        <div class="input-group input-group-squared">
                            <input type="text" name="registration_amount" class="form-control" placeholder="Enter edition registration amount here...">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Amount Per Vote</label>
                        <div class="input-group input-group-squared">
                            <input type="text" name="amount_per_vote" class="form-control" placeholder="Enter edition vote amount here...">
                        </div>
                    </div>

                    <div class="form-group row">
                        <code class="col-md-12 pt-2">Maximum file size="3MB"</code>
                        <div class="col-md-12 mt-4">
                            <input type="file" name="banner" class="dropify" data-max-file-size="3M"  data-allowed-file-extensions="jpg png" data-default-file="{{asset('img/placeholder.jpg')}}">
                        </div>
                    </div>
                    
                    <br><hr>
                    <div class="custom-control custom-checkbox d-block">
                        <input type="checkbox" name="make_active" value="active" class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">Make this edition active</label>
                    </div>
                    <hr><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


@include('inc/footer')