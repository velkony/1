<?php
namespace Kvartiri\KvartiriBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityRepository;

class SelectRoomType extends AbstractType
{
    private $rooms;

    public function __construct($rooms)
    {
        $this->rooms = $rooms;
    }

    public function buildForm(FormBuilderInterface $builder, array $option)
    {
        $rooms = $this->rooms;

        $builder

            ->add('checkin', 'date', array(
                'widget' => 'single_text',
                // this is actually the default format for single_text
                'format' => 'yyyy/MM/dd',
                'html5'   => false,
                'attr' => array('class' => 'dpd1',
                'data-date-format' =>"dd/mm/yyyy")
            ))
            ->add('checkout', 'date', array(
                'widget' => 'single_text',
                // this is actually the default format for single_text
                'format' => 'yyyy/MM/dd',
                'html5'   => false,
                'attr' => array('class' => 'dpd2',
                'data-date-format' =>"dd/mm/yyyy")
            ))
//            ->add('CheckIn','text' ,array('attr' => array('class' => 'dpd1')))
//            ->add('CheckOut','text' ,array('attr' => array('class' => 'dpd2')))
            ->add('nights', null,array('attr' => array('class' => 'nights')))




//            ->add('availability', 'choice', array(
//            'choices' => $rooms,
//            'multiple' => true,))

        ;

//        $builder->add('id', 'integer', array('required'=>false));
//        $builder->add('list','entity', array('class'=>'Kvartiri\KvartiriBundle\Entity\Hotels', 'property'=>'name',
//            'query_builder' => function(EntityRepository $br) {
//                return $br->createQueryBuilder('ml')
//                    ->where('ml.id = :id')
//                    ->setParameter('id', $hotel );
//            }));
    }

//    public function getDefaultOptions(array $options)
//    {
//        return array('data_class' => 'Kvartiri\KvartiriBundle\Entity\Rooms');
//    }

    public function getName()
    {
        return 'kvartiri_kvartiribundle_selectroom';
    }
}
