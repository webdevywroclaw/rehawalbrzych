<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Category;
use App\Entity\Gallery;
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
class ArticlesController extends AbstractController
{
    /**
     * @Route("/articles",
     *     methods="GET",
     *     name="getarticles"
     * )
     */
    public function getAllAction()
    {
        $articles = $this->getDoctrine()->getRepository(Article::class)->findAllOrderedByName();
        $response = new JsonResponse($articles);
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return $response;
    }

    /**
     * @Route("/article/{id}",
     *     methods="GET",
     *     name="get_article_by_id"
     * )
     */
    public function getOneByIdAction($id)
    {
        $article = $this->getDoctrine()->getRepository(Article::class)->findById($id);
        $galid = $article[0]['galleryGal']['galId'];
        $photos = $this->getDoctrine()->getRepository(Photo::class)->createQueryBuilder('p')
            ->select('p')
            ->where('p.galleryGal = '.$galid)
            ->getQuery()
            ->getArrayResult();
        $gallery = array('photos' => $photos);
//        $content = array('article' => $article);
        $merged = array_merge($article,$gallery);
        $response = new JsonResponse($merged);
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return $response;
    }

    /**
     * @Route("/articles/{catId}",
     *     methods="GET",
     *     name="get_articles_by_category"
     * )
     */
    public function getByCategoryAction($catId)
    {
        $articles = $this->getDoctrine()->getRepository(Article::class)->findAllByCategory($catId);
        $response = new JsonResponse($articles);
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return $response;
    }


    /**
     * @Route("/articles",
     *     methods="POST",
     *     name="addarticle",
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
        $galId = $params['galId'];
        $catId = $params['catId'];
        $article = new Article();
        $gallery = $this->getDoctrine()->getRepository(Gallery::class)->find($galId);
        $category = $this->getDoctrine()->getRepository(Category::class)->find($catId);
        $article->setGalleryGal($gallery);
        $article->setCategoryCat($category);
        $article->setArtTitle($title);
        $article->setArtBody($body);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->merge($article);
        $entityManager->flush();
        $response = new Response("dodales artykul o tytule: ".$article->getArtTitle());
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type');
        return $response;
    }

    /**
     * @Route("/articles/{id}",
     *     methods="DELETE",
     *     name="deletearticle"
     * )
     */
    public function deleteAction($id)
    {
        $article = $this->getDoctrine()->getRepository(Article::class)->find($id);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($article);
        $entityManager->flush();
        $response = new Response("Usunąłeś artykuł o tytule: ".$article->getArtTitle());
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