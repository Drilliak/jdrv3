<?php

namespace AppBundle\Repository;
/**
 * GameRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class GameRepository extends \Doctrine\ORM\EntityRepository
{

    public function findPlayers($idGame)
    {
        $query = $this->getEntityManager()
            ->createQueryBuilder()
            ->select('game, players')
            ->from('AppBundle:Game', 'game')
            ->where('game.id = :id')
            ->join('game.players', 'players')
            ->setParameter('id', $idGame)
            ->getQuery();

        try {
            return $query->getResult();
        } catch (\Doctrine\ORM\NoResultException $e) {
            return null;
        }
    }


}
