<?php
/**
 * Created by PhpStorm.
 * User: Nearshore Portugal
 * Date: 7/6/2018
 * Time: 12:21 PM
 */

namespace App\Controller;


use App\Entity\MicroPost;
use App\Repository\MicroPostRepository;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 *@Route("/micro-post")
 */
class MicroPostController
{

    /**
     * @var \Twig_Environment
     */
    private $twig;

    /**
     * @var \App\Repository\MicroPostRepository
     */
    private $microPostRepository;

    private $formFactory;

    /**
     * MicroPostController constructor.
     *
     * @param \Twig_Environment                            $twig
     * @param \App\Repository\MicroPostRepository          $microPostRepository
     * @param \Symfony\Component\Form\FormFactoryInterface $formFactory
     */
    public function __construct(
        \Twig_Environment $twig,
        MicroPostRepository $microPostRepository,
        FormFactoryInterface $formFactory
    )
    {
        $this->twig = $twig ;
        $this->microPostRepository = $microPostRepository;
        $this->formFactory = $formFactory;
    }

    /**
     *@Route ("/", name="micro_post_index")
     */
    public function index()
    {
        $html = $this->twig->render(
            'micro-post/index.html.twig',
            [
                'posts' => $this->microPostRepository->findAll()
            ]
        );

        return new Response($html);
    }

    /**
     * @Route ("/add", name="micro_post_add")
     */
    public function add(Request $request)
    {

        $microPost = new MicroPost();

        $microPost->setTime(new \DateTime());

        $form = $this->formFactory->create(MicroPost::class, $microPost);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isvalid )
        {

        }

        $html = $this->twig->render(
            'micro-post/add.html.twig',
            [
                'form' => $form->createView()
            ]
        );

        return new Response($html);
    }
}