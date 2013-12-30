<?php

namespace MCM\DemoBundle\Repository;

use Doctrine\ORM\EntityRepository;

class PersonRepository extends EntityRepository
{
    public function findWhereAgeLessThanOrderedByTeam($age)
    {
        return $this->getEntityManager()
            ->createQuery(
            '
                SELECT
                  person
                FROM
                  MCMDemoBundle:Person person
                WHERE
                  person.age < :age
                ORDER BY
                  person.favFootballTeam ASC
              '
            )
            ->setParameter('age', $age)
            ->getResult();
    }
}