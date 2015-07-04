<?php

namespace Kvartiri\KvartiriBundle\Controller;

use Kvartiri\KvartiriBundle\Form\SelectRoomType;
use Kvartiri\KvartiriBundle\Entity\FavoritesHotels;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;

class SelectionController extends Controller
{
    public function menuAction()
    {
        $session = $this->getRequest()->getSession();
        if (!$session->has('favoriteHotels'))
            $selectedHotels = 0;
        else
            $selectedHotels = count($session->get('favoriteHotels'));

        return $this->render('KvartiriBundle:Default:selection/modulesUsed/favoriteHotels.html.twig', array('selectedHotels' => $selectedHotels));
    }

//    public function selectedHotel()
//    {
//        $em = $this->getDoctrine()->getManager();
//        $generator = $this->container->get('security.secure_random');
//        $session = $this->getRequest()->getSession();
//        $favoritesHotels = $session->get('favoritesHotels');
//        $action = array();
//
//        $produits = $em->getRepository('EcommerceBundle:Produits')->findArray(array_keys($session->get('favoritesHotels')));
//
//        foreach($produits as $produit)
//        {
//            $prixHT = ($produit->getPrix() * $panier[$produit->getId()]);
//            $prixTTC = ($produit->getPrix() * $panier[$produit->getId()] / $produit->getTva()->getMultiplicate());
//            $totalHT += $prixHT;
//
//            if (!isset($commande['tva']['%'.$produit->getTva()->getValeur()]))
//                $commande['tva']['%'.$produit->getTva()->getValeur()] = round($prixTTC - $prixHT,2);
//            else
//                $commande['tva']['%'.$produit->getTva()->getValeur()] += round($prixTTC - $prixHT,2);
//
//
//            $action['produit'][$produit->getId()] = array('reference' => $produit->getNom(),
//                'quantite' => $panier[$produit->getId()],
//                'prixHT' => round($produit->getPrix(),2),
//                'prixTTC' => round($produit->getPrix() / $produit->getTva()->getMultiplicate(),2));
//        }
//
//
//        return $action;
//    }




    public function addFavoriteHotelAction($id)
    {
//        $session = $this->getRequest()->getSession();

//
//        if (!$session->has('favoritesHotels'))
//            $action = new FavoritesHotels();
//        else
//            $action = $em->getRepository('KvartiriBundle:FavoritesHotels')->find($session->get('favoritesHotels'));
//
//
//        $action->setUser($this->container->get('security.context')->getToken()->getUser());
//        $action->setFavoriteHotel($this->facture());
//
        $id = 1;
        $em = $this->getDoctrine()->getManager();
//        $entity = new FavoritesHotels();
        $entity = $em->getRepository('KvartiriBundle:FavoritesHotels')->find($id);
//        $user = $this->container->get('security.context')->getToken()->getUser());





        $favoritesHotels = array();
        $session = $this->getRequest()->getSession();

        if (!$session->has('favoritesHotels')) $session->set('favoritesHotels',array());
        $favoritesHotels = $session->get('favoritesHotels');

//        print_r($favoritesHotels);
        if (array_key_exists($id, $favoritesHotels)) {
//           print_r('je suis dans la boucle 1');
            if ($this->getRequest()->query->get('roomId') != null) $favoritesHotels[$id] = $this->getRequest()->query->get('roomId');
            $this->get('session')->getFlashBag()->add('success','The type of room has been successfully changed');
        } else {
//            print_r('je suis dans la boucle 2');

            if ($this->getRequest()->query->get('roomId') != null)
                $favoritesHotels[$id] = $this->getRequest()->query->get('roomId');
            else
//                print_r('je suis dans la boucle favorite');

                $favoritesHotels[$id] = 1;

            $this->get('session')->getFlashBag()->add('success','The selected hotel has been added');
        }
//        print_r($favoritesHotels);

        $session->set('favoritesHotels', $favoritesHotels);

        $entity->setFavoriteHotel($favoritesHotels);
        $user = $this->container->get('security.context')->getToken()->getUser();
        $entity->setUser($user);
        $em = $this->getDoctrine()->getManager();
        $em->persist($entity);
        $em->flush();


     return $this->redirect($this->generateUrl('favoritesHotels'));

//        var_dump($session->get('favoritesHotels'));
//        die();
//        return $this->render('KvartiriBundle:Default:selection/layout/favoritesHotels.html.twig');

//ou a ete le probleme
    }

    public function removeFavoriteHotelAction($id)
    {
        $session = $this->getRequest()->getSession();
        $favoritesHotels = $session->get('favoritesHotels');

        if (array_key_exists($id, $favoritesHotels))
        {
            unset($favoritesHotels[$id]);
            $session->set('favoritesHotels',$favoritesHotels);
            $this->get('session')->getFlashBag()->add('success','Selected hotel has been successfully removed');
        }

        return $this->redirect($this->generateUrl('favoritesHotels'));
    }

    public function favoritesHotelsAction()
    {
        $session = $this->getRequest()->getSession();
        if (!$session->has('favoritesHotels')) $session->set('favoritesHotels', array());

        $em = $this->getDoctrine()->getManager();
        $hotels = $em->getRepository('KvartiriBundle:Hotels')->findArray(array_keys($session->get('favoritesHotels')));


//        $user = $this->container->get('security.context')->getToken()->getUser();




        return $this->render('KvartiriBundle:Default:selection/layout/favoritesHotels.html.twig', array('hotels' => $hotels,
            'favoritesHotels' => $session->get('favoritesHotels')));
//        var_dump($session->get('favoritesHotels'));
//        die();
//        return $this->render('KvartiriBundle:Default:selection/layout/favoritesHotels.html.twig');
    }






//    public function selectRoomAction($rooms)
//    {
//        $form = $this->createForm(new SelectRoomType($rooms));
//        return $this->render('KvartiriBundle:Default:rooms/selectRoom.html.twig', array('form' => $form->createView()));
//
//    }
//
//    public function selectionAction()
//    {
//        return $this->render('KvartiriBundle:Default:selection/layout/selection.html.twig');
//    }
//
//    public function bookingAction()
//    {
//        return $this->render('KvartiriBundle:Default:selection/layout/booking.html.twig');
//    }
//
//    public function validationAction()
//    {
//        return $this->render('KvartiriBundle:Default:selection/layout/validation.html.twig');
//    }



}
