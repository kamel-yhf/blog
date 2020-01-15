<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{
     /**
     * @Route("/", name="home")
     */
    public function home(){
        return $this->render('blog/home.html.twig',[
            'title' => 'Bienvenue kamel', 'age' => 58,
        ]);
    }
    /**
     * @Route("/blog", name="blog")
     */
    public function index()
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }
    /**
     * @Route("/article", name="article")
     */
    public function article()
    {
        return $this->render('blog/article.html.twig');
    }
    /**
     * @Route("/blog/article/10", name="blog_show")
     */
    public function show()
    {
        return $this->render('blog/show.html.twig');
    }
}