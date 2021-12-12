<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Auditable;
use Spatie\Permission\Traits\HasRoles;

class Trailers extends Model implements \OwenIt\Auditing\Contracts\Auditable
{
    use HasFactory;
    use HasFactory, Notifiable, HasRoles;
    use Auditable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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

    /** Belongs to relationship to EquipmentType */
    public function equipmentType()
    {
        return $this->belongsTo(EquipmentType::class);
    }

    /**
     * Set the first string uppercase of Make.
     *
     * @param  string  $value
     * @return void
     */
    public function setMakeAttribute($value)
    {
        $this->attributes['make'] = ucfirst($value);
    }

    /**
     * Set the first string uppercase of Model.
     *
     * @param  string  $value
     * @return void
     */
    public function setModelAttribute($value)
    {
        $this->attributes['model'] = ucfirst($value);
    }

    /**
     * Set the first string uppercase of Vin.
     *
     * @param  string  $value
     * @return void
     */
    public function setVinAttribute($value)
    {
        $this->attributes['vin'] = strtoupper($value);
    }

    /**
     * Set the first string uppercase of Owned By.
     *
     * @param  string  $value
     * @return void
     */
    public function setOwnedByAttribute($value)
    {
        $this->attributes['owned_by'] = ucfirst($value);
    }

    /**
     * Set the first string uppercase of Comments.
     *
     * @param  string  $value
     * @return void
     */
    public function setCommentsAttribute($value)
    {
        $this->attributes['comments'] = ucfirst($value);
    }
}
