<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Contracts\Auditable;
use GeneaLabs\LaravelModelCaching\Traits\Cachable;
use Spatie\Permission\Traits\HasRoles;

class OrderTypes extends Model implements Auditable
{
    use HasFactory, Notifiable, HasRoles;

    use \OwenIt\Auditing\Auditable;
    use Cachable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status',
        'order_type_id',
        'description',
        'user_id',
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

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Set the first string uppercase of Equip Type ID.
     *
     * @param string $value
     * @return void
     */
    public function setOrderTypeIdAttribute(string $value): void
    {
        $this->attributes['order_type_id'] = strtoupper($value);
    }

    /**
     * Set the first string uppercase of Description.
     *
     * @param string $value
     * @return void
     */
    public function setDescriptionAttribute(string $value): void
    {
        $this->attributes['description'] = ucfirst($value);
    }
}
