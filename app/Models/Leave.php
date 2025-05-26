<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $primaryKey = 'leave_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'leave_id', 'employee_id', 'supporting_doc',
        'reason', 'start_date', 'end_date'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}

