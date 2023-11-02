<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/wish")
 */
class WishController extends AbstractController
{
    /**
     * @Route("/", name="wish_index")
     */
    public function index(): Response
    {
        return $this->render('wish/index.html.twig');
    }

    /**
     * @Route("/{id}", name="wish_show")
     */
    public function show(int $id): Response
    {
        return $this->render('wish/show.html.twig');
    }






}
