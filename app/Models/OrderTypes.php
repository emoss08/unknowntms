<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\Permission\Traits\HasRoles;

class OrderTypes extends Model implements Auditable
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
        'order_type_id',
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
    public function setOrderTypeIdAttribute($value)
    {
        $this->attributes['order_type_id'] = strtoupper($value);
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
