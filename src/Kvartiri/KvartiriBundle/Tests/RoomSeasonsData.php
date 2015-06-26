<?php

namespace Kvartiri\KvartiriBundle\DataFixt\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Kvartiri\KvartiriBundle\Entity\RoomSeasons;


class RoomSeasonsData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $price = 0;
        $s = 1;
        $r = 0;
        for ($i = 1; $i <= 500; $i++) {
            $r = $r + 2;
            for ($x = 1; $x <= 2; $x++) {
                $r = $r - 2;
                for ($y = 1; $y <= 2; $y++) {

                    $price = rand(50, 100);
                    $r++;
                    $roomSeason1 = new RoomSeasons();
                    $roomSeason1->setRoom($this->getReference('room' . $r));
                    $roomSeason1->setPrice($price);
                    $roomSeason1->addHotelSeason($this->getReference('hotelSeasons' . $s));
                    $manager->persist($roomSeason1);
                    $manager->flush();
                }
                $s++;
            }
        }
    }



    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 15; // the order in which fixtures will be loaded
    }
}