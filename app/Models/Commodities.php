<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\Permission\Traits\HasRoles;

class Commodities extends Model implements Auditable
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
        'commodity_id',
        'description',
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

    // Relationship between User and Commodities
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Set the first string uppercase of Equip Type ID.
     *
     * @param  string  $value
     * @return void
     */
    public function setCommodityIdAttribute($value)
    {
        $this->attributes['commodity_id'] = strtoupper($value);
    }

    /**
     * Set the first string uppercase of Description.
     *
     * @param  string  $value
     * @return void
     */
    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = ucfirst($value);
    }
}
