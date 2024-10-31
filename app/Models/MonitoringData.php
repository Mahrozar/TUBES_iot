<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonitoringData extends Model
{
    use HasFactory;

    protected $fillable = [
        'device_id', 'parameter', 'value', 'created_at'
    ];

    public $timestamps = false; // Jika tidak ada kolom timestamps
}
