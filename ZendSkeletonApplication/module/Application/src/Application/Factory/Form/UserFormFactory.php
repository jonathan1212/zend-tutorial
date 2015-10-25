<?php

namespace Application\Factory\Form;
 
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Application\Form\UserForm;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
 
class UserFormFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $services         = $serviceLocator->getServiceLocator();
        $entityManager    = $services->get('Doctrine\ORM\EntityManager');
         
        $form = new UserForm($entityManager);
        return $form;
    }
}