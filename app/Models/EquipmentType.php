<?php

namespace App\Models;

use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipmentType extends Model
{
    use HasFactory;
    use Cachable;

    protected $table = 'equipment_type';

    protected $fillable = [
        'status',
        'equip_type_id',
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
        return $this->belongsTo(User::class, 'entered_by');
    }

    /**
     * Set the first string uppercase of Equip Type ID.
     *
     * @param  string  $value
     * @return void
     */
    public function setEquipTypeIdAttribute($value)
    {
        $this->attributes['equip_type_id'] = strtoupper($value);
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
