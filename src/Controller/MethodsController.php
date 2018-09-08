<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Category;
use App\Entity\Gallery;
use App\Entity\Method;
use App\Entity\Photo;
use App\Entity\Photos;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @Route("/api"
 * )
 */
class MethodsController extends AbstractController
{
    /**
     * @Route("/methods",
     *     methods="GET",
     *     name="getmethods"
     * )
     */
    public function getAllAction()
    {
        $methods = $this->getDoctrine()->getRepository(Method::class)->findAllOrderedByName();
        $response = new JsonResponse($methods);
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return $response;
    }

    /**
     * @Route("/method/{id}",
     *     methods="GET",
     *     name="getmethod"
     * )
     */
    public function getOneByIdAction($id)
    {
        $method = $this->getDoctrine()->getRepository(Method::class)->findById($id);
        $galid = $method[0]['galleryGal']['galId'];
        if($galid!=null) {
            $photos = $this->getDoctrine()->getRepository(Photo::class)->createQueryBuilder('p')
                ->select('p')
                ->where('p.galleryGal = ' . $galid)
                ->getQuery()
                ->getArrayResult();
        }
        else{
            $photos = null;
        }
        $gallery = array('photos' => $photos);
//        $content = array('article' => $article);
        $merged = array_merge($method,$gallery);
        $response = new JsonResponse($merged);
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return $response;
    }

    /**
     * @Route("/methods/{catId}",
     *     methods="GET",
     *     name="get_methods_by_category"
     * )
     */
    public function getByCategoryAction($catId)
    {
        $methods = $this->getDoctrine()->getRepository(Method::class)->findAllByCategory($catId);
        $response = new JsonResponse($methods);
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return $response;
    }


    /**
     * @Route("/methods",
     *     methods="POST",
     *     name="addmethod",
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
        $title = $params['title'];
        $body = $params['body'];
        $price = $params['price'];
        $galId = $params['galId'];
        $catId = $params['catId'];
        $method = new Method();
        if($catId!=null){
            $category = $this->getDoctrine()->getRepository(Category::class)->find($catId);
            $method->setCategoryCat($category);
        }
        if($galId!=null){
            $gallery = $this->getDoctrine()->getRepository(Gallery::class)->find($galId);
            $method->setGalleryGal($gallery);
        }
        $method->setMetName($title);
        $method->setMetBody($body);
        if($price!=null) $method->setMetPrice($price);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->merge($method);
        $entityManager->flush();
        $response = new Response("dodales artykul o tytule: ".$method->getMetName());
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type');
        return $response;
    }

    /**
     * @Route("/method",
     *     methods="POST",
     *     name="updatemethod",
     *     requirements={
     *         "_format": "json"
     *     }
     * )
     */
    public function updateAction(Request $request)
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
        $title = $params['title'];
        $body = $params['body'];
        $price = $params['price'];
        $id = $params['id'];
        $catId = $params['catId'];
        $galId = $params['galId'];
        $method = $this->getDoctrine()->getRepository(Method::class)->find($id);
        if($catId!=null){
            $category = $this->getDoctrine()->getRepository(Category::class)->find($catId);
            $method->setCategoryCat($category);
        }
        if($galId!=null){
            $gallery = $this->getDoctrine()->getRepository(Gallery::class)->find($galId);
            $method->setGalleryGal($gallery);
        }
        $method->setMetName($title);
        $method->setMetBody($body);
        $method->setMetPrice($price);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->merge($method);
        $entityManager->flush();
        $response = new Response("zapisałeś artykul o tytule: ".$method->getMetName());
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type');
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
    /**
     * @Route("/methods/{id}",
     *     methods="DELETE",
     *     name="deletemethod"
     * )
     */
    public function deleteAction($id)
    {
        $method = $this->getDoctrine()->getRepository(Method::class)->find($id);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($method);
        $entityManager->flush();
        $response = new Response("Usunąłeś metodę o nazwie: ".$method->getMetName());
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type');
        return $response;
    }
}