<?php

namespace Kvartiri\KvartiriBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Kvartiri\KvartiriBundle\Entity\Hotels;
use Kvartiri\KvartiriBundle\Form\HotelsType;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Hotels controller.
 *
 */
class HotelsAdminController extends Controller {

    /**
     * Lists all Hotels entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('KvartiriBundle:Hotels')->findAll();

        return $this->render('KvartiriBundle:Admin:Hotels/index.html.twig', array(
                    'entities' => $entities,
        ));
    }

    /**
     * Creates a new Hotels entity.
     *
     */
    public function createAction(Request $request) {
        $entity = new Hotels();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('hotelsAdminAddHotel_show', array('id' => $entity->getId())));
        }

        return $this->render('KvartiriBundle:Admin:Hotels/new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Hotels entity.
     *
     * @param Hotels $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Hotels $entity) {
        $form = $this->createForm(new HotelsType(), $entity);

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Hotels entity.
     *
     */
    public function newAction() {
        $entity = new Hotels();
        $form = $this->createCreateForm($entity);

        return $this->render('KvartiriBundle:Admin:Hotels/new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Hotels entity.
     *
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('KvartiriBundle:Hotels')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Hotels entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('KvartiriBundle:Admin:Hotels/show.html.twig', array(
                    'entity' => $entity,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Hotels entity.
     *
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('KvartiriBundle:Hotels')->find($id);


//        $originalImages = new ArrayCollection();
//        // Create an ArrayCollection of the current Tag objects in the database
//        foreach ($entity->getImages() as $image) {
//            $originalImages->add($image);
//        }

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Hotels entity.');
        }

//        foreach ($originalImages as $image) {
//            if (false === $entity->getImages()->contains($image)) {
//                $em->remove($image);
//                $em->flush();
//            }
//        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('KvartiriBundle:Admin:Hotels/edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a Hotels entity.
     *
     * @param Hotels $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Hotels $entity) {
        $form = $this->createForm(new HotelsType(), $entity);

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Hotels entity.
     *
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('KvartiriBundle:Hotels')->find($id);

        $originalImages = new ArrayCollection();
        $originalSeasons = new ArrayCollection();

        // Create an ArrayCollection of the current Tag objects in the database
        foreach ($entity->getImages() as $image) {
            $originalImages->add($image);
        }
        foreach ($entity->getHotelSeasons() as $season) {
            $originalSeasons->add($season);
        }


        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Hotels entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {

            foreach ($originalImages as $image) {
                if (false == $entity->getImages()->contains($image)) {
                    $em->remove($image);
                }
            }
            foreach ($originalSeasons as $season) {
                if (false == $entity->getHotelSeasons()->contains($season)) {

                    foreach ($entity->getRooms() as $value) {

                        foreach ($value->getRoomSeasons() as $roomseasons) {
                            
                            foreach ($roomseasons->getHotelSeasons() as $item) {
                            
                                if ($item->getname() == $season->getname()) {
                                   // \Doctrine\Common\Util\Debug::dump($value->getRoomSeasons());
                                $em->remove($roomseasons);
                                }
                            }
                        }
                    }

                    $em->remove($season);
                }
            }


              $em->flush();
            return $this->redirect($this->generateUrl('hotelsAdminAddHotel_edit', array('id' => $id)));
        }

        return $this->render('KvartiriBundle:Admin:Hotels/edit.html.twig', array(
                    'entity' => $entity,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Hotels entity.
     *
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('KvartiriBundle:Hotels')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Hotels entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('hotelsAdminAddHotel'));
    }

    /**
     * Creates a form to delete a Hotels entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('hotelsAdminAddHotel_delete', array('id' => $id)))
                        ->setMethod('DELETE')
                        ->add('submit', 'submit', array('label' => 'Delete'))
                        ->getForm()
        ;
    }

}
