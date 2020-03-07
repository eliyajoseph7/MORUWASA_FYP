@include('constants.headerAndSide')

<div class="container responsive">
     <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <form class="form-inline my-2 my-lg-0">
            <select class="form-control mr-sm-2" type="text" >
                <option value="" selected>filter by</option>
                <option value="current">Current month</option>
                <option value="allTime">All time</option>
            </select>
            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
        </form> 
        <h1 class="h3 mb-0 text-gray-800">Customer bills</h1>
       
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <table class="table table-borderless mydatatable responsive" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>Customer</th>
                <th>units</th>
                <th>Amount</th>
                
                
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
                
                            <tr>
                                <td>{{( $count )}}</td>
                                @if(count($bill->customer) > 0 )
                                <td>{{( $bill->customer -> name )}}</td>
                                @else
                                    <td>-</td>
                                @endif               
                                <td>{{( $bill -> units )}}</td>
                                <td>{{( $bill -> amount )}}</td>
                            </tr>
                        @endforeach
                    @endif
                    
            </tbody>
        <tfoot>
            <tr>
            <th>#</th>
                <th>Customer</th>
                <th>units</th>
                <th>Amount</th>
                
                
            </tr>
            
        </tfoot>
    </table>
    
</div>
</div>
<!-- <script src="{{ url('js/datatable/jquery-3.3.1.js') }}"></script> -->
<script src="{{ url('js/datatable/jquery.dataTables.min.js') }}"></script>
<script src="{{ url('js/datatable/dataTables.bootstrap4.min.js') }}"></script>

<script type="text/javascript">
	$(document).ready(function() {
    $('.mydatatable').DataTable();
} );

</script>