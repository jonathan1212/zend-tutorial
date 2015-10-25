<?php

namespace Application\Form;

use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Doctrine\ORM\EntityManager;
use Application\Entity\Place;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

class PlaceFieldset extends Fieldset implements InputFilterProviderInterface
{

    /**
     * @var ObjectManager
     *
     */
    protected $objectManager;

    /**
     * @var InputFilter
     *
     */
    protected $inputFilter;

    /**
     * Construct Cms\Form\GenreFieldSet.
     * 
     * @param ObjectManager $objectManager
     */
    public function __construct($objectManager)
    {
        parent::__construct('place');

        //$this->setObjectManager($objectManager);

        $this->setHydrator(new DoctrineHydrator($objectManager))
            ->setObject(new Place());

        $this->addElements();
    }

    /**
     * Method responsible for adding elements to \Cms\Form\Fieldset.
     */
    public function addElements()
    {
        $this->add(array(
            'name' => 'place',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
                'required' => true,
                'id' => 'name',
                'class' => 'form-control',
                'placeholder' => 'Enter type name'
            ),
            'options' => array(
                'label' => 'Name',
                'label_attributes' => array(
                    'class' => 'control-label'
                ),

            ),
        ));
    }

    public function getInputFilterSpecification()
    {
        return array(); // filter and validation here
    }

    public function setObjectManager($objectManager)
    {
        $this->objectManager = $objectManager;
        return $this;
    }

// Additional methods
}