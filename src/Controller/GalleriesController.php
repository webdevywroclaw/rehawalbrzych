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

    /**
     * @Route("/galleries",
     *     methods="POST",
     *     name="gallery",
     *     requirements={
     *         "_format": "json"
     *     }
     * )
     */
    public function addAction(Request $request)
    {
        if(empty($request->getContent()))
        {
            $params = json_decode($request->getContent(), true);
            $response = new Response($params['name']);
            $response->headers->set('Access-Control-Allow-Origin', '*');
            $response->headers->set('Access-Control-Allow-Headers', 'Content-Type');
            return $response;

        }
        $params = json_decode($request->getContent(), true);
        $name = $params['name'];
        $gallery = new Gallery();
        $gallery->setGalName($name);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->merge($gallery);
        $entityManager->flush();
        $response = new Response("dodales galerię o nazwie: ".$gallery->getGalName());
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type');
        return $response;
    }

    /**
     * @Route("/galleries/{id}",
     *     methods="DELETE",
     *     name="deletegallery"
     * )
     */
    public function deleteAction($id)
    {
        $gallery = $this->getDoctrine()->getRepository(Gallery::class)->find($id);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($gallery);
        $entityManager->flush();
        $response = new Response("Usunąłeś galerię o nazwie: " . $gallery->getGalName());
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type');
        return $response;
    }
}