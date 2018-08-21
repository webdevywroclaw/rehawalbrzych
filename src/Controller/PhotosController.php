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

class PhotosController extends AbstractController
{
    /**
     * @Route("/photos/{galId}",
     *     methods="GET",
     *     name="getgalleryphotos"
     * )
     */
    public function getAllFromGalleryAction($galId)
    {
        $photos = $this->getDoctrine()->getRepository(Photo::class)->findAllFromGallery($galId);
        $response = new JsonResponse($photos);
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return $response;
    }

    /**
     * @Route("/photo/{id}",
     *     methods="DELETE",
     *     name="deletephoto"
     * )
     */
    public function deleteAction($id)
    {
        $photo = $this->getDoctrine()->getRepository(Photo::class)->find($id);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($photo);
        $entityManager->flush();
        $response = new Response("Usunąłeś kategorie o nazwie: " . $photo->getPhotoTitle());
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type');
        return $response;
    }
}