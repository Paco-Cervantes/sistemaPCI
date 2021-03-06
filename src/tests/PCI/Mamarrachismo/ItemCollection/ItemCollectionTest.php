<?php namespace Tests\PCI\Mamarrachismo\ItemCollection;

use Illuminate\Support\Collection;
use PCI\Mamarrachismo\Collection\ItemCollection;
use Tests\AbstractPhpUnitTestCase;

/**
 * Class ItemCollectionTest
 *
 * @package Tests\PCI\Mamarrachismo\ItemCollection
 * @author  Alejandro Granadillo <slayerfat@gmail.com>
 * @link    https://github.com/slayerfat/sistemaPCI Repositorio en linea.
 */
class ItemCollectionTest extends AbstractPhpUnitTestCase
{

    /**
     * @var \PCI\Mamarrachismo\Collection\ItemCollection
     */
    private $obj;

    /**
     * @dataProvider dataProvider
     * @param $value
     * @param $expecting
     * @param $method
     */
    public function testItemId($value, $expecting, $method)
    {
        $set = "set$method";
        $get = "get$method";
        $this->assertEquals($expecting, $this->obj->$set($value)->$get());
    }

    public function dataProvider()
    {
        $results = [];
        $inputs  = [
            'one'             => [1, 1],
            'int'             => [2, 2],
            'cero'            => [0, null],
            'negative'        => [-1, null],
            'string_valid'    => ["1", 1],
            'string_invalid'  => ["a", null],
            'string_cero'     => [0, null],
            'string_negative' => [-1, null],
        ];

        $methods = ['ItemId', 'Amount', 'StockTypeId', 'depotId'];
        foreach ($inputs as $data) {
            foreach ($methods as $method) {
                $set       = $data;
                $set[]     = $method;
                $results[] = $set;
            }
        }

        return $results;
    }

    /**
     * @dataProvider dueDataProvider
     * @param $value
     * @param $expecting
     */
    public function testDueDate($value, $expecting)
    {
        $this->assertEquals($expecting, $this->obj->setDue($value)->getDue());
    }

    public function dueDataProvider()
    {
        return [
            [1, null],
            [0, null],
            [-1, null],
            ["1", null],
            ["0", null],
            ["a", null],
            ["b", null],
            ["c", null],
            [[], null],
            ["1999", null],
            ["1999-09", '1999-09-01 00:00:00'],
            ["1999-09-09", '1999-09-09 00:00:00'],
        ];
    }

    /**
     * @dataProvider rulesDataProvider
     * @param $data
     * @param $expecting
     */
    public function testRules($data, $expecting)
    {
        $this->obj->setRequiredFields($data);
        $this->assertAttributeInternalType('array', 'customRules', $this->obj);
        $this->assertAttributeContains($expecting, 'customRules', $this->obj);
    }

    public function rulesDataProvider()
    {
        return [
            ['item_id', 'item_id'],
            ['itemId', 'item_id'],
            ['ItemId', 'item_id'],
            [['itemId', 'algoAlgo', 'ayy'], 'item_id'],
            [['itemId', 'algoAlgo', 'ayy'], 'algo_algo'],
            [['itemId', 'algoAlgo', 'ayy'], 'ayy'],
            [[null, 'algoAlgo', 'ayy'], 'ayy'],
            [[null, null, 'ayy'], 'ayy'],
            [[null, null, null], null],
            [['itemId', null, 'ayy'], 'ayy'],
        ];
    }

    public function testPushShouldNotAllowArrayWithKeyPairComboAndRules()
    {
        $collection = $this->obj
            ->reset()
            ->push(['item_id' => 1])
            ->setRequiredFields('itemId')
            ->getCollection();
        $this->assertInstanceOf(Collection::class, $collection);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testPushShouldNotAllowArrayWithKeyPairComboButWithoutRules()
    {
        $this->obj->reset()->push(['item_id' => 1])->getCollection();
    }

    /**
     * @expectedException \LogicException
     */
    public function testPushShouldNotAllowArrayWithoutKeyPairCombo()
    {
        $this->obj->reset()->push([1])->getCollection();
    }

    /**
     * @expectedException \LogicException
     */
    public function testPushShouldNotAllowEmptyArray()
    {
        $this->obj->reset()->push([])->getCollection();
    }

    public function testWillNotThrowException()
    {
        $this->obj->setItemId(1)->make()->setRequiredFields('itemId');
        $this->assertNotEmpty($this->obj->getCollection());
    }

    /**
     * @expectedException \LogicException
     */
    public function testWillThrowException()
    {
        $this->obj->getCollection();
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testWillThrowInvalidArgumentException()
    {
        $this->obj->setItemId(1)->make();
        $this->obj->getCollection();
    }

    public function testToString()
    {
        $result = (string)$this->obj
            ->setItemId(1)
            ->make()
            ->setRequiredFields('itemId');

        $this->assertJson($result);
    }

    public function testArray()
    {
        $result = $this->obj
            ->setItemId(['wat' => 1, 'ayy' => 2, 'item_id' => 3])
            ->getItemId();

        $this->assertEquals(3, $result);
    }

    public function testArrayShouldNotBleed()
    {
        $result = $this->obj
            ->setItemId(['depot_id' => 1, 'ayy' => 2, 'item_id' => 3])
            ->getDepotId();

        $this->assertEquals(null, $result);
    }

    protected function setUp()
    {
        parent::setUp();

        $this->obj = new ItemCollection;
    }
}
