<?php

namespace Kvartiri\KvartiriBundle\DataFixt\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Kvartiri\KvartiriBundle\Entity\Rooms;


class RoomsData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */

    public function load(ObjectManager $manager)
    {
        $nr=1;
        for ($i = 1; $i <= 500; $i++) {

            if ($i % 2 == 0) {
                $type = 2;
            } elseif ($i % 3 == 0) {
                $type = 3;
//                } elseif ($i % 5 == 0) {
//                    $type = 4;
//                } elseif ($i % 7 == 0) {
//                    $type = 5;
//                }elseif ($i % 11 == 0) {
//                    $type = 6;
//                }elseif ($i % 13 == 0) {
//                    $type = 7;
            }else {
                $type = 1;
            }

            for ($x = 1; $x <= 2; $x++) {

                $room1 = new Rooms();

                $room1->setRoomType($type);
                $room1->setGuestsMax(4);
                $room1->setExtraBed(True);
                $room1->setRoomTypes($this->getReference('roomTypes1'));
                $room1->setRoomEquipment($this->getReference('roomEquipment'.$nr));
                $room1->setHotel($this->getReference('hotel' . $i));
                $manager->persist($room1);

                $manager->flush();

                $this->addReference('room'.$nr, $room1);
                $nr++;
                $type++;

            }

        }

    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 14; // the order in which fixtures will be loaded
    }
}