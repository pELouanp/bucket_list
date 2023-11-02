<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function home(): Response
    {
        return $this->render('main/home.html.twig');
    }

    /**
     * @Route("/about-us", name="about_us")
     */
    public function aboutUs(): Response
    {
        $projectRoot = $this->getParameter('kernel.project_dir');
        $data = file_get_contents($projectRoot . '/data/team.json');
        /** @var array $persons */
        $persons = json_decode($data);

        return $this->render('main/about_us.html.twig', [
            'persons' => $persons
        ]);
    }






}
