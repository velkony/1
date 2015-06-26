<?php

namespace Pages\PagesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PagesController extends Controller
{
    public  function menuAction()
    {
        $em = $this->getDoctrine()->getManager();
        $pages = $em->getRepository('PagesBundle:Pages')->byTitles();

        return $this->render('PagesBundle:Default:pages/modulesUsed/menu.html.twig', array('pages' => $pages));

    }


    public function pageAction($title)
    {
        $em = $this->getDoctrine()->getManager();
        $page = $em->getRepository('PagesBundle:Pages')->byTitle($title);



        if (!$page) throw $this->createNotFoundException('La page n\'existe pas.');

        return $this->render('PagesBundle:Default:pages/layout/pages.html.twig', array('page' => $page));
    }
}
