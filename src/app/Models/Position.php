<?php

namespace PCI\Models;

use Cviebrock\EloquentSluggable\SluggableInterface;
use Cviebrock\EloquentSluggable\SluggableTrait;
use Illuminate\Database\Eloquent\Collection;

/** @noinspection PhpUnnecessaryFullyQualifiedNameInspection */

/**
 * PCI\Models\Position

 * @property integer $id
 * @property string $desc
 * @property string $slug
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property-read \Illuminate\Database\Eloquent\Collection|WorkDetail[] $workDetails
 * @method static \Illuminate\Database\Query\Builder|\PCI\Models\Position whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\PCI\Models\Position whereDesc($value)
 * @method static \Illuminate\Database\Query\Builder|\PCI\Models\Position whereSlug($value)
 * @method static \Illuminate\Database\Query\Builder|\PCI\Models\Position whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\PCI\Models\Position whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\PCI\Models\Position whereCreatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\PCI\Models\Position whereUpdatedBy($value)
 */
class Position extends AbstractBaseModel implements SluggableInterface
{

    use SluggableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['desc'];

    /**
     * @var array
     */
    protected $sluggable = [
        'build_from' => 'desc',
        'save_to'    => 'slug',
    ];

    // -------------------------------------------------------------------------
    // Relaciones
    // -------------------------------------------------------------------------
    // -------------------------------------------------------------------------
    // Has Many 1 -> 1..*
    // -------------------------------------------------------------------------

    /**
     * @return Collection
     */
    public function workDetails()
    {
        return $this->hasMany(WorkDetail::class);
    }
}
