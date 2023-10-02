<?php

namespace App\Models;

use App\Models\Store;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'store_id',
        'street',
        'city',
        'zip',
        'state',
        'lat',
        'long',
    ];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}
