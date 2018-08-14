<?php

namespace App\Controller\Rest;



use App\Entity\Articles;
use App\Entity\Categories;
use App\Entity\Galleries;
use App\Entity\Users;
use FOS\RestBundle\Routing\ClassResourceInterface;
use function MongoDB\BSON\toJSON;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Bundle\FrameworkBundle\Tests\Fixtures\Validation\Category;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ArticlesController extends AbstractController
{
    /**
     * @Route("/articles",
     *     defaults={"name": "edward"},
     *     methods="GET",
     *     name="articles"
     * )
     */
    public function indexAction($name)
    {
//        $response = array(
//            'aaa' => "aa",
//            'bbb' => "bb"
//        );
//        return new Response("aaa");
        $articles = $this->getDoctrine()->getRepository(Articles::class)->findAllOrderedbyName();

        return new JsonResponse($articles);
//        return $this->render('articles.html.twig', array(
//            'articles' => $articles
//        ));

//        $article = new Articles();
//        $galery = new Galleries();
//        $category = new Categories();
//        $user = new Users();
//        $article->setArtGal($galery);
//        $article->setArtCat($category);
//        $article->setArtUsr($user);
//        $article->setArtTitle($name);
//        $article->setArtBody("body");
//
//        $entityManager->merge($article);
//        $entityManager->flush();
//
//        return new Response($article->getArtTitle());
      //  return new Response('Saved new article with id'.$article->getArtId());
    }

    /**
     * @Route("/article/{title}",
     *     defaults={"title": "Artykul o czyms"},
     *     methods="POST"
     * )
     */
    public function addAction($title)
    {
        $titlePost = $_POST['title'];
        $article = new Articles();
        $galery = new Galleries();
        $category = new Categories();
        $user = new Users();
        $article->setArtGal($galery);
        $article->setArtCat($category);
        $article->setArtUsr($user);
        $article->setArtTitle($titlePost);
        $article->setArtBody("body");

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->merge($article);
        $entityManager->flush();

        return new Response('Saved new article with title '.$article->getArtTitle());
    }

    /**
     * @Route("/article/{id}",
     *     defaults={"id": "1"},
     *     methods="PUT"
     * )
     */

    public function editAction($id, Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $article = $this->getDoctrine()->getRepository(Articles::class)->find($id);
        $content = $request->getContent();
        $articles = $this->getDoctrine()->getRepository(Articles::class)->findAll();


        if ($request->isXmlHttpRequest()) {
            if (!empty($content)) {
                $title = $request->request->get('title');
                $article->setArtTitle($title);
                $entityManager->persist($article);
                $entityManager->flush();
            }
            $jsonData = array();
            $idx = 0;
            foreach($articles as $art) {
                $temp = array(
                    'title' => $art->getArtTitle(),
                    'body' => $art->getArtBody(),
                );
                $jsonData[$idx++] = $temp;
            }
            return new JsonResponse($jsonData);
        } else {
            return $this->render('base.html.twig', array(
                'articles' => $articles
            ));
        }
    }
}