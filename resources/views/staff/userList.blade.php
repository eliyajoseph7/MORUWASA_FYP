            <div class="row wrapper">
                <div class="col-lg-12">
                <div class="ibox shadow">
                        <div class="ibox-title">
                            <h5>Registered users</h5>
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
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 266px;">First Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 266px;">Last Name</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 183px;">Email</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 239px;">Phone</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 131px;">Gender</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 131px;">Username</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 131px;">Occupation</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 131px;">Permission</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 131px;">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $count = 0;
                                            
                                            ?>
                                                @if(count($users) > 0 )
                                                    @foreach($users -> all() as $users) 
                                                    
                                                        <?php 
                                                        $count += 1;
                                                        ?>
                                                        
                                                        <tr class="gradeA odd" role="row">
                                                            <td class="sorting_1">{{( $count )}}</td>
                                                            <td>{{( $users -> firstname )}}</td>
                                                            <td>{{( $users -> lastname )}}</td>
                                                            <td class="center">{{( $users -> email )}}</td>
                                                            <td class="center">{{( $users -> phone )}}</td>
                                                            <td class="center">{{( $users -> gender )}}</td>
                                                            <td class="center">{{( $users -> username )}}</td>
                                                            <td class="center">{{( $users -> occupation )}}</td>
                                                            <td class="center">{{( $users -> permission )}}</td>
                                                            
                                                            <td class="project-actions">
                                                                <a href='' data-toggle="modal" data-target="#{{($users->id)}}" class="btn btn-white btn-sm"><i class="fa fa-pencil"></i> Edit </a>
                                                                <a href='' data-toggle="modal" data-target="#{{($users->id)}}1" class="btn btn-white btn-sm"><i class="fas fa-trash-alt"></i> Delete</a>
                                                            </td> 
                                                            <!-- Modal for update action -->
                                                            <div class="modal fade" id="{{($users->id)}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Update User details</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <form action="{{ url('/update',array($users->id)) }}" method="POST">
                                                                            {{csrf_field()}}
                                                                            <div class="modal-body">
                                                                                <div class="form-group row">
                                                                                    <div class="col-md-6">
                                                                                        <label for="firstname">First Name</label>
                                                                                        <input id="firstname" type="text" class="form-control" name="firstname" value=<?php echo  $users->firstname; ?> autofocus>
                                                                                            <small class="custom-control-input form-text text-muted  @error('firstname') is-invalid @enderror col-md-6" value="{{ old('firstname') }}"></small>

                                                                                        @error('firstname')
                                                                                            <span class="invalid-feedback text-danger" role="alert">
                                                                                                <strong>{{ $message }}</strong>
                                                                                            </span>
                                                                                        @enderror
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <label for="lastname">Last Name</label>
                                                                                        <input id="lastname" type="text" class="form-control" name="lastname" value=<?php echo  $users->lastname; ?> autofocus>
                                                                                            <small class="custom-control-input form-text text-muted  @error('lastname') is-invalid @enderror col-md-6" value="{{ old('lastname') }}"></small>

                                                                                        @error('lastname')
                                                                                            <span class="invalid-feedback text-danger" role="alert">
                                                                                                <strong>{{ $message }}</strong>
                                                                                            </span>
                                                                                        @enderror
                                                                                    </div>
                                                                                    
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="email">Email address</label>
                                                                                    <input id="email" type="email" class="form-control" name="email" value=<?php echo  $users->email; ?>>
                                                                                        <small class="custom-control-input  @error('email') is-invalid @enderror col-md-12" value="{{ old('email') }}"></small>
                                                                                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>

                                                                                    @error('email')
                                                                                        <span class="invalid-feedback text-danger" role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <div class="col-md-6">
                                                                                        <label for="username">Username</label>
                                                                                        <input name="username" type="text" class="form-control @error('username') is-invalid @enderror" value=<?php echo  $users->username; ?>>
                                                                                            <small class="custom-control-input  @error('username') is-invalid @enderror col-md-12" value="{{ old('username') }}"></small>
                                                                                        @error('username')
                                                                                            <span class="invalid-feedback text-danger" role="alert">
                                                                                                <strong>{{ $message }}</strong>
                                                                                            </span>
                                                                                        @enderror
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <label for="phone">Phone</label>
                                                                                        <input name="phone" type="tel" class="form-control"
                                                                                                id="phone" value=<?php echo  $users->phone; ?>>
                                                                                        <small class="custom-control-input  @error('phone') is-invalid @enderror col-md-12" value="{{ old('phone') }}"></small>

                                                                                        @error('phone')
                                                                                            <span class="invalid-feedback text-danger" role="alert">
                                                                                                <strong>{{ $message }}</strong>
                                                                                            </span>
                                                                                        @enderror 
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group row">
                                                                                    <div class="col-md-8">
                                                                                        <label for="occupation">Occupation</label>
                                                                                        <select name="occupation" class="form-control">
                                                                                                <option value=<?php echo  $users->occupation; ?>> {{($users->occupation)}} </option>
                                                                                                <option value="bill officer"> Bill Officer </option>
                                                                                                <option value="bill manager"> Bill Manager </option>
                                                                                                <option value="accountant"> Accountant </option>
                                                                                            </select>
                                                                                            
                                                                                            <small class="custom-control-input  @error('occupation') is-invalid @enderror col-md-12"></small>
                                                                                        @error('occupation')
                                                                                            <span class="invalid-feedback text-danger" role="alert">
                                                                                                <strong>{{ $message }}</strong>
                                                                                            </span>
                                                                                        @enderror 
                                                                                    </div>
                                                                                    <div class="col-md-4">
                                                                                        <label for="gender">Gender</label>
                                                                                            <select name="gender" class="form-control">
                                                                                                <option value=<?php echo  $users->gender; ?>> {{($users->gender)}} </option>
                                                                                                <option value="M"> Male </option>
                                                                                                <option value="F"> Female </option>
                                                                                            </select>
                                                                                            
                                                                                            <small class="custom-control-input  @error('gender') is-invalid @enderror col-md-12"></small>
                                                                                        @error('gender')
                                                                                            <span class="invalid-feedback text-danger" role="alert">
                                                                                                <strong>{{ $message }}</strong>
                                                                                            </span>
                                                                                        @enderror 
                                                                                    </div>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label for="permission">User Permission</label>
                                                                                        <select name="permission" class="form-control">
                                                                                            <option value=<?php echo  $users->permission; ?>> {{($users->permission)}} </option>
                                                                                            <option value="superuser"> Superuser </option>
                                                                                            <option value="user"> Normal user </option>
                                                                                        </select>
                                                                                        
                                                                                        <small class="custom-control-input  @error('permission') is-invalid @enderror col-md-12"></small>
                                                                                    @error('permission')
                                                                                        <span class="invalid-feedback text-danger" role="alert">
                                                                                            <strong>{{ $message }}</strong>
                                                                                        </span>
                                                                                    @enderror 
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Modal for delete action -->
                                                            <div class="modal fade" id="{{($users->id)}}1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <p>Do you really want to delete {{( $users->firstname)}} {{( $users->lastname)}} records? <em style="color: red;">This action is irreversible.</em></p>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                                            <a href='{{ url("/deleteUser/{$users -> id}") }}' type="button" class="btn btn-danger">Delete User</a>
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
                                            <th rowspan="1" colspan="1">First Name</th>
                                            <th rowspan="1" colspan="1">Last Name</th>
                                            <th rowspan="1" colspan="1">Email</th>
                                            <th rowspan="1" colspan="1">Phone</th>
                                            <th rowspan="1" colspan="1">Gender</th>
                                            <th rowspan="1" colspan="1">Username</th>
                                            <th rowspan="1" colspan="1">Occupation</th>
                                            <th rowspan="1" colspan="1">Permission</th>
                                            <th rowspan="1" colspan="1">Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>




