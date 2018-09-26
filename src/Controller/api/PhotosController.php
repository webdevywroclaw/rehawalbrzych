<?php

namespace App\Controller\api;

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
     * @Route("/photos",
     *     methods="POST",
     *     name="addphoto"
     * )
     */
    public function addAction(Request $request)
    {
        $title = $request->request->get('title');
        $galId = $request->request->get('id');
        $dir = __DIR__ . '/../../public/img/Galleries/';
        $name = uniqid() . '.jpeg';

        foreach ($request->files as $uploadedFile) {
            try {
                $uploadedFile->move($dir, $name);
            } catch (\Exception $exception) {
                $response = new Response($exception);
                $response->headers->set('Access-Control-Allow-Origin', '*');
                $response->headers->set('Access-Control-Allow-Headers', 'Content-Type');
                return $response;
            }
        }

        $file = "/img/Galleries/" .$galId.'/'. $name;

        if (file_exists($dir.$name)) {
            echo "Successfully saved file. ";
        }
        else {
            $response = new Response("nie przeslano pliku");
            $response->headers->set('Access-Control-Allow-Origin', '*');
            $response->headers->set('Access-Control-Allow-Headers', 'Content-Type');
            return $response;
        }

        $photo = new Photo();

        $gallery = $this->getDoctrine()->getRepository(Gallery::class)->find($galId);
        $photo->setGalleryGal($gallery);
        $photo->setPhotoSrc($file);
        $photo->setPhotoTitle($title);
//        $entityManager = $this->getDoctrine()->getManager();
//        $entityManager->merge($photo);
//        $entityManager->flush();

//        $params = json_decode($request->getContent(), true);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->merge($photo);
        $entityManager->flush();
//
//        $response = new Response("dodaales kategorie o nazwie: ".$category->getCatName());
        $response = new Response('You added file named: ' . $file);
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type');
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