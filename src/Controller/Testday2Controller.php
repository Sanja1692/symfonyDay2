<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Testday2Controller extends AbstractController
{
    #[Route('/testday2', name: 'app_testday2')]
    public function index(): Response
    {
        return $this->render('testday2/index.html.twig', [
            'controller_name' => 'Testday2Controller',
        ]);
    }
    
    #[Route('/', name: 'index')]
    public function homePage()
    {
        $arr = array("id"=>1, "name"=>"John");
        return $this->render('test/home.html.twig',["user" => $arr]);
    }
}
