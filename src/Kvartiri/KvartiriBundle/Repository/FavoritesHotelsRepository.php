<?php

namespace Kvartiri\KvartiriBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * FavoritesHotelsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class FavoritesHotelsRepository extends EntityRepository
{
    public function byUser($user)
    {
        $qb = $this->createQueryBuilder('u')
            ->select('u')
            ->where('u.user = :user')
//            ->andWhere('u.disponible = 1')
            ->orderBy('u.id')
            ->setParameter('user', $user);
        return $qb->getQuery()->getResult();
    }

}
