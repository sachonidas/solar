<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SolarController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {
      $user = $this->getUser();

        return $this->render('solar/index.html.twig', [
            'user' => $user,
        ]);
    }
    
    /**
     * @Route("/granjas", name="granjas")
     */
    public function granjas(){
        $user = $this->getUser();
        
        return $this->render('solar/granjas.html.twig',[
            'user' => $user,
 
        ]);
    }

    /**
     * @Route("/contacto", name="contacto")
     */
    public function contacto(){

    }
}
