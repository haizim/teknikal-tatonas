<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HardwareDetail extends Model
{
    use HasFactory;

    protected $table = 'hardware_detail';

    public $timestamps = false;

    protected $fillable = ['hardware', 'sensor'];

    public function sensors()
    {
        return $this->hasOne(MasterSensor::class, 'sensor', 'sensor');
    }

    public function hardwares()
    {
        return $this->hasOne(Hardware::class, 'hardware', 'hardware');
    }
}
