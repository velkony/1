<?php

namespace Kvartiri\KvartiriBundle\DataFixt\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Kvartiri\KvartiriBundle\Entity\Contacts;


class ContactsData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 500; $i++) {
            $contacts1 = new Contacts();
            $contacts1->setLastName('Alanis');
            $contacts1->setFirstName('Agne ');
            $contacts1->setPhone1('+30 23970 22832');
            $contacts1->setPhone2('+30 23970 25196');
            $contacts1->setFax('+30 23970 25196');
            $contacts1->setEmail('asprovalta@msn.com');
            $contacts1->setWebSite('www.katerina2.com');
            $manager->persist($contacts1);

            $manager->flush();

            $this->addReference('contacts'.$i, $contacts1);
        }

    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 5; // the order in which fixtures will be loaded
    }
}