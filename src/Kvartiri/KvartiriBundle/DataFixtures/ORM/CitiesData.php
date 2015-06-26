<?php

namespace Kvartiri\KvartiriBundle\DataFixt\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Kvartiri\KvartiriBundle\Entity\Cities;


class CitiesData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $city1 = new Cities();
        $city1->setName('Limenaria');
        $city1->setRegion($this->getReference('region1'));
        $manager->persist($city1);

        $city2 = new Cities();
        $city2->setName('Limenas');
        $city2->setRegion($this->getReference('region1'));
        $manager->persist($city2);

        $city3 = new Cities();
        $city3->setName('Potos');
        $city3->setRegion($this->getReference('region1'));
        $manager->persist($city3);

        $city4 = new Cities();
        $city4->setName('Aleksandrupolis');
        $city4->setRegion($this->getReference('region2'));
        $manager->persist($city4);

        $city5 = new Cities();
        $city5->setName('Makri');
        $city5->setRegion($this->getReference('region2'));
        $manager->persist($city5);

        $city6 = new Cities();
        $city6->setName('Fanari');
        $city6->setRegion($this->getReference('region2'));
        $manager->persist($city6);

        $city7 = new Cities();
        $city7->setName('Asprovalta');
        $city7->setRegion($this->getReference('region3'));
        $manager->persist($city7);

        $city8 = new Cities();
        $city8->setName('Stavros');
        $city8->setRegion($this->getReference('region3'));
        $manager->persist($city8);

        $city9 = new Cities();
        $city9->setName('Nea Vrasna');
        $city9->setRegion($this->getReference('region3'));
        $manager->persist($city9);

        $city10 = new Cities();
        $city10->setName('Kalitea');
        $city10->setRegion($this->getReference('region4'));
        $manager->persist($city10);

        $city11 = new Cities();
        $city11->setName('Pefkohori');
        $city11->setRegion($this->getReference('region4'));
        $manager->persist($city11);

        $city12 = new Cities();
        $city12->setName('Polihrono');
        $city12->setRegion($this->getReference('region4'));
        $manager->persist($city12);



        $manager->flush();

        $this->addReference('city1', $city1);
        $this->addReference('city2', $city2);
        $this->addReference('city3', $city3);
        $this->addReference('city4', $city4);
        $this->addReference('city5', $city5);
        $this->addReference('city6', $city6);
        $this->addReference('city7', $city7);
        $this->addReference('city8', $city8);
        $this->addReference('city9', $city9);
        $this->addReference('city10', $city10);
        $this->addReference('city11', $city11);
        $this->addReference('city12', $city12);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2; // the order in which fixtures will be loaded
    }
}