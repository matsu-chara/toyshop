<?php
namespace Toyshop\Model;

class Toy
{
    public $name;
    public $quantity;
    public $description;
    public $image;

    public function __construct(
        $name,
        $quantity,
        $description = '',
        $image = ''
    ) {
        $this->name = $name;
        $this->quantity = $quantity;
        $this->description = $description;
        $this->image = $image;
    }
}
