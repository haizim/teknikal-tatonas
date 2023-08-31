<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = ['hardware', 'parameter'];

    protected static function boot()
    {
        parent::boot();
        static::saving(function ($model) {
            $model->created_by = $model->hardware;
            $model->created_at = date("Y-m-d H:i:s");
        });
    }

    public function hardwares()
    {
        return $this->hasOne(Hardware::class, 'hardware', 'hardware');
    }

    public function transaksiDetail()
    {
        return $this->hasMany(TransaksiDetail::class, 'trans_id', 'trans_id');
    }
}
