<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Photo;
use App\Entity\Photos;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     * @Route("/{route}", name="vue_pages", requirements={"route"="^(?!.*api|_wdt|_profiler|login).+"})
     */
    public function indexAction()
    {
        return $this->render('index.html.twig');
    }

}