<?php

namespace GDI\Form;

use GDI\Entity\Custom\JurProductCustom;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Stdlib\Hydrator\ClassMethods as ClassMethodsHydrator;


class TJurisdictionProductFieldset extends Fieldset implements InputFilterProviderInterface {

    protected  $em;

    /*public function init()
    {
        if (null === $this->em) {
            $this->em = $this->getFormFactory()->getFormElementManager()->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        }

        var_dump($this->em);
        exit;
        return $this->em;
    }*/


    public function __construct($name = null, $options = array())
    {
        parent::__construct('tJurisdictionProduct',$options);

        /*if (null === $this->em) {
            var_dump('hid');
            $this->em = $this->getFormFactory()->getFormElementManager()->getServiceLocator();//->get('doctrine.entitymanager.orm_default');
        }

        var_dump($this->em);
        exit;*/

        $this
            ->setHydrator(new ClassMethodsHydrator(false))
            ->setObject(new JurProductCustom())
        ;


        for ($x=1; $x<=3; $x++) {


            $this->setLabel('CA');

            $this->add(array(
                'type'  => 'Zend\Form\Element\Date',
                'name' => 'eSubmissionDate'.$x,
                'options' => array(
                    'label' => 'Submission (Estimated)',
                ),
            ));

            $this->add(array(
                'type'  => 'Zend\Form\Element\Date',
                'name' => 'eApprovalDate'.$x,
                'options' => array(
                    'label' => 'Approval (Estimated)',
                ),
            ));

            $this->add(array(
                'type'  => 'Zend\Form\Element\Date',
                'name' => 'eReleaseDate'.$x,
                'options' => array(
                    'label' => 'Master Release (Estimated)',
                ),
            ));

            $this->add(array(
                'type'  => 'Zend\Form\Element\Date',
                'name' => 'eLaunchDate'.$x,
                'options' => array(
                    'label' => 'Launch (Estimated)',
                ),
            ));

            $this->add(array(
                'type'  => 'Zend\Form\Element\Date',
                'name' => 'eRegulatorDate'.$x,
                'options' => array(
                    'label' => 'Regulator (Estimated)',
                ),
            ));

            // result

            $this->add(array(
                'type'  => 'Zend\Form\Element\Date',
                'name' => 'rSubmissionDate'.$x,
                'options' => array(
                    'label' => 'Submission (Result)',
                ),
            ));

            $this->add(array(
                'type'  => 'Zend\Form\Element\Date',
                'name' => 'rApprovalDate'.$x,
                'options' => array(
                    'label' => 'Approval (Result)',
                ),
            ));

            $this->add(array(
                'type'  => 'Zend\Form\Element\Date',
                'name' => 'rReleaseDate'.$x,
                'options' => array(
                    'label' => 'Master Release (Result)',
                ),
            ));

            $this->add(array(
                'type'  => 'Zend\Form\Element\Date',
                'name' => 'rLaunchDate'.$x,
                'options' => array(
                    'label' => 'Launch (Result)',
                ),
            ));

            $this->add(array(
                'type'  => 'Zend\Form\Element\Date',
                'name' => 'rRegulatorDate'.$x,
                'options' => array(
                    'label' => 'Regulator (Result)',
                ),
            ));

        }
    }

    /**
     * @return array
     */
    public function getInputFilterSpecification()
    {
        return array(
            'eSubmissionDate' => array(
                'validators' => array(
                    array(
                        'name' => 'Date',
                    )
                )
            ),
        );
    }
} 