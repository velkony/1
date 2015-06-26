<?php

namespace Users\UsersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Users\UsersBundle\Entity\ClientsRequests;
use Users\UsersBundle\Entity\RoomsRequests;
use Users\UsersBundle\Form\ClientsRequestsType;
use Symfony\Component\HttpFoundation\Request;

use Users\UsersBundle\Entity\Templates;
use Users\UsersBundle\Entity\Champs;
use Users\UsersBundle\Form\TemplatesType;
use Users\UsersBundle\Form\ChampsType;
use Doctrine\Common\Collections\ArrayCollection;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('UsersBundle:Default:index.html.twig', array('name' => $name));
    }

//    public function requestAction(Request $request)
//    {


//        $task = new Task();
//
//        $form = $this->createForm(new TaskType(), $task);
//
//        $form->handleRequest($request);
//
//        if ($form->isValid()) {
//            // ... maybe do some form processing, like saving the Task and Tag objects
//
//            if ($this->get('request')->getMethod() == 'POST')
//            {
//                $form->handleRequest($this->getRequest());
//                if ($form->isValid()) {
//                    $em = $this->getDoctrine()->getManager();
////                $entity->setUtilisateur($utilisateur);
//                    $em->persist($task);
//                    $em->flush();
//
//                    return $this->redirect($this->generateUrl('client_request'));
//                }
//            }
//        }
//
//        return $this->render('UsersBundle:Default:request.html.twig', array(
//            'form' => $form->createView(),
//        ));







//        $clientsRequests = new ClientsRequests();
//
//        $roomRequest1 = new RoomsRequests();
//
//        $form = $this->createForm(new ClientsRequestsType(), $clientsRequests);
//
//
//        $form->handleRequest($request);
//
//        if ($form->isValid()) {
//            // ... maybe do some form processing, like saving the Task and Tag objects
//        }
//
//        return $this->render('UsersBundle:Default:request.html.twig', array(
//            'form' => $form->createView(),
//        ));






////        $utilisateur = $this->container->get('security.context')->getToken()->getUser();
//        $entity = new ClientsRequests();
//        $form = $this->createForm(new ClientsRequestsType(), $entity);
//
//        if ($this->get('request')->getMethod() == 'POST')
//        {
//            $form->handleRequest($this->getRequest());
//            if ($form->isValid()) {
//                $em = $this->getDoctrine()->getManager();
////                $entity->setUtilisateur($utilisateur);
//                $em->persist($entity);
//                $em->flush();
//
//                return $this->redirect($this->generateUrl('client_request'));
//            }
//        }

//        return $this->render('UsersBundle:Default:request.html.twig', array(
//            'form' => $form->createView()));



//    }






//    public function editAction($id, Request $request)
//    {
//        $em = $this->getDoctrine()->getManager();
//        $task = $em->getRepository('UsersUsersBundle:Task')->find($id);
//
//        if (!$task) {
//            throw $this->createNotFoundException('No task found for id '.$id);
//        }
//
//        $originalTags = new ArrayCollection();
//
//        // Create an ArrayCollection of the current Tag objects in the database
//        foreach ($task->getTags() as $tag) {
//            $originalTags->add($tag);
//        }
//
//        $editForm = $this->createForm(new TaskType(), $task);
//
//        $editForm->handleRequest($request);
//
//        if ($editForm->isValid()) {
//
//            // remove the relationship between the tag and the Task
//            foreach ($originalTags as $tag) {
//                if (false === $task->getTags()->contains($tag)) {
//                    // remove the Task from the Tag
//                    $tag->getTasks()->removeElement($task);
//
//                    // if it was a many-to-one relationship, remove the relationship like this
//                    // $tag->setTask(null);
//
//                    $em->persist($tag);
//
//                    // if you wanted to delete the Tag entirely, you can also do that
//                    // $em->remove($tag);
//                }
//            }
//
//            $em->persist($task);
//            $em->flush();
//
//            // redirect back to some edit page
//            return $this->redirectToRoute('client_request', array('id' => $id));
//        }
//
//        // render some form template
//    }
}
