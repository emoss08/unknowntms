<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status',
        'code',
        'name',
        'Address_line_1',
        'Address_line_2',
        'City',
        'State',
        'Zip',
        'Country',
        'Phone',
        'Fax',
        'Email',
        'Website',
        'Contact_name',
        'Contact_title',
        'Contact_phone',
        'Contact_email',
        'Contact_fax',
        'Contact_mobile',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
