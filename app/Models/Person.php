<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasUuids;
    protected $keyType = 'string';
    public $incrementing = false;

    public $timestamps = false;

    protected $guarded = [];

    protected $casts = [
        'stack' => 'array'
    ];

}
