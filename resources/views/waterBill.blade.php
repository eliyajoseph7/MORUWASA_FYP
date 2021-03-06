@extends('constants.headerAndSide')
@section('content')

<div class="container-fluid responsive">
    <div class="row wrapper border-bottom white-bg page-heading m-auto mb-3">
        <div class="col-lg-10">
            <h2></h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{url('/home')}}">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Water Bills</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>

    <div class="row mt-3">

        <!-- Area Chart -->
        <div class="col-xl-6 col-lg-7">
            <div class="card card-primary card-outline mb-4">
            <!-- Card Header - Dropdown -->
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h4 class="m-0 font-weight-bold text-primary">Bill Trend Overview</h4>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <canvas id="billAmountChart"  style="height: 300px; padding: 0px; position: relative;"></canvas>                  
            </div>
            </div>
        </div>

        <div class="col-lg-6 col-lg-5">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Bill Trend Summary</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#" class="dropdown-item">Config option 1</a>
                            </li>
                            <li><a href="#" class="dropdown-item">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>S/No.</th>
                            <th>Month</th>
                            <th>Amount (Tsh)</th>
                            <th>Consumption (litres)</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                                $count = 0;
                                    
                            ?>
                            @if(count($bill) > 0 )
                                @foreach($bill -> all() as $bill) 
                                
                                    <?php 
                                        $count += 1;
                                    ?>
                                
                                    <tr class="gradeA odd" role="row">
                                        
                                        <td class="sorting_1">{{( $count )}}</td>
                                            <td>{{( $bill -> created_at -> format('M') )}}</td>
                                            <td>{{( $bill -> amount )}}</td>
                                            <td>{{( $bill -> litres )}}</td>
                                    </tr>    
                                    
                                @endforeach
                            @endif    
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

     <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-3">
        <form class="form-inline my-2 my-lg-0" action="{{ url('/waterBill') }}" method="POST">
        @csrf
            <select class="form-control mr-sm-2" type="text" name="filter">
                <option value="" selected>filter by</option>
                <option value="current" >Current month</option>
                <option value="allTime">All time</option>
            </select>
            <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Filter</button>
        </form> 
       
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
    </div>


<div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox shadow dt">
                        <div class="ibox-title">
                            <h5>Customers Water Consumptions</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#" class="dropdown-item">Config option 1</a>
                                    </li>
                                    <li><a href="#" class="dropdown-item">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                        
                                <table class="table table-striped table-bordered table-hover dataTables-example dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" role="grid">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 30px;">S/No.</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 266px;">Customer</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 266px;">Category</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 239px;">Units</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 183px;">Amount(Tsh)</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $count = 0;
                                            
                                            ?>
                                                @if(count($usages) > 0 )
                                                    @foreach($usages -> all() as $usages) 
                                                    
                                                        <?php 
                                                            $count += 1;
                                                            $amount_domestic = $usages -> units * 1600;
                                                            $amount_industry = $usages -> units * 2900;
                                                            $amount_commercial = $usages -> units * 2300;
                                                            $amount_tank = $usages -> units * 1600;
                                                            $amount_institution = $usages -> units * 1900;
                                                        ?>
                                                        @if($usages->customer != null)
                                                        <tr class="gradeA odd" role="row">
                                                            
                                                            <td class="sorting_1">{{( $count )}}</td>
                                                                @if(count(($usages->customer)->toArray()) > 0 )
                                                                    <td>{{( $usages->customer -> name )}}</td>
                                                                    <td>{{( $usages->customer -> category )}}</td>
                                                                @endif
                                                                <td>{{( $usages -> units )}}</td>
                                                                @if(($usages->customer -> category) == 'domestic')
                                                                    <td>{{( $amount_domestic )}}</td>
                                                                @elseif(($usages->customer -> category) == 'industry')
                                                                    <td>{{( $amount_industry )}}</td>
                                                                @elseif(($usages->customer -> category) == 'commercial')
                                                                    <td>{{( $amount_commercial )}}</td>
                                                                @elseif(($usages->customer -> category) == 'tank')
                                                                    <td>{{( $amount_tank )}}</td>
                                                                @else
                                                                <td>{{( $amount_institution )}}</td>
                                                                @endif
                                                        </tr>    
                                                        @endif
                                                        
                                                    @endforeach
                                                @endif    
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">S/No.</th>
                                            <th rowspan="1" colspan="1">Cuastomer</th>
                                            <th rowspan="1" colspan="1">Category</th>
                                            <th rowspan="1" colspan="1">Units</th>
                                            <th rowspan="1" colspan="1">Amount(Tsh)</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>        
</div>

<script src="{{url('js/plugins/chartJs/create-charts-waterBillTrend.js')}}"></script>

    @endsection