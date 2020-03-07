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
<form class="p-3 container jumbotron" action="{{ url('/addCustomer') }}" method="POST">
@csrf
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="name">{{_('Name')}}</label>
      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
              name="name" value="{{ old('name') }}" autocomplete="name" autofocus placeholder="John Ndalo">

      @error('name')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </div>
    <div class="form-group col-md-6">
      <label for="phone">{{_('Phone')}}</label>
      <input name="phone" type="tel" class="form-control @error('phone') is-invalid @enderror"
              id="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="+255123456789">
    
      @error('phone')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror    
    </div>
  </div>
  <div class="form-group">
    <label for="inputStreet">Street</label>
    <select name="street" class="form-control @error('street') is-invalid @enderror"
             id="inputStreet" value="{{ old('street') }}">
        <option></option>
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

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputmeter">Meter Number</label>
      <select name="meter_no" class="form-control @error('meter_no') is-invalid @enderror" id="inputmeter" value="{{ old('meter_no') }}">
        @if(count($meter) > 0)
            @foreach($meter -> all() as $meter)
                <option>{{($meter-> meter_no)}}</option>
            @endforeach
        @else
            <option value="" selected>No free meter available</option> 
        @endif           
      </select>
      @error('meter_no')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror       
    </div>
    <div class="form-group col-md-4">
      <label for="inputCategory">Category</label>
      <select name="category" id="inputCategory" class="form-control @error('category') is-invalid @enderror" value="{{ old('category') }}">
        <option value="" selected>Choose...</option>
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
    <div class="form-group col-md-2">
      <label for="gender">Gender</label>
      <select name="gender" class="form-control" id="gender">
            <option>M</option>
            <option>F</option>
      </select>
    </div>
  </div>
  <!-- <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Check me out
      </label>
    </div>
  </div> -->
  <button type="submit" class="btn btn-primary">Register</button>
</form>
</div>


<div class="container">
     <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Customers</h1>
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
                <th>Category</th>
                <th>Status</th>
                <th>Trend</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
            $count = 0;
                
                ?>
                    @if(count($customers) > 0 )
                        @foreach($customers -> all() as $customers) 
                         
                            <?php 
                              $count += 1;
                            ?>
                
            <tr>
                <td>{{( $count )}}</td>
                <td>{{( $customers -> name )}}</td>
                <td>{{( $customers -> street )}}</td>
                @if(count($customers->meter) > 0 )
                    @foreach($customers->meter as $customer)
                        <td>{{( $customer -> meter_no )}}</td>
                    @endforeach
                @else
                    <td>-</td>
                @endif
                <td>{{( $customers -> gender )}}</td>
                <td>{{( $customers -> phone )}}</td>
                <td>{{( $customers -> category )}}</td>
               
            <!-- getting customer's payment status from payments table -->
            @if(count($customers->payments) > 0 )
                @foreach($customers->payments as $cust)
                    <td>{{( $cust -> status )}}</td>
                @endforeach
            @else
                <td>-</td>
            @endif                        
            <td><a href="#"><span data-toggle="tooltip" data-placement="left" title="view bills trend"data-toggle="tooltip" data-placement="left" title="Tooltip on left"><i class="fa fa-line-chart"></i></span></a></td>
              
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
                <th>Category</th>
                <th>Status</th>
                <th>Trend</th>
                
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

