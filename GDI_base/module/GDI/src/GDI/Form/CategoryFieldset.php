<?php

namespace GDI\Form;

use GDI\Form\Category;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Stdlib\Hydrator\ClassMethods as ClassMethodsHydrator;

class CategoryFieldset extends Fieldset implements InputFilterProviderInterface
{
    public function __construct()
    {
        parent::__construct('category');

        $this
            ->setHydrator(new ClassMethodsHydrator(false))
            ->setObject(new Category())
        ;

        $this->setLabel('Category');

        $this->add(array(
            'name' => 'eSubmissionDate',
            'options' => array(
                'label' => 'eSubmissionDate',
            ),
            'attributes' => array(
                'required' => 'required',
            ),
        ));
    }

    /**
     * @return array
     */
    public function getInputFilterSpecification()
    {
        return array(
            'eSubmissionDate' => array(
                'required' => true,
            ),
        );
    }
}