<?php

namespace Kvartiri\KvartiriBundle\Controller;

use Kvartiri\KvartiriBundle\Form\SelectRoomType;
use Kvartiri\KvartiriBundle\Form\SearchType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;


class HotelsController extends Controller
{
    public function hotelsAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $findHotels = $em->getRepository('KvartiriBundle:Hotels')->findBy(array('available' => 1));
        if (!$findHotels) throw $this->createNotFoundException('La page n\'existe pas.');

        $paginator  = $this->get('knp_paginator');
        $hotels = $paginator->paginate($findHotels, $request->query->get('page', 1)/*page number*/,
            21/*limit per page*/
        );

        if($hotels){
            $data = array();
            $k = 0;

            foreach ($hotels as  $hotel) {
                $data[$k]['hotel-id'] = $hotel->getId();
                $data[$k]['hotel-name'] = $hotel->getName();

                $images = array();
                $i = 0;
                foreach ($hotel->getImages() as $image) {
                    $images[$i]['image'] = $image->getAssetPath();
                    $images[$i]['image-alt'] = $image->getAlt();
                    $i++;
                }

                $data[$k]['images'] = $images;

                $hotelType = $hotel->getHotelType();
                $data[$k]['hotel-type'] = $hotelType;

//                $season = array();
                $lowPrice = '';

//                $min = false;
//                foreach ($hotel->getHotelSeasons() as $hotelSeasons){
//
//                    foreach ( $hotelSeasons->getRoomSeasons() as $roomSeason){
//                        $value = $roomSeason->getPrice();
//                        if (is_numeric($value)) {
//                            $curval = floatval($value);
//                            if ($curval < $min || $min === false){
//                                $min = $curval;
//                                $lowPrice = $curval;
//                            }
//                        }
//                    }
//                }
//                $data[$k]['low-price-room'] = $lowPrice;

//                foreach ($hotel->getHotelSeasons() as $hotelSeasons){
//                //Looking for the right season in charge of the day
//                    if (new \DateTime() >= $hotelSeasons->getStart() && new \DateTime() <= $hotelSeasons->getFinish()) {
//
//                        $season['season-id'] = $hotelSeasons->getId();
//                        $season['season-start'] = $hotelSeasons->getStart();
//                        $season['season-finish'] = $hotelSeasons->getFinish();
//
//                        $min = false;
//                        foreach ( $hotelSeasons->getRoomSeasons() as $roomSeason){
//                            $value = $roomSeason->getPrice();
//                            if (is_numeric($value)) {
//                                $curval = floatval($value);
//                                if ($curval < $min || $min === false){
//                                    $season['season-low-price-room']['room-id'] = $roomSeason->getId();
//                                    $season['season-low-price-room']['room-price'] = $roomSeason->getPrice();
//                                    $min = $curval;
//                                }
//                            }
//                        }
//                    }
//                        $data[$k]['hotel-season-now'] = $season;
//                        $data[$k]['images'] = $images;
//                        $data[$k]['hotel-type'] = $hotelType;
//
//                }
                $k++;
            }
        } else{
            $data = null;
        }


        return $this->render('KvartiriBundle:Default:hotels/layout/hotels.html.twig', array('hotels' => $hotels,
                                                                                            'data' => $data
        ));
    }

    public function getCitiesAction(){

        $em = $this->getDoctrine()->getManager();
        $cities = $em->getRepository('KvartiriBundle:Cities')->getCities();
//        $cities = $em->getRepository('KvartiriBundle:Cities')->findAll();
        if (!$cities) throw $this->createNotFoundException('La page n\'existe pas.');

        return $this->render('::modulesUsed/filters.html.twig', array('cities' => $cities));
    }

    public function presentationAction()
    {
        return $this->render('KvartiriBundle:Default:hotels/layout/presentation.html.twig');
    }

    public function presentationHotelAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $hotel = $em->getRepository('KvartiriBundle:Hotels')->find($id);
        if (!$hotel) throw $this->createNotFoundException('La page n\'existe pas.');



        if($hotel){

            $hotelName = $hotel->getName();

            $hotelRooms = array();
            $nr = 0;
            foreach ($hotel->getRooms() as  $room) {
                $hotelRooms[$nr]['id'] = $room->getId();
                $hotelRooms[$nr]['type'] = $room->getRoomType();
                //Get room seasons
                $hotelRooms[$nr]['seasons'] = $room->getRoomSeasons();
                $nr++;
            }

            $room = array();

            $data = array();

            $s = 0;
//-------------------------------------------------------------------------------
            foreach ($hotel->getHotelSeasons() as  $hotelSeason) {
                $data[$s]['hotel-season-start'] = $hotelSeason->getStart();
                $data[$s]['hotel-season-finish'] = $hotelSeason->getFinish();
                $data[$s]['hotel-available'] = $hotelSeason->getAvailable();
                $r=0;
                foreach ($hotel->getRooms() as  $room) {

                    foreach ($room->getRoomSeasons() as  $roomSeason) {

                        foreach ($roomSeason->getHotelSeasons() as  $hotelSeason2) {

                            if($hotelSeason2->getId() == $hotelSeason->getId()){
                                $data[$s]['rooms'][$r]['price'] = $roomSeason->getPrice();
                                $data[$s]['rooms'][$r]['type'] = $room->getRoomType();
                            }

                        }
                    }


                    $r++;
                }


//                $d = 0;
//                $data[$s]['hotel-season-reduction'][$d]['percent'] = 0;
//
//                foreach ( $hotelSeason->getHotelReductions() as $reduction){
//                    $data[$s]['hotel-season-reduction'][$d]['percent'] = $reduction->getPercent();
//                    $data[$s]['hotel-season-reduction'][$d]['start'] = $reduction->getStart();
//                    $data[$s]['hotel-season-reduction'][$d]['finish'] = $reduction->getFinish();
//                    $d++;
//                }
//                $r = 0;
//                foreach ( $hotelSeason->getRoomSeasons() as $roomSeason){
//                    $data[$s]['hotel-season-rooms'][$r]['room-id'] = $roomSeason->getRoom()->getId();
//                    $data[$s]['hotel-season-rooms'][$r]['room-price'] = $roomSeason->getPrice();
//
//                    $roomType = $roomSeason->getRoom()->getRoomType();
//                    if($roomType == 1) $type = "SingleRoom";
//                    else if ($roomType == 2) $type = "DoubleRoom";
//                    else if ($roomType == 3) $type = "TripleRoom";
//                    else if ($roomType == 4) $type = "QuadrupleRoom";
//                    else if ($roomType == 5) $type = "Apartment";
//                    else if ($roomType == 6) $type = "Studio";
//                    else if ($roomType == 7) $type = "Suite";
//
//                    $data[$s]['hotel-season-rooms'][$r]['room-type'] = $type;
//                    $room[$r] = $type;
//                    $r++;
//                }
                $s++;
            }
            $i = 0;
            $media = array();

            foreach ( $hotel->getImages() as $image){
                $media['images'][$i]['image'] = $image->getAssetPath();
                $media['images'][$i]['image-alt'] = $image->getAlt();

                $i++;
            }

            $v = 0;
            foreach ( $hotel->getVideos() as $video){
                $media['videos'][$v]['video'] = $video->getPath();
                $media['videos'][$v]['video-alt'] = $video->getAlt();
                $v++;
            }
        } else{
            $data = null;
        }
        $rooms = $room;
        $form = $this->createForm(new SelectRoomType($rooms));

        return $this->render('KvartiriBundle:Default:hotels/layout/presentationHotel.html.twig', array('data' => $data,
                                                                                                       'media' => $media,
                                                                                                       'hotelName' => $hotelName,
                                                                                                       'hotelRooms' => $hotelRooms,
                                                                                                       'hotel' => $hotel,
                                                                                                       'form' => $form->createView()

            ));
    }

    public function findSeasonAction($period)
    {
        die('ok');
//        $response = new JsonResponse();
//        return $response->setData(array('data'=> $data));
//        $form = $this->createForm(new SeasonType());
//        return $this->render('KvartiriBundle:Default:hotels/layout/presentationHotel.html.twig', array('form' => $form->createView()));

    }

    public function searchAction()
    {
        $form = $this->createForm(new SearchType());
        return $this->render('KvartiriBundle:Default:search/search.html.twig', array('form' => $form->createView()));

    }

    public function searchTreatmentAction()
    {
        $form = $this->createForm(new SearchType());

        if ($this->get('request')->getMethod() == 'POST')
        {
            $form->bind($this->get('request'));
//            echo $form['search']->getData();

            $em = $this->getDoctrine()->getManager();
            $hotels = $em->getRepository('KvartiriBundle:Hotels')->search($form['search']->getData());
        } else {
            throw $this->createNotFoundException('La page n\'existe pas.');
        }
        return $this->render('KvartiriBundle:Default:search/searchHotels.html.twig', array('hotels' => $hotels));
    }

}
