<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use App\Models\LogRecords;

class UserAuth extends Controller
{
    //
    function __construct(){
        $this->user = new Users;
        $this->log_record = new LogRecords;
    }

    function userLogin_get(){
        // if(session()->has('id')){
        //     return redirect('/user-management');
        // }else{
        //     return view('login');
        // }
        return view('login');
    }

    function userLogin_post(Request $request){
        $email = $request->email;
        $password = $request->password;
        $token = $request->_token;
        // var_dump($request->input());

        $users = $this->user->getUser();
        foreach($users as $user){
            // if($user->email == $email){
            //     print('email found');
            //     if($user->password == $password){
            //         print('password match');
            //         $request->session()->put('id', $user['id']);
            //         $data = [
            //             'user_id' => $user->id,
            //             'remarks' => $user->lastname. " " .'has logged in',
            //         ];
            //         $this->log_record->addLogRecord($data);
            //         return redirect('/user-management');
            //     }else{
            //         print('password does not match');
            //         return redirect('/login');
            //     }
            // }
            if($user->email == $email){
                if($user->status == 'Inactive'){
                    // print('inactive');
                    return redirect('/login');
                }
                if($user->password != $password){
                    // print('wrong password');
                    return redirect('/login');
                }

                $request->session()->put('id', $user['id']);
                $data = [
                    'user_id' => $user->id,
                    'remarks' => $user->firstname. " " .'has logged in',
                ];
                $this->log_record->addLogRecord($data);
                // print('logged in');
                return redirect('/user-management');
            }
        }
        return redirect('/login');
    }

    function logout(Request $request){
        if(session()->has('id')){
            $id = $request->session()->get('id');
            $user = Users::find($id);

            var_dump($user);
            $data = [
                'user_id' => $user->id,
                'remarks' => $user->firstname. " " .'has logged out',
            ];
            $this->log_record->addLogRecord($data);
            session()->pull('id');
        }
        return redirect('/login');
    }
}
