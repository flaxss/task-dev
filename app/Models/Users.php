<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'password',
        'firstname',
        'middlename',
        'lastname',
        'birthdate',
        'age',
        'gender',
        'role',
        'department',
        'contact_number',
        'tel_number',
        'house_number',
        'country',
        'province',
        'city',
        'barangay',
        'zip_code',
        'updated_at',
        'status',
    ];

    public function addUser($data){
        return $this->create($data);
    }

    public function getUser(){
        if(!$this->all()){
            return [];
        }else {
            return $this->all();
        }
    }
}
