@include('constants.headerAndSide')

<div class="container-fluid">
    <div class="row wrapper border-bottom white-bg page-heading m-auto mb-3">
        <div class="col-lg-10">
            <h2>Bill Trend</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Customer Trend</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
    <div class="row">
        <div class="col-lg-2">
            <h1 class="my-4">Actions</h1>
            <div class="list-group">
            <a href="#" class="list-group-item active">View trend</a>
            <a href="#" class="list-group-item">update details</a>
            <a href="#" class="list-group-item" style="color: red;">Delete Customer<i class="fa fa-times"></i></a>
        </div>
      </div>
      <!-- Post Content Column -->
      <div class="col-lg-7">

        <!-- Title -->
        <h1 class="mt-4">Customer <em>{{( $view -> name)}}'s</em> Bill Information</h1>

        <!-- Author -->
        <p class="lead">
          by
          <a href="#">MORUWASA Billing Department</a>
        </p>

        <hr>

        <!-- Date/Time -->
        <p>Updated on <?php echo date('d, M-m/Y h:i:s A') ?></p>

        <hr>

        <!-- Preview chart -->
        <div class="card card-primary card-outline">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary">Monthly consumptions trend</h5>
                </div>
                <div class="card-body">
                    <canvas id="myChart"  style="height: 300px; padding: 0px; position: relative;"></canvas>                  
                </div>
        </div>
        <hr>
        <div>
        The customer {{ ( $view -> name)}}, has been a MORUWASA customer since {{ ($view->created_at->format('d,M-Y'))}}
        </div>
        <hr>
              <!-- DataTable -->
          <div class="ibox-content">

            <div class="table-responsive">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
            
                    <table class="table table-striped table-bordered table-hover dataTables-example dataTable" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" role="grid">
                        <thead>
                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 30px;">S/No.</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 266px;">Date</th>
                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 266px;">Units Consumed</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                            $count = 0;
                                
                                ?>
                                    @if(count($daily_consuption) > 0 )
                                        @foreach($daily_consuption -> all() as $daily_consuption) 
                                        
                                            <?php 
                                            $count += 1;
                                            ?>
                                            
                                            <tr class="gradeA odd" role="row">
                                                <td class="sorting_1">{{( $count )}}</td>
                                                <td >{{( $daily_consuption -> created_at->format('d,M-Y') )}}</td>
                                                <td class="center">{{( $daily_consuption -> sum )}}</td>
                                                
                                            </tr>
                                        @endforeach
                                    @endif    
                        </tbody>
                        <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1">S/No.</th>
                                <th rowspan="1" colspan="1">Date</th>
                                <th rowspan="1" colspan="1">Units Consumed</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
      </div>


      <!-- Sidebar Widgets Column -->
      <div class="col-md-3">

        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">Categories</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-5">
                <ul class="list-unstyled mb-0">
                  <tr>
                    <a href="#">Name</a>
                  </tr>
                  <li>
                    <a href="#">Meter.No</a>
                  </li>
                  <li>
                    <a href="#">Phone</a>
                  </li>
                  <li>
                    <a href="#">Category</a>
                  </li>
                  <li>
                    <a href="#">Gender</a>
                  </li>
                  <li>
                    <a href="#">Street</a>
                  </li>
                </ul>
              </div>
              <div class="col-lg-7">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="#">{{( $view -> name )}}</a>
                  </li>
                  <li>
                    <a href="#">{{( $view -> meter -> meter_no )}}</a>
                  </li>
                  <li>
                    <a href="#">{{( $view -> phone )}}</a>
                  </li>
                  <li>
                    <a href="#">{{( $view -> category )}}</a>
                  </li>
                  <li>
                    <a href="#">{{( $view -> gender )}}</a>
                  </li>
                  <li>
                    <a href="#">{{( $view -> street )}}</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <!-- Side Widget -->
        <div class="card my-4">
          <h5 class="card-header">Side Widget</h5>
          <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
          </div>
        </div>

      </div>

    </div>
    <!-- /.row -->



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
    <script src="{{url('js/plugins/chartJs/create-charts3.js')}}"></script>
