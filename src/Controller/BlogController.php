<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Article;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;



class BlogController extends AbstractController
{
     /**
     * @Route("/", name="home")
     */
    public function home(){
        return $this->render('blog/home.html.twig',[
            'title' => 'Bienvenue kamel',
        ]);
    }
    /**
     * @Route("/blog", name="blog")
     */
    public function index()
    {
        $repo = $this->getDoctrine()->getRepository(Article::class);
        $article = $repo->findAll();
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
            'articles'=>$article
        ]);
    }

    /**
    * @Route("/blog/new", name="blog_create")
    *  @Route("/blog/{id}/edit", name="blog_edit")
    */
    public function form(Article $article = null, Request $request, EntityManagerInterface  $manager)
    {
        if(!$article){
            $article = new Article();
        }

        $form = $this->createFormBuilder($article)
                     ->add('title')
                     ->add('content')
                     ->add('image')
                     ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            if(!$article->getId())
            {
                $article->setCreateAt(new \DateTime());
            }
            
            $manager->persist($article);
            $manager->flush();

            return $this->redirectToRoute('blog_show', ['id' => $article->getId()]);
        }

        return $this->render('blog/create.html.twig',[
            'formArticle' => $form->createView(),
            'editMode' => $article->getId() !== null
        ]);
    }


    /**
     * @Route("/blog/{id}", name="blog_show")
     */
    public function show($id)
    {
        $repo = $this->getDoctrine()->getRepository(Article::class);
        $article = $repo->find($id);
        return $this->render('blog/show.html.twig',[
            'article' => $article
        ]);
    }

    
    
}