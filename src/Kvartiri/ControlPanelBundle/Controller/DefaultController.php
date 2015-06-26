<?php

namespace Kvartiri\ControlPanelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $userId = $this->container->get('security.context')->getToken()->getUser()->getId(); // on récupere la fonction de l'utilisateur connecté
        if ($this->get('security.context')->isGranted('ROLE_COMPANY')) {


            return $this->render('KvartiriControlPanelBundle:ControlPanel:layout/layout.html.twig', array('userId' => $userId));

        }



    }

//    public function RedirectionagentAction() {
//
//        $user = $this->container->get('security.context')->getToken()->getUser()->getFonction(); // on récupere la fonction de l'utilisateur connecté
//        $userId = $this->container->get('security.context')->getToken()->getUser()->getId(); // on récupere la fonction de l'utilisateur connecté
//        $StatusProto = $this->getDoctrine()->getEntityManager()->getRepository('Inra2013urzBundle:Protocole')->StatusEncours();
//        $StatusFini=$this->getDoctrine()->getEntityManager()->getRepository('Inra2013urzBundle:Protocole')->StatusTermine() ;
//        $StatusProtoId = $this->getDoctrine()->getEntityManager()->getRepository('Inra2013urzBundle:Protocole')->StatusEncoursId($userId);
//        //   \Doctrine\Common\Util\Debug::dump($StatusFini);
//        if ($this->get('security.context')->isGranted('ROLE_ADMINISTRATEUR')) {
//
//
//            return $this->render("Inra2013urzBundle:Default:IndexAdmin.html.twig");
//
//        } elseif ($this->get('security.context')->isGranted('ROLE_RESPONSABLE')) {
//
//            if ($user == "Laborantin(e)") {
//
//                return $this->render("Inra2013urzBundle:Default:IndexUser.html.twig", array('response' => $StatusProto,'responseFini' => $StatusFini,'User'=>$user));
//
//            } else if ($user == "Chercheur") {
//
//                return $this->render("Inra2013urzBundle:Default:IndexChercheur.html.twig", array('response' => $StatusProtoId));
//            }
//
//        } elseif ($this->get('security.context')->isGranted('ROLE_UTILISATEUR')) {
//
//            if ($user == "Laborantin(e)") {
//
//                return $this->render("Inra2013urzBundle:Default:IndexUser.html.twig", array('response' => $StatusProto,'responseFini' => $StatusFini));
//
//            } else if ($user == "Chercheur") {
//
//                return $this->render("Inra2013urzBundle:Default:IndexChercheur.html.twig", array('response' => $StatusProtoId));
//            }
//        }
//    }
}
