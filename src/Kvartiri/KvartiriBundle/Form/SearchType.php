<?php
namespace Kvartiri\KvartiriBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $option)
    {
        $builder->add('search','text', array('label'=> false,
                                             'attr' => array('class' => 'input-medium search-query')));
    }

    public function getName()
    {
        return 'kvartiri_kvartiribundle_search';
    }
}