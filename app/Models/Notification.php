<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $primaryKey = 'notifi_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['notifi_id', 'timestamp', 'type', 'delivery_channel', 'message'];
}

