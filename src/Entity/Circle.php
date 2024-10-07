<?php 

namespace App\Entity;

class Circle 
{
  public static string $name = "Circle";
  private float $radius;

  /**
   * @param float $radius
   * Takes the radius and assigns it to the private property
   */
  public function __construct(float $radius)
  {
    $this->radius = $radius;
  }

  /**
   * Export the radius of the circle
   */
  public function getRadius(): float 
  {
    return $this->radius;
  }

  /**
   * Calculates the area of the circle
   * Also makes use of some PHP functions to achieve the desired result
   */
  public function calculateSurface(): float 
  {
    return pi() * pow ($this->radius, 2);
  }

  /**
   * Calculates the diameter of the circle by multiplying the radius by 2
   */
  public function calculateDiameter(): float 
  {
    return 2 * $this->radius;
  }

  /**
   * Calculates the circumference of the circle
   */
  public function calculateCircumference(): float
  {
    return 2 * pi() * $this->radius;
  }

}