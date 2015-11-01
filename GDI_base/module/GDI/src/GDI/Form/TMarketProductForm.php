<?php


namespace GDI\Form;

use GDI\Entity\TMarketProduct;
use Zend\Form\Form;
use Zend\InputFilter\InputFilterProviderInterface;
use Doctrine\ORM\EntityManager;

use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Application\Form\PlaceFieldset;
use Zend\Db\Adapter\AdapterInterface;


class TMarketProductForm extends Form
    implements InputFilterProviderInterface
{
    protected $entityManager;

    protected $adapter;

    public function __construct(EntityManager $entityManager, AdapterInterface $dbAdapter)
    {
        parent::__construct('marketproduct');

        $this->entityManager = $entityManager;
        $this->adapter = $dbAdapter;
    }

    public function init()
    {
        //$this->setAttribute('method', 'post');
        $this->setAttribute('class','form-horizontal');

        $this->setHydrator(new DoctrineHydrator($this->entityManager))
        ;

        //marketProductId
        $this->add(array(
            'type' => 'Zend\Form\Element\Hidden',
            'name' => 'marketProductId',
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'overview',
            ),
        ));


        // title
        $this->add(array(
            'type' => 'Zend\Form\Element\Text',
            'name' => 'title',
            'attributes' => array(
                'required' => 'required',
                'class' => 'form-control',
                'id' => 'title',
            ),
        ));

        //market
        $this->add(array(
            'name' => 'market',
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'market',
            ),
            'options' => array(
                'object_manager'     => $this->entityManager,
                'target_class'       => 'GDI\Entity\MMarket',
                'property' => 'marketName',
                'is_method' => true,
                'empty_option' => 'Select Market',
                'find_method' => array(
                    'name' => 'findBy',
                    'params' => array(
                        'criteria' => array(),
                        'orderBy' => array('marketName' => 'ASC'),
                    ),
                ),
            ),
        ));

        //game category
        $this->add(array(
            'name' => 'gameCategory',
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'category',
            ),
            'options' => array(
                'object_manager'     => $this->entityManager,
                'target_class'       => 'GDI\Entity\MGameCategory',
                'property' => 'gameCategoryName',
                'is_method' => true,
                'empty_option' => 'Select Category',
                'find_method' => array(
                    'name' => 'findBy',
                    'params' => array(
                        'criteria' => array(),
                        'orderBy' => array('gameCategoryName' => 'ASC'),
                    ),
                ),
            ),
        ));

        //branch
        $this->add(array(
            'name' => 'branch',
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'developed-in',
            ),
            'options' => array(
                'object_manager'     => $this->entityManager,
                'target_class'       => 'GDI\Entity\MBranch',
                'property' => 'branchName',
                'is_method' => true,
                'empty_option' => 'Select Branch',
                'find_method' => array(
                    'name' => 'findBy',
                    'params' => array(
                        'criteria' => array(),
                        'orderBy' => array('branchName' => 'ASC'),
                    ),
                ),
            ),
        ));

        //gamegroup
        $this->add(array(
            'name' => 'gameGroup',
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'group',
            ),
            'options' => array(
                'object_manager'     => $this->entityManager,
                'target_class'       => 'GDI\Entity\MGameGroup',
                'property' => 'gameGroupName',
                'is_method' => true,
                'empty_option' => 'Select Game Group',
                'find_method' => array(
                    'name' => 'findBy',
                    'params' => array(
                        'criteria' => array(),
                        'orderBy' => array('gameGroupName' => 'ASC'),
                    ),
                ),
            ),
        ));

        //platform
        $this->add(array(
            'name' => 'platform',
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'platform',
            ),
            'options' => array(
                'object_manager'     => $this->entityManager,
                'target_class'       => 'GDI\Entity\MPlatform',
                'property' => 'platformName',
                'is_method' => true,
                'empty_option' => 'Select Platform',
                'find_method' => array(
                    'name' => 'findBy',
                    'params' => array(
                        'criteria' => array(),
                        'orderBy' => array('platformName' => 'ASC'),
                    ),
                ),
            ),
        ));

        //gvn
        $this->add(array(
            'type' => 'Zend\Form\Element\Text',
            'name' => 'gvn',
            'attributes' => array(
                'required' => 'required',
                'class' => 'form-control',
                'id' => 'gdi-no',
            ),
        ));

        //type
        $this->add(array(
            'type' => 'Zend\Form\Element\Text',
            'name' => 'type',
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'type',
            ),
        ));

        //target
        $this->add(array(
            'type' => 'Zend\Form\Element\Text',
            'name' => 'target',
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'target',
            ),
        ));

        //overview
        $this->add(array(
            'type' => 'Zend\Form\Element\Text',
            'name' => 'overview',
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'overview',
            ),
        ));

        //characteristics
        $this->add(array(
            'type' => 'Zend\Form\Element\Text',
            'name' => 'characteristics',
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'character',
            ),
        ));

        //remarks
        $this->add(array(
            'type' => 'Zend\Form\Element\Text',
            'name' => 'remarks',
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'remarks',
            ),
        ));

        //eDevStartDate
        $this->add(array(
            'name' => 'eDevStartDate',
            'type' => 'Zend\Form\Element\Date',
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'dev-st',
            ),
        ));

        //rDevStartDate
        $this->add(array(
            'name' => 'rDevStartDate',
            'type' => 'Zend\Form\Element\Date',
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'dev-rs',
            ),
        ));

        //eDevFinishDate
        $this->add(array(
            'name' => 'eDevFinishDate',
            'type' => 'Zend\Form\Element\Date',
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'dev-st',
            ),
        ));

        //rDevFinishDate
        $this->add(array(
            'name' => 'rDevFinishDate',
            'type' => 'Zend\Form\Element\Date',
            'attributes' => array(
                'class' => 'form-control',
                'id' => 'dev-rs',
            ),
        ));
        

        //isActive
        $this->add(array(
            'name' => 'isActive',
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

        //jurisdictionProduct
        /*$this->add(array(
            'name' => 'jurisdictionProductId',
            'type' => 'Zend\Form\Element\Text',
            'attributes' => array(
            ),
        ));*/

       $this->addProduct();
    }

    protected function addProduct()
    {
        $productFieldset = new ProductFieldset($this->entityManager);
        $productFieldset->setName('product');
        //$labelFieldset->setAttribute('required', TRUE);
        //$labelFieldset->setAttribute('class', 'form-control');

        //$labelFieldset->setLabelAttributes(array('class' => 'control-label'));

        $this->add($productFieldset);
    }

    public function getInputFilterSpecification()
    {
        return array(
            'title' => array(
                'required' => true,
                'filters' => array( 
                    array('name' => 'StripTags'), 
                    array('name' => 'StringTrim'), 
                ),
            ),
            'market' => array(
                'required' => true,
            ),

            'gameCategory' => array(
                'required' => true,
            ),

            'branch' => array(
                'required' => true,
            ),

            'gameGroup' => array(
                'required' => true,
            ),

            'platform' => array(
                'required' => true,
            ),

            'gvn' => array(
                'required' => true,
                'filters' => array( 
                    array('name' => 'StripTags'), 
                    array('name' => 'StringTrim'), 
                ),
            ),

            'type' => array(
                'required' => false,
                'filters' => array( 
                    array('name' => 'StripTags'), 
                    array('name' => 'StringTrim'), 
                ),
            ),

            'target' => array(
                'required' => false,
                'filters' => array( 
                    array('name' => 'StripTags'), 
                    array('name' => 'StringTrim'), 
                ),
            ),

            'overview' => array(
                'required' => false,
                'filters' => array( 
                    array('name' => 'StripTags'), 
                    array('name' => 'StringTrim'), 
                ),
            ),

            'characteristics' => array(
                'required' => false,
                'filters' => array( 
                    array('name' => 'StripTags'), 
                    array('name' => 'StringTrim'), 
                ),
            ),

            'remarks' => array(
                'required' => false,
                'filters' => array( 
                    array('name' => 'StripTags'), 
                    array('name' => 'StringTrim'), 
                ),
            ),

            'eDevStartDate' => array(
                'required' => false,
                'validators' => array(
                    array(
                        'name' => 'Date',
                    ),
                ),
            ),

            'rDevStartDate' => array(
                'required' => false,
                'validators' => array(
                    array(
                        'name' => 'Date',
                    ),
                ),
            ),

            'eDevFinishDate' => array(
                'required' => false,
                'validators' => array(
                    array(
                        'name' => 'Date',
                    ),
                ),
            ),

            'rDevFinishDate' => array(
                'required' => false,
                'validators' => array(
                    array(
                        'name' => 'Date',
                    ),
                ),
            ),

            'isActive' => array(
                'required' => false,
                'validators' => array(),
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

            /*'jurisdictionProductId' => array(
                'required' => false,
                'validators' => array(),
            ),*/

        ); // filter and validation here
    }
}