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
<div class=" shadow mb-3">
<form class="p-3 container jumbotron" action="{{ url('/addMeter') }}" method="POST">
@csrf
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="name">{{_('Meter Number')}}</label>
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


  
  <button type="submit" class="btn btn-primary">Register</button>
</form>
</div>
</div>

<div class="container">
     <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <table class="table table-borderless mydatatable responsive" style="width:100%">
        <thead>
            <tr>
                <th>#</th>
                <th>meter.no</th>
                <th>customer</th>
                <th>meter type</th>
                
                
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
                            
                        <tr>
                            <td>{{( $count )}}</td>
                            <td>{{( $meter -> meter_no )}}</td>
                            @if(count($meter->customer) > 0 )
                                <td>{{( $meter->customer -> name )}}</td>
                            @else
                                <td>-</td>
                            @endif
                            <td>{{( $meter -> type )}}</td>
                        </tr>
                        @endforeach
                    @endif   
                   
                    
            </tbody>
        <tfoot>
            <tr>
                <th>#</th>
                <th>meter.no</th>
                <th>customer</th>
                <th>meter type</th>
                
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

