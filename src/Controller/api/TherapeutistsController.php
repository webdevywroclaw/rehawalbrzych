<?php

namespace App\Controller\api;

use App\Entity\Article;
use App\Entity\Category;
use App\Entity\Education;
use App\Entity\EduItem;
use App\Entity\Gallery;
use App\Entity\Method;
use App\Entity\MethodsTherapeutists;
use App\Entity\Photo;
use App\Entity\Photos;
use App\Entity\Therapeutist;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
/**
 * @Route("/api"
 * )
 */
class TherapeutistsController extends AbstractController
{
    /**
     * @Route("/therapeutists",
     *     methods="GET",
     *     name="gettherapeutists"
     * )
     */
    public function getAllAction()
    {
        $theraps= $this->getDoctrine()->getRepository(Therapeutist::class)->findAllOrderedByName();
        $response = new JsonResponse($theraps);
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return $response;
    }

    /**
     * @Route("/therapeutist/{id}",
     *     methods="GET",
     *     name="gettherapeutist"
     * )
     */
    public function getByIdAction($id)
    {
        $therapist = $this->getDoctrine()->getRepository(Therapeutist::class)->findById($id);
        $schools = $this->getDoctrine()->getRepository(EduItem::class)->createQueryBuilder('p')
            ->select('p')
            ->where('p.educationEdu = '.$therapist[0]['educationEdu']['eduId'].' AND p.categoryCat = 1')
            ->getQuery()
            ->getArrayResult();
        $courses = $this->getDoctrine()->getRepository(EduItem::class)->createQueryBuilder('p')
            ->select('p')
            ->where('p.educationEdu = '.$therapist[0]['educationEdu']['eduId'].' AND p.categoryCat = 2')
            ->getQuery()
            ->getArrayResult();
        $conferences = $this->getDoctrine()->getRepository(EduItem::class)->createQueryBuilder('p')
            ->select('p')
            ->where('p.educationEdu = '.$therapist[0]['educationEdu']['eduId'].' AND p.categoryCat = 3')
            ->getQuery()
            ->getArrayResult();
        $publications = $this->getDoctrine()->getRepository(EduItem::class)->createQueryBuilder('p')
            ->select('p')
            ->where('p.educationEdu = '.$therapist[0]['educationEdu']['eduId'].' AND p.categoryCat = 4')
            ->getQuery()
            ->getArrayResult();
        $methods = $this->getDoctrine()->getRepository(MethodsTherapeutists::class)->createQueryBuilder('p')
            ->select('p', 't')
            ->where('p.therapId = '.$id)
            ->leftJoin('p.metId', 't')
            ->getQuery()
            ->getArrayResult();

        $schools_to_merge = array('schools' => $schools);
        $courses_to_merge = array('courses' => $courses);
        $conferences_to_merge = array('conferences' => $conferences);
        $publications_to_merge = array('publications' => $publications);
        $methods_to_merge = array('methods' => $methods);
        $merged = array_merge($therapist, $schools_to_merge, $courses_to_merge, $methods_to_merge, $conferences_to_merge, $publications_to_merge);
        $response = new JsonResponse($merged);
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return $response;
    }

    /**
     * @Route("/therapeutists/{method_id}",
     *     methods="GET",
     *     name="gettherapeutistsbymethod"
     * )
     */
    public function getByMethod($method_id)
    {
        $therapist = $this->getDoctrine()->getRepository(MethodsTherapeutists::class)->createQueryBuilder('p')
            ->select('p', 't')
            ->where('p.metId = '.$method_id)
            ->leftJoin('p.therapId', 't')
            ->getQuery()
            ->getArrayResult();
        $response = new JsonResponse($therapist);
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return $response;
    }

    /**
     * @Route("/therapeutists",
     *     methods="POST",
     *     name="addtherapeutist"
     * )
     */
    public function addAction(Request $request)
    {
        $dir = __DIR__ . '/../../public/img/Therapeutists/';
//        $name = uniqid() . '.jpeg';

        $params = json_decode($request->getContent(), true);

        foreach ($request->files as $uploadedFile) {
            try {
                $name = $uploadedFile->getClientOriginalName();
                $uploadedFile->move($dir, $name);
            } catch (\Exception $exception) {
                $response = new Response($exception->getMessage());
                $response->headers->set('Access-Control-Allow-Origin', '*');
                $response->headers->set('Access-Control-Allow-Headers', 'Content-Type');
                return $response;
            }
        }

        $file = "/img/Therapeutists/" . $name;

        if (file_exists($dir.$name)) {
            echo "Successfully saved file. ".$params['name'];
        }
        else {
            $response = new Response("nie przeslano pliku");
            $response->headers->set('Access-Control-Allow-Origin', '*');
            $response->headers->set('Access-Control-Allow-Headers', 'Content-Type');
            return $response;
        }

        $myJson = json_decode($request->request->get('json'), true);
        $name = $myJson['name'];
        $surname = $myJson['surname'];
        $short = $myJson['short'];
        $desc = $myJson['desc'];
        $methods = $myJson['methods'];
        $schools = $myJson['schools'];
        $courses = $myJson['courses'];
        $conferences = $myJson['conferences'];
        $publications = $myJson['publications'];

        $photo = new Photo();
        $photo->setPhotoSrc($file);
        $gallery = $this->getDoctrine()->getRepository(Gallery::class)->find(2);
        $photo->setGalleryGal($gallery);


        $therapist = new Therapeutist();
        $therapist->setTherapName($name);
        $therapist->setTherapSurname($surname);
        $therapist->setTherapDesc($desc);
        $therapist->setTherapShort($short);
        $therapist->setPhotoPhoto($photo);

        $entityManager = $this->getDoctrine()->getManager();


        $education = new Education();

        foreach ($schools as $school)
    {
        $eduitem = new EduItem();
        $eduitem->setEducationEdu($education);
        $cat = $this->getDoctrine()->getRepository(Category::class)->find(1);
        $eduitem->setCategoryCat($cat);
        $eduitem->setEduItemName($school);
        $entityManager->merge($eduitem);
        $entityManager->flush();
    }

        foreach ($courses as $course)
        {
            $eduitem = new EduItem();
            $eduitem->setEducationEdu($education);
            $cat = $this->getDoctrine()->getRepository(Category::class)->find(2);
            $eduitem->setCategoryCat($cat);
            $eduitem->setEduItemName($course);
            $entityManager->merge($eduitem);
            $entityManager->flush();
        }

        foreach ($conferences as $conference)
        {
            $eduitem = new EduItem();
            $eduitem->setEducationEdu($education);
            $cat = $this->getDoctrine()->getRepository(Category::class)->find(3);
            $eduitem->setCategoryCat($cat);
            $eduitem->setEduItemName($conference);
            $entityManager->merge($eduitem);
            $entityManager->flush();
        }

        foreach ($publications as $publication)
        {
            $eduitem = new EduItem();
            $eduitem->setEducationEdu($education);
            $cat = $this->getDoctrine()->getRepository(Category::class)->find(4);
            $eduitem->setCategoryCat($cat);
            $eduitem->setEduItemName($publication);
            $entityManager->merge($eduitem);
            $entityManager->flush();
        }

        $therapist->setEducationEdu($education);

        foreach ($methods as $method)
        {
            $therapAndMethod = new MethodsTherapeutists();
            $therapAndMethod->setTherapId($therapist);
            $actMethod = $this->getDoctrine()->getRepository(Method::class)->find($method['metId']);
            $therapAndMethod->setMetId($actMethod);
            $entityManager->merge($therapAndMethod);
            $entityManager->flush();
        }

        if(empty($methods)){
            $entityManager->merge($therapist);
            $entityManager->flush();
        }

        $response = new Response('imie i nazwisko: '.$name.' '.$surname .'metody: '.count($methods));
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type');
        return $response;
    }

    /**
     * @Route("/therapeutistss",
     *     methods="post",
     *     name="updatetherapeutist"
     * )
     */
    public function updateAction(Request $request)
    {
        $dir = __DIR__ . '/../../../public/img/Therapeutists/';
//        $name = uniqid() . '.jpeg';

        $params = json_decode($request->getContent(), true);

        foreach ($request->files as $uploadedFile) {
            try {
                $name = $uploadedFile->getClientOriginalName();
                $uploadedFile->move($dir, $name);
            } catch (\Exception $exception) {
                $response = new Response($exception->getMessage());
                $response->headers->set('Access-Control-Allow-Origin', '*');
                $response->headers->set('Access-Control-Allow-Headers', 'Content-Type');
                return $response;
            }
        }


        if(isset($name)){
            $file = "/img/Therapeutists/" . $name;

            if (file_exists($dir.$name)) {
                echo "Successfully saved file. ".$params['name'];
                $photo = new Photo();
                $photo->setPhotoSrc($file);
                $gallery = $this->getDoctrine()->getRepository(Gallery::class)->find(2);
                $photo->setGalleryGal($gallery);
        }

        }
//        else {
//            $response = new Response("nie przeslano pliku");
//            $response->headers->set('Access-Control-Allow-Origin', '*');
//            $response->headers->set('Access-Control-Allow-Headers', 'Content-Type');
//            return $response;
//        }


        if(!empty($request->getContent()))
        {
            $data = json_decode($request->getContent());
            $response = new Response('papapapa'. $data['json']['name']);
            $response->headers->set('Access-Control-Allow-Origin', '*');
            $response->headers->set('Access-Control-Allow-Headers', 'Content-Type');
            return $response;

        }

        $myJson = json_decode($request->request->get('json'), true);
        $id = $myJson['id'];
        $name = $myJson['name'];
        $surname = $myJson['surname'];
        $desc = $myJson['desc'];
        $short = $myJson['short'];
        $methods = $myJson['methods'];
        $schools = $myJson['schools'];
        $courses = $myJson['courses'];
        $conferences = $myJson['conferences'];
        $publications = $myJson['publications'];

//            $response = new Response("sssos :".$name);
//            $response->headers->set('Access-Control-Allow-Origin', '*');
//            $response->headers->set('Access-Control-Allow-Headers', 'Content-Type');
//            return $response;


        $therapist = $this->getDoctrine()->getRepository(Therapeutist::class)->find($id);
        $therapist->setTherapName($name);
        $therapist->setTherapSurname($surname);
        $therapist->setTherapDesc($desc);
        $therapist->setTherapShort($short);
        if(isset($photo)){
            $therapist->setPhotoPhoto($photo);
        }

        $entityManager = $this->getDoctrine()->getManager();

        $lastedu = $this->getDoctrine()->getRepository(Education::class)->find($therapist->getEducationEdu());

        $education = new Education();

        foreach ($schools as $school)
        {
            $eduitem = new EduItem();
            $eduitem->setEducationEdu($education);
            $cat = $this->getDoctrine()->getRepository(Category::class)->find(1);
            $eduitem->setCategoryCat($cat);
            $eduitem->setEduItemName($school);
            $entityManager->merge($eduitem);
            $entityManager->flush();
        }

        foreach ($courses as $course)
        {
            $eduitem = new EduItem();
            $eduitem->setEducationEdu($education);
            $cat = $this->getDoctrine()->getRepository(Category::class)->find(2);
            $eduitem->setCategoryCat($cat);
            $eduitem->setEduItemName($course);
            $entityManager->merge($eduitem);
            $entityManager->flush();
        }

        foreach ($conferences as $conference)
        {
            $eduitem = new EduItem();
            $eduitem->setEducationEdu($education);
            $cat = $this->getDoctrine()->getRepository(Category::class)->find(3);
            $eduitem->setCategoryCat($cat);
            $eduitem->setEduItemName($conference);
            $entityManager->merge($eduitem);
            $entityManager->flush();
        }

        foreach ($publications as $publication)
        {
            $eduitem = new EduItem();
            $eduitem->setEducationEdu($education);
            $cat = $this->getDoctrine()->getRepository(Category::class)->find(4);
            $eduitem->setCategoryCat($cat);
            $eduitem->setEduItemName($publication);
            $entityManager->merge($eduitem);
            $entityManager->flush();
        }

        $therapist->setEducationEdu($education);
        $entityManager->remove($lastedu);

        $qb = $this->getDoctrine()->getRepository(MethodsTherapeutists::class)->createQueryBuilder('s');
        $qb->delete();
        $qb->where('s.therapId = :therap');
        $qb->setParameter('therap', $therapist);
        $qb->getQuery()->execute();;

        foreach ($methods as $method)
        {
            $therapAndMethod = new MethodsTherapeutists();
            $therapAndMethod->setTherapId($therapist);
            $actMethod = $this->getDoctrine()->getRepository(Method::class)->find($method['metId']);
            $therapAndMethod->setMetId($actMethod);
            $entityManager->merge($therapAndMethod);
            $entityManager->flush();
        }

        if(empty($methods)){
            $entityManager->merge($therapist);
            $entityManager->flush();
        }

        $response = new Response('imie i nazwisko: '.$name.' '.$surname .'metody: '.count($methods));
        $response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Headers', 'Content-Type');
        return $response;
    }


    /**
     * @Route("/therapeutists/{id}",
     *     methods="DELETE",
     *     name="deletetherapeutist"
     * )
     */
    public function deleteAction($id)
    {
        $therapist = $this->getDoctrine()->getRepository(Therapeutist::class)->find($id);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($therapist);
        $entityManager->flush();
        $response = new Response("Usunąłeś terapeutę o id: ".$id);
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