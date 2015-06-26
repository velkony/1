<?php

namespace Kvartiri\KvartiriBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PromotionPeriodType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
//            ->add('start')
//            ->add('finish')



            ->add('start', 'date', array(
                'format' => 'dd-MM-yyyy',
                'widget' => 'single_text',
                'label' => 'Start',
                'html5'   => false,
                'required' => false,
                'attr' => array('class' => 'start1',
                    'data-date-format' =>"dd-mm-yyyy"
                )
            ))
            ->add('finish', 'date', array(
                'format' => 'dd-MM-yyyy',
                'widget' => 'single_text',
                'label' => 'Finish',
                'html5'   => false,
                'required' => false,
                'attr' => array('class' => 'finish1',
                    'data-date-format' =>"dd-mm-yyyy"
                )
            ))

            ->add('discount' , null, array(
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
            'data_class' => 'Kvartiri\KvartiriBundle\Entity\PromotionPeriod'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'kvartiri_kvartiribundle_promotionperiod';
    }
}
