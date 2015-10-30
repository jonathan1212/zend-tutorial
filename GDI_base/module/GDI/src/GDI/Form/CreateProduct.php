<?php

namespace GDI\Form;

use Zend\Form\Form;
use Zend\InputFilter\InputFilter;
use Zend\Stdlib\Hydrator\ClassMethods as ClassMethodsHydrator;

class CreateProduct extends Form
{
    public function __construct($name = null, $options = array())
    {
        var_dump('sdffd');
        var_dump($options);
        //var_dump($this->getOptions());
        exit;
        parent::__construct('create_product',$options);


        $this
            ->setAttribute('method', 'post')
            ->setHydrator(new ClassMethodsHydrator(false))
            ->setInputFilter(new InputFilter())
        ;

        $this->add(array(
            'type' => 'GDI\Form\MarketProductJurisdictionFieldset',
            'options' => array(
                'use_as_base_fieldset' => true,
            ),
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Csrf',
            'name' => 'csrf',
        ));

        $this->add(array(
            'name' => 'submit',
            'attributes' => array(
                'type' => 'submit',
                'value' => 'Send',
            ),
        ));
    }
}