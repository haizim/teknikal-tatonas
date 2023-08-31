<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterSensor extends Model
{
    use HasFactory;

    protected $table = 'master_sensor';

    public $timestamps = false;

    protected $primaryKey = 'sensor';

    protected $keyType = 'string';

    protected $fillable = ['sensor', 'sensor_name', 'unit'];

    protected static function boot()
    {
        parent::boot();
        static::saving(function ($model) {
            $model->created_by = auth()->user()->name;
            $model->created_at = date("Y-m-d H:i:s");
        });
    }
}
