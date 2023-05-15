@include('include/head')
    <title>Department</title>
</head>
<body>
    @include('include/nav')
    <div class="container mt-2">
        @include('include/head_nav')
        <div class="p-2">
            <button type="button" class="btn btn-primary mt-2 mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">Add New Department</button>

            <!-- modal form display -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Add Department</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('add.department') }}" method="POST" class="form">
                            @csrf
                            <div class="modal-body">
                                <label for="department">Department</label>
                                <input type="text" class="form-control" name="department" id="department" required>
                            </div>
                            <div class="modal-footer">
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
                        <th>Department</th>
                        <th>Status</th>
                        <th>Date Updated</th>
                        <th>Date Added</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if($departments)
                        @foreach($departments as $department)
                            <tr>
                                <td>{{ $department->id }}</td>
                                <td>{{ $department->department }}</td>
                                <td>{{ $department->status }}</td>
                                <td>{{ $department->updated_at }}</td>
                                <td>{{ $department->created_at }}</td>
                                <td>
                                    @if($department->status == 'Active')
                                        <a href="{{ route('disable.department', $department->id) }}" class="btn btn-outline-danger p-1">Disable</a>
                                    @else
                                        <a href="{{ route('enable.department', $department->id) }}" class="btn btn-outline-primary p-1">Enable</a>
                                    @endif
                                    <!-- <a href="/update" class="btn btn-outline-primary p-1">Enable</a> -->
                                    <a href="/update" class="btn btn-outline-success p-1">Update</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <p>No Record</p>
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