<?php

namespace Kvartiri\KvartiriBundle\DataFixt\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Kvartiri\KvartiriBundle\Entity\RoomTypes;


class RoomTypesData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        
        $roomTypes1 = new RoomTypes();
        $roomTypes1->setNameTypeEn('Single Room');

        $manager->persist($roomTypes1);

        $roomTypes2 = new RoomTypes();
        $roomTypes2->setNameTypeEn('Double Room');
        $manager->persist($roomTypes2);

        $roomTypes3 = new RoomTypes();
        $roomTypes3->setNameTypeEn('Triple Room');
        $manager->persist($roomTypes3);

        $roomTypes4 = new RoomTypes();
        $roomTypes4->setNameTypeEn('Quadruple Room');
        $manager->persist($roomTypes4);

        $roomTypes5 = new RoomTypes();
        $roomTypes5->setNameTypeEn('Apartment');
        $manager->persist($roomTypes5);

        $roomTypes6 = new RoomTypes();
        $roomTypes6->setNameTypeEn('Studio');
        $manager->persist($roomTypes6);

        $roomTypes7 = new RoomTypes();
        $roomTypes7->setNameTypeEn('Suite');
        $manager->persist($roomTypes7);

            $manager->flush();

            $this->addReference('roomTypes1', $roomTypes1);
            $this->addReference('roomTypes2', $roomTypes2);
            $this->addReference('roomTypes3', $roomTypes3);
            $this->addReference('roomTypes4', $roomTypes4);
            $this->addReference('roomTypes5', $roomTypes5);
            $this->addReference('roomTypes6', $roomTypes6);
            $this->addReference('roomTypes7', $roomTypes7);
        }
    


    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 13; // the order in which fixtures will be loaded
    }
}