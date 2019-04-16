<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        return $this->json([
            'message' => 'Bem vindo(a) a API Backend Ceuma!',
            'path' => 'src/Controller/IndexController.php',
        ]);
    }
}
