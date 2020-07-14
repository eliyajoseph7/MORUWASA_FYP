@extends('constants.headerAndSide')
@section('content')

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
                    <strong class="text-danger">Deleted customers</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>

    <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox shadow">
                        <div class="ibox-title">
                            <h3 class="text-danger font-weight-bold">Deleted Customers</h3>
                            <div class="ibox-tools">
                                <?php $data = count($customers) ?>
                                @if($data == 0)
                                <a href="/restore_all" class="btn btn-success disabled">
                                    Restore All
                                </a>
                                <a href="/delete_all" class="btn btn-danger disabled">
                                    Delete All
                                </a>
                                @else
                                <a href="/restore_all" class="btn btn-success">
                                    Restore All
                                </a>
                                <a href="/delete_all" class="btn btn-danger">
                                    Delete All
                                </a>
                                @endif
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
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 131px;">Deleted At</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 131px;">Deleted By</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 131px;">Action</th>
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
                                                            <td class="center">{{( $customers -> deleted_at )}}</td>
                                                            <td class="center">{{( $customers -> user->firstname )}} {{( $customers -> user->lastname )}}</td>
                                                            <td class="project-actions">
                                                                <a href='' data-toggle="modal" data-target="#{{($customers->id)}}" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Restore </a>
                                                                <a href='' data-toggle="modal" data-target="#{{($customers->id)}}1" class="btn btn-white btn-sm"><i class="fas fa-trash-alt"></i> Delete</a>
                                                            </td>

                                                            <!-- Modal for update action -->
                                                            <div class="modal fade" id="{{($customers->id)}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Restore Customer</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                            <div class="modal-body">
                                                                               <p>Are you sure to restore customer <strong class="text-warning">{{( $customers->name)}}</strong>?</p>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                                <a href='{{ url("/restoreCustomer/{$customers -> id}") }}' type="button" class="btn btn-primary">Restore</a>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Modal for delete action -->
                                                            <div class="modal fade" id="{{($customers->id)}}1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>Do you really want to delete {{( $customers->name)}} records? <em style="color: red;">This action is irreversible.</em></p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                            <a href='{{ url("/permanentDeleteCustomer/{$customers -> id}") }}' type="button" class="btn btn-danger">Delete User</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div> 
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
                                            <th rowspan="1" colspan="1">Deleted At</th>
                                            <th rowspan="1" colspan="1">Deleted By</th>
                                            <th rowspan="1" colspan="1">Action</th>
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