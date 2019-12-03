<?php

namespace App\Controller;

use App\Entity\Averias;
use App\Entity\Contacto;
use App\Entity\Local;
use App\Form\ContactoType;
use App\Form\LocalType;
use App\Repository\LocalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
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

        $em = $this->getDoctrine()->getManager();
        $locales = $em->getRepository(Local::class)->findAll();

        return $this->render('solar/granjas.html.twig',[
            'user' => $user,
            'locales' => $locales

        ]);
    }

    /**
     * @Route("/contacto", name="contacto")
     */
    public function contacto(Request $request){
        $user = $this->getUser();

        $contacto = new Contacto();
        $form = $this->createForm(ContactoType::class, $contacto);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){

            $this->addFlash('success','Mensaje enviado Correctamente');
            $contacto = $form->getData();
            $em = $this->getDoctrine()->getManager();
            $em->persist($contacto);
            $em->flush();

            return $this->redirectToRoute('contacto');
        }else{
            return $this->render('solar/contacto.html.twig',[
                'user' => $user,
                'contacto' => $form->createView()
            ]);
        }
    }

    /**
     * @Route("/dataLocales", name="data_locales", methods={"POST"})
     */
    public function AllLocales(){
        $em = $this->getDoctrine()->getManager();
        $locales = $em->getRepository(Local::class)->findAll();
        return new JsonResponse($locales);
    }

    /**
     * @Route("/locales", name="data_locales")
     */
    public function locales(){
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        $locales = $em->getRepository(Local::class)->findAll();
        return $this->render('solar/locales.html.twig', [
            'user' => $user,
            'locales' => $locales
        ]);
    }
    /**
     * @Route("/local/{id}", name="local_editar")
     */
    public function local(Request $request, $id){

        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();

        $local = $em->getRepository(Local::class)->find($id);

        $form = $this->createForm(LocalType::class, $local);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $local->setNombre($form->get('nombre')->getData());
            $local->setTipoLocal($form->get('tipoLocal')->getData());
            $local->setLatitud($form->get('latitud')->getData());
            $local->setLongitud($form->get('longitud')->getData());
            //$local->setAverias(null);

            $em = $this->getDoctrine()->getManager();
            $em->persist($local);
            $em->flush();

            return $this->redirectToRoute('granjas');
        }

        return $this->render('solar/local_editar.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
            'local' => $local
        ]);
    }

    /**
     * @Route("/eliminar-{id}", name="eliminar_local")
     */
    public function eliminar($id, Request $request){
        $em = $this->getDoctrine()->getManager();

        $local = $em->getRepository(Local::class)->find($id);

        $em->remove($local);
        $em->flush();

        return $this->redirectToRoute('granjas');
    }
}

