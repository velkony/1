<?php

namespace Kvartiri\KvartiriBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\Query;
use Symfony\Component\HttpFoundation\JsonResponse;
use Gedmo\Translatable\TranslatableListener;

class NavigationController extends Controller
{
    public function menuAction()
    {
        $em = $this->getDoctrine()->getManager();
        $allRegionsCities = $em->getRepository('KvartiriBundle:Regions')->findAll();

        if($allRegionsCities){
            $data = array();
            $cpt = 0;

            foreach ($allRegionsCities as  $regionCities) {
                $cpt1 = 0;
                $data[$cpt]['label'] = $regionCities->getName();
                $data[$cpt]['id'] = $regionCities->getId();

                $child = array();

                foreach ($regionCities->getCities() as $city){
                    $child[$cpt1]['label'] = $city->getName();
                    $child[$cpt1]['id'] = $city->getId();
                    $cpt1++;
                }
                $data[$cpt]['children'] = $child;
                $cpt++;

            }
        } else{
            $data = null;
        }


        $response = new JsonResponse();
        return $response->setData(array('data'=> $data));


    }

    public function cityHotelsAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $hotels = $em->getRepository('KvartiriBundle:Hotels')->byCity($id);

        return $this->render('KvartiriBundle:Default:hotels/layout/cityHotels.html.twig', array('hotels' =>  $hotels));
    }


}
