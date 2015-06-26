<?php

namespace Kvartiri\KvartiriBundle\DataFixt\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Kvartiri\KvartiriBundle\Entity\Images;


class ImagesData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $image = 1;
        for ($i = 1; $i <= 500; $i++) {
            if($image >10){
                $image = 1;
            }

            $images1 = new Images();
//            $images1->setHotel($this->getReference('hotel'.$i));
            $images1->setPathIamgeHight($image.'-1.jpg');
            $images1->setPathIamgeSmall($image.'-1.jpg');
            $images1->setAlt('Hotel Grand Chalet');
            $manager->persist($images1);

            $images2 = new Images();
//            $images2->setHotel($this->getReference('hotel'.$i));
            $images2->setPathIamgeHight($image.'-2.jpg');
            $images2->setPathIamgeSmall($image.'-2.jpg');
            $images2->setAlt('Hotel Grand Chalet');
            $manager->persist($images2);

            $images3 = new Images();
//            $images3->setHotel($this->getReference('hotel'.$i));
            $images3->setPathIamgeHight($image.'-3.jpg');
            $images3->setPathIamgeSmall($image.'-3.jpg');
            $images3->setAlt('Hotel Grand Chalet');
            $manager->persist($images3);

            $image++;
        }

        $manager->flush();

    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 10; // the order in which fixtures will be loaded
    }
}