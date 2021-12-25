<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use OwenIt\Auditing\Contracts\Auditable;
use RahulHaque\Filepond\Traits\HasFilepond;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Permission\Traits\HasRoles;

class Tractors extends Model implements Auditable, HasMedia
{
    use HasFactory, Notifiable, HasRoles;
    use \OwenIt\Auditing\Auditable;
    use InteractsWithMedia;
    use HasFilepond;

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
        'attachments',
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
     * Set the first string uppercase of Owned By.
     *
     * @param  string  $value
     * @return void
     */
    public function setDriverAttribute($value)
    {
        $this->attributes['driver_1'] = ucfirst($value);
        $this->attributes['driver_2'] = ucfirst($value);
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
