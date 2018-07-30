<?php
/**
 * Created by PhpStorm.
 * User: Piotr_Wanio
 * Date: 27.07.2018
 * Time: 00:49
 */

namespace App\Controller;


use http\Env\Response;

class DefaultController
{
    public function indexAction()
    {
        return new \Symfony\Component\HttpFoundation\Response("Hello world");
    }
}