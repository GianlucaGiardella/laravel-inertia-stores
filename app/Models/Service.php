<?php

namespace App\Models;

use App\Models\Store;
use App\Traits\RouteKey;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory, RouteKey;

    public $timestamps = false;

    protected $fillable = [
        'name',
    ];

    public function stores()
    {
        return $this->belongsToMany(Store::class);
    }
}
