@include('constants.headerAndSide')

    <div class="row wrapper border-bottom white-bg page-heading m-auto mb-3">
        <div class="col-lg-10">
            <h2>Meters</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/home') }}">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ url('/meter') }}">Meters</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Edit Meter</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
@if(session('info'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('info')}}.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
@elseif(session('nothing'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
    {{session('nothing')}}.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
@elseif(session('err'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{session('err')}}.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<div class="container-fluid">
    <div class="row flex-lg-nowrap mt-3">
    
        <div class="col">
            <div class="row">
                <div class="col col-md-7 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="e-profile">
                                <div class="row">
                                    <div class="col-12 col-sm-auto mb-3">
                                        <div class="mx-auto" style="width: 140px;">
                                            <div class="d-flex justify-content-center align-items-center rounded" style="height: 110px; background-color: rgb(233, 236, 239);">
                                            <span id="img" style="color: rgb(166, 168, 170); font: bold 8pt Arial;"><img src="{{ url('img/logo.png') }}" style="width: 138px; height: 110px; border-radius: 45%;"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                                        <div class="text-center text-sm-left mb-2 mb-sm-0">
                                        @if(count(($meter->customer)) > 0)
                                            <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">Customer Name: <?php echo $meter ->customer->name; ?></h4>
                                            <p class="mb-0">Street: <?php echo $meter->customer->street; ?></p>
                                        @else
                                            <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">This meter is not assigned to any customer</h4>
                                        @endif    
                                            <div class="text-muted"><small>Last updated <?php echo $meter->updated_at->format('d M Y'); ?></small></div>
                                            
                                        </div>
                                        <div class="text-center text-sm-right">
                                        @if(count(($meter->customer)) > 0)
                                            <span class="badge badge-secondary">Customer Category: <?php echo $meter->customer->category; ?></span>
                                        @endif    
                                            <div class="text-muted"><small>Registered <?php echo $meter->created_at->format('d M Y'); ?></small></div>
                                        </div>
                                    </div>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li class="nav-item"><a href="" class="active nav-link">Settings</a></li>
                                </ul>
                                <div class="tab-content pt-3">
                                    <div class="tab-pane active">
                                        <form class="form"  method="POST" action="{{ url('/updateMeter',array($meter->id)) }}"  enctype="multipart/form-data">
                                        {{csrf_field()}}


                                            <div class="row">
                                                <div class="col">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Meter No.</label>
                                                                <input id="meter_no" type="text" class="form-control" name="meter_no" value=<?php echo  $meter->meter_no; ?> autofocus>
                                                                <div class="custom-control-input  @error('meter_no') is-invalid @enderror col-md-6" value="{{ old('meter_no') }}"></div>

                                                            @error('meter_no')
                                                                <span class="invalid-feedback text-danger" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="form-group">
                                                                <label>Meter Type</label>
                                                                <input id="type" type="text" class="form-control" name="type" value=<?php echo  $meter->type; ?>>
                                                                <div class="custom-control-input  @error('type') is-invalid @enderror col-md-6" value="{{ old('type') }}"></div>

                                                            @error('type')
                                                                <span class="invalid-feedback text-danger" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="row">
                                                        <div class="col d-flex justify-content-end">
                                                            <button class="btn btn-primary" type="submit">Save Changes</button>
                                                        </div>
                                                    </div>
                                                </div> 
                                            </div>       
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-3 mb-3">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="px-xl-3">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                                    document.getElementById('logout-form').submit();">
                                    <button class="btn btn-block btn-secondary">
                                        <i class="fa fa-sign-out"></i>
                                        <span>Logout</span>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>    