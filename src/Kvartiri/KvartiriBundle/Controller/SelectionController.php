<?php

namespace Kvartiri\KvartiriBundle\Controller;

use Kvartiri\KvartiriBundle\Form\SelectRoomType;
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

    public function addFavoriteHotelAction($id)
    {
        $favoriteHotels = array();
        $session = $this->getRequest()->getSession();

        if (!$session->has('favoriteHotels')) $session->set('favoriteHotels',array());
        $favoriteHotels = $session->get('favoriteHotels');

//        print_r($favoriteHotels);
        if (array_key_exists($id, $favoriteHotels)) {
           print_r('je suis dans la boucle 1');
            if ($this->getRequest()->query->get('roomId') != null) $favoriteHotels[$id] = $this->getRequest()->query->get('roomId');
            $this->get('session')->getFlashBag()->add('success','The type of room has been successfully changed');
        } else {
            print_r('je suis dans la boucle 2');

            if ($this->getRequest()->query->get('roomId') != null)
                $panier[$id] = $this->getRequest()->query->get('roomId');
            else
                print_r('je suis dans la boucle favorite');

                $favoriteHotels[$id] = 1;

            $this->get('session')->getFlashBag()->add('success','The selected hotel has been added');
        }
//        print_r($favoriteHotels);

        $session->set('favoriteHotels', $favoriteHotels);

     return $this->redirect($this->generateUrl('favoriteHotels'));

//        var_dump($session->get('favoriteHotels'));
//        die();
//        return $this->render('KvartiriBundle:Default:selection/layout/favoriteHotels.html.twig');

//ou a ete le probleme
    }

    public function removeFavoriteHotelAction($id)
    {
        $session = $this->getRequest()->getSession();
        $favoriteHotels = $session->get('favoriteHotels');

        if (array_key_exists($id, $favoriteHotels))
        {
            unset($favoriteHotels[$id]);
            $session->set('favoriteHotels',$favoriteHotels);
            $this->get('session')->getFlashBag()->add('success','Selected hotel has been successfully removed');
        }

        return $this->redirect($this->generateUrl('favoriteHotels'));
    }

    public function favoriteHotelsAction()
    {
        $session = $this->getRequest()->getSession();
        if (!$session->has('favoriteHotels')) $session->set('favoriteHotels', array());

        $em = $this->getDoctrine()->getManager();
        $hotels = $em->getRepository('KvartiriBundle:Hotels')->findArray(array_keys($session->get('favoriteHotels')));

        return $this->render('KvartiriBundle:Default:selection/layout/favoriteHotels.html.twig', array('hotels' => $hotels,
            'favoriteHotels' => $session->get('favoriteHotels')));
//        var_dump($session->get('favoriteHotels'));
//        die();
//        return $this->render('KvartiriBundle:Default:selection/layout/favoriteHotels.html.twig');
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
