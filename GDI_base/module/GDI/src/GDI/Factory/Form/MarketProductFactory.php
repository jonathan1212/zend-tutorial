<?php

namespace GDI\Factory\Form;

use GDI\Form\TMarketProductForm;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;


class MarketProductFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $services         = $serviceLocator->getServiceLocator();
        $dbAdapter 		  = $services->get('Zend\Db\Adapter\Adapter');
        $entityManager    = $services->get('Doctrine\ORM\EntityManager');

        $form = new TMarketProductForm($entityManager,$dbAdapter);
        return $form;
    }
}