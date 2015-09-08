<?php

namespace PCI\Models;

use Illuminate\Database\Eloquent\Collection;

class Profile extends AbstractBaseModel
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
    // Has Many 1 -> 1..*
    // -------------------------------------------------------------------------

    /**
     * @return Collection
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}