@include('include/head')
    <title>Roles</title>
</head>
<body>
    @include('include/nav')
    <div class="container mt-2">
        @include('include/head_nav')
        <div class="p-2">
            <button type="button" class="btn btn-primary mt-2 mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New Role</button>
    <!-- modal form display -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Create Role</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('add.role') }}" method="POST">
                            @csrf
                            <div class="modal-body col-md-12 form">
                                <div class="col-md-12 mb-1">
                                    <input class="form-control" type="text" name="role_name" placeholder="Role Name">
                                </div>
                                <div class="d-flex">
                                    <!-- left side form -->
                                    <div class="col-md-6 mb-1">
                                        <div class="col-md-12 mb-1">
                                            <span>User Management</span>
                                            <div>
                                                <input type="radio" name="user_management" id="management_view" placeholder="Search Role" value="View">
                                                <label for="management_view">View</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-1">
                                            <span>User Information</span>
                                            <div>
                                                <input type="radio" name="user_information" id="information_add" placeholder="Search Role" value="Add">
                                                <label for="information_add">Add</label>
                                            </div>
                                            <div>
                                                <input type="radio" name="user_information" id="information_edit" placeholder="Search Role" value="Edit">
                                                <label for="information_edit">Edit</label>
                                            </div>
                                            <div>
                                                <input type="radio" name="user_information" id="information_view" placeholder="Search Role" value="View">
                                                <label for="information_view">View</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-1">
                                            <span>Department</span>
                                            <div>
                                                <input type="radio" name="department" id="department_add" placeholder="Search Role" value="Add">
                                                <label for="department_add">Add</label>
                                            </div>
                                            <div>
                                                <input type="radio" name="department" id="department_edit" placeholder="Search Role" value="Edit">
                                                <label for="department_edit" >Edit</label>
                                            </div>
                                            <div>
                                                <input type="radio" name="department" id="department_view" placeholder="Search Role" value="View">
                                                <label for="department_view" value="View">View</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-1">
                                            <span>Roles</span>
                                            <div>
                                                <input type="radio" name="role" id="role_add" placeholder="Search Role" value="Add">
                                                <label for="role_add">Add</label>
                                            </div>
                                            <div>
                                                <input type="radio" name="role" id="role_edit" placeholder="Search Role" value="Edit">
                                                <label for="role_edit">Edit</label>
                                            </div>
                                            <div>
                                                <input type="radio" name="role" id="role_view" placeholder="Search Role" value="View">
                                                <label for="role_view">View</label>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ride side form -->
                                    <div class="col-md-6 mb-1">
                                        <div class="col-md-12 mb-1">
                                            <span>Monitoring</span>
                                            <div>
                                                <input type="radio" name="monitoring" id="monitor_add" placeholder="Search Role" value="Add">
                                                <label for="monitor_add">Add</label>
                                            </div>
                                            <div>
                                                <input type="radio" name="monitoring" id="monitor_edit" placeholder="Search Role" value="Edit">
                                                <label for="monitor_edit">Edit</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-1">
                                            <span>Setting</span>
                                            <div>
                                                <input type="radio" name="setting" id="setting_add" placeholder="Search Role" value="Add">
                                                <label for="setting_add">Add</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button class="btn btn-primary">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <table class="table" id="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Date Updated</th>
                        <th>Date Added</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($roles)
                        @foreach($roles as $role)
                        <tr>
                            <td>{{ $role->id }}</td>
                            <td>{{ $role->role_name }}</td>
                            <td>{{ $role->status }}</td>
                            <td>{{ $role->updated_at }}</td>
                            <td>{{ $role->created_at }}</td>
                            <td>
                                @if($role->status == 'Active')
                                    <a class="btn btn-outline-danger p-1" href="{{ route('disable.role', $role->id) }}">Disable</a>
                                @else
                                    <a class="btn btn-outline-primary p-1" href="{{ route('enable.role', $role->id) }}">Enable</a>
                                @endif
                                <a class="btn btn-outline-success p-1" href="">Update</a>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    
    
    <script src="https://code.jquery.com/jquery-2.2.4.js" integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI=" crossorigin="anonymous"></script>
    
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    
    <!-- <script>
        $(document).ready( function () {
            $('#table').DataTable({
                // "paging": false,
                "aLengthMenu": [10],
                "ordering": false,
                "info": false
            });
        } );
    </script> -->
    <script src="assets/js/datatable.js"></script>
</body>
</html>