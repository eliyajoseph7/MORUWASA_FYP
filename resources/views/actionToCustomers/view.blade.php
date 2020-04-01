@include('constants.headerAndSide')

<div class="container-fluid">
    <div class="row wrapper border-bottom white-bg page-heading m-auto mb-3">
        <div class="col-lg-10">
            <h2>Bill Trend</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ url('/home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Customer Trend</strong>
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
    @endif
    @if(session('err'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>{{session('err')}}.</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
    @if ($errors->any()) 
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    @endif
    
    <div class="row">
        <div class="col-lg-2">
            <h1 class="my-4">Actions</h1>
            <div class="list-group">
            <a href="#" id="view" class="list-group-item active">View trend</a>
            <a href="#" id="update" class="list-group-item">update details</a>
            <a href="#myModal" class="list-group-item" data-toggle="modal" style="color: red;">Delete Customer<i class="fa fa-times"></i></a>
        </div>
      </div>
      <!-- Post Content Column -->
      <div class="col-lg-7" id="forView">

        <!-- Title -->
        <h1 class="mt-4">Customer <em>{{( $view -> name)}}'s</em> Bill Information</h1>

        <!-- Author -->
        <p class="lead pull-right">
          by
          <a href="#">MORUWASA Billing Department</a>
        </p>

       

        <!-- Date/Time -->
        <p>Updated on <?php echo date('d, M-m/Y h:i:s A') ?></p>

        <hr>

        <!-- Preview chart -->
        <div class="card card-primary card-outline">
                <div class="card-header py-3">
                    <h4 class="m-0 font-weight-bold text-primary">Monthly consuption trend</h4>
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

      <div class="col-lg-7" id="forUpdate" style="display:none">
      
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

        <form method="POST" action="{{ url('/updateCustomer',array($view->id)) }}">
        {{csrf_field()}}
        
          <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
              <input type="text" name="name" class="form-control" id="colFormLabel" value="<?php echo $view -> name; ?>">
            </div>
          </div>
          <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Meter.No</label>
            <div class="col-sm-10">
              <select name="meter_no" id="colFormLabel" class="form-control @error('meter_no') is-invalid @enderror" id="inputmeter" value="{{ old('meter_no') }}">
                <option value="<?php echo $view -> meter -> meter_no; ?>" selected>{{( $view -> meter -> meter_no )}}</option>
              @if(count($meter->toArray()) > 0)
                  @foreach($meter -> all() as $meter)
                      <option>{{($meter-> meter_no)}}</option>
                  @endforeach
              @else
                  <option value="" >No free meter available</option> 
              @endif           
            </select>
            @error('meter_no')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
          </div>
          <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Phone</label>
            <div class="col-sm-10">
              <input name="phone" id="colFormLabel" type="tel" value="<?php echo $view -> phone; ?>" class="form-control @error('phone') is-invalid @enderror"
                      id="phone" value="{{ old('phone') }}">
              
              @error('phone')
                  <span class="invalid-feedback text-danger" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">category</label>
            <div class="col-sm-10">
              <select name="category" id="colFormLabel" class="form-control @error('category') is-invalid @enderror" value="{{ old('category') }}">
                <option value="<?php echo $view -> category; ?>" selected>{{( $view->category)}}</option>
                <option value="domestic">Domestic</option>
                <option value="industry">Industry</option>
                <option value="institution">Institution</option>
                <option value="commercial">Commercial</option>
                <option value="tank">Tank</option>
              </select>

              @error('category')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror 
            </div>
          </div>
          <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Gender</label>
            <div class="col-sm-10">
              <select name="gender" class="form-control" id="colFormLabel" placeholder="col-form-label">
                <option value="<?php echo $view -> gender; ?>"> {{( $view->gender)}}</option>
                <option value="m"> M </option>
                <option value="f"> F </option>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label">Street</label>
            <div class="col-sm-10">
              <select name="street" id="colFormLabel" class="form-control @error('street') is-invalid @enderror"
                      id="inputStreet" value="{{ old('street') }}">
                  <option value="<?php echo $view -> street; ?>">{{( $view->street)}}</option>
                  <option value="Mindu">Mindu</option>
                  <option value="Sabasaba">Sabasaba</option>
                  <option value="Mazimbu">Mazimbu</option>
                  <option value="Bigwa">Bigwa</option>
                  <option value="Boma">Boma</option>
                  <option value="Kihonda">Kihonda</option>
                  <option value="Mbuyuni">Mbuyuni</option>
                  <option value="Msanvu">Msanvu</option>
                  <option value="Mzinga">Mzinga</option>

              </select>
      @error('street')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror 
            </div>
          </div>
          <div class="form-group row">
            <label for="colFormLabel" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-10">
              <input type="submit" class="btn btn-primary" value="update">
            </div>
          </div>
        </form>
      </div>

      <!-- Modal HTML -->
      <div id="myModal" class="modal fade">
        <div class="modal-dialog modal-confirm">
          <div class="modal-content">
            <div class="modal-header">
              <div class="icon-box">
                <i class="material-icons">&#xE5CD;</i>
              </div>				
              <h4 class="modal-title">Are you sure?</h4>	
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
              <p>Do you really want to delete {{( $view->name)}} records? <em style="color: red;">This action is irreversible.</em></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
              <a href='{{ url("/delete/{$view -> id}") }}' type="submit" class="btn btn-danger center" style="color: #fff;">Delete<span class="material-icons">delete_forever</span></a>
            </div>
          </div>
        </div>
      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-3">

        <!-- Personal Details Widget -->
        <div class="card my-4">
          <h5 class="card-header">Personal Details</h5>
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

        <!-- Payment Status -->
        <div class="card my-4">
          <h5 class="card-header">Payment Status</h5>
          <div class="card-body">
            This part is not yet implemented!
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

<script>
$(document).ready(function(){
  $("#update").click(function(){
    $("#forView").hide();
    $("#forUpdate").show();
    $("#update").addClass("active");
    $("#view").removeClass("active");
  });
  $("#view").click(function(){
    $("#forView").show();
    $("#forUpdate").hide();
    $("#view").addClass("active");
    $("#update").removeClass("active");
  });
});
</script>