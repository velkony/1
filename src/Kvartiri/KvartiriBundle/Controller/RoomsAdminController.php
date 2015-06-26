<?php

namespace Kvartiri\KvartiriBundle\Controller;

use Kvartiri\KvartiriBundle\Entity\HotelSeasons;
use Kvartiri\KvartiriBundle\Entity\RoomSeasons;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Kvartiri\KvartiriBundle\Entity\Rooms;
use Kvartiri\KvartiriBundle\Form\RoomsType;

/**
 * Rooms controller.
 *
 */

class RoomsAdminController extends Controller {


    /**
     * Lists all Rooms entities.
     *
     */
    public function indexAction($hotelId) {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('KvartiriBundle:Rooms')->findBy(array('hotel' => $hotelId));

        return $this->render('KvartiriBundle:Admin:Rooms/index.html.twig', array(
            'entities' => $entities,
            'hotelId' => $hotelId,
        ));
    }

    /**
     * Creates a new Rooms entity.
     *
     */
    public function createAction(Request $request, $hotelId) {

        $entity = new Rooms();
        $form = $this->createCreateForm($entity, $hotelId);
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        $entitiesHotelSeasons = $em->getRepository('KvartiriBundle:Hotels')->find($hotelId);

        if ($form->isValid()) {

            $hotelSeason = $request->get('hotelseasons');
            $price = $request->get('price');
            /*             * Ma logique pour enregistrer les prix* */


            \Doctrine\Common\Util\Debug::dump($price);

            $index = 0;
            foreach ($hotelSeason as $hotels) {
                $roomSeasons[$hotels] = new RoomSeasons();

                // $rooms = new Rooms();
                $HotelSeasons = $em->getRepository('KvartiriBundle:HotelSeasons')->find($hotels);

                $roomSeasons[$hotels]->setPrice($price[$index]);
                $roomSeasons[$hotels]->addHotelSeason($HotelSeasons);
                $entity->addRoomSeason($roomSeasons[$hotels]);

                //$em->persist($value);
                //   $rooms->getRoomSeasons()->add($HotelSeasons);
                //   \Doctrine\Common\Util\Debug::dump($roomSeasons[0]);
                $index++;
            }
            foreach ($roomSeasons as $value) {
                $em->persist($value);
            }

            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('adminRooms_show', array(
                'id' => $entity->getId(),
                'hotelId' => $hotelId,
                )));
        }

        return $this->render('KvartiriBundle:Admin:Rooms/new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
            'hotelsSeasons' => $entitiesHotelSeasons->getHotelSeasons(),
        ));
    }

    /**
     * Creates a form to create a Rooms entity.
     *
     * @param Rooms $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Rooms $entity, $hotelId) {
        $form = $this->createForm(new RoomsType($hotelId), $entity, array(
            'action' => $this->generateUrl('adminRooms_create', array('hotelId' => $hotelId)),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));
        return $form;
    }

    /**
     * Displays a form to create a new Rooms entity.
     *
     */
    public function newAction($hotelId) {
        $entity = new Rooms();

        $id = 3;
        $em = $this->getDoctrine()->getManager();
        $entitiesHotelSeasons = $em->getRepository('KvartiriBundle:Hotels')->find($hotelId);
        // \Doctrine\Common\Util\Debug::dump($entitiesHotelSeasons);
//        foreach($entitiesHotelSeasons as $hotelSeason){
//            $roomSeasons1 = new RoomSeasons();
////            $hotelSeasons1 = new HotelSeasons();
////            $hotelSeason->getId();
//            $roomSeasons1->setPrice(22);
//            $roomSeasons1->addHotelSeason($hotelSeason);
//
////        $roomSeasons2 = new RoomSeasons();
////        $roomSeasons2->setPrice(6);
//
//            $entity->getRoomSeasons()->add($roomSeasons1);
//        $entity->getRoomSeasons()->add($roomSeasons2);
        //      }




        $form = $this->createCreateForm($entity, $hotelId);

        return $this->render('KvartiriBundle:Admin:Rooms/new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
            'hotelsSeasons' => $entitiesHotelSeasons->getHotelSeasons(),
            'hotelId' => $hotelId,
        ));
    }

    /**
     * Finds and displays a Rooms entity.
     *
     */
    public function showAction($hotelId,$id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('KvartiriBundle:Rooms')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Rooms entity.');
        }

        $deleteForm = $this->createDeleteForm($hotelId, $id);

        return $this->render('KvartiriBundle:Admin:Rooms/show.html.twig', array(
            'entity' => $entity,
            'hotelId' => $hotelId,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Rooms entity.
     *
     */
    public function editAction($hotelId, $id) {



        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('KvartiriBundle:Rooms')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Rooms entity.');
        }

        $editForm = $this->createEditForm($entity, $hotelId);
        $deleteForm = $this->createDeleteForm($hotelId, $id);
        $entitiesHotelSeasons = $em->getRepository('KvartiriBundle:Hotels')->find($hotelId);

        return $this->render('KvartiriBundle:Admin:Rooms/edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
//            'hotelsSeasons' => $entitiesHotelSeasons['hotelSeasons'],
            'hotelId' => $hotelId,
        ));
    }

    /**
     * Creates a form to edit a Rooms entity.
     *
     * @param Rooms $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Rooms $entity, $hotelId) {
        $form = $this->createForm(new RoomsType($hotelId), $entity, array(
            'action' => $this->generateUrl('adminRooms_update', array('id' => $entity->getId(), 'hotelId' => $hotelId)),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Rooms entity.
     *
     */
    public function updateAction(Request $request, $hotelId, $id) {


        $price = $request->get('price');
        $em = $this->getDoctrine()->getManager();
        $entitiesHotelSeasons = $em->getRepository('KvartiriBundle:Hotels')->find($hotelId);
        $entity = $em->getRepository('KvartiriBundle:Rooms')->find($id);

        /*         * Enregistrement des types de saison* */
        foreach ($entity->getRoomSeasons() as $value) {

            foreach ($value->getHotelSeasons() as $name) {

                $name->setName($name->getName());
            }
        }
        /*         * Enregistrement des prix dans pour chaque saison* */
        $index = 0;
        foreach ($entity->getRoomSeasons() as $value) {
            $value->setPrice($price[$index]);
            $index++;
        }
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Rooms entity.');
        }
        $deleteForm = $this->createDeleteForm($hotelId, $id);

        $editForm = $this->createEditForm($entity, $hotelId);
        $editForm->handleRequest($request);


        if ($editForm->isValid()) {
            $em->flush();
            return $this->redirect($this->generateUrl('adminRooms_edit', array('id' => $id, 'hotelId' => $hotelId)));
        }

        return $this->render('KvartiriBundle:Admin:Rooms/edit.html.twig', array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
//            'hotelsSeasons' => $entitiesHotelSeasons,
        ));
    }

    /**
     * Deletes a Rooms entity.
     *
     */
    public function deleteAction(Request $request, $id, $hotelId) {
        $form = $this->createDeleteForm($hotelId, $id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('KvartiriBundle:Rooms')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Rooms entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('adminRooms', array('hotelId' => $hotelId)));
    }

    /**
     * Creates a form to delete a Rooms entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($hotelId, $id) {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('adminRooms_delete', array('id' => $id, 'hotelId' => $hotelId)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
            ;
    }

}




//class RoomsAdminController extends Controller
//{
//
//    /**
//     * Lists all Rooms entities.
//     *
//     */
//    public function indexAction()
//    {
//        $em = $this->getDoctrine()->getManager();
//
//        $entities = $em->getRepository('KvartiriBundle:Rooms')->findAll();
//
//        return $this->render('KvartiriBundle:Admin:Rooms/index.html.twig', array(
//            'entities' => $entities,
//        ));
//    }
//    /**
//     * Creates a new Rooms entity.
//     *
//     */
//    public function createAction(Request $request)
//    {
//        $entity = new Rooms();
//        $form = $this->createCreateForm($entity);
//        $form->handleRequest($request);
//
//        $em = $this->getDoctrine()->getManager();
//        $entitiesHotelSeasons = $em->getRepository('KvartiriBundle:HotelSeasons')->findAll();
//
//        if ($form->isValid()) {
//            $em = $this->getDoctrine()->getManager();
//            $em->persist($entity);
//            $em->flush();
//
//            return $this->redirect($this->generateUrl('adminRooms_show', array('id' => $entity->getId())));
//        }
//
//        return $this->render('KvartiriBundle:Admin:Rooms/new.html.twig', array(
//            'entity' => $entity,
//            'form'   => $form->createView(),
//        ));
//    }
//
//    /**
//     * Creates a form to create a Rooms entity.
//     *
//     * @param Rooms $entity The entity
//     *
//     * @return \Symfony\Component\Form\Form The form
//     */
//    private function createCreateForm(Rooms $entity)
//    {
//        $form = $this->createForm(new RoomsType(), $entity, array(
//            'action' => $this->generateUrl('adminRooms_create'),
//            'method' => 'POST',
//        ));
//
//        $form->add('submit', 'submit', array('label' => 'Create'));
//
//        return $form;
//    }
//
//    /**
//     * Displays a form to create a new Rooms entity.
//     *
//     */
//    public function newAction()
//    {
//        $entity = new Rooms();
//
//        $id = 3;
//        $em = $this->getDoctrine()->getManager();
//        $entitiesHotelSeasons = $em->getRepository('KvartiriBundle:HotelSeasons')->findAll();
//        foreach($entitiesHotelSeasons as $hotelSeason){
//            $roomSeasons1 = new RoomSeasons();
////            $hotelSeasons1 = new HotelSeasons();
////            $hotelSeason->getId();
//            $roomSeasons1->setPrice($hotelSeason->getId());
//            $roomSeasons1->addHotelSeason($hotelSeason);
//
////        $roomSeasons2 = new RoomSeasons();
////        $roomSeasons2->setPrice(6);
//
//            $entity->getRoomSeasons()->add($roomSeasons1);
////        $entity->getRoomSeasons()->add($roomSeasons2);
//        }
//
//
//
//
//        $form   = $this->createCreateForm($entity);
//
//        return $this->render('KvartiriBundle:Admin:Rooms/new.html.twig', array(
//            'entity' => $entity,
//            'form'   => $form->createView(),
//        ));
//    }
//
//    /**
//     * Finds and displays a Rooms entity.
//     *
//     */
//    public function showAction($id)
//    {
//        $em = $this->getDoctrine()->getManager();
//
//        $entity = $em->getRepository('KvartiriBundle:Rooms')->find($id);
//
//        if (!$entity) {
//            throw $this->createNotFoundException('Unable to find Rooms entity.');
//        }
//
//        $deleteForm = $this->createDeleteForm($id);
//
//        return $this->render('KvartiriBundle:Admin:Rooms/show.html.twig', array(
//            'entity'      => $entity,
//            'delete_form' => $deleteForm->createView(),
//        ));
//    }
//
//    /**
//     * Displays a form to edit an existing Rooms entity.
//     *
//     */
//    public function editAction($id)
//    {
//        $em = $this->getDoctrine()->getManager();
//
//        $entity = $em->getRepository('KvartiriBundle:Rooms')->find($id);
//
//        if (!$entity) {
//            throw $this->createNotFoundException('Unable to find Rooms entity.');
//        }
//
//        $editForm = $this->createEditForm($entity);
//        $deleteForm = $this->createDeleteForm($id);
//
//        return $this->render('KvartiriBundle:Admin:Rooms/edit.html.twig', array(
//            'entity'      => $entity,
//            'edit_form'   => $editForm->createView(),
//            'delete_form' => $deleteForm->createView(),
//        ));
//    }
//
//    /**
//    * Creates a form to edit a Rooms entity.
//    *
//    * @param Rooms $entity The entity
//    *
//    * @return \Symfony\Component\Form\Form The form
//    */
//    private function createEditForm(Rooms $entity)
//    {
//        $form = $this->createForm(new RoomsType(), $entity, array(
//            'action' => $this->generateUrl('adminRooms_update', array('id' => $entity->getId())),
//            'method' => 'PUT',
//        ));
//
//        $form->add('submit', 'submit', array('label' => 'Update'));
//
//        return $form;
//    }
//    /**
//     * Edits an existing Rooms entity.
//     *
//     */
//    public function updateAction(Request $request, $id)
//    {
//        $em = $this->getDoctrine()->getManager();
//
//        $entity = $em->getRepository('KvartiriBundle:Rooms')->find($id);
//
//        if (!$entity) {
//            throw $this->createNotFoundException('Unable to find Rooms entity.');
//        }
//
//        $deleteForm = $this->createDeleteForm($id);
//        $editForm = $this->createEditForm($entity);
//        $editForm->handleRequest($request);
//
//        if ($editForm->isValid()) {
//
//            $em->flush();
//
//            return $this->redirect($this->generateUrl('adminRooms_edit', array('id' => $id)));
//        }
//
//        return $this->render('KvartiriBundle:Admin:Rooms/edit.html.twig', array(
//            'entity'      => $entity,
//            'edit_form'   => $editForm->createView(),
//            'delete_form' => $deleteForm->createView(),
//        ));
//    }
//    /**
//     * Deletes a Rooms entity.
//     *
//     */
//    public function deleteAction(Request $request, $id)
//    {
//        $form = $this->createDeleteForm($id);
//        $form->handleRequest($request);
//
//        if ($form->isValid()) {
//            $em = $this->getDoctrine()->getManager();
//            $entity = $em->getRepository('KvartiriBundle:Rooms')->find($id);
//
//            if (!$entity) {
//                throw $this->createNotFoundException('Unable to find Rooms entity.');
//            }
//
//            $em->remove($entity);
//            $em->flush();
//        }
//
//        return $this->redirect($this->generateUrl('adminRooms'));
//    }
//
//    /**
//     * Creates a form to delete a Rooms entity by id.
//     *
//     * @param mixed $id The entity id
//     *
//     * @return \Symfony\Component\Form\Form The form
//     */
//    private function createDeleteForm($id)
//    {
//        return $this->createFormBuilder()
//            ->setAction($this->generateUrl('adminRooms_delete', array('id' => $id)))
//            ->setMethod('DELETE')
//            ->add('submit', 'submit', array('label' => 'Delete'))
//            ->getForm()
//        ;
//    }
//}
