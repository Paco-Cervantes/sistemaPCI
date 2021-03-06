<?php namespace Tests\PCI\Models\Note\Movement\Type;

use PCI\Models\Movement;
use PCI\Models\MovementType;
use PCI\Models\NoteType;
use PCI\Models\PetitionType;
use Tests\AbstractTestCase;

class MovementTypeTest extends AbstractTestCase
{

    public function testMovements()
    {
        $this->mockBasicModelRelation(
            MovementType::class,
            'movements',
            'hasMany',
            Movement::class
        );
    }

    public function testNoteTypes()
    {
        $this->mockBasicModelRelation(
            MovementType::class,
            'noteTypes',
            'hasMany',
            NoteType::class
        );
    }

    public function testPetitionTypes()
    {
        $this->mockBasicModelRelation(
            MovementType::class,
            'petitionTypes',
            'hasMany',
            PetitionType::class
        );
    }
}
