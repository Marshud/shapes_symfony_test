<?php 

namespace App\Controller;

use App\Entity\Circle;
use App\Entity\Triangle;
use App\Service\GeometryCalculator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class GeometryController extends AbstractController
{
  private $geometryCalculator;

  public function __construct(GeometryCalculator $geometryCalculator)
  {
    $this->geometryCalculator = $geometryCalculator;
  }

  public function getCircleData(float $radius): JsonResponse
  {
    $circle = new Circle($radius);
    $circle_data = $this->geometryCalculator->calculateCirlceData($circle);
    return $this->json($circle_data);
  }

  public function getTriangleData(float $a, float $b, float $c): JsonResponse
  {
    $triangle = new Triangle($a, $b, $c);
    $triangle_data = $this->geometryCalculator->calculateTriangleData($triangle);
    return $this->json($triangle_data);
  }

  public function sumAreas(Circle $circle, Triangle $triangle): JsonResponse
  {
    $sumAreas = $this->geometryCalculator->sumAreas($circle, $triangle);
    return $this->json([
      'sum_areas' => $sumAreas
    ]);
  }

  public function sumDiameters(Circle $circle, Triangle $triangle): JsonResponse
  {
    $sumDiameters = $this->geometryCalculator->sumDiameters($circle, $triangle);
    return $this->json([
      'sum_diameters' => $sumDiameters
    ]);
  }
}