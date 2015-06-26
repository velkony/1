<?php

namespace Users\UsersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

class PromotionsController extends Controller
{
    public function datePromotionsAction($hotelId, $dateStart)
    {
        $em = $this->getDoctrine()->getManager();
        $hotel = $em->getRepository('KvartiriBundle:Hotels')->find($hotelId);
        $test = '';

        if ($hotel) {
            $date = new \DateTime($dateStart);
            $now = new \DateTime();
            $diff = date_diff($date, $now);

            $daysDiff = $diff->y * 365.25 + $diff->m * 30 + $diff->d + $diff->h/24 + $diff->i / 60;

            $checkValue = 0;
            $getPromotion = "";
            foreach ($hotel->getPromotionEarlyBooking() as $promotion){
                $numbreDaysPromotionDB =  $promotion->getDays();

                if($numbreDaysPromotionDB && $daysDiff >= $numbreDaysPromotionDB && $checkValue < $numbreDaysPromotionDB){
                    $checkValue = $numbreDaysPromotionDB;
                    $getPromotion = $promotion->getDiscount()*100;
                    $getPromotion = "You have ".$getPromotion."% discount";
                }else{ $getPromotion = "we can not offer you a promotion";

                }

            }
//            $promotion = $date->diff($now)->format("%d days, %h hours and %i minuts");

        } else {
            $test = null;
        }

//        return $this->render('UsersBundle:ClientsRequests:promotions.html.twig', array('getPromotion' => $getPromotion));

        $response = new JsonResponse();
        return $response->setData(array('getPromotion' => $getPromotion));
    }
}
