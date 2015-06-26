<?php
namespace Kvartiri\KvartiriBundle\Twig\Extension;

class PercentExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(new \Twig_SimpleFilter('percent', array($this,'calculPercent')));
    }
    
    function calculPercent($prix,$percent)
    {
        return round($prix - $prix * $percent,2);
    }
    
    public function getName()
    {
        return 'percent_extension';
    }
}