<?php

namespace Application\Factory\Form;
 
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Application\Form\PlaceForm;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
 
class PlaceFormFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $services         = $serviceLocator->getServiceLocator();
        $entityManager    = $services->get('Doctrine\ORM\EntityManager');
         
        $form = new PlaceForm($entityManager);
        return $form;
    }
}