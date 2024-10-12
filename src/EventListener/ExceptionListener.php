<?php 

namespace App\EventListener;

use App\Exception\ShapeException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;

class ExceptionListener
{
  public function onKernelException(ExceptionEvent $event)
  {
    $exception = $event->getThrowable();

    // Handle custom ShapeException
    if($exception instanceof ShapeException) {
      $response = new JsonResponse(
        [
          'error' => $exception->getMessage(),
        ],
        $exception->getStatusCode()
      );

      $event->setResponse($response);
    }
  }
}