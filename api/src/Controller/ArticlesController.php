<?php

namespace App\Controller;

use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticlesController extends AbstractController
{
    /**
     * @Route("/articles",
     *     methods="GET",
     *     name="getarticles"
     * )
     */
    public function getAction()
    {
        $articles = $this->getDoctrine()->getRepository(Article::class)->findAllOrderedByName();
        $response = new JsonResponse($articles);
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return $response;
    }
//
//    /**
//     * @Route("/categories",
//     *     methods="POST",
//     *     name="categories",
//     *     requirements={
//     *         "_format": "json"
//     *     }
//     * )
//     */
//    public function addAction(Request $request)
//    {
//        if(empty($request->getContent()))
//        {
//            $params = json_decode($request->getContent(), true);
//            $response = new Response($params['name']);
//            $response->headers->set('Access-Control-Allow-Origin', '*');
//            $response->headers->set('Access-Control-Allow-Headers', 'Content-Type');
//            return $response;
//
//        }
//        $params = json_decode($request->getContent(), true);
//        $name = $params['name'];
//        $category = new Category();
//        $category->setCatName($name);
//        $entityManager = $this->getDoctrine()->getManager();
//        $entityManager->merge($category);
//        $entityManager->flush();
//        $response = new Response("dodaales kategorie o nazwie: ".$category->getCatName());
//        $response->headers->set('Access-Control-Allow-Origin', '*');
//        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type');
//        return $response;
//    }
//
//    /**
//     * @Route("/categories/{id}",
//     *     methods="DELETE",
//     *     name="deletecategory"
//     * )
//     */
//    public function deleteAction($id)
//    {
//        $category = $this->getDoctrine()->getRepository(Category::class)->find($id);
//        $entityManager = $this->getDoctrine()->getManager();
//        $entityManager->remove($category);
//        $entityManager->flush();
//        $response = new Response("Usunąłeś kategorie o nazwie: ".$category->getCatName());
//        $response->headers->set('Access-Control-Allow-Origin', '*');
//        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type');
//        return $response;
//    }
}