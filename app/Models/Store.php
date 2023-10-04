<?php

namespace App\Models;

use App\Models\User;
use App\Models\Address;
use App\Models\Service;
use App\Traits\RouteKey;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Store extends Model
{
    use HasFactory, RouteKey;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'hours',
        'active',
        'services',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function address()
    {
        return $this->hasOne(Address::class);
    }
}