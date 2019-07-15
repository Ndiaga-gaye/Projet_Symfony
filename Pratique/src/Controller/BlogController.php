<?php

namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\Employer;
use Symfony\Component\Form\FormTypeInterface;
use App\Entity\Service;
use App\Repository\EmployerRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Form\EmployerType;

class BlogController extends Controller
{
    /**
     * @Route("/blog", name="blog")
     */

    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(Employer::class);
        $employers = $repo->findAll();
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'Blogcontroller',
            'employers' => $employers
        ]);
    }

     /**
     * @Route("/employer/{id}", name="employer_Modifier")
     */

     /**
     * @Route("/", name="home")
     */
    public function home(){
        return $this->render('blog/home.html.twig',[
            'title'=>"bienvenu Dans ce blog "
        ] );

    }

    /**
     * @Route("/blog/new", name="blog_create")
     */
    public function create(Request $request, ObjectManager $manager ){
        dump($request);

        $Employer = new Employer();

   $form = $this->createForm(EmployerType::class, $Employer);
        $form->handleRequest($request);
dump($form);
   if($form->isSubmitted() && $form->isValid()){
$manager->persist($Employer);
$manager->flush();
return $this->redirectToRoute('blog_show');
   }
        return $this->render('blog/create.html.twig' ,[
            'formEmployer' => $form->createView()
        ]);
      }


    /**
     * @Route("/blog/article/12", name="blog_show")
     */
    public function show(){
        return $this->render('blog/show.html.twig' );
    }

    /**
     * @Route("/blog/index/{id}", name="blog/supempl")
     */
   public function sup(Employer $employer, ObjectManager $manager ){

        $del= $this->getDoctrine()->getRepository(employer::class);
        
        $manager->remove($employer);
        $manager->flush();
        $employer=$del->findAll();
        $this->addFlash('danger', 'employé Supprimer avec succé');
        return $this ->redirectToRoute('blog');
    }

    



}
