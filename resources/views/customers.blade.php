@extends('constants.headerAndSide')
@section('content')
<style>
.button {
  border-radius: 10px;
  background-color: #6C757D;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 10px;
  padding: 5px;
  width: 80px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 0px;
}
.button a{
    color: #fff;
}
.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}
.button:hover {
    background-color: #0069D9;

}
.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
</style>

@if(session('info'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{session('info')}}.
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
<div class="container-fluid responsive">

    <div class="row wrapper border-bottom white-bg page-heading m-auto mb-3">
        <div class="col-lg-10">
            <h2>Customers</h2>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{url('/home')}}">Home</a>
                </li>
                <li class="breadcrumb-item">
                    <a>Activities</a>
                </li>
                <li class="breadcrumb-item active">
                    <strong>Register/View customers</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>

<!-- Form start -->
<div class=" shadow mb-3">
<?php $role = Auth::user()->permission; ?>
@if($role == 'superuser')
<form class="p-3 container-fluid m-auto jumbotron" action="{{ url('/addCustomer') }}" method="POST" style="width:90%">
@csrf
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="name">Name</label>
      <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
              name="name" value="{{ old('name') }}" autocomplete="name" autofocus placeholder="John Ndalo">

      @error('name')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
    </div>
    <div class="form-group col-md-6">
      <label for="phone">Phone</label>
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
  <div class="bt">
    <button type="submit" class="btn btn-primary">Register</button>
  </div>
</form>
@endif
</div>
</div>

<!-- Form end -->
    

    <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox dt shadow">
                        <div class="ibox-title">
                            <h5>Registered Customers</h5>
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
                        
                                <table class="table table-striped table-bordered table-hover dataTables-example dataTable display nowrap" style="width:100%" id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info" role="grid">
                                    <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending" style="width: 30px;">S/No.</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 266px;">Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 266px;">Street</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 239px;">Meter no</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 183px;">Gender</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 131px;">Phone</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 131px;">Category</th>
                                        <!-- <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 131px;">Status</th> -->
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 131px;">Trend</th>
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
                                                        
                                                        <tr class="gradeA odd" role="row">
                                                            <td class="sorting_1">{{( $count )}}</td>
                                                            <td>{{( $customers -> name )}}</td>
                                                            <td>{{( $customers -> street )}}</td>
                                                            @if(count(($customers->meter)->toArray()) > 0 )
                                                                <td>{{( $customers->meter -> meter_no )}}</td>
                                                            @else
                                                                <td>-</td>
                                                            @endif
                                                            <td class="center">{{( $customers -> gender )}}</td>
                                                            <td class="center">{{( $customers -> phone )}}</td>
                                                            <td class="center">{{( $customers -> category )}}</td>
                                                            <!-- getting customer's payment status from payments table -->
                                                            <!-- @if(count($customers->payments) > 0 )
                                                                @foreach($customers->payments as $cust)
                                                                    <td>{{( $cust -> status )}}</td>
                                                                @endforeach
                                                            @else
                                                                <td>-</td>
                                                            @endif  -->
                                                            <td><a href='{{ url("/view/{$customers -> id}") }}'><button class="button"><span>Bill Trend</span></button></a> </td>  
                                                        </tr>
                                                    @endforeach
                                                @endif    
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">S/No.</th>
                                            <th rowspan="1" colspan="1">Name</th>
                                            <th rowspan="1" colspan="1">Street</th>
                                            <th rowspan="1" colspan="1">Meter no</th>
                                            <th rowspan="1" colspan="1">Gender</th>
                                            <th rowspan="1" colspan="1">Phone</th>
                                            <th rowspan="1" colspan="1">Category</th>
                                            <!-- <th rowspan="1" colspan="1">Status</th> -->
                                            <th rowspan="1" colspan="1">Trend</th>
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


@endsection