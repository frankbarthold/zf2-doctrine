<?php
/**
 * Created by PhpStorm.
 * User: franc
 * Date: 18.09.2016
 * Time: 14:44
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class EntityController extends AbstractActionController
{
    /**
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * Sets the EntityManager
     *
     * @param EntityManager $em
     * @access protected
     * @return PostController
     */
    protected function setEntityManager(\Doctrine\ORM\EntityManager $em)
    {
        $this->entityManager = $em;
        return $this;
    }

    /**
     * Returns the EntityManager
     *
     * Fetches the EntityManager from ServiceLocator if it has not been initiated
     * and then returns it
     *
     * @access protected
     * @return EntityManager
     */
    protected function getEntityManager()
    {
        if (null === $this->entityManager) {
            $serviceManager = $this->getServiceLocator();
            $entityManager = $serviceManager->get('doctrine.entitymanager.orm_default');
            $this->setEntityManager( $entityManager );
            // $this->setEntityManager($this->getServiceLocator()->get('Doctrine\ORM\EntityManager'));
        }
        return $this->entityManager;
    }
}