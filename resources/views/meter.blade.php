@include('constants.headerAndSide')

@if(session('info'))
    <div class="alert alert-success">
    {{session('info')}}
    </div>
@elseif(session('err'))
    <div class="alert alert-danger">
        {{session('err')}}
    </div>
@endif
<div class="container-fluid responsive">

    <div class="row wrapper border-bottom white-bg page-heading m-auto mb-3">
        <div class="col-lg-10">
            <h2>Meters</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/home') }}">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Activities</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Register/View Meter</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>

<!-- Form start -->
<div class=" shadow mb-3">
<form class="p-3 container jumbotron" action="{{ url('/addMeter') }}" method="POST">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
        <label for="name">Meter Number</label>
        <input id="name" type="text" class="form-control @error('meter_no') is-invalid @enderror"
                name="meter_no" value="{{ old('meter_no') }}" autocomplete="meter_no" autofocus placeholder="Enter new meter">

        @error('meter_no')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
        <div class="form-group col-md-6">
        <label for="inputType">Type</label>
        <select name="type" id="inputType" class="form-control @error('type') is-invalid @enderror" value="{{ old('type') }}">
            <option value="" selected>Choose...</option>
            <option value="postpaid">Postpaid</option>
            <option value="prepaid">prepaid</option>
        </select>

        @error('type')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror       
        </div>

        
    </div>
    <button type="submit" class="btn btn-primary">Register</button>
</form>
</div>

<!-- Form end -->

    <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox ">
                        <div class="ibox-title">
                            <h5>Registered Meters</h5>
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
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 266px;">Meter no</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 266px;">Customer</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 239px;">Meter Type</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $count = 0;
                                            
                                            ?>
                                                @if(count($meter) > 0 )
                                                    @foreach($meter -> all() as $meter) 
                                                    
                                                        <?php 
                                                        $count += 1;
                                                        ?>
                                                        
                                                        <tr class="gradeA odd" role="row">
                                                            <td class="sorting_1">{{( $count )}}</td>
                                                            <td >{{( $meter -> meter_no )}}</td>
                                                            @if($meter->customer != null)
                                                                @if(count(($meter->customer)->toArray()) > 0 )
                                                                <td>{{( $meter->customer -> name )}}</td>
                                                                @endif
                                                            @else
                                                                <td>-</td>
                                                            @endif
                                                            <td class="center">{{( $meter -> type )}}</td>
                                                            
                                                        </tr>
                                                    @endforeach
                                                @endif    
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">S/No.</th>
                                            <th rowspan="1" colspan="1">Meter no</th>
                                            <th rowspan="1" colspan="1">Customer</th>
                                            <th rowspan="1" colspan="1">Meter Type</th>
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

<!-- script -->
<script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'MeterInfos'},
                    {extend: 'pdf', title: 'MeterInfos'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });

    </script>