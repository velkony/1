<?php

namespace Kvartiri\KvartiriBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class HotelServiceType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('restaurant', null, array(
                'required' => false,
            ))
            ->add('breakfastRoom', null, array(
                'required' => false,
            ))
            ->add('garden', null, array(
                'required' => false,
            ))
            ->add('bbq', null, array(
                'required' => false,
            ))
            ->add('parking', null, array(
                'required' => false,
            ))
            ->add('fitness', null, array(
                'required' => false,
            ))
            ->add('playground', null, array(
                'required' => false,
            ))
            ->add('playgroundForChildren', null, array(
                'required' => false,
            ))
            ->add('laundry', null, array(
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
            'data_class' => 'Kvartiri\KvartiriBundle\Entity\HotelService'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'kvartiri_kvartiribundle_hotelservice';
    }
}
