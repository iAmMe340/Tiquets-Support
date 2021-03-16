<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    public $table = 'devices';

    protected $fillable = [
        'codactf',
        'equipo',
        'marca',
        'modelo',
        'serie',
        'ubicacion',
        'tipo',
        'area_id',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'device_id', 'id');
    }

    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id');
    }
}
