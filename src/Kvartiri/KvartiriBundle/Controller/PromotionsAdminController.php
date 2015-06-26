<?php

namespace Kvartiri\KvartiriBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Kvartiri\KvartiriBundle\Entity\Promotions;
use Kvartiri\KvartiriBundle\Form\PromotionsType;

/**
 * Promotions controller.
 *
 */
class PromotionsAdminController extends Controller
{

    /**
     * Lists all Promotions entities.
     *
     */
    public function indexAction($hotelId)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('KvartiriBundle:Promotions')->findBy(array('hotel' => $hotelId));

        return $this->render('KvartiriBundle:Admin:Promotions/index.html.twig', array(
            'entities' => $entities,
            'hotelId' => $hotelId,
        ));
    }
    /**
     * Creates a new Promotions entity.
     *
     */
    public function createAction(Request $request, $hotelId)
    {
        $entity = new Promotions();
        $form = $this->createCreateForm($entity, $hotelId);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('adminPromotions_show', array(
                'id' => $entity->getId(),
                'hotelId' => $hotelId,
            )));
        }

        return $this->render('KvartiriBundle:Admin:Promotions/new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Promotions entity.
     *
     * @param Promotions $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Promotions $entity, $hotelId)
    {
        $form = $this->createForm(new PromotionsType($hotelId), $entity, array(
            'action' => $this->generateUrl('adminPromotions_create', array('hotelId' => $hotelId)),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Promotions entity.
     *
     */
    public function newAction($hotelId)
    {
        $entity = new Promotions();
        $form   = $this->createCreateForm($entity, $hotelId);

        return $this->render('KvartiriBundle:Admin:Promotions/new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'hotelId' => $hotelId,
        ));
    }

    /**
     * Finds and displays a Promotions entity.
     *
     */
    public function showAction($hotelId,$id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('KvartiriBundle:Promotions')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Promotions entity.');
        }

        $deleteForm = $this->createDeleteForm($hotelId, $id);

        return $this->render('KvartiriBundle:Admin:Promotions/show.html.twig', array(
            'entity'      => $entity,
            'hotelId' => $hotelId,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Promotions entity.
     *
     */
    public function editAction($hotelId, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('KvartiriBundle:Promotions')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Promotions entity.');
        }

        $editForm = $this->createEditForm($entity, $hotelId);
        $deleteForm = $this->createDeleteForm($hotelId, $id);

        return $this->render('KvartiriBundle:Admin:Promotions/edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
            'hotelId' => $hotelId,
        ));
    }

    /**
    * Creates a form to edit a Promotions entity.
    *
    * @param Promotions $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Promotions $entity, $hotelId)
    {
        $form = $this->createForm(new PromotionsType($hotelId), $entity, array(
            'action' => $this->generateUrl('adminPromotions_update', array('id' => $entity->getId(), 'hotelId' => $hotelId)),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Promotions entity.
     *
     */
    public function updateAction(Request $request, $hotelId, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('KvartiriBundle:Promotions')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Promotions entity.');
        }

        $deleteForm = $this->createDeleteForm($hotelId, $id);
        $editForm = $this->createEditForm($entity, $hotelId);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('adminPromotions_edit', array('id' => $id, 'hotelId' => $hotelId)));
        }

        return $this->render('KvartiriBundle:Admin:Promotions:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Promotions entity.
     *
     */
    public function deleteAction(Request $request, $id, $hotelId)
    {
        $form = $this->createDeleteForm($hotelId, $id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('KvartiriBundle:Promotions')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Promotions entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('promotions', array('hotelId' => $hotelId)));
    }

    /**
     * Creates a form to delete a Promotions entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($hotelId, $id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('adminPromotions_delete', array('id' => $id, 'hotelId' => $hotelId)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
