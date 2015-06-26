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
//        $hotelId = $this->hotelId;

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
            ))

            ->add('roomType', 'entity', array(
                'class' => 'KvartiriBundle:Rooms',
                'property' => 'roomTypes.nameTypeEn',
                'empty_value' => 'Choice Type Room',
                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->where('u.hotel = ?1')
                        ->setParameter(1, $this->hotelId)
                        ->orderBy('u.roomTypes', 'asc');
                },
                'multiple' => false
            ))
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
            ))
            ->add('extraBed', 'choice', array(
                'choices' => array(
                    1  => '1x',
                    2  => '2x',
                    3  => '3x',
                ),
                'label' => 'Number of extra beds',
                'empty_value' => '',
            ))
            ->add('numberAdults', 'text', array(
                'label' => 'Number of adults',
            ))
            ->add('numberChildren', 'text', array(
                'label' => 'Children below 12 years',
            ))
            ->add('childrenAge', 'text', array(
                'label' => 'Age of the children (example: 3,8,11)',
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
