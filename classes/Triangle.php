<?php


namespace classes;


class Triangle extends Figure
{
    public $height;
    public $width;

    function __construct($height , $width)
    {
        $this->height = $height;
        $this->width = $width;
        parent::__construct();
    }

    function Square()
    {
        $square = ($this->height * $this->width)/2;
        return $square;
    }

    function Perimetr()
    {
        $side = sqrt(pow($this->height , 2) + pow(($this->width)/2 , 2));
        $perimetr = $this->width + $side*2;
        return $perimetr;
    }
}