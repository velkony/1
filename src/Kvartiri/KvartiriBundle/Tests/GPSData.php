<?php

namespace Kvartiri\KvartiriBundle\DataFixt\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Kvartiri\KvartiriBundle\Entity\GPS;


class GPSData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 500; $i++) {
            $gps1 = new GPS();
            $gps1->setLatitude(4043.406);
            $gps1->setLongitude(02342.486);
            $manager->persist($gps1);

            $manager->flush();

            $this->addReference('gps'.$i, $gps1);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 7; // the order in which fixtures will be loaded
    }
}