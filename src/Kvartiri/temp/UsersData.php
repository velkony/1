<?php

//namespace Kvartiri\KvartiriBundle\DataFixt\ORM;
//
//use Doctrine\Common\DataFixtures\AbstractFixture;
//use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
//use Doctrine\Common\DataFixtures\FixtureInterface;
//use Doctrine\Common\Persistence\ObjectManager;
//use Symfony\Component\DependencyInjection\ContainerAwareInterface;
//use Symfony\Component\DependencyInjection\ContainerInterface;
//use Users\UsersBundle\Entity\Users;


//class UsersData extends AbstractFixture implements FixtureInterface, ContainerAwareInterface, OrderedFixtureInterface
//{
//    private $container;
//
//    public function setContainer(ContainerInterface $container = null)
//    {
//        $this->container = $container;
//    }
//    public function load(ObjectManager $manager)
//    {
//        $user1 = new Users();
//        $user1->setUsername('test');
//        $user1->setEmail('test@mail.com');
//        $user1->setEnabled(1);
//        $user1->setPassword($this->container->get('security.encoder_factory')->getEncoder($user1)->encodePassword('test', $user1->getSalt()));
//
//
////        $user1->setSalt(md5(uniqid()));
////
////        $encoder = $this->container
////            ->get('security.encoder_factory')
////            ->getEncoder($user1)
////        ;
////        $user1->setPassword($encoder->encodePassword('test', $user1->getSalt()));
////
//        $manager->persist($user1);
//
//
//
//        $manager->flush();
//
//        $this->addReference('user1', $user1);
//
//    }
//
//    /**
//     * {@inheritDoc}
//     */
//    public function getOrder()
//    {
//        return 20; // the order in which fixtures will be loaded
//    }
//}