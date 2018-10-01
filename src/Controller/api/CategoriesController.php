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

class CategoriesController extends AbstractController
{
    /**
     * @Route("/categories",
     *     methods="GET",
     *     name="getcategories"
     * )
     */
    public function getAllAction()
    {
        $categories = $this->getDoctrine()->getRepository(Category::class)->findAllOrderedByName();
        $response = new JsonResponse($categories);
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return $response;
    }

    /**
     * @Route("/categories/{id}",
     *     methods="GET",
     *     name="getcategory"
     * )
     */
    public function getAction($id)
    {
        $category = $this->getDoctrine()->getRepository(Category::class)->findById($id);
        $response = new JsonResponse($category);
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return $response;
    }

    /**
     * @Route("/categories/kind/{kind}",
     *     methods="GET",
     *     name="get_category_of_kind"
     * )
     */
    public function getArticlesByKindAction($kind)
    {
        $categories = $this->getDoctrine()->getRepository(Category::class)->findByKind($kind);
        $response = new JsonResponse($categories);
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return $response;
    }


    /**
     * @Route("/categories",
     *     methods="POST",
     *     name="categories"
     * )
     */
    public function addAction(Request $request)
    {
        if (empty($request->files)) {
            $params = json_decode($request->getContent(), true);
            $response = new Response('pusto');
            $response->headers->set('Access-Control-Allow-Origin', '*');
            $response->headers->set('Access-Control-Allow-Headers', 'Content-Type');
            return $response;

        }
        else if(!empty($request->getContent())){
            $response =  new Response($request->request->get('name'));
            $response->headers->set('Access-Control-Allow-Origin', '*');
            $response->headers->set('Access-Control-Allow-Headers', 'Content-Type');
            return $response;
        }

        $dir = __DIR__ . '/../../../public/img/Categories/';
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

        $file = "/img/Categories/" . $name;

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

        $gallery = $this->getDoctrine()->getRepository(Gallery::class)->find(1);
        $photo->setGalleryGal($gallery);
        $photo->setPhotoSrc($file);
        $photo->setPhotoTitle($name);
//        $entityManager = $this->getDoctrine()->getManager();
//        $entityManager->merge($photo);
//        $entityManager->flush();

//        $params = json_decode($request->getContent(), true);
        $name = $request->request->get('name');
        $kind = $request->request->get('kind');
        $category = new Category();
        $category->setPhotoId($photo);
        $category->setCatName($name);
        $category->setCatKind($kind);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->merge($category);
        $entityManager->flush();
//
//        $response = new Response("dodaales kategorie o nazwie: ".$category->getCatName());
        $response = new Response('You added file named: ' . $file.' oraz kategorie o nazwie: '.$category->getCatName());
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type');
        return $response;
    }

    /**
     * @Route("/categories/{id}",
     *     methods="DELETE",
     *     name="deletecategory"
     * )
     */
    public function deleteAction($id)
    {
        $category = $this->getDoctrine()->getRepository(Category::class)->find($id);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($category);
        $entityManager->flush();
        $response = new Response("Usunąłeś kategorie o nazwie: " . $category->getCatName());
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type');
        return $response;
    }
}