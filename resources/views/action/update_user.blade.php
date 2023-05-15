@include('include/head')
    <style>
        .scroll{
            height: 100vh;
            overflow: hidden;
            overflow-y: scroll;
        }
    </style>
    <title>Update Info</title>
</head>
<body>
    @include('include/nav')
    <div class="container scroll pt-2 pb-2">
        <a href="/user-management" class="btn btn-danger">Back</a>
        <form action="{{ route('update.user', $user->id) }}" method="POST" class="form">
            @csrf
            <!-- <div class="col-md-3">
                <h2>Account Information</h1>
                <div>
                    <label class="form-label" for="email">Email Address</label>
                    <input class="form-control" type="text" name="email" id="email" required value="{{ $user->email }}">
                </div>
                <div>
                    <label class="form-label" for="password">Password</label>
                    <input class="form-control" type="password" name="password" id="password" required value="{{ $user->password }}">
                </div>
                <div>
                    <label class="form-label" for="confirm_password">Confirm Password</label>
                    <input class="form-control" type="password" name="confirm_password" id="confirm_password" required>
                </div>
            </div> -->

            <!-- personal information -->
            <div class="col-md-12">
                <div class="col-md-12">
                    <h2>Personal Information</h2>
                    <div class="row-">
                        <label class="form-label" for="firstname">Firstname</label>
                        <input class="form-control" type="text" id="firstname" name="firstname" required value="{{ $user->firstname }}">
                    </div>
                    <div>
                        <label class="form-label" for="middlename">Middlename</label>
                        <input class="form-control" type="text" id="middlename" name="middlename" required value="{{ $user->middlename }}">
                    </div>
                    <div>
                        <label class="form-label" for="lastname">Lastname</label>
                        <input class="form-control" type="text" id="lastname" name="lastname" required value="{{ $user->lastname }}">
                    </div>
                    <div>
                        <label class="form-label" for="birthdate">Birth Date</label>
                        <!-- <input class="form-control" type="date" id="birthdate" name="birthdate" required> -->
                        <input class="form-control" type="text" id="birthdate" name="birthdate" required value="{{ $user->birthdate }}">
                    </div>
                        <!-- <script>
                            var date = new Date({{$user->birthdate}})
                            console.log(date)
                            var year = date.getFullYear()
                            var month = String(date.getMonth() + 1 ).padStart(2, '0')
                            var today = String(date.getDate()).padStart(2, '0')
                            console.log(today)
                            var formatted = month + '/' + today + '/' + year
                            console.log(formatted)
                            document.getElementById('birthdate').value = formatted
                        </script> -->
                    <div>
                        <label class="form-label" for="age">Age</label>
                        <input class="form-control" type="number" id="age" name="age" required value="{{ $user->age }}">
                    </div>
                    <div>
                        <label class="form-label" for="gender">Gender</label>
                        <select class="form-control" name="gender" id="gender" required>
                            <option value="" disabled selected>Please Select Gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div>
                        <label class="form-label" for="role">Role</label>
                        <select class="form-control" name="role" id="role" required>
                            <option value="" disabled selected>Please Select Role</option>
                            <option value="Super Admin">Super Admin</option>
                            <option value="Admin">Admin</option>
                        </select>
                    </div>
                    <div>
                        <label class="form-label" for="department">Department</label >
                        <select class="form-control" name="department" id="rdepartmentole" required>
                            <option value="" disabled selected>Please Select Department</option>
                            @if($departments)
                                @foreach($departments as $department)
                                <option value="{{ $department->department }}">{{ $department->department }}</option>
                                @endforeach
                            @endif
                        </select>
                        <!-- <input type="text" name="department" value="{{ $user->department }}"> -->
                    </div>
                    <div>
                        <label class="form-label" for="contact_number">Contact Number</label>
                        <input class="form-control" type="text" name="contact_number" required value="{{ $user->contact_number }}">
                    </div>
                    <div>
                        <label class="form-label" for="tel_number">Tel Number</label>
                        <input class="form-control" type="text" name="tel_number" required value="{{ $user->tel_number }}">
                    </div>
                </div>
                <!-- address information -->
                <div>
                    <h2>Address Information</h2>
                    <div>
                        <label class="form-label" for="house_number">House No / Lot / Block / Street</label>
                        <input class="form-control" type="text" name="house_number" id="house_number" required value="{{ $user->house_number }}">
                    </div>

                    <div>
                        <label class="form-label" for="country">Country</label>
                        <input class="form-control" type="text" name="country" id="country" required value="{{ $user->country }}">
                    </div>

                    <div>
                        <label class="form-label" for="province">Province</label>
                        <input class="form-control" type="text" name="province" id="province" required value="{{ $user->province }}">
                    </div>

                    <div>
                        <label class="form-label" for="city">City</label>
                        <input class="form-control" type="text" name="city" id="city" required value="{{ $user->city }}">
                    </div>

                    <div>
                        <label class="form-label" for="barangay">Barangay</label>
                        <input class="form-control" type="text" name="barangay" id="barangay" required value="{{ $user->barangay }}">
                    </div>

                    <div>
                        <label class="form-label" for="zip_code">Zip Code</label>
                        <input class="form-control" type="text" name="zip_code" id="zip_code" required value="{{ $user->zip_code }}">
                    </div>
                </div>
            </div>
            <button class="btn btn-outline-success">Save</button>
        </form>
    </div>
</body>
</html>