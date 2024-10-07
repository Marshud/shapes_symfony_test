<?php 

namespace App\Entity;

class Triangle 
{
  public static string $name =  "Triangle";
  private float $a, $b, $c; // Declare the 3 sides of the triangle

  /**
   * @param float $a
   * @param float $b
   * @param float $c
   * This constructor method takes the 3 sides of the triangle and assigns them
   */
  public function __construct(float $a, float $b, float $c)
  {
    $this->a = $a;
    $this->b = $b;
    $this->c = $c;
  }

  /**
   * Returns the 3 sides in an array
   * @return array
   */
  public function getSides(): array
  {
    return [$this->a, $this->b, $this->c];
  }

  /**
   * Returns the Circumference of the triangle which is the sum of the 3 sides
   */
  public function calculateCircumference(): float 
  {
    return $this->a + $this->b + $this->c;
  }

  /**
   * Calculates the Surface area of the triangle using Heron's formula
   */
  public function calculateSurface(): float
  {
    // Using Heron's formula
    $s= ($this->a + $this->b + $this->c)/2; // Get the semi perimeter
    return sqrt($s * ($s - $this->a) * ($s - $this->b) * ($s - $this->c));
  }

  /**
   * Returns the maximum of the 3 sides of the triangle with the assumption that it's the diameter
   */
  public function calculateDiameter(): float 
  {
    return max($this->a, $this->b, $this->c);
  }
}