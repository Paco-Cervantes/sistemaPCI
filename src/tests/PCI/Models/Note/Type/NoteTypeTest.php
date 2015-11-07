<?php namespace Tests\PCI\Models\Note\Type;

use PCI\Models\MovementType;
use PCI\Models\Note;
use PCI\Models\NoteType;
use Tests\AbstractTestCase;

class NoteTypeTest extends AbstractTestCase
{

    public function testNotes()
    {
        $this->mockBasicModelRelation(
            NoteType::class,
            'notes',
            'hasMany',
            Note::class
        );
    }

    public function testMovementTypes()
    {
        $this->mockBasicModelRelation(
            NoteType::class,
            'movementType',
            'belongsTo',
            MovementType::class
        );
    }
}
