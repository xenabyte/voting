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

        <div class="card card-promotion-wide-3 mt-24" style="background-image: url({{asset('assets/images/dashboards/metrica.jpg')}})">
            <div class="card-overlay" style="background-color: #363679;"></div>
            <!-- <img src="../../assets/backgrounds/cosmic-timetraveler-LgrGHYZzBSk-unsplash.jpg" alt=""> -->
            <div class="card-body text-white">
                <span class="badge badge-danger">Active Edition</span>
                <h3 class="card-heading mt-3">{{ $edition->name .' '. $edition->year }} - {{ $setting->stage }} Stage</h3>
                <p class="card-text">
                    {{ $edition->tagline }}
                </p>
                <a href="#" class="btn btn-sm btn-light px-5 btn-uppercase" data-toggle="modal" data-target="#changeModal">Change Stage</a>
            </div>
        </div>
        
    </div>

    <div class="col-md-4">

        <div class="card card-promotion-wide-3 mt-24" style="background-image: url('../../assets/backgrounds/patrick-tomasso-5hvn-2WW6rY-unsplash-h200.jpg'); min-height: 163px; ">
            <div class="card-overlay" style="background-color: #793636;"></div>
            <!-- <img src="../../assets/backgrounds/cosmic-timetraveler-LgrGHYZzBSk-unsplash.jpg" alt=""> -->
            <div class="card-body text-white p-0">
                <p class="card-text m-0">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </p>
            </div>
        </div>

        <div class="card card-promotion-wide-3 mt-24" style="background-image: url('../../assets/backgrounds/sharon-mccutcheon-62vi3TG5EDg-unsplash-h200.jpg'); min-height: 163px; ">
            <div class="card-overlay"></div>
            <!-- <img src="../../assets/backgrounds/cosmic-timetraveler-LgrGHYZzBSk-unsplash.jpg" alt=""> -->
            <div class="card-body text-white p-0">
                <h3 class="card-heading m-0">Environment is in danger</h3>
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


@include('inc/footer')