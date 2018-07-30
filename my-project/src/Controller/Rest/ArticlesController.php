<?php
/**
 * Created by PhpStorm.
 * User: Piotr_Wanio
 * Date: 27.07.2018
 * Time: 00:59
 */

namespace App\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;
use App\Entity\Articles;

class ArticlesController extends FOSRestController
{

    /**
     * @Rest\Get("/articles")
     */
    public function getAction()
    {
        $article = new Articles;
        $restresult = $article->getDoctrine()->getRepository('AppBundle:User')->findAll();
        if ($restresult === null) {
            return new View("there are no users exist", Response::HTTP_NOT_FOUND);
        }
        return $restresult;
    }

}