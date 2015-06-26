<?php

namespace Kvartiri\KvartiriBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Kvartiri\KvartiriBundle\Entity\Cities;
use Kvartiri\KvartiriBundle\Form\CitiesType;

/**
 * Cities controller.
 *
 */
class CitiesAdminController extends Controller
{

    /**
     * Lists all Cities entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('KvartiriBundle:Cities')->findAll();

        return $this->render('KvartiriBundle:Admin:Cities/index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Cities entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Cities();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('adminCities_show', array('id' => $entity->getId())));
        }

        return $this->render('KvartiriBundle:Admin:Cities/new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Cities entity.
     *
     * @param Cities $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Cities $entity)
    {
        $form = $this->createForm(new CitiesType(), $entity, array(
            'action' => $this->generateUrl('adminCities_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Cities entity.
     *
     */
    public function newAction()
    {
        $entity = new Cities();
        $form   = $this->createCreateForm($entity);

        return $this->render('KvartiriBundle:Admin:Cities/new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Cities entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('KvartiriBundle:Cities')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cities entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('KvartiriBundle:Admin:Cities/show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Cities entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('KvartiriBundle:Cities')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cities entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('KvartiriBundle:Admin:Cities/edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Cities entity.
    *
    * @param Cities $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Cities $entity)
    {
        $form = $this->createForm(new CitiesType(), $entity, array(
            'action' => $this->generateUrl('adminCities_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Cities entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('KvartiriBundle:Cities')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Cities entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('adminCities_edit', array('id' => $id)));
        }

        return $this->render('KvartiriBundle:Admin:Cities/edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Cities entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('KvartiriBundle:Cities')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Cities entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('adminCities'));
    }

    /**
     * Creates a form to delete a Cities entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('adminCities_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
