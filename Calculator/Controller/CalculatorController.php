<?php

namespace Calculator\Controller;

use Calculator\DTO\InputDTO;
use Calculator\Service\CalculatorService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class CalculatorController extends AbstractController
{
    public function __construct(
        private readonly SerializerInterface $serializer,
        private readonly ValidatorInterface $validator,
        private readonly CalculatorService $calculatorService)
    {
    }

    #[Route('/api/calculator/{type}', name: 'calculate', methods: ['POST'])]
    public function calculate(string $type, Request $request) : Response{
        $input = $this->serializer->deserialize($request->getContent(), InputDTO::class, 'json');
        /** @var InputDTO $input */
        $input->setType($type);

        $violations = $this->validator->validate($input);
        if ($violations->count()) {
            return new JsonResponse($this->serializer->serialize($violations, 'json'), json:true);
        }

        return new JsonResponse([
            'results' => $this->calculatorService->calculate($input->getA(), $input->getB(), $input->getType())
        ]);
    }
}