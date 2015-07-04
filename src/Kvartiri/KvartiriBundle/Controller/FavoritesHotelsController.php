<?php

namespace Kvartiri\KvartiriBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Kvartiri\KvartiriBundle\Entity\FavoritesHotels;
use Kvartiri\KvartiriBundle\Form\FavoritesHotelsType;

/**
 * FavoritesHotels controller.
 *
 */
class FavoritesHotelsController extends Controller
{

    public function menuAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUser()->getId();
        $em = $this->getDoctrine()->getManager();
        $selectedHotels = $em->getRepository('KvartiriBundle:FavoritesHotels')->findOneBy(array('user'=>$user));
        if(!$selectedHotels->getFavoriteHotel()){
            $selectedHotels = 0;
        }else{
            $selectedHotels = count($selectedHotels->getFavoriteHotel());
        }
        return $this->render('KvartiriBundle:FavoritesHotels:menuFavoriteHotels.html.twig', array(
            'selectedHotels' => $selectedHotels,
            'user'=> $user));
    }



    /**
     * Creates a new FavoritesHotels entity.
     *
     */
    public function createAction(Request $request)
    {
        $favoriteHotel = array();
        $listFavoriteHotel = array();
        if ($this->get('request')->getMethod() == 'POST')
        {
            $hotelId = $request->request->get('hotelId');
            $roomId = $request->request->get('roomId');
            $roomIdOld = $request->request->get('roomIdOld');
            $user = $this->container->get('security.context')->getToken()->getUser()->getId();
            $em = $this->getDoctrine()->getManager();
            $testFavoritesHotels = $em->getRepository('KvartiriBundle:FavoritesHotels')->findOneBy(array('user'=>$user));
            $hotel = $em->getRepository('KvartiriBundle:Hotels')->find($hotelId);
            $favoriteHotel['room-id'] = $roomId;
            $favoriteHotel['hotel-name'] = $hotel->getName();
            $favoriteHotel['hotel-id'] = $hotel->getId();

            $im = 0;
            foreach ($hotel->getImages() as $image) {
                $images[$im]['image'] = $image->getPath();
                $images[$im]['image-alt'] = $image->getAlt();
                $im++;
            }
            $favoriteHotel['images'] =  $images;

            $i = 0;
            foreach ($hotel->getRooms() as  $room) {
                if($room->getId() == $roomId){
                    $favoriteHotel['room-type'] = $room->getRoomType();
                }
                $favoriteHotel['hotel-rooms'][$i]['room-id'] = $room->getId();
                $favoriteHotel['hotel-rooms'][$i]['room-type'] = $room->getRoomType();
                $i++;
            }

            if ($testFavoritesHotels == null){

                if ($roomId != null) {
                    $listFavoriteHotel[] = $favoriteHotel;
                    $addFavoritesHotels = new FavoritesHotels();
                    $addFavoritesHotels->setUser($user);
                    $addFavoritesHotels->setFavoriteHotel( $listFavoriteHotel);
                    $em->persist($addFavoritesHotels);
                    $em->flush();
                }
            }
            else{

                if($roomIdOld){
                    foreach ($testFavoritesHotels->getFavoriteHotel() as  $fh) {

                        if($roomIdOld == $fh['room-id']){
                            $fh['room-id'] = $roomId;
                        }
                        $listFavoriteHotel[] = $fh;
                        $testFavoritesHotels->setFavoriteHotel($listFavoriteHotel);
                        $em->persist($testFavoritesHotels);
                        $em->flush();

                    }

                } else {

                    foreach ($testFavoritesHotels->getFavoriteHotel() as  $fh) {
                        if($fh != $favoriteHotel){
                            $listFavoriteHotel[] = $fh;
                        }
                    }
                    $listFavoriteHotel[] = $favoriteHotel;
                    $testFavoritesHotels->setFavoriteHotel($listFavoriteHotel);
                    $em->persist($testFavoritesHotels);
                    $em->flush();

                }
            }
        } else {
            throw $this->createNotFoundException('La page n\'existe pas.');
        }

        return $this->redirect($this->generateUrl('favorites-hotels_show', array(
            'user' => $user)));
    }

    /**
     * Finds and displays a FavoritesHotels entity.
     *
     */
    public function showAction($user)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('KvartiriBundle:FavoritesHotels')->findOneBy(array('user'=>$user));

//        if (!$entity) {
//            throw $this->createNotFoundException('Unable to find FavoritesHotels entity.');
//        }

        return $this->render('KvartiriBundle:FavoritesHotels:show.html.twig', array(
            'entity'    => $entity,
            'user'      => $user
        ));
    }

    /**
     * Deletes a FavoritesHotels entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {

        $user = $this->container->get('security.context')->getToken()->getUser()->getId();
        $em = $this->getDoctrine()->getManager();
        $testFavoritesHotels = $em->getRepository('KvartiriBundle:FavoritesHotels')->findOneBy(array('user'=>$user));

        if(count($testFavoritesHotels->getFavoriteHotel()) == 1){
            $em->remove($testFavoritesHotels);
            $em->flush();
        } else {
            foreach ($testFavoritesHotels->getFavoriteHotel() as  $fh) {
                if($id != $fh['room-id']){
                    $listFavoriteHotel[] = $fh;
                    $testFavoritesHotels->setFavoriteHotel($listFavoriteHotel);
                    $em->persist($testFavoritesHotels);
                    $em->flush();
                }

            }
        }

        return $this->redirect($this->generateUrl('favorites-hotels_show', array(
            'user' => $user)));

    }
}
