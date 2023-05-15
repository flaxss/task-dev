@include('include/head')
    <title>User Management</title>
</head>
<body>
    @include('include/nav')
    <div class="container mt-2">
        @include('include/head_nav')
        <div class="p-2">
            
            <a class="btn btn-primary mt-2" href="/add-user">Add User</a>
            <div class="container d-flex">
                <div class="card m-2" style="width: 100px; height: 50px;">All {{ $total_user }}</div>
                <div class="card m-2" style="width: 100px; height: 50px;">Active {{ $active }} </div>
                <div class="card m-2" style="width: 100px; height: 50px;">Inactive {{ $inactive }} </div>
            </div>
            <table id="table" class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>ROLE</th>
                        <th>DEPARTMENT</th>
                        <th>STATUS</th>
                        <th>DATE UPDATED</th>
                        <th>DATE ADDED</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @if($users)
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->firstname ." ". $user->middlename ." ". $user->lastname }}</td>
                            <td>{{ $user->role }}</td>
                            <td>{{ $user->department }}</td>
                            <td>{{ $user->status }}</td>
                            <td>{{ $user->updated_at }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>
                                @if($user->status == 'Active')
                                    <a class="btn btn-outline-danger p-1" href="{{ route('disable.user', $user->id) }}">Disable</a>
                                @else
                                    <a class="btn btn-outline-primary p-1" href="{{ route('enable.user', $user->id) }}">Enable</a>
                                @endif
                                <a href="{{ route('update.user', $user->id) }}" class="btn btn-outline-success p-1">Update</a>
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
                "aLengthMenu": [8],
                "ordering": false,
                "info": false,
                "lengthChange": false,
            });
        } );
    </script> -->
    <script src="assets/js/datatable.js"></script>
</body>
</html>