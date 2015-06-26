<?php

namespace Users\UsersBundle\Form\Handler;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use Symfony\Component\Form\FormInterface;
use FOS\UserBundle\Model\UserInterface;
use FOS\UserBundle\Doctrine\UserManager;
use FOS\UserBundle\Mailer\MailerInterface;
use FOS\UserBundle\Util\TokenGeneratorInterface;
use Symfony\Component\HttpFoundation\Request;
use FOS\UserBundle\Form\Handler\RegistrationFormHandler as BaseHandler;



class RegistrationFormHandler extends BaseHandler
{

    protected $request;
    protected $userManager;
    protected $form;
    protected $mailer;
    protected $tokenGenerator;

    public function __construct(FormInterface $form, Request $request, UserManager $userManager, MailerInterface $mailer, TokenGeneratorInterface $tokenGenerator) {
        parent::__construct($form, $request, $userManager, $mailer, $tokenGenerator);
    }

    /**
     * @param boolean $confirmation
     */

    public function process($confirmation = false)
    {

        $user = $this->createUser();
        if ($this->request->get("typeactor") == 4) {
            $user->addRole("ROLE_COMPANY");
        } elseif($this->request->get("typeactor") == 3) {
            $user->addRole("ROLE_TRANSLATOR");
        } elseif($this->request->get("typeactor") == 2) {
            $user->addRole("ROLE_ADMINISTRATOR");
        } elseif($this->request->get("typeactor") == 1) {
            $user->addRole("ROLE_SUPER_ADMINISTRATOR");
        }
        $this->form->setData($user);

        if ('POST' === $this->request->getMethod()) {
            $this->form->bind($this->request);

            if ($this->form->isValid()) {
                $this->onSuccess($user, $confirmation);

                return true;
            }
        }

        return false;
    }

}
