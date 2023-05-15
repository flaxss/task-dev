<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;

    protected $fillable = [
        'role_name',
        'user_information',
        'user_management',
        'department',
        'role',
        'monitoring',
        'setting',
        'status',
        'updated_at',
    ];

    public function addRole($data){
        return $this->create($data);
    }

    public function getRole(){
        if(!$this->all()){
            return [];
        }else {
            return $this->all();
        }
    }

    // public function oneRole(){
    //     return $this->selected()
    // }
}
