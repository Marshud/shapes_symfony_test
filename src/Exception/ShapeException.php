<?php 

namespace App\Exception;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Throwable;

class ShapeException extends \Exception implements HttpExceptionInterface
{
  private $statusCode;

  public function __construct($message = "", $statusCode = JsonResponse::HTTP_BAD_REQUEST, Throwable $previous = null)
  {
    parent::__construct($message, 0, $previous);
    $this->statusCode = $statusCode;
  }

  public function getStatusCode(): int
  {
    return $this->statusCode;
  }

  public function getHeaders(): array
  {
    return [];
  }
}
