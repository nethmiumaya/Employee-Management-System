<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $primaryKey = 'department_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['department_id', 'department_name'];

    public function employees() {
        return $this->hasMany(Employee::class, 'department_id');
    }
}

