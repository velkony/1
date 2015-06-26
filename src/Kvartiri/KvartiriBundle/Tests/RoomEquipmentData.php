<?php

namespace Kvartiri\KvartiriBundle\DataFixt\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Kvartiri\KvartiriBundle\Entity\RoomEquipment;


class RoomEquipmentData extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 1000; $i++) {
            $roomEquipment1 = new RoomEquipment();
            $roomEquipment1->setAirConditioning(True);
            $roomEquipment1->setTV(True);
            $roomEquipment1->setInternet(True);
            $roomEquipment1->setKitchenette(False);
            $roomEquipment1->setRefrigerator(True);
            $roomEquipment1->setTerrace(False);
            $roomEquipment1->setSeaView(False);
            $roomEquipment1->setPrivateBathroom(True);
            $roomEquipment1->setBreakfast(True);
            $roomEquipment1->setLunch(False);
            $roomEquipment1->setDinner(False);
            $manager->persist($roomEquipment1);

//        $roomEquipment2 = new RoomEquipment();
//        $roomEquipment2->setAirConditioning(True);
//        $roomEquipment2->setTV(True);
//        $roomEquipment2->setInternet(True);
//        $roomEquipment2->setKitchenette(False);
//        $roomEquipment2->setRefrigerator(True);
//        $roomEquipment2->setTerrace(False);
//        $roomEquipment2->setSeaView(False);
//        $roomEquipment2->setPrivateBathroom(True);
//        $roomEquipment2->setBreakfast(True);
//        $roomEquipment2->setLunch(False);
//        $roomEquipment2->setDinner(False);
//        $manager->persist($roomEquipment2);
//
//        $roomEquipment3 = new RoomEquipment();
//        $roomEquipment3->setAirConditioning(True);
//        $roomEquipment3->setTV(True);
//        $roomEquipment3->setInternet(True);
//        $roomEquipment3->setKitchenette(False);
//        $roomEquipment3->setRefrigerator(True);
//        $roomEquipment3->setTerrace(False);
//        $roomEquipment3->setSeaView(False);
//        $roomEquipment3->setPrivateBathroom(True);
//        $roomEquipment3->setBreakfast(True);
//        $roomEquipment3->setLunch(False);
//        $roomEquipment3->setDinner(False);
//        $manager->persist($roomEquipment3);
//
//        $roomEquipment4 = new RoomEquipment();
//        $roomEquipment4->setAirConditioning(True);
//        $roomEquipment4->setTV(True);
//        $roomEquipment4->setInternet(True);
//        $roomEquipment4->setKitchenette(False);
//        $roomEquipment4->setRefrigerator(True);
//        $roomEquipment4->setTerrace(False);
//        $roomEquipment4->setSeaView(False);
//        $roomEquipment4->setPrivateBathroom(True);
//        $roomEquipment4->setBreakfast(True);
//        $roomEquipment4->setLunch(False);
//        $roomEquipment4->setDinner(False);
//        $manager->persist($roomEquipment4);
//
//        $roomEquipment5 = new RoomEquipment();
//        $roomEquipment5->setAirConditioning(True);
//        $roomEquipment5->setTV(True);
//        $roomEquipment5->setInternet(True);
//        $roomEquipment5->setKitchenette(False);
//        $roomEquipment5->setRefrigerator(True);
//        $roomEquipment5->setTerrace(False);
//        $roomEquipment5->setSeaView(False);
//        $roomEquipment5->setPrivateBathroom(True);
//        $roomEquipment5->setBreakfast(True);
//        $roomEquipment5->setLunch(False);
//        $roomEquipment5->setDinner(False);
//        $manager->persist($roomEquipment5);
//
//        $roomEquipment6 = new RoomEquipment();
//        $roomEquipment6->setAirConditioning(True);
//        $roomEquipment6->setTV(True);
//        $roomEquipment6->setInternet(True);
//        $roomEquipment6->setKitchenette(False);
//        $roomEquipment6->setRefrigerator(True);
//        $roomEquipment6->setTerrace(False);
//        $roomEquipment6->setSeaView(False);
//        $roomEquipment6->setPrivateBathroom(True);
//        $roomEquipment6->setBreakfast(True);
//        $roomEquipment6->setLunch(False);
//        $roomEquipment6->setDinner(False);
//        $manager->persist($roomEquipment6);
//
//        $roomEquipment7 = new RoomEquipment();
//        $roomEquipment7->setAirConditioning(True);
//        $roomEquipment7->setTV(True);
//        $roomEquipment7->setInternet(True);
//        $roomEquipment7->setKitchenette(False);
//        $roomEquipment7->setRefrigerator(True);
//        $roomEquipment7->setTerrace(False);
//        $roomEquipment7->setSeaView(False);
//        $roomEquipment7->setPrivateBathroom(True);
//        $roomEquipment7->setBreakfast(True);
//        $roomEquipment7->setLunch(False);
//        $roomEquipment7->setDinner(False);
//        $manager->persist($roomEquipment7);
//
//        $roomEquipment8 = new RoomEquipment();
//        $roomEquipment8->setAirConditioning(True);
//        $roomEquipment8->setTV(True);
//        $roomEquipment8->setInternet(True);
//        $roomEquipment8->setKitchenette(False);
//        $roomEquipment8->setRefrigerator(True);
//        $roomEquipment8->setTerrace(False);
//        $roomEquipment8->setSeaView(False);
//        $roomEquipment8->setPrivateBathroom(True);
//        $roomEquipment8->setBreakfast(True);
//        $roomEquipment8->setLunch(False);
//        $roomEquipment8->setDinner(False);
//        $manager->persist($roomEquipment8);
//
//        $roomEquipment9 = new RoomEquipment();
//        $roomEquipment9->setAirConditioning(True);
//        $roomEquipment9->setTV(True);
//        $roomEquipment9->setInternet(True);
//        $roomEquipment9->setKitchenette(False);
//        $roomEquipment9->setRefrigerator(True);
//        $roomEquipment9->setTerrace(False);
//        $roomEquipment9->setSeaView(False);
//        $roomEquipment9->setPrivateBathroom(True);
//        $roomEquipment9->setBreakfast(True);
//        $roomEquipment9->setLunch(False);
//        $roomEquipment9->setDinner(False);
//        $manager->persist($roomEquipment9);
//
//        $roomEquipment10 = new RoomEquipment();
//        $roomEquipment10->setAirConditioning(True);
//        $roomEquipment10->setTV(True);
//        $roomEquipment10->setInternet(True);
//        $roomEquipment10->setKitchenette(False);
//        $roomEquipment10->setRefrigerator(True);
//        $roomEquipment10->setTerrace(False);
//        $roomEquipment10->setSeaView(False);
//        $roomEquipment10->setPrivateBathroom(True);
//        $roomEquipment10->setBreakfast(True);
//        $roomEquipment10->setLunch(False);
//        $roomEquipment10->setDinner(False);
//        $manager->persist($roomEquipment10);
//
//        $roomEquipment11 = new RoomEquipment();
//        $roomEquipment11->setAirConditioning(True);
//        $roomEquipment11->setTV(True);
//        $roomEquipment11->setInternet(True);
//        $roomEquipment11->setKitchenette(False);
//        $roomEquipment11->setRefrigerator(True);
//        $roomEquipment11->setTerrace(False);
//        $roomEquipment11->setSeaView(False);
//        $roomEquipment11->setPrivateBathroom(True);
//        $roomEquipment11->setBreakfast(True);
//        $roomEquipment11->setLunch(False);
//        $roomEquipment11->setDinner(False);
//        $manager->persist($roomEquipment11);
//
//        $roomEquipment12 = new RoomEquipment();
//        $roomEquipment12->setAirConditioning(True);
//        $roomEquipment12->setTV(True);
//        $roomEquipment12->setInternet(True);
//        $roomEquipment12->setKitchenette(False);
//        $roomEquipment12->setRefrigerator(True);
//        $roomEquipment12->setTerrace(False);
//        $roomEquipment12->setSeaView(False);
//        $roomEquipment12->setPrivateBathroom(True);
//        $roomEquipment12->setBreakfast(True);
//        $roomEquipment12->setLunch(False);
//        $roomEquipment12->setDinner(False);
//        $manager->persist($roomEquipment12);
//
//        $roomEquipment13 = new RoomEquipment();
//        $roomEquipment13->setAirConditioning(True);
//        $roomEquipment13->setTV(True);
//        $roomEquipment13->setInternet(True);
//        $roomEquipment13->setKitchenette(False);
//        $roomEquipment13->setRefrigerator(True);
//        $roomEquipment13->setTerrace(False);
//        $roomEquipment13->setSeaView(False);
//        $roomEquipment13->setPrivateBathroom(True);
//        $roomEquipment13->setBreakfast(True);
//        $roomEquipment13->setLunch(False);
//        $roomEquipment13->setDinner(False);
//        $manager->persist($roomEquipment13);
//
//        $roomEquipment14 = new RoomEquipment();
//        $roomEquipment14->setAirConditioning(True);
//        $roomEquipment14->setTV(True);
//        $roomEquipment14->setInternet(True);
//        $roomEquipment14->setKitchenette(False);
//        $roomEquipment14->setRefrigerator(True);
//        $roomEquipment14->setTerrace(False);
//        $roomEquipment14->setSeaView(False);
//        $roomEquipment14->setPrivateBathroom(True);
//        $roomEquipment14->setBreakfast(True);
//        $roomEquipment14->setLunch(False);
//        $roomEquipment14->setDinner(False);
//        $manager->persist($roomEquipment14);
//
//        $roomEquipment15 = new RoomEquipment();
//        $roomEquipment15->setAirConditioning(True);
//        $roomEquipment15->setTV(True);
//        $roomEquipment15->setInternet(True);
//        $roomEquipment15->setKitchenette(False);
//        $roomEquipment15->setRefrigerator(True);
//        $roomEquipment15->setTerrace(False);
//        $roomEquipment15->setSeaView(False);
//        $roomEquipment15->setPrivateBathroom(True);
//        $roomEquipment15->setBreakfast(True);
//        $roomEquipment15->setLunch(False);
//        $roomEquipment15->setDinner(False);
//        $manager->persist($roomEquipment15);
//
//        $roomEquipment16 = new RoomEquipment();
//        $roomEquipment16->setAirConditioning(True);
//        $roomEquipment16->setTV(True);
//        $roomEquipment16->setInternet(True);
//        $roomEquipment16->setKitchenette(False);
//        $roomEquipment16->setRefrigerator(True);
//        $roomEquipment16->setTerrace(False);
//        $roomEquipment16->setSeaView(False);
//        $roomEquipment16->setPrivateBathroom(True);
//        $roomEquipment16->setBreakfast(True);
//        $roomEquipment16->setLunch(False);
//        $roomEquipment16->setDinner(False);
//        $manager->persist($roomEquipment16);
//
//        $roomEquipment17 = new RoomEquipment();
//        $roomEquipment17->setAirConditioning(True);
//        $roomEquipment17->setTV(True);
//        $roomEquipment17->setInternet(True);
//        $roomEquipment17->setKitchenette(False);
//        $roomEquipment17->setRefrigerator(True);
//        $roomEquipment17->setTerrace(False);
//        $roomEquipment17->setSeaView(False);
//        $roomEquipment17->setPrivateBathroom(True);
//        $roomEquipment17->setBreakfast(True);
//        $roomEquipment17->setLunch(False);
//        $roomEquipment17->setDinner(False);
//        $manager->persist($roomEquipment17);
//
//        $roomEquipment18 = new RoomEquipment();
//        $roomEquipment18->setAirConditioning(True);
//        $roomEquipment18->setTV(True);
//        $roomEquipment18->setInternet(True);
//        $roomEquipment18->setKitchenette(False);
//        $roomEquipment18->setRefrigerator(True);
//        $roomEquipment18->setTerrace(False);
//        $roomEquipment18->setSeaView(False);
//        $roomEquipment18->setPrivateBathroom(True);
//        $roomEquipment18->setBreakfast(True);
//        $roomEquipment18->setLunch(False);
//        $roomEquipment18->setDinner(False);
//        $manager->persist($roomEquipment18);
//
//        $roomEquipment19 = new RoomEquipment();
//        $roomEquipment19->setAirConditioning(True);
//        $roomEquipment19->setTV(True);
//        $roomEquipment19->setInternet(True);
//        $roomEquipment19->setKitchenette(False);
//        $roomEquipment19->setRefrigerator(True);
//        $roomEquipment19->setTerrace(False);
//        $roomEquipment19->setSeaView(False);
//        $roomEquipment19->setPrivateBathroom(True);
//        $roomEquipment19->setBreakfast(True);
//        $roomEquipment19->setLunch(False);
//        $roomEquipment19->setDinner(False);
//        $manager->persist($roomEquipment19);
//
//        $roomEquipment20 = new RoomEquipment();
//        $roomEquipment20->setAirConditioning(True);
//        $roomEquipment20->setTV(True);
//        $roomEquipment20->setInternet(True);
//        $roomEquipment20->setKitchenette(False);
//        $roomEquipment20->setRefrigerator(True);
//        $roomEquipment20->setTerrace(False);
//        $roomEquipment20->setSeaView(False);
//        $roomEquipment20->setPrivateBathroom(True);
//        $roomEquipment20->setBreakfast(True);
//        $roomEquipment20->setLunch(False);
//        $roomEquipment20->setDinner(False);
//        $manager->persist($roomEquipment20);


            $manager->flush();

            $this->addReference('roomEquipment'.$i, $roomEquipment1);
//            $this->addReference('roomEquipment2', $roomEquipment2);
//            $this->addReference('roomEquipment3', $roomEquipment3);
//            $this->addReference('roomEquipment4', $roomEquipment4);
//            $this->addReference('roomEquipment5', $roomEquipment5);
//            $this->addReference('roomEquipment6', $roomEquipment6);
//            $this->addReference('roomEquipment7', $roomEquipment7);
//            $this->addReference('roomEquipment8', $roomEquipment8);
//            $this->addReference('roomEquipment9', $roomEquipment9);
//            $this->addReference('roomEquipment10', $roomEquipment10);
//            $this->addReference('roomEquipment11', $roomEquipment11);
//            $this->addReference('roomEquipment12', $roomEquipment12);
//            $this->addReference('roomEquipment13', $roomEquipment13);
//            $this->addReference('roomEquipment14', $roomEquipment14);
//            $this->addReference('roomEquipment15', $roomEquipment15);
//            $this->addReference('roomEquipment16', $roomEquipment16);
//            $this->addReference('roomEquipment17', $roomEquipment17);
//            $this->addReference('roomEquipment18', $roomEquipment18);
//            $this->addReference('roomEquipment19', $roomEquipment19);
//            $this->addReference('roomEquipment20', $roomEquipment20);
        }
    }


    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 13; // the order in which fixtures will be loaded
    }
}