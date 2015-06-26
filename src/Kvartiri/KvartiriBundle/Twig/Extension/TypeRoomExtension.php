<?php
namespace Kvartiri\KvartiriBundle\Twig\Extension;

class TypeRoomExtension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(new \Twig_SimpleFilter('roomType', array($this,'roomType')));
    }
    
    function roomType($typeId)
    {
        if($typeId == 1) $type = "SingleRoom";
        else if ($typeId == 2) $type = "DoubleRoom";
        else if ($typeId == 3) $type = "TripleRoom";
        else if ($typeId == 4) $type = "QuadrupleRoom";
        else if ($typeId == 5) $type = "Apartment";
        else if ($typeId == 6) $type = "Studio";
        else if ($typeId == 7) $type = "Suite";
        return $type;
    }
    
    public function getName()
    {
        return 'type_room_extension';
    }
}