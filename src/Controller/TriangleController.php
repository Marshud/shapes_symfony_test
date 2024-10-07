<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class TriangleController extends AbstractController
{
  public int $a, $b, $c;
  public static string $name = "Triangle";

  public function index(int $a, int $b, int $c): JsonResponse
  {
    $this->a = $a;
    $this->b = $b;
    $this->c = $c;

    return $this->json([
      "type" => self::$name,
      "a" => $this->a,
      "b" => $this->b,
      "c" => $this->c,
      "surface" => $this->calculateSurfaceArea(),
      "circumference" => $this->calculateCircumference()
    ]);
  }

  public function calculateSurfaceArea(): float 
  {
    return 0.5*$this->a*$this->b;
  }

  public function calculateCircumference(): float
  {
    return $this->a + $this->b + $this->c;
  }
}