<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogRecords extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'remarks',
    ];

    public function addLogRecord($data){
        return $this->create($data);
    }

    public function getLogRecord(){
        if(!$this->all()){
            return [];
        }else {
            return $this->all();
        }
    }
}
