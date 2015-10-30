<?php

namespace GDI\Form;

use GDI\Entity\Custom\MarketProductJurisdiction;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Stdlib\Hydrator\ClassMethods as ClassMethodsHydrator;


class MarketProductJurisdictionFieldset extends Fieldset implements InputFilterProviderInterface {

    public function __construct($name = null, $options = array())
    {
        parent::__construct('marketProductJurisdiction',$options);

        $this
            ->setHydrator(new ClassMethodsHydrator(false))
            ->setObject(new MarketProductJurisdiction())
        ;

        $this->add(array(
            'name' => 'name',
            'options' => array(
                'label' => 'Name of the product',
            ),
            'attributes' => array(
                'required' => 'required',
            ),
        ));

        $this->add(array(
            'name' => 'price',
            'options' => array(
                'label' => 'Price of the product',
            ),
            'attributes' => array(
                'required' => 'required',
            ),
        ));

         $this->add(array(
             'type' => 'GDI\Form\TJurisdictionProductFieldset',
             'name' => 'jurisdictionProduct',
             'options' => array(
                 'label' => 'CA bla blah',
             ),
         ));

        /*$this->add(array(
            'type' => 'Zend\Form\Element\Collection',
            'name' => 'jurisdictionProducts',
            'options' => array(
                'label' => 'Please choose categories for this product',
                'count' => 1,
                'should_create_template' => true,
                'allow_add' => true,
                'target_element' => array(
                    'type' => 'GDI\Form\TJurisdictionProductFieldset',
                ),
            ),
        ));*/
    }

    /**
     * Should return an array specification compatible with
     * {@link Zend\InputFilter\Factory::createInputFilter()}.
     *
     * @return array
     */
    public function getInputFilterSpecification()
    {
        return array(

        );
    }
} 