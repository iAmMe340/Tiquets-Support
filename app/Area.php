<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    public $table = 'areas';

    protected $fillable = [
        'name',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'area_id', 'id');
    }

    public function devices()
    {
        return $this->hasMany(Device::class, 'area_id', 'id');
    }
}
