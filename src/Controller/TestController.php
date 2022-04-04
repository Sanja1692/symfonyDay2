<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route('/test', name: 'app_test')]
    public function index(): Response
    {
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }
    #[Route('/user/{name}', name: 'app_user')]
    
    public function displayUser($name = "Marry"): Response
    {
        return $this->render('test/user.html.twig', [
            'controller_name' => 'User Controller',
            'name' => $name ,
            'name_array' => ['name' => $name, 'job' => 'developer'] 
        ]);
    }
    #[Route('/test_var', name: 'var')]
    public function testVar()
    {
        $arr = array("name"=>"Sanja", "age"=>29); // here we create a simple array have keys and values
        return $this->render('test/test_var.html.twig',array("varName"=>$arr)); // this is the way how to send a variable from php (variable you created in the controller) to the twig file
    }
    #[Route('/hello-world', name: 'hello_world_page')]
    public function testAction()
    {
        $text = 'Hello World!';
        return $this->render('test/hello_world.html.twig', array('text'=>$text));
    }
    
    #[Route('/child', name: 'child_page')]
   public function childAction()
   {
       return $this->render('test/child.html.twig');
   }
 
 }
 