<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'trailer_id',
        'year',
        'make',
        'model',
        'vin',
        'owned_by',
        'equip_type_id',
        'tag',
        'tag_state',
        'tag_expiration',
        'last_inspection',
        'comments',
        'entered_by',];
}
