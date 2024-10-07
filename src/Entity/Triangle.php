<?php 

namespace App\Entity;

class Triangle 
{
  public static string $name =  "Triangle";
  private float $a, $b, $c;

  public function __construct(float $a, float $b, float $c)
  {
    $this->a = $a;
    $this->b = $b;
    $this->c = $c;
  }

  public function getSides(): array
  {
    return [$this->a, $this->b, $this->c];
  }

  public function calculateCircumference(): float 
  {
    return $this->a + $this->b + $this->c;
  }

  public function calculateSurface(): float
  {
    // Using Heron's formula
    $s= ($this->a + $this->b + $this->c)/2; // Get the semi perimeter
    return sqrt($s * ($s - $this->a) * ($s - $this->b) * ($s - $this->c));
  }

  public function calculateDiameter(): float 
  {
    return max($this->a, $this->b, $this->c);
  }
}