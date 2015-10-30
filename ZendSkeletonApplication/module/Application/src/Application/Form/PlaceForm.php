<?php

namespace Application\Form;

use Zend\Form\Form,
    Doctrine\ORM\EntityManager,
    Application\Entity\Place,
    DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator,
    Zend\Form\Annotation\AnnotationBuilder;

class PlaceForm extends Form
{
    public function __construct(EntityManager $entityManager)
    {
        // we want to ignore the name passed
        parent::__construct('entity-create-form');
        $this->setAttribute('method', 'post')
             ->setHydrator(new DoctrineHydrator($entityManager, 'Application\Entity\Place'))
             ->setObject(new Place());

        $builder    = new AnnotationBuilder();

        $repository = $entityManager->getRepository('Application\Entity\Place');
        $id =  1; //(int)$this->params()->fromQuery('id');
        $place = $repository->find($id);
        
        $entity = $place; // new Place();
        
        //Add the fieldset, and set it as the base fieldset
        $fieldset = $builder->createForm( $entity ) ;
        
        $fieldset->setUseAsBaseFieldset(true);
        //var_dump($fieldset);
        $this->add( $fieldset );


        $this->add(array(
            'type' => 'Zend\Form\Element\Csrf',
            'name' => 'csrf'
        ));

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Save'
            )
        ));
    }
}