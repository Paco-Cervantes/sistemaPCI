<?php

namespace PCI\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * PCI\Models\Town
 *
 * @property integer $id
 * @property integer $state_id
 * @property string $desc
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property-read State $state
 * @property-read \Illuminate\Database\Eloquent\Collection|Parish[] $parishes
 * @method static \Illuminate\Database\Query\Builder|\PCI\Models\Town whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\PCI\Models\Town whereStateId($value)
 * @method static \Illuminate\Database\Query\Builder|\PCI\Models\Town whereDesc($value)
 * @method static \Illuminate\Database\Query\Builder|\PCI\Models\Town whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\PCI\Models\Town whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\PCI\Models\Town whereCreatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\PCI\Models\Town whereUpdatedBy($value)
 */
class Town extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['desc'];

    // -------------------------------------------------------------------------
    // Relaciones
    // -------------------------------------------------------------------------
    // -------------------------------------------------------------------------
    // Belongs To 1..* -> 1
    // -------------------------------------------------------------------------

    /**
     * @return State
     */
    public function state()
    {
        return $this->belongsTo(State::class);
    }

    // -------------------------------------------------------------------------
    // Has Many 1 -> 1..*
    // -------------------------------------------------------------------------

    /**
     * @return Collection
     */
    public function parishes()
    {
        return $this->hasMany(Parish::class);
    }
}
