<?php

namespace Kvartiri\KvartiriBundle\Form;

use Doctrine\ORM\EntityRepository;
use Kvartiri\KvartiriBundle\Entity\Rooms;
use Kvartiri\KvartiriBundle\Entity\Hotels;
use Kvartiri\KvartiriBundle\Entity\RoomSeasons;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;



class RoomsType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */

    public function __construct($hotelId)
    {
        $this->hotelId = $hotelId;
    }


    public function buildForm(FormBuilderInterface $builder, array $options) {
//        $hotelId = 1;
        $hotelId = $this->hotelId;
        $builder
            ->add('roomType')
            ->add('guestsMax')
            ->add('extraBed')
            ->add('hotel', 'entity', array(
                'class' => 'KvartiriBundle:Hotels',
                'query_builder' => function (EntityRepository $er) use($hotelId) {
                    return $er->createQueryBuilder('hotel')
                        ->where('hotel.id = ?1')
                        ->setParameter(1, $hotelId)
                        ;
                },
            ))
            ->add('roomSeasons', 'collection', array(
                'type' => new RoomSeasonsType(),
                'label' => false,
                'options' => array(
                    'label' => false),

            ))

            ->add('roomEquipment', new RoomEquipmentType())

//            ->add('roomSeasons', 'collection', array(
//                'type' => new RoomSeasonsType(),
//            ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Kvartiri\KvartiriBundle\Entity\Rooms'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'kvartiri_kvartiribundle_rooms';
    }

}







//class RoomsType extends AbstractType
//{
//    /**
//     * @param FormBuilderInterface $builder
//     * @param array $options
//     */
//    public function buildForm(FormBuilderInterface $builder, array $options)
//    {
//        $hotelId = 1;
//        $builder
//            ->add('roomType')
//            ->add('guestsMax')
//            ->add('extraBed')
//            ->add('hotel', 'entity', array(
//                'class' => 'KvartiriBundle:Hotels',
//                'query_builder' => function (EntityRepository $er) use($hotelId){
//                    return $er->createQueryBuilder('hotel')
//                        ->where('hotel.id = ?1')
//                        ->setParameter(1, $hotelId)
//                        ;
//                },
//            ))
//            ->add('roomSeasons', 'collection', array(
//                    'type' => new RoomSeasonsType(),
//                    'allow_add' => true,
//                    'by_reference' => false,)
//            )
//
////            ->add('roomSeasons', 'collection', array(
////                'type' => new RoomSeasonsType(),
////            ))
//        ;
//    }
//
//    /**
//     * @param OptionsResolverInterface $resolver
//     */
//    public function setDefaultOptions(OptionsResolverInterface $resolver)
//    {
//        $resolver->setDefaults(array(
//            'data_class' => 'Kvartiri\KvartiriBundle\Entity\Rooms'
//        ));
//    }
//
//    /**
//     * @return string
//     */
//    public function getName()
//    {
//        return 'kvartiri_kvartiribundle_rooms';
//    }
//}
