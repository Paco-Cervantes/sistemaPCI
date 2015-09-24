<?php

namespace PCI\Models;

/** @noinspection PhpUnnecessaryFullyQualifiedNameInspection */

/**
 * PCI\Models\WorkDetail
 * @package PCI\Models
 * @author Alejandro Granadillo <slayerfat@gmail.com>
 * @link https://github.com/slayerfat/sistemaPCI Repositorio en linea.
 * @property integer $id
 * @property integer $department_id
 * @property integer $position_id
 * @property integer $employee_id
 * @property \Carbon\Carbon $join_date
 * @property \Carbon\Carbon $departure_date
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 * @property-read Employee $employee
 * @property-read Position $position
 * @property-read Department $department
 * @method static \Illuminate\Database\Query\Builder|\PCI\Models\WorkDetail whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\PCI\Models\WorkDetail whereDepartmentId($value)
 * @method static \Illuminate\Database\Query\Builder|\PCI\Models\WorkDetail wherePositionId($value)
 * @method static \Illuminate\Database\Query\Builder|\PCI\Models\WorkDetail whereEmployeeId($value)
 * @method static \Illuminate\Database\Query\Builder|\PCI\Models\WorkDetail whereJoinDate($value)
 * @method static \Illuminate\Database\Query\Builder|\PCI\Models\WorkDetail whereDepartureDate($value)
 * @method static \Illuminate\Database\Query\Builder|\PCI\Models\WorkDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\PCI\Models\WorkDetail whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\PCI\Models\WorkDetail whereCreatedBy($value)
 * @method static \Illuminate\Database\Query\Builder|\PCI\Models\WorkDetail whereUpdatedBy($value)
 */
class WorkDetail extends AbstractBaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['join_date', 'departure_date'];

    /**
     * Atributos que deben ser mutados a dates.
     * dates se refiere a Carbon\Carbon dates.
     * En otras palabras, genera una instancia
     * de Carbon\Carbon para cada campo.
     *
     * @var array
     */
    protected $dates = ['join_date', 'departure_date'];

    // -------------------------------------------------------------------------
    // Relaciones
    // -------------------------------------------------------------------------
    // -------------------------------------------------------------------------
    // Has one 1 -> 1
    // -------------------------------------------------------------------------

    // -------------------------------------------------------------------------
    // Belongs to 1..* -> 1
    // -------------------------------------------------------------------------

    /**
     * Regresa al empleado relacionado.
     * @return Employee
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    /**
     * Regresa el cargo relacionado.
     * @return Position
     */
    public function position()
    {
        return $this->belongsTo(Position::class);
    }

    /**
     * Regresa el departamento relacionado.
     * @return Department
     */
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
