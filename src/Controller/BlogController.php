<?php
/**
 * Created by PhpStorm.
 * User: Nearshore Portugal
 * Date: 6/4/2018
 * Time: 6:00 PM
 */

namespace App\Controller;


use App\service\Greeting;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BlogController extends AbstractController
{

    /**
     * @var Greeting
     */
    private $greeting;

    public function __construct(Greeting $greeting)
    {
        $this->greeting = $greeting;
    }


    /**
     * @Route ("/", name="blog_index")
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request)
    {
        return  $this->render('base.html.twig', ['message' => $this->greeting->greet(
            $request->get('name')
        )]);
    }
}