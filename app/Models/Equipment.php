<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{

    protected $table = 'equipment';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'tractor_id',
    'license_plate_num',
    'vin_number',
    'equipment_type',
    'manufacturer',
    'manufactured_date',
    'model',
    'model_year',
    'country',
    'state',
    'is_leased',
    'owned_by',
    'leased_date',
    'notes',
    ];

    /**
     * Indicates if the model's ID is auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;
}
