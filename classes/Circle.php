<?php


namespace classes;


class Circle extends Figure
{
    public $radius;

    function __construct($radius)
    {
        $this->radius = $radius;
        parent::__construct();
    }

    function Square()
    {
        $square = pow($this->radius , 2) * M_PI;
        return $square;
    }

    function Perimetr()
    {
        $perimetr = 2 * M_PI * $this->radius;
        return $perimetr;
    }

    public function GetRadius()
    {
        echo "Radius: ".$this->radius;
    }
}