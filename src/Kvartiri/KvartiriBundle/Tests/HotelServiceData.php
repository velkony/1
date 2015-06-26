<?php

namespace Kvartiri\KvartiriBundle\DataFixt\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Kvartiri\KvartiriBundle\Entity\HotelService;


class HotelServiceData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 500; $i++) {

            $hotelService1 = new HotelService();
            $hotelService1->setHotel($this->getReference('hotel'.$i));
            $hotelService1->setRestaurant(True);
            $hotelService1->setBreakfastRoom(True);
            $hotelService1->setGarden(True);
            $hotelService1->setBBQ(False);
            $hotelService1->setParking(True);
            $hotelService1->setFitness(True);
            $hotelService1->setPlayground(False);
            $hotelService1->setPlaygroundForChildren(False);
            $hotelService1->setLaundry(True);
            $manager->persist($hotelService1);

//        $hotelService2 = new HotelService();
//        $hotelService2->setRestaurant(False);
//        $hotelService2->setBreakfastRoom(False);
//        $hotelService2->setGarden(True);
//        $hotelService2->setBBQ(False);
//        $hotelService2->setParking(True);
//        $hotelService2->setFitness(True);
//        $hotelService2->setPlayground(False);
//        $hotelService2->setPlaygroundForChildren(False);
//        $hotelService2->setLaundry(False);
//        $manager->persist($hotelService2);
//
//
//        $hotelService3 = new HotelService();
//        $hotelService3->setRestaurant(True);
//        $hotelService3->setBreakfastRoom(True);
//        $hotelService3->setGarden(True);
//        $hotelService3->setBBQ(False);
//        $hotelService3->setParking(True);
//        $hotelService3->setFitness(False);
//        $hotelService3->setPlayground(False);
//        $hotelService3->setPlaygroundForChildren(False);
//        $hotelService3->setLaundry(False);
//        $manager->persist($hotelService3);
//
//        $hotelService4 = new HotelService();
//        $hotelService4->setRestaurant(True);
//        $hotelService4->setBreakfastRoom(True);
//        $hotelService4->setGarden(True);
//        $hotelService4->setBBQ(False);
//        $hotelService4->setParking(True);
//        $hotelService4->setFitness(False);
//        $hotelService4->setPlayground(False);
//        $hotelService4->setPlaygroundForChildren(False);
//        $hotelService4->setLaundry(False);
//        $manager->persist($hotelService4);
//
//        $hotelService5 = new HotelService();
//        $hotelService5->setRestaurant(True);
//        $hotelService5->setBreakfastRoom(True);
//        $hotelService5->setGarden(True);
//        $hotelService5->setBBQ(False);
//        $hotelService5->setParking(True);
//        $hotelService5->setFitness(False);
//        $hotelService5->setPlayground(False);
//        $hotelService5->setPlaygroundForChildren(False);
//        $hotelService5->setLaundry(False);
//        $manager->persist($hotelService5);
//
//        $hotelService6 = new HotelService();
//        $hotelService6->setRestaurant(True);
//        $hotelService6->setBreakfastRoom(True);
//        $hotelService6->setGarden(True);
//        $hotelService6->setBBQ(False);
//        $hotelService6->setParking(True);
//        $hotelService6->setFitness(False);
//        $hotelService6->setPlayground(False);
//        $hotelService6->setPlaygroundForChildren(False);
//        $hotelService6->setLaundry(False);
//        $manager->persist($hotelService6);
//
//        $hotelService7 = new HotelService();
//        $hotelService7->setRestaurant(True);
//        $hotelService7->setBreakfastRoom(True);
//        $hotelService7->setGarden(True);
//        $hotelService7->setBBQ(False);
//        $hotelService7->setParking(True);
//        $hotelService7->setFitness(False);
//        $hotelService7->setPlayground(False);
//        $hotelService7->setPlaygroundForChildren(False);
//        $hotelService7->setLaundry(False);
//        $manager->persist($hotelService7);
//
//        $hotelService8 = new HotelService();
//        $hotelService8->setRestaurant(True);
//        $hotelService8->setBreakfastRoom(True);
//        $hotelService8->setGarden(True);
//        $hotelService8->setBBQ(False);
//        $hotelService8->setParking(True);
//        $hotelService8->setFitness(False);
//        $hotelService8->setPlayground(False);
//        $hotelService8->setPlaygroundForChildren(False);
//        $hotelService8->setLaundry(False);
//        $manager->persist($hotelService8);
//
//        $hotelService9 = new HotelService();
//        $hotelService9->setRestaurant(True);
//        $hotelService9->setBreakfastRoom(True);
//        $hotelService9->setGarden(True);
//        $hotelService9->setBBQ(False);
//        $hotelService9->setParking(True);
//        $hotelService9->setFitness(False);
//        $hotelService9->setPlayground(False);
//        $hotelService9->setPlaygroundForChildren(False);
//        $hotelService9->setLaundry(False);
//        $manager->persist($hotelService9);
//
//        $hotelService10 = new HotelService();
//        $hotelService10->setRestaurant(True);
//        $hotelService10->setBreakfastRoom(True);
//        $hotelService10->setGarden(True);
//        $hotelService10->setBBQ(False);
//        $hotelService10->setParking(True);
//        $hotelService10->setFitness(False);
//        $hotelService10->setPlayground(False);
//        $hotelService10->setPlaygroundForChildren(False);
//        $hotelService10->setLaundry(False);
//        $manager->persist($hotelService10);


            $manager->flush();

            $this->addReference('hotelService'.$i, $hotelService1);
//        $this->addReference('hotelService2', $hotelService2);
//        $this->addReference('hotelService3', $hotelService3);
//        $this->addReference('hotelService4', $hotelService4);
//        $this->addReference('hotelService5', $hotelService5);
//        $this->addReference('hotelService6', $hotelService6);
//        $this->addReference('hotelService7', $hotelService7);
//        $this->addReference('hotelService8', $hotelService8);
//        $this->addReference('hotelService9', $hotelService9);
//        $this->addReference('hotelService10', $hotelService10);
        }
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 9; // the order in which fixtures will be loaded
    }
}