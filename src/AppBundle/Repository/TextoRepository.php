<?php

namespace AppBundle\Repository;

/**
 * TextoRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TextoRepository extends \Doctrine\ORM\EntityRepository
{
    public function buscarPorTag($tag)
    {
        return $this->getEntityManager()

        ->createQuery("SELECT te 
                                  from AppBundle:Texto te 
                                  JOIN te.tags ta
                                   WHERE ta.nombre LIKE :tag
                                   order by te.createdAt DESC")->setParameter('tag', '%'.$tag.'%' )

        ->getResult();
    }

    public function buscarPorTitulo($palabra)
    {
        return $this->getEntityManager()

            ->createQuery("SELECT te 
                                  from AppBundle:Texto te 
                                   WHERE te.titulo LIKE :palabra
                                   order by te.createdAt DESC")->setParameter('palabra', '%'.$palabra.'%' )

            ->getResult();
    }

    public function sugerenciaCategoria($categoria)
    {
        return $this->getEntityManager()

            ->createQuery("SELECT te 
                                  from AppBundle:Texto te 
                                   WHERE te.categoria = :categoria
                                   order by te.numVisitas DESC")
            ->setParameter('categoria', $categoria )
            ->setMaxResults(2)

            ->getResult();
    }

    public function sugerenciaAutor($author)
    {
        return $this->getEntityManager()

            ->createQuery("SELECT te 
                                  from AppBundle:Texto te 
                                   WHERE te.author = :author
                                    order by te.numVisitas DESC")
            ->setParameter('author', $author )
            ->setMaxResults(1)


            ->getSingleResult();
    }



}
