<?php
/**
 * Created by PhpStorm.
 * User: Nearshore Portugal
 * Date: 6/4/2018
 * Time: 6:00 PM
 */

namespace App\Controller;


use App\Entity\MicroPost;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Routing\RouterInterface;


/**
 *@Route("/blog")
 */
 class BlogController
{
    /**
     * @var \Twig_Environment
     */
    private $twig;
     /**
      * @var SessionInterface
      */
     private $session;
     /**
      * @var RouterInterface
      */
     private $router;

     private $entityManager;

     /**
      * BlogController constructor.
      * @param \Twig_Environment $twig
      * @param SessionInterface $session
      * @param RouterInterface $router
      */
     public function __construct(
         \Twig_Environment $twig,
         SessionInterface $session,
         RouterInterface $router
     )
    {
        $this->twig = $twig;
        $this->session = $session;
        $this->router = $router;
    }

    /**
     * @Route ("/", name="blog_index")
     */
    public function index()
    {
        $html = $this->twig->render('blog/index.html.twig',
            [
                'posts' => $this->session->get('posts')
            ]
        );

        return new Response($html);

    }

     /**
      * @Route ("/add", name="blog_add")
      */
    public function add()
    {
        $posts = $this->session->get('posts');

        $posts[uniqid()] = [
          'title' => 'a random title '.rand(1,20),
          'text' => 'a random text '.rand(1,20)
         ];

        $this->session->set('posts', $posts);

        return new RedirectResponse($this->router->generate('blog_index'));
    }


     /**
      * @Route ("/show/{id}", name="blog_show")
      * @param $id
      * @return Response
      * @throws \Twig_Error_Loader
      * @throws \Twig_Error_Runtime
      * @throws \Twig_Error_Syntax
      */
     public function show($id)
    {

        $posts = $this->session->get('posts');
        if(!$posts || !isset($posts[$id]))
        {
            throw new NotFoundHttpException('post not found');
        }

        $html = $this->twig->render(
            'blog/post.html.twig',
            [
                'id' => $id,
                'post' => $posts[$id]
            ]
        );

        return new Response($html);
    }
}