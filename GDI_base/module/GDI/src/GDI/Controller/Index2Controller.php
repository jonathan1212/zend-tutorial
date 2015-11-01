<?php

namespace GDI\Controller;

use GDI\Entity\Custom\MarketProductJurisdiction;
use GDI\Entity\MBranch;
use GDI\Entity\MGameCategory;
use GDI\Entity\MLanguage;
use GDI\Entity\RMarketJurisdiction;
use GDI\Entity\TProduct;
use GDI\Form\CreateProduct;
use GDI\Form\JurisdictionProductFieldset;
use GDI\Form\MarketProductJurisdictionForm;
use GDI\Form\Product;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use GDI\Model\RUserRoleModel;
use GDI\Model\MUserModel;
use GDI\Entity\RUserRole;
use GDI\Entity\MUser;
use GDI\Entity\MRole;

use Zend\Form\Element;
use Zend\Form\Form;

use Zend\Form\Annotation\AnnotationBuilder;
use DoctrineORMModule\Form\Annotation\AnnotationBuilder as DoctrineAnnotationBuilder;
use GDI\Entity\TMarketProduct;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

class Index2Controller extends AbstractActionController
{

    protected $em;

    public function getEntityManager()
    {
        if (null === $this->em) {
            $this->em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        }
        return $this->em;
    }

    public function addAction()
    {
        //var_dump('asdf');exit;
        $tMarketProduct = new TMarketProduct();
        $tProduct = new TProduct();

        //$tMarketProduct = $this->getEntityManager()->find('GDI\Entity\TMarketProduct', 20);
        //$tProduct = $this->getEntityManager()->find('GDI\Entity\TProduct', 5);

        $mGameCategory = new MGameCategory();
        //$builder = new AnnotationBuilder();
        $builder = new DoctrineAnnotationBuilder($this->getEntityManager());


        $form = $builder->createForm($tMarketProduct);


        foreach ($form->getElements() as $element) {
            if (method_exists($element, 'getProxy')) {
                $proxy = $element->getProxy();
                if (method_exists($proxy, 'setObjectManager')) {
                    $proxy->setObjectManager($this->getEntityManager());
                }
            }
        }
        $form->setHydrator(new DoctrineHydrator($this->getEntityManager(), 'GDI\Entity\TMarketProduct'));
        $form->bind($tMarketProduct);

        /*$form->get('market')->setOptions(
        array(
        'object_manager' => $this->getEntityManager(),
        'property'       => 'marketName',
        )
        );*/

        $storeOptions['find_method'] = array(
            'name' => 'findBy',
            'params' => array(
                'criteria' => array(), // no criteria since I want the whole list
                'orderBy' => array('marketName' => 'ASC'),
            ),
        );

        $form->get('market')->setOptions($storeOptions);
        //$form->get('isActive')->setOptions(array('continue_if_empty' => true));


        /*$gameCategormForm = $builder->createForm($mGameCategory);
        $gameCategormForm->setName('gameCategormForm');*/

        $tProductForm = $builder->createForm($tProduct);
        //$tProductForm->setName('productForm');

        $tProductForm->setHydrator(new DoctrineHydrator($this->getEntityManager(), 'GDI\Entity\TProduct'));
        $tProductForm->bind($tProduct);

        $subForm = new \Zend\Form\Form();
        $subForm->setName('subform');

        $subForm->add(array(
            'name' => 'email',
            'type' => 'Zend\Form\Element\Text',
        ));


        //$form->add($tProductForm);

        //var_dump($form->get('productForm')->isValid());
        //var_dump($tProductForm->getName());

        //$form->add($subForm);

        /*$form->add(array(
        'type' => 'Zend\Form\Element\Select',
        'name' => 'gender',
        'options' => array(
        'label' => 'Gender',
        'value_options' => array(
        '1' => 'Select your gender',
        '2' => 'Female',
        '3' => 'Male'
        ),
        ),
        'attributes' => array(
        'value' => '1' //set selected to '1'
        )
        ));*/

        //var_dump($form);exit;
        //$form->bind($tMarketProduct);

        $request = $this->getRequest();

        if ($request->isPost()) {

        var_dump($form->getAttributes());

        //var_dump($tProductForm->getHydrator()->extract($tProduct));

        //var_dump($tProductForm->getAttributes());

        //exit;


        $tMarketProduct->setCreateUserId(1);
        $tMarketProduct->setCreateTime(new \DateTime());
        $tMarketProduct->setUpdateUserId(1);
        //$tMarketProduct->setMarketProductId(null);

        //$product = $this->getEntityManager()->find('GDI\Entity\TProduct', 1);
        //$tMarketProduct->setProduct($product);


        //tproduct
        //$tProduct->setControlId(1);
        //$tProduct->setEArtworkSpDate(date('Y-m-d'));
        //$tProduct->setEArtworkTrDate(date('Y-m-d'));

        $post = array_merge_recursive(
            $request->getPost()->toArray(),
            $request->getFiles()->toArray()
        );

        //$upload = new Zend_File_Transfer_Adapter_Http();

        var_dump($post);
        //var_dump($form->get('productForm'));
        //exit
        //$form->remove('productForm');


        //$productFormClone = clone($tProductForm);
        //$form->remove('productForm');

        //$form->setInputFilter($tMarketProduct);
        $form->setData($post);
        //$tProductForm->setData($post);


        //$form->setData($request->getPost());
        //$form->getFormFactory()->

        //$form->add($productFormClone);
        //$tProductForm = $productFormClone;

        //$tProductForm->setData($request->getPost());


        //var_dump($request->getPost());
        //var_dump($form->get('productForm'));
        //exit;

        /* if ($form->get('productForm')->isValid())
        {
        die('ok');
        }else {
        }*/
        //var_dump($form->get('TMarketProduct'));
        //$form->get('productForm')->setData($request->getPost());
        //var_dump($form->get('productForm')->isValid());

        if ($form->isValid()) {
            var_dump('ok form');
            //var_dump('asdf');
            //var_dump($form->getData());
            //exit;
            //$hydrator2 = new DoctrineHydrator($this->getEntityManager());

            //$tMarketProduct = new TMarketProduct();
            //$city = $hydrator2->hydrate($form->getData(), $tMarketProduct);
            //var_dump($city);exit;

            //var_dump($tMarketProduct);
            //var_dump($form->getData());

            /*$filter = new \Zend\Filter\File\RenameUpload("./data/uploads/");
            echo $filter->filter($post['product']['gameImagePass']);
            // File has been moved to "./data/uploads/php5Wx0aJ"

            // ... or retain the uploaded file name
            $filter->setUseUploadName(true);
            echo $filter->filter($filter);
            exit;*/

            /*$tProduct->setCreateUserId(1);
            $tProduct->setCreateTime(new \DateTime());

            $this->getEntityManager()->persist($tProductForm->getData());
            $this->getEntityManager()->flush();*/

            //$tMarketProduct->setProduct($tProduct);

            /* Uploading Document File on Server */
            /*$upload = new Zend_File_Transfer_Adapter_Http();
            $upload->setDestination("/public/img/uploads/");
            try {
                // upload received file(s)
                $upload->receive();
            } catch (Zend_File_Transfer_Exception $e) {
                $e->getMessage();
            }

            $uploadedData = $form->getValues();
            var_dump($uploadedData);*/

            $uploadedData = $form->getValue();
            var_dump($uploadedData);
            var_dump($form->getData());


            $this->getEntityManager()->persist($form->getData());
            $this->getEntityManager()->flush();

            //var_dump($tProduct);

        } else {
        }
    }
        return array('form' => $form, 'tProductForm' => $tProductForm);
    }


    public function getProductFormAction()
    {
        $form = new CreateProduct(null,array('ab'=>'aaa','abb'=>'sdf'));
        //$form->setOptions(array('x'=>'dsf','a'=>'b'));

        $marketProdJurisdiction = new MarketProductJurisdiction();

        $form->bind($marketProdJurisdiction);

        $request = $this->getRequest();
        if ($request->isPost()) {
            $form->setData($request->getPost());

            if ($form->isValid()) {
                var_dump($marketProdJurisdiction);
            }
        }


        $view = new ViewModel(array('form'=> $form));
        $view->setTemplate('GDI/Index2/productForm.phtml'); // path to phtml file under view folder
        return $view;
    }

    public function testAction()
    {
        /*$form = new CreateProduct();
        $product = new Product();
        $form->bind($product);*/

        $form = new \Zend\Form\Form();
        $marketJurisdictions = $this->getEntityManager()->getRepository('GDI\Entity\RMarketJurisdiction')->findByMarket('1');

        //var_dump($marketJurisdiction);
        //exit;
        foreach ($marketJurisdictions as $marketJurisdiction) {

            //var_dump($marketJurisdiction->getJurisdiction());
            $jurisAbbr = $marketJurisdiction->getJurisdiction()->getJurisdictionAbbr();

            $form->setName('jurisdictionProduct');

            $form->add(array(
                'type'  => 'Zend\Form\Element\Date',
                'name' => 'eSubmissionDate'.$jurisAbbr,
                'options' => array(
                    'label' => 'Submission (Estimated)',
                ),
            ));

            $form->add(array(
                'type'  => 'Zend\Form\Element\Date',
                'name' => 'eApprovalDate'.$jurisAbbr,
                'options' => array(
                    'label' => 'Approval (Estimated)',
                ),
            ));

            $form->add(array(
                'type'  => 'Zend\Form\Element\Date',
                'name' => 'eReleaseDate'.$jurisAbbr,
                'options' => array(
                    'label' => 'Master Release (Estimated)',
                ),
            ));

            $form->add(array(
                'type'  => 'Zend\Form\Element\Date',
                'name' => 'eLaunchDate'.$jurisAbbr,
                'options' => array(
                    'label' => 'Launch (Estimated)',
                ),
            ));

            $form->add(array(
                'type'  => 'Zend\Form\Element\Date',
                'name' => 'eRegulatorDate'.$jurisAbbr,
                'options' => array(
                    'label' => 'Regulator (Estimated)',
                ),
            ));

            // result

            $form->add(array(
                'type'  => 'Zend\Form\Element\Date',
                'name' => 'rSubmissionDate'.$jurisAbbr,
                'options' => array(
                    'label' => 'Submission (Result)',
                ),
            ));

            $form->add(array(
                'type'  => 'Zend\Form\Element\Date',
                'name' => 'rApprovalDate'.$jurisAbbr,
                'options' => array(
                    'label' => 'Approval (Result)',
                ),
            ));

            $form->add(array(
                'type'  => 'Zend\Form\Element\Date',
                'name' => 'rReleaseDate'.$jurisAbbr,
                'options' => array(
                    'label' => 'Master Release (Result)',
                ),
            ));

            $form->add(array(
                'type'  => 'Zend\Form\Element\Date',
                'name' => 'rLaunchDate'.$jurisAbbr,
                'options' => array(
                    'label' => 'Launch (Result)',
                ),
            ));

            $form->add(array(
                'type'  => 'Zend\Form\Element\Date',
                'name' => 'rRegulatorDate'.$jurisAbbr,
                'options' => array(
                    'label' => 'Regulator (Result)',
                ),
            ));
        }

        /*$subForm = new \Zend\Form\Form();
        $subForm->setName('subform');

        $subForm->add(array(
            'name' => 'email',
            'type' => 'Zend\Form\Element\Text',
        ));*/

        $request = $this->getRequest();

        if ($request->isPost()) {
            $form->setData($request->getPost());

            if ($form->isValid()) {
                //var_dump($product);
            }
        }

        $view = new ViewModel(array('form'=> $form, 'marketJurisdictions' => $marketJurisdictions));
        $view->setTemplate('GDI/Index2/productForm2.phtml'); // path to phtml file under view folder
        return $view;
    }


    public function addformAction()
    {

        $userForm = $this->getServiceLocator()->get('FormElementManager')->get('GDI\Form\TMarketProductForm');
        
        //$market = $this->getEntityManager()->find('GDI\Entity\MMarket', 1);

   
        //$tmarket = $this->getEntityManager()->find('GDI\Entity\TMarketProduct', 13);
        $tmarket = new TMarketProduct();

        /*$tmarket->setMarket($market);
        $this->getEntityManager()->persist($tmarket);
        $this->getEntityManager()->flush();
*/        
        //$tmarket->setProduct(new TProduct());
        $userForm->bind($tmarket);

        //var_dump($tmarket);exit;

        $request = $this->getRequest();


        if ($request->isPost()) {
            $postParams = $request->getPost()->toArray();
            

            $post = array_merge_recursive(
                $request->getPost()->toArray(),
                $request->getFiles()->toArray()
            );
            
            $userForm->setData($post);

            //$userForm->setData($post);

            if ($userForm->isValid()) {
                
                //var_dump($tmarket);
                var_dump('expression');
                var_dump('ok');
                //exit;
                
                $this->getEntityManager()->persist($tmarket);
                $this->getEntityManager()->flush();

            }
        }

        return array('form' => $userForm);
    }


}