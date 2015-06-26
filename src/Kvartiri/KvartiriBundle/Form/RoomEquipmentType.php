<?php

namespace Kvartiri\KvartiriBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class RoomEquipmentType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('airConditioning', null, array(
                'required' => false,
            ))
            ->add('tV', null, array(
            'required' => false,
            ))

            ->add('internet', null, array(
                'required' => false,
            ))
            ->add('kitchenette', null, array(
                'required' => false,
            ))
            ->add('refrigerator', null, array(
                'required' => false,
            ))
            ->add('terrace', null, array(
                'required' => false,
            ))
            ->add('seaView', null, array(
                'required' => false,
            ))
            ->add('privateBathroom', null, array(
                'required' => false,
            ))
            ->add('breakfast', null, array(
                'required' => false,
            ))
            ->add('lunch', null, array(
                'required' => false,
            ))
            ->add('dinner', null, array(
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
            'data_class' => 'Kvartiri\KvartiriBundle\Entity\RoomEquipment'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'kvartiri_kvartiribundle_roomequipment';
    }
}
