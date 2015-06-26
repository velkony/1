<?php

namespace Kvartiri\KvartiriBundle\DataFixt\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Kvartiri\KvartiriBundle\Entity\Hotels;


class HotelsData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $region = 1;
        $city = 1;
        $name = '';
        $type = '';

        for ($i = 1; $i <= 500; $i++) {
            if($city > 12){
                $region++;
                $city = 1;
            }
            if($region > 4){
                $region = 1;
            }

            if ($i % 2 == 0) {
                $type = 1;
                $name = 'Hotel Rihios';
            } elseif ($i % 3 == 0) {
                $type = 2;
                $name = 'Hotel Apartments Golden Sands';
            } elseif ($i % 5 == 0) {
                $type = 3;
                $name = 'Apartments Irini';
            } elseif ($i % 7 == 0) {
                $type = 4;
                $name = 'Katarina house';
            } elseif ($i % 11 == 0) {
                $type = 5;
                $name = 'Dimos Bungalows';
            } elseif ($i % 13 == 0) {
                $type = 1;
                $name = 'Egnatia Hotel & Spa';
            } elseif ($i % 17 == 0) {
                $type = 2;
                $name = 'Hotel Apartments Golden Sands';
            } elseif ($i % 19 == 0) {
                $type = 3;
                $name = 'Hotel Apartments Katerina';
            } elseif ($i % 23 == 0) {
                $type = 4;
                $name = 'Balias Studios';
            } elseif ($i % 27 == 0) {
                $type = 5;
                $name = 'Dimos Bungalows';
            } elseif ($i % 29 == 0) {
                $type = 1;
                $name = 'Katarina house';
            } elseif ($i % 31 == 0) {
                $type = 2;
                $name = 'Hotel Apartments Golden Sands';
            }

            $hotel = new Hotels();
            $hotel->setCity($this->getReference('city'.$city));
            $hotel->setName($name);
            $hotel->setDescription($name);
            $hotel->setRemarks('');
            $hotel->setHotelType($type);
//            $hotel->setRegion($this->getReference('region'.$region));
            $manager->persist($hotel);
            
            $manager->flush();

            $this->addReference('hotel'.$i, $hotel);

            $city++;
            $region++;


        }

    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 3; // the order in which fixtures will be loaded
    }
}