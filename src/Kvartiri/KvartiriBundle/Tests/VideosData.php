<?php

namespace Kvartiri\KvartiriBundle\DataFixt\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Kvartiri\KvartiriBundle\Entity\Videos;


class VideosData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 500; $i++) {

            $video1 = new Videos();
            $video1->setHotel($this->getReference('hotel'.$i));
            $video1->setPath('https://www.youtube.com/watch?feature=player_embedded&v=bKLoAcONwAs/watch?feature=player_embedded&v=bKLoAcONwAs');
            $video1->setAlt('Ammouliani island');
            $manager->persist($video1);

            $manager->flush();

        }

    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 11; // the order in which fixtures will be loaded
    }
}