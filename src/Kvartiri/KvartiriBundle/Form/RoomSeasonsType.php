<?php

namespace Kvartiri\KvartiriBundle\Form;

use Kvartiri\KvartiriBundle\Entity\HotelSeasons;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class RoomSeasonsType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            //           ->add('price')
//                ->add('hotelSeasons', 'entity', array(
//                    'class' => 'KvartiriBundle:HotelSeasons',
//                    'property' => 'name',
//                ))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Kvartiri\KvartiriBundle\Entity\RoomSeasons'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'kvartiri_kvartiribundle_roomseasons';
    }

}




//class RoomSeasonsType extends AbstractType
//{
//    /**
//     * @param FormBuilderInterface $builder
//     * @param array $options
//     */
//    public function buildForm(FormBuilderInterface $builder, array $options)
//    {
//        $builder
//            ->add('price')
//            ->add('hotelSeasons')
//        ;
//    }
//
//    /**
//     * @param OptionsResolverInterface $resolver
//     */
//    public function setDefaultOptions(OptionsResolverInterface $resolver)
//    {
//        $resolver->setDefaults(array(
//            'data_class' => 'Kvartiri\KvartiriBundle\Entity\RoomSeasons'
//        ));
//    }
//
//    /**
//     * @return string
//     */
//    public function getName()
//    {
//        return 'kvartiri_kvartiribundle_roomseasons';
//    }
//}
