<?php

namespace Users\UsersBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use FOS\UserBundle\Util\UserManipulator;
use Users\UsersBundle\Form\Type\RegistrationFormType;
use Users\UsersBundle\Form\Handler\RegistrationFormHandler;

class UsersController extends Controller {

    /**
     * 
     * @Route("/listuser",name="listusers")
     * @Template()
     * 
     */
    public function ListeUsersAction() {

        $paginator = $this->get('knp_paginator');
        $userManager = $this->get('fos_user.user_manager');
        $user = $userManager->findUsers();
            $pagination = $paginator->paginate($user, $this->get('request')->query->get('page', 1),1);

        return array('liste_user' => $user, "pagination" => $pagination);
    }

    /**
     * 
     * @Route("/StatusUser",name="StatusUser")
     * 
     * 
     */
    public function StatusUsersAction(Request $request) {

        $enable = $request->get('enable');
        $username = $request->get('username');
        $userManager = $this->get('fos_user.user_manager');
        $userManipulator = new UserManipulator($userManager);

        if ($enable == 1) {
            $active = $userManipulator->deactivate($username);
        } else {
            $active = $userManipulator->activate($username);
        }
        return $this->redirect($this->generateUrl("listusers"));
    }

    /**
     * 
     * @param Request $request
     * @return type
     * @Route("/updateusers",name="updateusers")
     * @Template();
     */
    public function UpdateUsersAction(Request $request) {

        $id = $request->get('id');
        $userManager = $this->get('fos_user.user_manager');
        $user = $userManager->findUserBy(array('id' => $id));
        $formbuilder = $this->createForm(new RegistrationFormType($userManager->getClass()), $user);

        if ($this->getRequest()->getMethod() == 'POST') {

            $user = $formbuilder->getData();
            $formbuilder->bind($request);
            if ($formbuilder->isValid()) {
                $userManager->updateUser($user);
            }

            return $this->redirect($this->generateUrl("listusers"));
        }
        return array('form' => $formbuilder->createView());
    }

    /**
     * 
     * @param Request $request
     * @return type
     * @Route("/deleteusers",name="deleteusers")
     * @Template();
     */
    public function DeleteUsersAction(Request $request) {


        $id = $request->get('id');
        $userManager = $this->get('fos_user.user_manager');
        $user = $userManager->findUserBy(array('id' => $id));
        $userManager->deleteUser($user);
        return $this->redirect($this->generateUrl("listusers"));
    }

}
