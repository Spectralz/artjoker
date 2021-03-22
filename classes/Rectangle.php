<?php


namespace classes;


class Rectangle extends Figure
{
    public $height;
    public $width;

    function __construct()
    {
        parent::__construct();
    }

    function Square()
    {
        return $this->height * $this->width;
    }

    function Perimetr()
    {
        return $this->height*2 + $this->width*2;
    }
}
