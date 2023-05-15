<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\Departments;
use App\Models\Roles;
use App\Models\LogRecords;

class UserController extends Controller
{
    //
    function __construct(){
        $this->user = new Users;
        $this->department = new Departments;
        $this->role = new Roles;
        $this->log_record = new LogRecords;
    }

    function user(Request $request){
        $id = $request->session()->get('id');
        $user_info = Users::find($id);
        // print($id);
        // print($user_info);
        $users = $this->user->getUser();
        $active = 0;
        $inactive = 0;
        $total_user = 0;
        foreach($users as $user) {
            $total_user = $total_user + 1;
            if($user->status === 'Active'){
                $active = $active + 1;
            }else if($user->status === 'Inactive'){
                $inactive = $inactive + 1;
            }
        }
        return view('index', compact('users', 'user_info'), [
            'total_user' => $total_user,
            'active' => $active,
            'inactive' => $inactive,
        ]);
    }

    function add_user_get(){
        $departments = $this->department->getDepartment();
        $roles = $this->role->getRole();
        return view('action/add_user', compact('departments', 'roles'));
    }

    function add_user_post(Request $request){
        $data = [
            'email' => $request->email,
            'password' => $request->password,
            'firstname' => $request->firstname,
            'middlename' => $request->middlename,
            'lastname' => $request->lastname,
            'birthdate' => $request->birthdate,
            'age' => $request->age,
            'gender' => $request->gender,
            'role' => $request->role,
            'department' => $request->department,
            'contact_number' => $request->contact_number,
            'tel_number' => $request->tel_number,
            'house_number' => $request->house_number,
            'country' => $request->country,
            'province' => $request->province,
            'city' => $request->city,
            'barangay' => $request->barangay,
            'zip_code' => $request->zip_code,
            // 'created_at' => date('M d, Y'),
            // 'updated_at' => date('M d, Y'),
        ];
        // var_dump($data);

        if($request->password !== $request->confirm_password) {
            print(`password doesn't match`);
            return view('user/add_user');
        }else{
            $this->user->addUser($data);
            return redirect('/user-management');
        }
        return redirect('/user-management');
    }

    function update_user_get(Request $request, $id){
        $user = Users::find($id);

        if(!$user){
            print('no id found');
        }else{
            $departments = $this->department->getDepartment();
            return view('action/update_user', compact('departments'), [
                'user' => $user,
            ]);
        }
    }

    function update_user_post(Request $request, $id){
        $user = Users::find($id);
        // print($user);
        $user->firstname = $request->firstname;
        $user->middlename = $request->middlename;
        $user->lastname = $request->lastname;
        $user->birthdate = $request->birthdate;
        $user->age = $request->age;
        $user->gender = $request->gender;
        $user->role = $request->role;
        $user->department = $request->department;
        $user->contact_number = $request->contact_number;
        $user->tel_number = $request->tel_number;
        $user->house_number = $request->house_number;
        $user->country = $request->country;
        $user->province = $request->province;
        $user->city = $request->city;
        $user->barangay = $request->barangay;
        $user->zip_code = $request->zip_code;
        $user->updated_at = date('M d, Y');

        // print($user);
        $user->save();

        return redirect('/user-management');
    }

    function disable_user(Request $request, $id){
        $user = Users::find($id);
        $user->status = 'Inactive';
        $user->save();
        return redirect('/user-management');
    }
    function enable_user(Request $request, $id){
        $user = Users::find($id);
        $user->status = 'Active';
        $user->save();
        return redirect('/user-management');
    }

    function role(){
        $roles = $this->role->getRole();
        // var_dump($roles);
        return view('role', compact('roles'));
    }

    function disable_role(Request $request, $id){
        $role = Roles::find($id);
        // var_dump($roles);
        $role->status = 'Inactive';
        $role->save();
        return redirect('/roles');
    }

    function enable_role(Request $request, $id){
        $role = Roles::find($id);
        // var_dump($roles);
        $role->status = 'Active';
        $role->save();
        return redirect('/roles');
    }

    function add_role(Request $request){
        var_dump($request->role_name);
        var_dump($request->user_information);
        var_dump($request->user_management);
        var_dump($request->department);
        var_dump($request->role);
        var_dump($request->monitoring);
        var_dump($request->setting);
        $data = [
            'role_name' => $request->role_name,
            'user_information' => $request->user_information,
            'user_management' => $request->user_management,
            'department' => $request->department,
            'role' => $request->role,
            'monitoring' => $request->monitoring,
            'setting' => $request->setting,
        ];
        var_dump($data);

        $this->role->addRole($data);
        var_dump($this->role);
        return redirect('/roles');
    }

    function department(){
        $departments = $this->department->getDepartment();
        return view('department', compact('departments'));
    }

    function disable_department(Request $request, $id){
        $department = Departments::find($id);
        $department->status = 'Inactive';
        $department->save();
        return redirect('/departments');
    }

    function enable_department(Request $request, $id){
        $department = Departments::find($id);
        $department->status = 'Active';
        $department->save();
        return redirect('/departments');
    }

    function add_department(Request $request){
        $department = $request->department;
        // var_dump($department);
        $data = [
            'department' => $request->department,
        ];
        $this->department->addDepartment($data);
        return redirect('/departments');
    }

    function monitoring(){
        return view('monitoring');
    }

    function login_record(){
        $log_records = $this->log_record->getLogRecord();
        // var_dump($log_records);
        return view('login_records', compact('log_records'));
    }
}
