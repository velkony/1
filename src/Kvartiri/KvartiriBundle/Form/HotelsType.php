<?php

namespace Kvartiri\KvartiriBundle\Form;

use Kvartiri\KvartiriBundle\Entity\Address;
use Kvartiri\KvartiriBundle\Entity\HotelService;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class HotelsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('available', 'checkbox', array(
                'required' => false,
            ))
            ->add('name')
            ->add('description')
            ->add('remarks')
            ->add('hotelCode')
            ->add('distance', new DistanceType())
            ->add('gps', new GPSType())
            ->add('address', new AddressType())
            ->add('service', new HotelServiceType())
            ->add('hotelSeasons', 'collection', array(
                    'type' => new HotelSeasonsType(),
                    'allow_add' => true,
                    'allow_delete' => true,
                    'by_reference' => false,)
            )
            ->add('hotelType', 'choice', array(
                'choices' => array(
                    1  => 'hotel',
                    2  => 'hostel',
                    3  => 'guesthouse',
                    4  => 'studio',
                    5  => 'apartement',
                ),
                'label' => 'Select the type of hotel',
                'empty_value' => '',
                'required' => false,
            ))
            ->add('city')
            ->add('images', 'collection', array(
                'type' => new ImagesType(),
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,)
            )
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Kvartiri\KvartiriBundle\Entity\Hotels'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'kvartiri_kvartiribundle_hotels';
    }
}
