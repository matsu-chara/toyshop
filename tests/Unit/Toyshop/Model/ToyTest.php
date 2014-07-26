<?php
namespace Tests\Unit\Toyshop\Model;

use Toyshop\Model\Toy;

class ToyTest extends \PHPUnit_Framework_TestCase
{
    private $toy;

    public function setup()
    {
        $this->toy = new Toy('ToyName', '53', '...', 'toy.jpg');
    }

    public function testName()
    {
        $this->assertSame('ToyName', $this->toy->name);
    }

    public function testArrayCast()
    {
        $this->assertSame(
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
