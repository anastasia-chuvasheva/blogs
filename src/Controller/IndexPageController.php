<?php namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexPageController extends AbstractController
{
    #[Route('/', name: 'front_page')]
    public function index(): Response
    {
        return $this->render('front_page.html.twig');
    }
}