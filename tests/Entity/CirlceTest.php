<?php 
namespace App\Tests\Entity;

use App\Exception\ShapeException;
use App\Entity\Circle;
use PHPUnit\Framework\TestCase;

class CircleTest extends TestCase 
{

  public function testCircleThrowsExceptionOnInvalidRadius() 
  {
    $this->expectException(ShapeException::class);
    $this->expectExceptionMessage('Circle Radius must be greater than zero');

    new Circle(0);
  }
}
