@include('include/head')
    <title>Monitoring</title>
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
                        <th>Name</th>
                        <th>Role</th>
                        <th>Where</th>
                        <th>Action</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Date Added</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Super User</td>
                        <td>Super Admin</td>
                        <td>Option</td>
                        <td>Update</td>
                        <td>Stataus ID: 1</td>
                        <td>Stataus ID: 3</td>
                        <td>May 9, 2023</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>