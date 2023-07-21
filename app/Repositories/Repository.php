<?php

namespace App\Repositories;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityManagerInterface;

class Repository extends EntityRepository
{
    protected $entityManager;
    protected $entityClass;

    public function __construct(EntityManagerInterface $entityManager, string $entityClass)
    {
        $this->entityManager = $entityManager;
        $this->entityClass = $entityClass;
    }

    public function getAll()
    {
        $queryBuilder = $this->entityManager->createQueryBuilder();
        $queryBuilder->select('e')->from($this->entityClass, 'e');

        return $queryBuilder->getQuery()->getResult();
    }

    public function findById($id)
    {
        return $this->entityManager->find($this->entityClass, $id);
    }

    public function create(array $data)
    {
        $entity = new $this->entityClass();
        $entity = $this->setEntityData($entity, $data);

        $this->entityManager->persist($entity);
        $this->entityManager->flush();

        return $entity;
    }

    public function update($id, array $data)
    {
        $entity = $this->findById($id);

        if (!$entity) {
            throw new \Exception('Entidade não encontrada.');
        }

        $entity = $this->setEntityData($entity, $data);

        $this->entityManager->flush();

        return $entity;
    }

    public function delete($id)
    {
        $entity = $this->findById($id);

        if (!$entity) {
            throw new \Exception('Entidade não encontrada.');
        }

        $this->entityManager->remove($entity);
        $this->entityManager->flush();

        return true;
    }

    protected function setEntityData($entity, array $data)
    {
        $reflectionClass = new \ReflectionClass($entity);

        foreach ($data as $property => $value) {
            if ($reflectionClass->hasProperty($property)) {
                $propertyReflection = $reflectionClass->getProperty($property);
                $propertyReflection->setAccessible(true);
                $propertyReflection->setValue($entity, $value);
            }
        }

        return $entity;
    }
}
