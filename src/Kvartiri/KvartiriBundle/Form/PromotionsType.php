<?php

namespace Kvartiri\KvartiriBundle\Form;

use Doctrine\ORM\EntityRepository;
use Kvartiri\KvartiriBundle\Entity\Hotels;
//use Kvartiri\KvartiriBundle\Form\PromotionEarlyBooking;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PromotionsType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function __construct($hotelId) {
        $this->hotelId = $hotelId;
    }

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $hotelId = $this->hotelId;
        $builder
//            ->add('hotel')
        ->add('hotel', 'entity', array(
        'class' => 'KvartiriBundle:Hotels',
        'query_builder' => function (EntityRepository $er) use($hotelId) {
        return $er->createQueryBuilder('hotel')
        ->where('hotel.id = ?1')
        ->setParameter(1, $hotelId)
        ;
        },
        ))
//            ->add('promotionEarlyBooking', new PromotionEarlyBookingType())
        ->add('promotionEarlyBooking', 'collection', array(
 

        'type' => new PromotionEarlyBookingType(),
        'allow_add' => true,
        'allow_delete' => true,
        )

        )
        ->add('promotionFixedDates', 'collection', array(
                    'type' => new PromotionFixedDatesType(),
                    'allow_add' => true,
                    'allow_delete' => true,
                    
                   
                        )
                )
                ->add('promotionGroup', 'collection', array(
                    'type' => new PromotionGroupType(),
                    'allow_add' => true,
                    'allow_delete' => true,
                
                        )
                )
                ->add('promotionMoreNights', 'collection', array(
                    'type' => new PromotionMoreNightsType(),
                    'allow_add' => true,
                    'allow_delete' => true,
                  
               
                        )
                )
                ->add('promotionPeriod', 'collection', array(
                    'type' => new PromotionPeriodType(),
                    'allow_add' => true,
                    'allow_delete' => true,
                 
            
                        )
                )
                ->add('reductionChildren', 'collection', array(
                    'type' => new ReductionChildrenType(),
                    'allow_add' => true,
                    'allow_delete' => true,
                  
                 
                        )
                )
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Kvartiri\KvartiriBundle\Entity\Promotions'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'kvartiri_kvartiribundle_promotions';
    }

}
