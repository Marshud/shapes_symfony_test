<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class CircleController extends AbstractController
{
  public int $radius;

  public function index(int $radius): JsonResponse
  {
    $this->radius = $radius;

    return $this->json([
      "type" => "cirlce",
      "radius" => $this->radius,
      "surface" => $this->calculateSurface(),
      "circumference" => $this->calculateSurface()
    ]);

  }

  public function calculateSurface(): float // Also the circumference
  {
    return 2*3.14*$this->radius;
  }

  public function CalculateDiameter(): float 
  {
    return 2*$this->radius;
  }

}