<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Gallery;
use App\Entity\Photo;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @Route("/api"
 * )
 */
class GalleriesController extends AbstractController
{
    /**
     * @Route("/galleries",
     *     methods="GET",
     *     name="getgalleries"
     * )
     */
    public function getAllAction()
    {
        $galleries = $this->getDoctrine()->getRepository(Gallery::class)->findAllOrderedByName();
        $response = new JsonResponse($galleries);
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return $response;
    }


}