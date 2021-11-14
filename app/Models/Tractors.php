<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\Permission\Traits\HasRoles;

class Tractors extends Model implements Auditable
{
    use HasFactory, Notifiable, HasRoles;
    use \OwenIt\Auditing\Auditable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status',
        'tractor_id',
        'year',
        'make',
        'model',
        'vin',
        'owned_by',
        'driver_1',
        'driver_2',
        'tag',
        'tag_state',
        'tag_expiration',
        'last_inspection',
        'odometer',
        'comments',
        'entered_by',
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

    /** Belongs to relationship to User */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
