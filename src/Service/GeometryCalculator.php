<?php 

namespace App\Service;

use App\Entity\Circle;
use App\Entity\Triangle;

class GeometryCalculator 
{
  public function calculateCirlceData(Circle $circle): array
  {
    return [
      'type' => Circle::$name,
      'radius' => $circle->getRadius(),
      'surface' => $circle->calculateSurface(),
      'circumference' => $circle->calculateCircumference(),
    ];
  }

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

  public function sumAreas($shape1, $shape2): float
  {
    return $shape1->calculateSurface() + $shape2->calculateSurface();
  }

  public function sumDiameters($shape1, $shape2): float 
  {
    return $shape1->calculateDiameter() + $shape2->calculateDiameter();
  }
}