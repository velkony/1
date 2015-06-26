<?php

namespace Users\UsersBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class ClientsRequestsType extends AbstractType
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
            ->add('dateRequest', 'date', array(
                'data' => new \DateTime('now'),
                'format' => 'dd-MM-yyyy H:mm',
                'widget' => 'single_text',
//                'attr'=>array('style'=>'display:none;')
            ))
            ->add('checkIn', 'date', array(
                'format' => 'dd-MM-yyyy',
                'widget' => 'single_text',
                'label' => 'Check in',
                'html5'   => false,
                'attr' => array('class' => 'dpd1',
                    'data-date-format' =>"dd-mm-yyyy"
                )
            ))
            ->add('checkOut', 'date', array(
                'format' => 'dd-MM-yyyy',
                'widget' => 'single_text',
                'label' => 'Check out',
                'html5'   => false,
                'attr' => array('class' => 'dpd2',
                    'data-date-format' =>"dd-mm-yyyy"
                )
            ))
            ->add('numberNights', 'text',array(
//                'disabled' => true,
                'attr' => array('class' => 'nights',
                    'label' => 'Nomber of night (dd/mm/yyyy)',)))

            ->add('hotelId', 'hidden', array(
                'data'  =>$this->hotelId
            ))



            ->add('breakfast', 'checkbox', array(
                'label'     => 'breakfast',
                'required' => false,
            ))
            ->add('lunch', 'checkbox', array(
                'label'     => 'lunch',
                'required' => false,
            ))
            ->add('dinner', 'checkbox', array(
                'label'     => 'dinner',
                'required' => false,
            ))
            ->add('surname', 'text', array(
                'label'     => 'surname',
                'required' => false,
            ))
            ->add('name', 'text', array(
                'label'     => 'name',
                'required' => false,
            ))

//            ->add('name', 'entity', array(
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



            ->add('gsm', 'text', array(
                'label'     => 'gsm',
                'required' => false,
            ))
            ->add('email', 'text', array(
                'label'     => 'email',
                'required' => false,
            ))
            ->add('fax', 'text', array(
                'label'     => 'fax',
                'required' => false,
            ))
            ->add('roomsRequests', 'collection', array(
                'type' => new RoomsRequestsType($this->hotelId),
                'allow_add'    => true,
                'allow_delete' => true
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Users\UsersBundle\Entity\ClientsRequests'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'users_usersbundle_clientsrequests';
    }
}
