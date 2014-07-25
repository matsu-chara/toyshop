<?php
namespace Tests\Model;

use Model\Toy;

class ToyTest extends \PHPUnit_Framework_TestCase
{
    private $toy;

    public function setup()
    {
        $this->toy = new Toy('ToyName', '53', '...', 'toy.jpg');
    }

    public function testName()
    {
        $this->assertEquals('ToyName', $this->toy->name);
    }

    public function testArrayCast()
    {
        $this->assertEquals(
            array(
                'name'        => 'ToyName',
                'quantity'    => '53',
                'description' => '...',
                'image'       => 'toy.jpg'
            ),
            (array)$this->toy
        );
    }
}
