<?php 

namespace App\Test\Service;

use App\Entity\Circle;
use App\Entity\Triangle;
use App\Service\GeometryCalculator;
use PHPUnit\Framework\TestCase;

class GeometryCalculatorTest extends TestCase
{
  public function testCalculateCircleData()
  {
    $circle = new Circle(2);
    $calculator = new GeometryCalculator();

    $result = $calculator->calculateCircleData($circle);
    $expected = [
      'type' => 'Circle',
      'radius' => 2.0,
      'surface' => 12.566370614359172,
      'circumference' => 12.566370614359172,
    ];

    $this->assertSame($expected, $result);
  }

  public function testCalculateTriangleData()
  {
    $triangle = new Triangle(3, 4, 5);
    $calculator = new GeometryCalculator($triangle);

    $result = $calculator->calculateTriangleData($triangle);
    $expected = [
      'type' => 'Triangle',
      'a' => 3.0,
      'b'=> 4.0,
      'c' => 5.0,
      'surface' => 6.0,
      'circumference' => 12.0,
    ];

    $this->assertSame($expected, $result);
  }

  public function testSumAreas() 
  {
    $circle = new Circle(2);
    $triangle = new Triangle(3, 4, 5);
    $calculator = new GeometryCalculator();

    $sumAreas = $calculator->sumAreas($circle, $triangle);
    $expected = 12.566370614359172 + 6.0;

    $this->assertSame($expected, $sumAreas);
  }

  public function testSumDiameters()
  {
    $circle = new Circle(2);
    $triangle = new Triangle(3, 4, 5);
    $calculator = new GeometryCalculator();

    $sumDiameters = $calculator->sumDiameters($circle, $triangle);
    $expected = 4.0 + 5.0;

    $this->assertSame($expected, $sumDiameters);
  }
}