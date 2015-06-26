<?php

namespace Kvartiri\KvartiriBundle\DataFixt\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Kvartiri\KvartiriBundle\Entity\Regions;


class RegionsData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $region1 = new Regions();
        $region1->setName('Thassos');
        $manager->persist($region1);

        $region2 = new Regions();
        $region2->setName('Aleksandrupolis');
        $manager->persist($region2);

        $region3 = new Regions();
        $region3->setName('Asprovalta');
        $manager->persist($region3);

        $region4 = new Regions();
        $region4->setName('Halkidiki Kasandra');
        $manager->persist($region4);

        $manager->flush();

        $this->addReference('region1', $region1);
        $this->addReference('region2', $region2);
        $this->addReference('region3', $region3);
        $this->addReference('region4', $region4);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
}