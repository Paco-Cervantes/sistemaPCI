<?php namespace PCI\Models;

    /** @noinspection PhpUnnecessaryFullyQualifiedNameInspection */

/**
 * PCI\Models\ItemMovement
 *
 * @package PCI\Models
 * @author  Alejandro Granadillo <slayerfat@gmail.com>
 * @link    https://github.com/slayerfat/sistemaPCI Repositorio en linea.
 * @property integer        $id
 * @property integer        $stock_id
 * @property integer        $item_id
 * @property integer        $movement_id
 * @property float          $quantity
 * @property \Carbon\Carbon $due
 * @property integer        $stock_type_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property integer        $created_by
 * @property integer        $updated_by
 * @property-read Movement  $movement
 * @property-read Item      $item
 * @method static \Illuminate\Database\Query\Builder|\PCI\Models\ItemMovement whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\PCI\Models\ItemMovement whereItemId($value)
 * @method static \Illuminate\Database\Query\Builder|\PCI\Models\ItemMovement whereMovementId($value)
 * @method static \Illuminate\Database\Query\Builder|\PCI\Models\ItemMovement whereQuantity($value)
 * @method static \Illuminate\Database\Query\Builder|\PCI\Models\ItemMovement whereDue($value)
 * @method static \Illuminate\Database\Query\Builder|\PCI\Models\ItemMovement whereStockTypeId($value)
 * @method static \Illuminate\Database\Query\Builder|\PCI\Models\ItemMovement whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\PCI\Models\ItemMovement whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\PCI\Models\ItemMovement whereCreatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\PCI\Models\ItemMovement whereUpdatedBy($value)
 */
class ItemMovement extends AbstractBaseModel
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'quantity',
        'due',
    ];

    /**
     * Atributos que deben ser mutados a dates.
     * dates se refiere a Carbon\Carbon dates.
     *
     * @var array
     */
    protected $dates = ['due'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function movement()
    {
        return $this->belongsTo(Movement::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}