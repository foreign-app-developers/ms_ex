<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
#[Route('/ex', name: 'app_ex')]
class ExController extends AbstractController
{
    #[Route('/ex', name: 'app_ex')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/ExController.php',
        ]);
    }
}
