<?php

namespace Domain\Battery\Infrastructure\Persistence\Eloquent;

use Illuminate\Database\Eloquent\Model;

class PingModel extends Model
{
    protected $table = 'pings';

    protected $fillable = [
        'uuid',
        'battery_percent',
    ];

    public $timestamps = true; // created_at, updated_at

}