<?php
namespace Kvartiri\KvartiriBundle\Listener;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class RedirectionListener 
{
    public function __construct(ContainerInterface $container)
    {
//        $this->session = $session;


        $this->router = $container->get('router');
        $this->securityContext = $container->get('security.context');
    }
    
    public function onKernelRequest(GetResponseEvent $event)
    {
        //take the current path URL
        $route = $event->getRequest()->attributes->get('_route');
        
        if ($route == 'favorites-hotels_new' || $route == 'favorites-hotels') {

//            $event->setResponse(new RedirectResponse($this->router->generate('favorites-hotels')));

//            if ($this->session->has('favoriteHotels')) {
//                if (count($this->session->get('favoriteHotels')) == 0)
//                    $event->setResponse(new RedirectResponse($this->router->generate('favorites-hotels')));
//            }
            //check whether the user is login
            if (!is_object($this->securityContext->getToken()->getUser())) {
//                $this->session->getFlashBag()->add('notification','You need to login');
                $event->setResponse(new RedirectResponse($this->router->generate('fos_user_security_login')));
            }
        }
    }
}