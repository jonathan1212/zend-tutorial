<?php

//module/Tutorial/src/Tutorial/Form/CountriesForm.php
namespace Application\Form;
 
use Zend\Form\Form;
use Zend\InputFilter\InputFilterProviderInterface;
use Doctrine\ORM\EntityManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Application\Form\PlaceFieldset; 

class UserForm extends Form
    implements InputFilterProviderInterface
{
    protected $entityManager;
     
    public function __construct(EntityManager $entityManager)
    {
        parent::__construct('user');
 
        $this->entityManager = $entityManager;       
    }
     
    public function init()
    {

        //$this->setAttribute('action', 'checkout');
        $this->setAttribute('method', 'post');
        $this->setHydrator(new DoctrineHydrator($this->entityManager ));
        //$this->setInputFilter(new \Photoshop\Form\CheckoutFilter());

        $this->add(array(
           'name' => 'language',
           'type' => 'DoctrineModule\Form\Element\ObjectSelect',
           'options' => array(
                'object_manager'     => $this->entityManager,
                'target_class'       => 'Application\Entity\Language',
                'property' => 'language',
                'is_method' => true,
                'find_method'        => array(
                    'name'   => 'getLanguage',
                ),
            ), 
        ));

        $this->add(array(
            'name' => 'name',
            'type' => 'text'
        ));

        $this->add(array(
            'name' => 'address',
            'type' => 'text'
        ));

        $this->addPlace();

        $this->add(array(
            'name' => 'submit',
            'type' => 'submit',
            'options' => array('value'=> 'submit')
        ));
    }
     
    public function getInputFilterSpecification()
    {
        return array(); // filter and validation here
    }


    protected function addPlace()
    {
        $placeFieldset = new PlaceFieldset($this->entityManager);
        $placeFieldset->setName('place');
        //$labelFieldset->setAttribute('required', TRUE);
        //$labelFieldset->setAttribute('class', 'form-control');

        $placeFieldset->setLabel('Place label');
        //$labelFieldset->setLabelAttributes(array('class' => 'control-label'));

        $this->add($placeFieldset);
    }
}