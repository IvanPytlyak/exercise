<?php


namespace App\Models;

class Badge
{
    private $id;
    private $name;
    private $color;
    private $semantic;
    private $sortingOrder;

    public function __construct($id, $name, $color, $semantic, $sortingOrder)
    {
        $this->id = $id;
        $this->name = $name;
        $this->color = $color;
        $this->semantic = $semantic;
        $this->sortingOrder = $sortingOrder;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getColor()
    {
        return $this->color;
    }

    public function getSemantic()
    {
        return $this->semantic;
    }

    public function getSortingOrder()
    {
        return $this->sortingOrder;
    }
}
