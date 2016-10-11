<?php
/* MyModule/src/MyModule/ControllerFactory/MyControllerFact.php */
namespace Application\Controller;
use \Zend\ServiceManager\FactoryInterface;
use \Zend\ServiceManager\ServiceLocatorInterface;

class PersonalControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator) {
        /* @var $serviceLocator \Zend\Mvc\Controller\ControllerManager */
        $sm   = $serviceLocator->getServiceLocator();
        $em = $sm->get('doctrine.entitymanager.orm_default');
        $personalController = new \Application\Controller\PersonalController($em);
        return $personalController;
    }
}