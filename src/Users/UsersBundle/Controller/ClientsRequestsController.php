<?php

namespace Users\UsersBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Users\UsersBundle\Entity\ClientsRequests;
use Users\UsersBundle\Form\ClientsRequestsType;
use Doctrine\Common\Collections\ArrayCollection;


class ClientsRequestsController extends Controller
{
    public function indexAction()
    {
//        $form = $this->createForm(new SelectRoomType());
//        return $this->render('KvartiriBundle:Default:rooms/selectRoom.html.twig', array('form' => $form->createView()));


        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('UsersBundle:ClientsRequests')->findAll();

        return $this->render('UsersBundle:ClientsRequests:index.html.twig', array(
            'entities' => $entities
        ));
    }

    public function createAction(Request $request)
    {
        $entity = new ClientsRequests();

        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('clientsrequests_show', array('id' => $entity->getId())));
        }

        return $this->render('UsersBundle:ClientsRequests:new.html.twig', array(
        'entity' => $entity,
        'form'   => $form->createView(),
        ));
    }

    private function createCreateForm(ClientsRequests $entity)
    {
        $form = $this->createForm(new ClientsRequestsType($hotelId = null), $entity, array(
            'action' => $this->generateUrl('clientsrequests_create'),
            'method' => 'POST',
        ));
        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    public function newAction()
    {
        $entity = new ClientsRequests();
        $form   = $this->createCreateForm($entity);

        return $this->render('UsersBundle:ClientsRequests:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UsersBundle:ClientsRequests')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ClientsRequests entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UsersBundle:ClientsRequests:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UsersBundle:ClientsRequests')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ClientsRequests entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('UsersBundle:ClientsRequests:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    private function createEditForm(ClientsRequests $entity)
    {
        $form = $this->createForm(new ClientsRequestsType($hotelId = null), $entity, array(
            'action' => $this->generateUrl('clientsrequests_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('UsersBundle:ClientsRequests')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ClientsRequests entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('clientsrequests_edit', array('id' => $id)));
        }


        return $this->render('UsersBundle:ClientsRequests:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('UsersBundle:ClientsRequests')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ClientsRequests entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('client_request'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('clientsrequests_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }




    public function hotelAction($hotelId)
    {

        $entity = new ClientsRequests();
        $form   = $this->createCreateBForm($entity, $hotelId);

        return $this->render('UsersBundle:ClientsRequests:newRequest.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));



//        $em = $this->getDoctrine()->getManager();
//        $hotel = $em->getRepository('KvartiriBundle:Hotels')->find($hotelId);
//        if (!$hotel) throw $this->createNotFoundException('La page n\'existe pas.');
//
//
//        $entity = new ClientsRequests();
//        $form   = $this->createCreateForm($entity, $hotelId);
//
//        return $this->render('UsersBundle:ClientsRequests:newRequest.html.twig', array(
//            'hotelId' => $hotelId,
//            'entity' => $entity,
//            'form'   => $form->createView(),
//        ));
    }

    private function createCreateBForm(ClientsRequests $entity, $hotelId)
    {
        $form = $this->createForm(new ClientsRequestsType($hotelId), $entity, array(
            'action' => $this->generateUrl('clientsrequestsB_create', array('hotelId' => $hotelId,)),
            'method' => 'POST',
        ));
        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    public function createBAction(Request $request, $hotelId)
    {
        $entity = new ClientsRequests();

        $form = $this->createCreateBForm($entity, $hotelId);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

//            exit(\Doctrine\Common\Util\Debug::dump($entity));

            return $this->redirect($this->generateUrl('hotel_client_request', array('id' => $entity->getId(), 'hotelId' => $hotelId,)));
        }

        return $this->render('UsersBundle:ClientsRequests:newRequest.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'hotelId' => $hotelId,
        ));
    }

}
