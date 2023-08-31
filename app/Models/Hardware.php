<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hardware extends Model
{
    use HasFactory;

    protected $table = 'hardware';

    public $timestamps = false;

    protected $primaryKey = 'hardware';

    protected $keyType = 'string';

    protected $fillable = ['hardware', 'location', 'timezone', 'local_time', 'latitude', 'longitude'];

    protected static function boot()
    {
        parent::boot();
        static::saving(function ($model) {
            $model->created_by = auth()->user()->name;
            $model->created_at = date("Y-m-d H:i:s");
        });
    }
}
