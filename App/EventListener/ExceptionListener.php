<?php

namespace Calculator\App\EventListener;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\Serializer\SerializerInterface;

class ExceptionListener
{
    public function __construct(private readonly SerializerInterface $serializer)
    {
    }

    public function onKernelException(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();

        $exceptionCode = $exception->getCode();
        $code = Response::HTTP_INTERNAL_SERVER_ERROR;
        if ($exceptionCode >= 200 && $exceptionCode < 600) {
            $code = $exceptionCode;
        }

        $response = new JsonResponse($this->serializer->serialize($exception, 'json'), $code, json: true);
        $event->setResponse($response);
    }
}