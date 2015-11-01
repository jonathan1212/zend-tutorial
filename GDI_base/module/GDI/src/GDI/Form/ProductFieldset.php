<?php

namespace GDI\Form;

use GDI\Entity\TProduct;
use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Doctrine\ORM\EntityManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

class ProductFieldset extends Fieldset implements InputFilterProviderInterface
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
     * @param EntityManager $objectManager
     */
    public function __construct(EntityManager $objectManager)
    {
        parent::__construct('product');

        $this->setObjectManager($objectManager);

        $this->setHydrator(new DoctrineHydrator($objectManager))
            ->setObject(new TProduct());

        $this->addElements();
    }

    /**
     * Method responsible for adding elements to \GDI\Form\Fieldset.
     */
    public function addElements()
    {
        //controlId
        $this->add(array(
            'name' => 'controlId',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
                'required' => 'required',
                'class' => 'form-control',
                'id' => 'control-no',
            ),
        ));

        //eArtworkSpDate
        $this->add(array(
            'name' => 'eArtworkSpDate',
            'type' => 'Zend\Form\Element\Date',
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'artwork-est',
            ),
        ));

        //rArtworkSpDate
        $this->add(array(
            'name' => 'rArtworkSpDate',
            'type' => 'Zend\Form\Element\Date',
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'artwork-rest',
            ),
        ));

        //eGslickDate
        $this->add(array(
            'name' => 'eGslickDate',
            'type' => 'Zend\Form\Element\Date',
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'gslick-est',
            ),
        ));

        //rGslickDate
        $this->add(array(
            'name' => 'rGslickDate',
            'type' => 'Zend\Form\Element\Date',
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'gslick-rest',
            ),
        ));

        //eDemoDate
        $this->add(array(
            'name' => 'eDemoDate',
            'type' => 'Zend\Form\Element\Date',
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'demo-software-release-est',
            ),
        ));

        //rDemoDate
        $this->add(array(
            'name' => 'rDemoDate',
            'type' => 'Zend\Form\Element\Date',
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'demo-software-release-rest',
            ),
        ));

        //eMovieDate
        $this->add(array(
            'name' => 'eMovieDate',
            'type' => 'Zend\Form\Element\Date',
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'movie-est',
            ),
        ));

        //rMovieDate
        $this->add(array(
            'name' => 'rMovieDate',
            'type' => 'Zend\Form\Element\Date',
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'movie-rest',
            ),
        ));

        //eArtworkTrDate
        $this->add(array(
            'name' => 'eArtworkTrDate',
            'type' => 'Zend\Form\Element\Date',
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'artwork-tr-est',
            ),
        ));

        //rArtworkTrDate
        $this->add(array(
            'name' => 'rArtworkTrDate',
            'type' => 'Zend\Form\Element\Date',
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'artwork-tr-rest',
            ),
        ));

        //eWebsiteDate
        $this->add(array(
            'name' => 'eWebsiteDate',
            'type' => 'Zend\Form\Element\Date',
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'website-est',
            ),
        ));

        //rWebsiteDate
        $this->add(array(
            'name' => 'rWebsiteDate',
            'type' => 'Zend\Form\Element\Date',
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'website-rest',
            ),
        ));

        //isReturnDemo
        $this->add(array(
            'name' => 'isReturnDemo',
            'type' => 'Zend\Form\Element\Checkbox',
            'attributes' => array(
            ),
        ));

        //isDeleted
        $this->add(array(
            'name' => 'isDeleted',
            'type' => 'Zend\Form\Element\Checkbox',
            'attributes' => array(
            ),
        ));

        //createUserId
        $this->add(array(
            'name' => 'createUserId',
            'type' => 'hidden',
            'attributes' => array(
            ),
        ));

        //updateUserId
        $this->add(array(
            'name' => 'updateUserId',
            'type' => 'hidden',
            'attributes' => array(
            ),
        ));

        //createTime
        $this->add(array(
            'name' => 'createTime',
            'type' => 'Zend\Form\Element\Date',
            'attributes' => array(
            ),
        ));

        //gameImagePass
        $this->add(array(
            'name' => 'gameImagePass',
            'type' => 'Zend\Form\Element\File',
            'attributes' => array(
            ),
        ));
    }

    public function getInputFilterSpecification()
    {
        return array(
            'controlId' => array(
                'required' => true,
                'filters' => array( 
                    array('name' => 'StripTags'), 
                    array('name' => 'StringTrim'), 
                ),

                'validators' => array(
                    array(
                        'name' => 'DoctrineModule\Validator\NoObjectExists',
                        'options' => array(
                            'object_repository' => $this->objectManager->getRepository('GDI\Entity\TProduct'),
                            'fields' => 'controlId'
                        )
                    )
                )
            ),

            'eArtworkSpDate' => array(
                'required' => false,
                'validators' => array(
                    array(
                        'name' => 'Date',
                    ),
                ),
            ),

            'rArtworkSpDate' => array(
                'required' => false,
                'validators' => array(
                    array(
                        'name' => 'Date',
                    ),
                ),
            ),

            'eGslickDate' => array(
                'required' => false,
                'validators' => array(
                    array(
                        'name' => 'Date',
                    ),
                ),
            ),

            'rGslickDate' => array(
                'required' => false,
                'validators' => array(
                    array(
                        'name' => 'Date',
                    ),
                ),
            ),

            'eDemoDate' => array(
                'required' => false,
                'validators' => array(
                    array(
                        'name' => 'Date',
                    ),
                ),
            ),

            'rDemoDate' => array(
                'required' => false,
                'validators' => array(
                    array(
                        'name' => 'Date',
                    ),
                ),
            ),

            'eMovieDate' => array(
                'required' => false,
                'validators' => array(
                    array(
                        'name' => 'Date',
                    ),
                ),
            ),

            'rMovieDate' => array(
                'required' => false,
                'validators' => array(
                    array(
                        'name' => 'Date',
                    ),
                ),
            ),

            'eArtworkTrDate' => array(
                'required' => false,
                'validators' => array(
                    array(
                        'name' => 'Date',
                    ),
                ),
            ),

            'rArtworkTrDate' => array(
                'required' => false,
                'validators' => array(
                    array(
                        'name' => 'Date',
                    ),
                ),
            ),

            'eWebsiteDate' => array(
                'required' => false,
                'validators' => array(
                    array(
                        'name' => 'Date',
                    ),
                ),
            ),

            'rWebsiteDate' => array(
                'required' => false,
                'validators' => array(
                    array(
                        'name' => 'Date',
                    ),
                ),
            ),

            'isReturnDemo' => array(
                'required' => false,
                'validators' => array(),
            ),

            'gameImagePass' => array(
                'required' => false,
                //'allowEmpty' => true,
                'type'       => 'Zend\InputFilter\FileInput',
                'filters' => array( 
                    array(
                        'name' => "Zend\Filter\File\RenameUpload", 
                        'options' => array('target' => "./data/uploads/" , 'randomize' => true, 'use_upload_name' => true, 'use_upload_extension' => true )
                    ),
                    array('name' => 'filelowercase'), 
                ),
                'validators' => array(
                    /*array('name' => 'filesize', 'options' => array(
                        'min' => 4000, 'max' => 5000,
                    )),*/
                    //array('name' => 'fileupload'),
                    array('name' => 'File\IsImage'),
                    //array('name' => 'File\UploadFile'),
                ),
            ),

            'isDeleted' => array(
                'required' => false,
                'validators' => array(),
            ),

            'createUserId' => array(
                'required' => false,
                'validators' => array(),
            ),

            'updateUserId' => array(
                'required' => false,
                'validators' => array(),
            ),

            'createTime' => array(
                'required' => false,
                'validators' => array(),
            ),

        ); // filter and validation here
    }

    public function setObjectManager($objectManager)
    {
        $this->objectManager = $objectManager;
        return $this;
    }

// Additional methods
}