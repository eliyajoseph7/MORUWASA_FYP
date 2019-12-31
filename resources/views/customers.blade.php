@include('constants.headerAndSide')

<div class="container-fluid responsive">
     <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <table class="table table-borderless mydatatable responsive" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Street</th>
                <th>Meter no.</th>
                <th>Gender</th>
                <th>Phone</th>
                <th>Trend</th>
                <th>Status</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 0;
                
                ?>
                    @if(count($customers) > 0 || count($pay) > 0)
                        @foreach($customers -> all() as $customers) 
                         
                            <?php 
                              $count += 1;
                            ?>
                
            <tr>
                <td>{{( $count )}}</td>
                <td>{{( $customers -> name )}}</td>
                <td>{{( $customers -> street )}}</td>
                <td>{{( $customers -> meter_no )}}</td>
                <td>{{( $customers -> gender )}}</td>
                <td>{{( $customers -> phone )}}</td>
                <td><a href="#"><span data-toggle="tooltip" data-placement="left" title="view bills trend"data-toggle="tooltip" data-placement="left" title="Tooltip on left"><i class="fa fa-line-chart"></i></span></a></td>
               

            @foreach($customers->payments as $customers)
                <td>{{( $customers -> status )}}</td>
            @endforeach              
                <!-- <td class="yes"><span title="paid" data-toggle="tooltip"><i class="fa fa-check-circle fa-2x"></span></span<i></td> -->
            </tr>    
                  @endforeach
            @endif()         
                    
            </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Street</th>
                <th>Meter no.</th>
                <th>Gender</th>
                <th>Phone</th>
                <th>Trend</th>
                <th>Status</th>
                
            </tr>
        </tfoot>
    </table>
    
    
</div>
<!-- <script src="{{ url('js/datatable/jquery-3.3.1.js') }}"></script> -->
<script src="{{ url('js/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('js/datatable/dataTables.bootstrap4.min.js') }}"></script>

<script type="text/javascript">
	$(document).ready(function() {
    $('.mydatatable').DataTable();
} );

</script>

