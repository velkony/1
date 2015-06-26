<?php

namespace Kvartiri\KvartiriBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class HotelSeasonsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('available', null, array(
                'required' => false,
            ))
            ->add('start', 'date', array(
                'format' => 'dd-MM-yyyy',
                'widget' => 'single_text',
                'label' => 'Start',
                'html5'   => false,
                'attr' => array('class' => 'hotelSeasonDate1',
                    'data-date-format' =>"dd-mm-yyyy"
                )
            ))
            ->add('finish', 'date', array(
                'format' => 'dd-MM-yyyy',
                'widget' => 'single_text',
                'label' => 'Finish',
                'html5'   => false,
                'attr' => array('class' => 'hotelSeasonDate2',
                    'data-date-format' =>"dd-mm-yyyy"
                )
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Kvartiri\KvartiriBundle\Entity\HotelSeasons'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'kvartiri_kvartiribundle_hotelseasons';
    }
}
