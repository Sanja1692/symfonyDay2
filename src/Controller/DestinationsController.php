<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Destinations;
use Doctrine\Persistence\ManagerRegistry;

class DestinationsController extends AbstractController
{
    #[Route('/create', name: 'create_destinations')]
    public function createAction(ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
        $destination = new Destinations();
      // dd($destination);
       $destination -> setName("Belgrad");
       $destination -> setPrice(129);
       $destination -> setPicture("beograd.jpg");
       $destination -> setDescription("Though it may come as a surprise to some, Belgrade has a plethora of places to visit. The Belgrade Fortress, one of the most important historical monuments in Serbia, sits on the best location in town: overlooking the confluence of both rivers. Everyone i");
       //dd($destination);
       $em->persist($destination);
       $em->flush();

       return new Response("New record has been created with id ".$destination->getId());

    }

    #[Route('/showAll', name: 'showAll')]
    public function showAllAction(ManagerRegistry $doctrine): Response
    {
        $em = $doctrine->getManager();
       $destinations = $em->getRepository(Destinations::class)->findAll();
       //dd($destinations);
       return $this->render("destinations/index.html.twig", ["destinations"=> $destinations]);

    }
    #[Route('/details/{id}', name: 'indexpage')]
    public function detailsAction(ManagerRegistry $doctrine, $id): Response
    {
        $em = $doctrine->getManager();
       $destination = $em->getRepository(Destinations::class)->find($id);
       //dd($destination);
       return new Response("Destination Name:".$destination->getName(). "And the price is: ".$destination->getPrice());
      
    }
  
}
