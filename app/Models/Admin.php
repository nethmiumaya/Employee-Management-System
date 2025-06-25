<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $primaryKey = 'admin_id';
    protected $fillable = ['admin_name'];
    public $incrementing = true;
    protected $keyType = 'int';

    public function employee() {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function employees() {
        return $this->hasMany(Employee::class, 'admin_id');
    }
}

