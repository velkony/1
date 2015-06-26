<?php

namespace Kvartiri\KvartiriBundle\DataFixt\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Kvartiri\KvartiriBundle\Entity\Address;


class AddressData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 500; $i++) {
            $address1 = new Address();
            $address1->setAddress('Nea Vrasna, Thessaloniki, Macedonia, Greece');
            $address1->setZip(57021);
            $manager->persist($address1);

            $manager->flush();

            $this->addReference('address'.$i, $address1);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 4; // the order in which fixtures will be loaded
    }
}