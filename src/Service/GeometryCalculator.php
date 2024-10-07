<?php 

namespace App\Service;

use App\Entity\Circle;
use App\Entity\Triangle;

class GeometryCalculator 
{
  /**
   * Takes the Circle Object as a parameter and organizes it and returns an array of the data ready to export
   */
  public function calculateCircleData(Circle $circle): array
  {
    return [
      'type' => Circle::$name,
      'radius' => $circle->getRadius(),
      'surface' => $circle->calculateSurface(),
      'circumference' => $circle->calculateCircumference(),
    ];
  }

  /**
   * Takes the Triangle Object as a parameter and organizes it, then returns an array of the data, ready for export
   */
  public function calculateTriangleData(Triangle $triangle): array
  {
    return [
      'type' => Triangle::$name,
      'a' => $triangle->getSides()[0],
      'b' => $triangle->getSides()[1],
      'c' => $triangle->getSides()[2],
      'surface' => $triangle->calculateSurface(),
      'circumference' => $triangle->calculateCircumference(),
    ];
  }

  /**
   * Takes two objects of shapes as parameters and calculates the sum of the surface areas
   */
  public function sumAreas($shape1, $shape2): float
  {
    return $shape1->calculateSurface() + $shape2->calculateSurface();
  }

  /**
   * Takes two Objects of shapes as parameters and calculates the sum of the diameters
   */
  public function sumDiameters($shape1, $shape2): float 
  {
    return $shape1->calculateDiameter() + $shape2->calculateDiameter();
  }
}