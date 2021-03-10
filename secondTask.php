<?php


abstract class Figure
{
  abstract public function Square();
  abstract public function Perimetr();

  public function __construct()
  {
    echo "Hello I m ". get_class($this) .".<br/>".PHP_EOL;
  }
  public function __destruct(){
    echo "<br/>FINISH ".get_class($this);
  }

}

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
  function Square(){
    $square = ($this->height * $this->width)/2;
    return $square;
  }
  function Perimetr(){
    $side = sqrt(pow($this->height , 2) + pow(($this->width)/2 , 2));
    $perimetr = $this->width + $side*2;
    return $perimetr;
  }
}

class Rectangle extends Figure
{
  public $height;
  public $width;

  function __construct()
  {
parent::__construct();
  }
  function Square(){
    $square = $this->height * $this->width;
    return $square;
  }
  function Perimetr(){
    $perimetr = $this->height*2 + $this->width*2;
    return $perimetr;
  }
}

class Circle extends Figure
{
  public $radius;

  function __construct($radius)
  {
    $this->radius = $radius;
    parent::__construct();
  }
  function Square(){
    $square = pow($this->radius , 2) * M_PI;
    return $square;
  }
  function Perimetr(){
    $perimetr = 2 * M_PI * $this->radius;
    return $perimetr;
  }
  public function GetRadius()
  {
    echo "Radius: ".$this->radius;
  }
}
