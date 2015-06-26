<?php

namespace Kvartiri\KvartiriBundle\DataFixt\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Kvartiri\KvartiriBundle\Entity\HotelSeasons;


class HotelSeasonsData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */



    public function load(ObjectManager $manager)
    {
//        $hotelSeasons1 = new HotelSeasons();
//        $hotelSeasons1->setHotel($this->getReference('hotel1'));
//        $hotelSeasons1->setStart(new \DateTime("2015-01-01 00:00:00"));
//        $hotelSeasons1->setFinish(new \DateTime("2015-05-31 23:59:59"));
//        $manager->persist($hotelSeasons1);
//
//        $hotelSeasons2 = new HotelSeasons();
//        $hotelSeasons2->setHotel($this->getReference('hotel1'));
//        $hotelSeasons2->setStart(new \DateTime("2015-06-01 00:00:00"));
//        $hotelSeasons2->setFinish(new \DateTime("2015-12-31 23:59:59"));
//        $manager->persist($hotelSeasons2);
//
//        $manager->flush();
//
//        $this->addReference('hotelSeasons1', $hotelSeasons1);
//        $this->addReference('hotelSeasons2', $hotelSeasons2);



        $hotelN = 1;
        for ($i = 1; $i <= 1000; $i++) {

            if ($i % 2 == 0) {



                $hotelSeasons1 = new HotelSeasons();
                $hotelSeasons1->setHotel($this->getReference('hotel' . $hotelN));
                $hotelSeasons1->setStart(new \DateTime("2015-06-01 00:00:00"));
                $hotelSeasons1->setFinish(new \DateTime("2015-12-31 23:59:59"));
                $manager->persist($hotelSeasons1);

                $manager->flush();
                $this->addReference('hotelSeasons' . $i, $hotelSeasons1);

                $hotelN++;

            } else {
                $hotelSeasons1 = new HotelSeasons();
                $hotelSeasons1->setHotel($this->getReference('hotel' . $hotelN));
                $hotelSeasons1->setStart(new \DateTime("2015-01-01 00:00:00"));
                $hotelSeasons1->setFinish(new \DateTime("2015-05-31 23:59:59"));
                $manager->persist($hotelSeasons1);

                $manager->flush();
                $this->addReference('hotelSeasons' . $i, $hotelSeasons1);
            }



        }

    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 8; // the order in which fixtures will be loaded
    }
}