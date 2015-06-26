<?php

namespace Users\UsersBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

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
                'format' => 'yyyy/MM/dd/ H:mm',
//                'widget' => 'single_text',
                'attr'=>array('style'=>'display:none;')
            ))
            ->add('checkIn', 'date', array(
                'label' => 'Check in',
//                'widget' => 'single_text',
                'format' => 'yyyy/MM/dd',
//                'data'  => new \DateTime(),
//                'html5'   => true,
                'input'  => 'datetime',
                'attr' => array('class' => 'dpd111',
                    'data-date-format' =>"dd/mm/yyyy")
            ))
            ->add('checkOut', 'date', array(
//                'widget' => 'single_text',
                'format' => 'yyyy/MM/dd',
//                'html5'   => false,
                'label' => 'Check out',
                'attr' => array('class' => 'dpd2222',
                    'data-date-format' =>"dd/mm/yyyy")
            ))
            ->add('numberNights', 'text',array(
//                'disabled' => true,
                'attr' => array('class' => 'nightssss',
            'label' => 'Nomber of night (dd/mm/yyyy)',)))


            ->add('hotelId', 'hidden', array(
                    'data'  =>$this->hotelId
                ))
            ->add('breakfast', 'checkbox', array(
                'label'     => 'breakfast',
                'required'  => false,
            ))
            ->add('lunch', 'checkbox', array(
                'label'     => 'lunch',
                'required'  => false,
            ))
            ->add('dinner', 'checkbox', array(
                'label'     => 'dinner',
                'required'  => false,
            ))
            ->add('surname', 'text', array(
                'label'     => 'surname',
                'attr' => array('class' => 'surname'),
            ))
            ->add('name', 'text', array(
                'label'     => 'name',
                'attr' => array('class' => 'name'),
            ))
            ->add('gsm', 'text', array(
                'label'     => 'gsm',
                'attr' => array('class' => 'gsm'),
            ))
            ->add('email', 'email', array(
                'label'     => 'email',
                'attr' => array('class' => 'email'),
            ))
            ->add('fax', 'text', array(
                'label'     => 'fax',
                'attr' => array('class' => 'fax'),
            ))
            ->add('roomsRequests', 'collection', array(
                'type' => new RoomsRequestsType($hotelId),
                'allow_add'    => true,
                'allow_delete' => true
            ))
//            ->add('send', 'submit', array(
//                'attr' => array('class' => 'btn btn-primary'),
//            ))

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
