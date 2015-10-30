<?php

namespace GDI\Controller;

use GDI\Entity\MBranch;
use GDI\Entity\MGameCategory;
use GDI\Entity\MLanguage;
use GDI\Entity\TProduct;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use GDI\Model\RUserRoleModel;
use GDI\Model\MUserModel;
use GDI\Entity\RUserRole;
use GDI\Entity\MUser;
use GDI\Entity\MRole;

use Zend\Form\Annotation\AnnotationBuilder;
use DoctrineORMModule\Form\Annotation\AnnotationBuilder as DoctrineAnnotationBuilder;
use GDI\Entity\TMarketProduct;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

class IndexController extends AbstractActionController
{

    protected $em;

    public function getEntityManager()
    {
        if (null === $this->em) {
            $this->em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        }
        return $this->em;
    }

    public function indexAction()
    {
        $mBranch = new MBranch();
        $mBranch->setBranchAbbr('asdb');
        $mBranch->setBranchName('branch nasmesae');
        $mBranch->setCreateUserId(1);
        $mBranch->setCreateTime(new \DateTime());
        $mBranch->setUpdateUserId(1);

        $language = $this->getEntityManager()->find('GDI\Entity\MLanguage', 3);


        $mUser = new MUser();
        $mUser->setFirstName('jona');
        $mUser->setEmailAddress('testsd9e');
        $mUser->setLastName('antivo');
        $mUser->setPassword('jon');
        $mUser->setBranch($mBranch);
        $mUser->setLanguage($language);
        $mUser->setBranchId('12');
        $mUser->setCreateUserId(1);
        $mUser->setCreateTime(new \DateTime("now"));
        $mUser->setUpdateUserId(1);

        /*$mRole = new MRole();
        $mRole->setRoleName('test3');
        $mRole->setCreateUserId(1);
        $mRole->setCreateTime(new \DateTime('now'));
        $mRole->setUpdateUserId(1);


        $userRole = new RUserRole();
        $userRole->setRoleId(1);
        $userRole->setUser($mUser);
        $userRole->setRole($mRole);


        $mUser->getRUserRoleUserId()->add($userRole);
        $mRole->getMRoleRoleId()->add($userRole);*/

        $this->getEntityManager()->persist($mUser);
        //$this->getEntityManager()->persist($mRole);

        $this->getEntityManager()->flush();

    }

    public function getAction()
    {
        $userRole = $this->getEntityManager()->getRepository('GDI\Entity\RUserRole')->findAll();

        foreach($userRole as $each) {
            var_dump($each);
        }
        exit;
    }

    public function getMAction()
    {
        //$userRole = $this->getEntityManager()->getRepository('GDI\Entity\MUser')->findAll();
        $test = $this->getEntityManager()->getRepository('GDI\Entity\TMarketProduct')->getSimple();

        var_dump('asdf');
        var_dump($test);
        exit;
        /*foreach($userRole as $each) {
            var_dump($each);
        }
        exit;*/
    }


    public function addAction()
    {
        //$tMarketProduct = new TMarketProduct();
        //$tProduct = new TProduct();

        $tMarketProduct = $this->getEntityManager()->find('GDI\Entity\TMarketProduct', 20);
        $tProduct = $this->getEntityManager()->find('GDI\Entity\TProduct', 5);

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
        $form->setHydrator(new DoctrineHydrator($this->getEntityManager(),'GDI\Entity\TMarketProduct'));
        $form->bind($tMarketProduct);

        /*$form->get('market')->setOptions(
            array(
                'object_manager' => $this->getEntityManager(),
                'property'       => 'marketName',
            )
        );*/

        $storeOptions['find_method'] = array(
            'name'   => 'findBy',
            'params' => array(
                'criteria' => array(), // no criteria since I want the whole list
                'orderBy'  => array('marketName' => 'ASC'),
            ),
        );

        $form->get('market')->setOptions($storeOptions);
        //$form->get('isActive')->setOptions(array('continue_if_empty' => true));


        /*$gameCategormForm = $builder->createForm($mGameCategory);
        $gameCategormForm->setName('gameCategormForm');*/

        $tProductForm = $builder->createForm($tProduct);
        //$tProductForm->setName('productForm');

        $tProductForm->setHydrator(new DoctrineHydrator($this->getEntityManager(),'GDI\Entity\TProduct'));
        $tProductForm->bind($tProduct);

        $subForm = new \Zend\Form\Form();
        $subForm->setName('subform');

        $subForm->add(array(
            'name' => 'email',
            'type'  => 'Zend\Form\Element\Text',
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

        if ($request->isPost()){

            var_dump($form->getAttributes());

            //var_dump($tProductForm->getHydrator()->extract($tProduct));

            //var_dump($tProductForm->getAttributes());

            //exit;


            $tMarketProduct->setCreateUserId(1);
            $tMarketProduct->setCreateTime(new \DateTime());
            $tMarketProduct->setUpdateUserId(1);
            //$tMarketProduct->setMarketProductId(null);

            $product = $this->getEntityManager()->find('GDI\Entity\TProduct', 1);
            $tMarketProduct->setProduct($product);


            //tproduct
            //$tProduct->setControlId(1);
            //$tProduct->setEArtworkSpDate(date('Y-m-d'));
            //$tProduct->setEArtworkTrDate(date('Y-m-d'));
            //$tProduct->setCreateUserId(1);
            //$tProduct->setCreateTime(new \DateTime());
            $tProduct->setUpdateUserId(1);
            $tProduct->setUpdateTime(new \DateTime());


            var_dump($request->getPost());
            //var_dump($form->get('productForm'));
            //exit
            //$form->remove('productForm');


            //$productFormClone = clone($tProductForm);
            //$form->remove('productForm');

            //$form->setInputFilter($tMarketProduct);
            $form->setData($request->getPost());
            $tProductForm->setData($request->getPost());


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

            if ($form->isValid() && $tProductForm->isValid()){
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


                $tProduct->setCreateUserId(1);
                $tProduct->setCreateTime(new \DateTime());

                $this->getEntityManager()->persist($tProductForm->getData());
                $this->getEntityManager()->flush();

                $tMarketProduct->setProduct($tProduct);
                $this->getEntityManager()->persist($form->getData());
                $this->getEntityManager()->flush();

                //var_dump($tProduct);

            }else {
            }
        }
        return array('form'=>$form , 'tProductForm' => $tProductForm);
    }


    public function editAction()
    {
        //$tMarketProduct = new TMarketProduct();
        //$mGameCategory = new MGameCategory();

        //$tMarketProduct = $this->getEntityManager()->find('GDI\Entity\TMarketProduct', 1);
        $tMarketProduct = $this->getEntityManager()->find('GDI\Entity\TMarketProduct', 8);

        //var_dump($tMarketProduct);

        //$builder = new AnnotationBuilder();
        $builder = new DoctrineAnnotationBuilder($this->getEntityManager());


        $form = $builder->createForm($tMarketProduct);
        $form->bind($tMarketProduct);

        foreach ($form->getElements() as $element) {
            if (method_exists($element, 'getProxy')) {
                $proxy = $element->getProxy();
                if (method_exists($proxy, 'setObjectManager')) {
                    $proxy->setObjectManager($this->getEntityManager());
                }
            }
        }

        $form->setHydrator(new DoctrineHydrator($this->getEntityManager(),'GDI\Entity\TMarketProduct'));

        $storeOptions['find_method'] = array(
            'name'   => 'findBy',
            'params' => array(
                'criteria' => array(), // no criteria since I want the whole list
                'orderBy'  => array('marketName' => 'ASC'),
            ),
        );

        $form->get('market')->setOptions($storeOptions);


        /*$gameCategormForm = $builder->createForm($mGameCategory);

        $gameCategormForm->setName('gameCategormForm');


        $subForm = new \Zend\Form\Form();
        $subForm->setName('subform');

        $subForm->add(array(
            'name' => 'email',
            'type'  => 'Zend\Form\Element\Text',
        ));


        $form->add($gameCategormForm);
        $form->add($subForm);*/


        $request = $this->getRequest();
        if ($request->isPost()){

            $form->bind($tMarketProduct);
            $form->setData($request->getPost());
            if ($form->isValid()){
                var_dump('asdf');
                var_dump($form->getData());

                $this->getEntityManager()->persist($tMarketProduct);
                $this->getEntityManager()->flush();

            }else {
            }
        }
        return array('form'=>$form);

    }

    public function productAction()
    {
        $tMarketProduct = new TMarketProduct();

        $tMarketProduct->setCreateUserId(1);
        $tMarketProduct->setGvn('test');
        $tMarketProduct->setTitle('title');
        $tMarketProduct->setPlatformId(1);

        $tMarketProduct->setCreateTime(new \DateTime());
        $tMarketProduct->setUpdateUserId(1);


        var_dump($tMarketProduct);

        $this->getEntityManager()->persist($tMarketProduct);
        $this->getEntityManager()->flush();
        exit;
    }


    public function addproductAction()
    {
        $tProduct = new TProduct();
        $builder = new DoctrineAnnotationBuilder($this->getEntityManager());


        //$form = $builder->createForm($tProduct);


        /*foreach ($form->getElements() as $element) {
            if (method_exists($element, 'getProxy')) {
                $proxy = $element->getProxy();
                if (method_exists($proxy, 'setObjectManager')) {
                    $proxy->setObjectManager($this->getEntityManager());
                }
            }
        }*/
        //$form->setHydrator(new DoctrineHydrator($this->getEntityManager(),'GDI\Entity\TMarketProduct'));

        //$form->bind($tMarketProduct);

       /* $storeOptions['find_method'] = array(
            'name'   => 'findBy',
            'params' => array(
                'criteria' => array(), // no criteria since I want the whole list
                'orderBy'  => array('marketName' => 'ASC'),
            ),
        );*/

        //$form->get('market')->setOptions($storeOptions);

        $tProductForm = $builder->createForm($tProduct);
        //$tProductForm->setName('productForm');


        //$tProductForm->add($tProductForm);

        $request = $this->getRequest();

        var_dump($request->getPost());


        return array('form' => $tProductForm);
    }



}

