<?php 

namespace App\Entity;

use App\Exception\ShapeException;

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
    // Check that the radius is greater than zero
    if($radius <= 0) {
      throw new ShapeException('Circle Radius must be greater than zero', 400);
    }
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