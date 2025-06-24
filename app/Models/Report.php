<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    protected $primaryKey = 'report_id';
    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = ['report_id', 'report_name', 'super_admin_id'];

    public function superAdmin() {
        return $this->belongsTo(SuperAdmin::class, 'super_admin_id');
    }
}

