<?php

namespace Users\UsersBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class UsersBundle extends Bundle
{
    //il faut que ton bundle extens fosuserBundle ,sinon il prend le bundle sans hertiage
    //Je crois que c la que vient ton problème
    //Essaye la pour  voir si il voit oton ID
    //ok
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
