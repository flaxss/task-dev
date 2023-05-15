@include('include/head')
    <title>Login Records</title>
</head>
<body>
    @include('include/nav')
    <div class="container mt-2">
        @include('include/head_nav')
        <div class="p-2">
            <div class="container d-flex">
                <div class=""><a class="btn btn-outline-dark mx-1" href="/monitoring">Activities</a></div>
                <div class=""><a class="btn btn-outline-dark" href="{{ route('view.logs') }}">Login Records</a></div>
            </div>
            <table id="table" class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>User ID</th>
                        <th>Remarks</th>
                        <th>Date Added</th>
                    </tr>
                </thead>
                <tbody>
                    @if($log_records)
                        @foreach($log_records as $log_record)
                        <tr>
                            <td>{{ $log_record->id }}</td>
                            <td>{{ $log_record->user_id }}</td>
                            <td>{{ $log_record->remarks }}</td>
                            <td>{{ $log_record->created_at }}</td>
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
    <script src="assets/js/datatable.js"></script>
</body>
</html>