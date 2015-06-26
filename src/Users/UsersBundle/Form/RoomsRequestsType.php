<?php

namespace Users\UsersBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class RoomsRequestsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */

    public function __construct($hotelId)
    {
        $this->hotelId = $hotelId;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $hotelId = $this->hotelId;

        $builder
            ->add('numberRooms', 'choice', array(
                'choices' => array(
                    1  => '1x',
                    2  => '2x',
                    3  => '3x',
                    4  => '4x',
                    5  => '5x',
                    6  => '6x',
                    7  => '7x',
                    8  => '8x',
                    9  => '9x',
                    10 => '10x',
                ),
                'label' => 'Select the number of rooms',
                'empty_value' => '',
                'required' => false,
            ))
            ->add('roomId', 'text', array(
                'required' => false,
            ))
//            ->add('roomType', 'entity', array(
//                'class' => 'KvartiriBundle:Rooms',
//                'property' => 'roomTypes.nameTypeEn',
//                'empty_value' => 'Choice Type Room',
//                'query_builder' => function (EntityRepository $er) use($hotelId){
//                    return $er->createQueryBuilder('rooms')
//                        ->select('rooms')
//                        ->where('rooms.hotel = ?1')
//                        ->setParameter(1, $hotelId)
//                        ->orderBy('rooms.roomTypes', 'asc');
//                },
////                'multiple' => false,
//                'required' => false,
//            ))

            ->add('roomType', 'entity', array(
                'class' => 'KvartiriBundle:Rooms',
                'property' => 'roomType',
                'empty_value' => 'Choice Type Room',
                'query_builder' => function (EntityRepository $er) use($hotelId){
                    return $er->createQueryBuilder('rooms')
                        ->where('rooms.hotel = ?1')
                        ->setParameter(1, $hotelId)
                        ->orderBy('rooms.roomType', 'asc');
                },
//                'multiple' => false,
                'required' => false,
            ))

//            ->add('roomType', 'entity', array(
//                'class' => 'KvartiriBundle:Rooms',
//                'property' => 'roomTypes.nameTypeEn',
//                'empty_value' => 'Choice Type Room',
//                'query_builder' => function (EntityRepository $er) use($hotelId){
//                    return $er->createQueryBuilder('rooms')
//                        ->where('rooms.hotel = ?1')
//                        ->setParameter(1, $hotelId)
//                        ->orderBy('rooms.roomTypes', 'asc');
//                },
////                'multiple' => false,
//                'required' => false,
//            ))
            ->add('numberBeds', 'choice', array(
                'choices' => array(
                    1  => '1x',
                    2  => '2x',
                    3  => '3x',
                    4  => '4x',
                    5  => '5x',
                    6  => '6x',
                    7  => '7x',
                    8  => '8x',
                    9  => '9x',
                    10 => '10x',
                ),
                'label' => 'Number of beds',
                'empty_value' => '',
                'required' => false,
            ))
            ->add('extraBed', 'choice', array(
                'choices' => array(
                    1  => '1x',
                    2  => '2x',
                    3  => '3x',
                ),
                'label' => 'Number of extra beds',
                'empty_value' => '',
                'required' => false,
            ))
            ->add('numberAdults', 'text', array(
                'label' => 'Number of adults',
                'required' => false,
            ))
            ->add('numberChildren', 'text', array(
                'label' => 'Children below 12 years',
                'required' => false,
            ))
            ->add('childrenAge', 'text', array(
                'label' => 'Age of the children (example: 3,8,11)',
                'required' => false,
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Users\UsersBundle\Entity\RoomsRequests'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'users_usersbundle_roomsrequests';
    }
}
