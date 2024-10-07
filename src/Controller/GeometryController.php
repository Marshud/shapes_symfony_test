<?php 

namespace App\Controller;

use App\Entity\Circle;
use App\Entity\Triangle;
use App\Service\GeometryCalculator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;

class GeometryController extends AbstractController
{
  private $geometryCalculator;
  private $serializer;

  /**
   * The constructor takes the GeometryCalculator object and SerializerInterface
   * as parameters and assigns them to the private properties accordingly
   */
  public function __construct(GeometryCalculator $geometryCalculator, SerializerInterface $serializer)
  {
    $this->geometryCalculator = $geometryCalculator;
    $this->serializer = $serializer;
  }

  /**
   * The method gets the circle data after recieving the radius as a parameter
   * @return json
   */
  public function getCircleData(float $radius): JsonResponse
  {
    $circle = new Circle($radius);
    $circle_data = $this->geometryCalculator->calculateCircleData($circle);

    // Serialize the data
    $json_data =$this->serializer->serialize($circle_data, 'json');

    return new JsonResponse($json_data, 200, [], true);
  }

  /**
   * The method gets the triangle data after recieving the 3 sides as a parameter
   * @return json
   */
  public function getTriangleData(float $a, float $b, float $c): JsonResponse
  {
    $triangle = new Triangle($a, $b, $c);
    $triangle_data = $this->geometryCalculator->calculateTriangleData($triangle);

    // Serialize the data
    $json_data = $this->serializer->serialize($triangle_data, 'json');

    return new JsonResponse($json_data, 200, [], true);
  }

  // public function sumAreas(Circle $circle, Triangle $triangle): JsonResponse
  // {
  //   $sumAreas = $this->geometryCalculator->sumAreas($circle, $triangle);
  //   return $this->json([
  //     'sum_areas' => $sumAreas
  //   ]);
  // }

  // public function sumDiameters(Circle $circle, Triangle $triangle): JsonResponse
  // {
  //   $sumDiameters = $this->geometryCalculator->sumDiameters($circle, $triangle);
  //   return $this->json([
  //     'sum_diameters' => $sumDiameters
  //   ]);
  // }

}