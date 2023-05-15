<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    use HasFactory;

    protected $fillable = [
        'department',
        'updated_at',
        'status',
    ];

    public function addDepartment($data){
        return $this->create($data);
    }

    public function getDepartment(){
        if(!$this->all()){
            return [];
        }else {
            return $this->all();
        }
    }
}
