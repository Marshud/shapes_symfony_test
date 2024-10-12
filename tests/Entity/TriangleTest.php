<?php 
namespace App\Tests\Entity;

use App\Exception\ShapeException;
use App\Entity\Triangle;
use PHPUnit\Framework\TestCase;

class TriangleTest extends TestCase 
{

  public function testTriangleThrowsExceptionOnInvalidSideLength() 
  {
    $this->expectException(ShapeException::class);
    $this->expectExceptionMessage('All triangle sides must be greater than zero');

    new Triangle(0,1,2);
  }
}
