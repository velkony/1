<?php

namespace Kvartiri\KvartiriBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PromotionFixedDatesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
//            ->add('fixedDate')



            ->add('fixedDate', 'date', array(
                'format' => 'dd-MM-yyyy',
                'widget' => 'single_text',
                'label' => 'Start',
                'html5'   => false,
                'required' => false,
                'attr' => array('class' => 'fixedDate',
                    'data-date-format' =>"dd-mm-yyyy",
                )
            ))

            ->add('discount', null, array(
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
            'data_class' => 'Kvartiri\KvartiriBundle\Entity\PromotionFixedDates'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'kvartiri_kvartiribundle_promotionfixeddates';
    }
}
