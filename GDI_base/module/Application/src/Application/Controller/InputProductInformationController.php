<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use GDI\Entity\InputProductTab;
use GDI\Entity\TJurisdictionProduct;
use GDI\Entity\TProduct;
use GDI\Form\Product;
use GDI\Util\Navigation;
use Zend\InputFilter\InputFilter;
use Zend\Stdlib\Hydrator\Aggregate\AggregateHydrator;
use Zend\View\Model\JsonModel;
use Zend\View\Model\ViewModel;
use Zend\Mvc\Controller\AbstractActionController;
use Application\Storage\IdentityManagerInterface;

use DoctrineORMModule\Form\Annotation\AnnotationBuilder as DoctrineAnnotationBuilder;
use GDI\Entity\TMarketProduct;
use Zend\Stdlib\Hydrator\ClassMethods as ClassMethodsHydrator;

use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;


class InputProductInformationController extends AbstractActionController{
	
	
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
        $user_info =  $this->authPlugin()->getUserInfo();
		//return new ViewModel(array('userInfo'=>$user_info));

        $tab_id = $this->params()->fromRoute('id', 0);
        $controlno = $this->params()->fromQuery('controlno');
        $tabno = $this->params()->fromQuery('tabno',1);

        $input_tab = $this->getEntityManager()->getRepository('GDI\Entity\InputProductTab')->find($tab_id);


        if (!is_null($input_tab) && !is_null($input_tab->getMarketProductId())) {
            $tMarketProduct = $this->getEntityManager()->getRepository('GDI\Entity\TMarketProduct')->find($input_tab->getMarketProductId());
            $isNew = false;
        
        } else {
            $tMarketProduct = new TMarketProduct();
            $isNew = true;
        }

        //$repository = $this->getEntityManager()->getRepository('GDI\Entity\TProduct');
        //$filter = $repository->getInputFilter();
        //$filter->add($tMarketProduct->getInputFilter());

        //$builder = new DoctrineAnnotationBuilder($this->getEntityManager());
        $form = $this->getServiceLocator()->get('FormElementManager')->get('GDI\Form\TMarketProductForm');

        //$form = $builder->createForm($tMarketProduct);

       
        //$form->setAttribute('class','form-horizontal');

        /*foreach ($form->getElements() as $element) {
            if (method_exists($element, 'getProxy')) {
                $proxy = $element->getProxy();
                if (method_exists($proxy, 'setObjectManager')) {
                    $proxy->setObjectManager($this->getEntityManager());
                }
            }
        }*/
        //new AggregateHydrator()
        /*$hydrator = new AggregateHydrator(array(
            'GDI\Entity\TMarketProduct'       => new TMarketProduct(),
            'GDI\Entity\TProduct'    => new TProduct(),
        ));

        var_dump($hydrator);

        exit;*/
        //$form->setHydrator(new DoctrineHydrator($this->getEntityManager(), 'GDI\Entity\TMarketProduct'));
        $form->bind($tMarketProduct);


        /*$storeOptions['find_method'] = array(
            'name' => 'findBy',
            'params' => array(
                'criteria' => array(), // no criteria since I want the whole list
                'orderBy' => array('marketName' => 'ASC'),
            ),
        );*/

        //$form->get('market')->setOptions($storeOptions);

        if (!$isNew) {
            $product = $tMarketProduct->getProduct();
            //$form->get('product')->get('controlId')->setAttributes(array('value'=> $product->getControlId() ));
            /*$form->get('product')->get('eArtworkSpDate')->setAttributes(array('value'=> $product->getEArtworkSpDate() ));
            $form->get('product')->get('eGslickDate')->setAttributes(array('value'=> $product->getEGslickDate() ));
            $form->get('product')->get('eDemoDate')->setAttributes(array('value'=> $product->getEDemoDate() ));
            $form->get('product')->get('eMovieDate')->setAttributes(array('value'=> $product->getEMovieDate() ));

            $form->get('product')->get('eArtworkTrDate')->setAttributes(array('value'=> $product->getEArtworkTrDate() ));
            $form->get('product')->get('eWebsiteDate')->setAttributes(array('value'=> $product->getEWebsiteDate() ));
            $form->get('product')->get('rArtworkSpDate')->setAttributes(array('value'=> $product->getRArtworkSpDate() ));
            $form->get('product')->get('rGslickDate')->setAttributes(array('value'=> $product->getRGslickDate() ));
            
            $form->get('product')->get('rDemoDate')->setAttributes(array('value'=> $product->getRDemoDate() ));
            $form->get('product')->get('rMovieDate')->setAttributes(array('value'=> $product->getRMovieDate() ));
            $form->get('product')->get('rArtworkTrDate')->setAttributes(array('value'=> $product->getRArtworkTrDate() ));
            $form->get('product')->get('rWebsiteDate')->setAttributes(array('value'=> $product->getRWebsiteDate() ));
            $form->get('product')->get('isReturnDemo')->setAttributes(array('value'=> $product->getIsReturnDemo() ));*/
        }

        $form->get('product')->get('controlId')->setAttributes(array('value'=> $controlno ));


        $request = $this->getRequest();


        if ($request->isPost()) {
        	$postParams = $request->getPost()->toArray();
        	
        	//temporary
        	$tMarketProduct->setCreateUserId($user_info['user_id']);
            $tMarketProduct->setUpdateUserId($user_info['user_id']);
			$tMarketProduct->setCreateTime(new \DateTime());
            

            $post = array_merge_recursive(
                $request->getPost()->toArray(),
                $request->getFiles()->toArray()
            );
            /*$post['product']['product'] = 28;
            $post['product']['id'] = 28;
            $post['product']['product_id'] = 28;*/
            //$post['product']['productId'] = 28;

            $controlid = $post['product']['controlId'];
            $post['product']['controlId'] = $controlid.'-0'.$tabno;

            /*$img = $tMarketProduct->getProduct()->getGameImagePass();
            if ($img) {
                $post['product']['gameImagePass'] = $img;
            } else {
                unset($post['product']['gameImagePass']);
            }*/

            if (!$isNew) {
                $image = $post['product']['gameImagePass'];
                if (!$image) {
                    unset($post['product']['gameImagePass']);
                }
            }
            $form->setData($post);

            /*var_dump($tMarketProduct->getProduct());
            exit;*/
            //var_dump($tMarketProduct->getProduct());
            //var_dump($tMarketProduct->getProduct()->getProductId());
            if ($form->isValid()) {
                //var_dump($tMarketProduct->getProduct()->getProductId());
                //exit;
                //$form->setHydrator(new DoctrineHydrator($this->getEntityManager(), 'GDI\Entity\TMarketProduct'));
                //$form->bind($tMarketProduct);
                
                
                /*if ($isNew) {
                    //$tMarketProduct->getProduct()->setControlId();
                    $controlid = $post['product']['controlId'];
                    $post['product']['controlId'] = $controlid.'-0'.$tabno;
                } else {
                    unset($post['product']['controlId']);
                }*/
                
                /*$controlid = $post['product']['controlId'];
                $post['product']['controlId'] = $controlid.'-0'.$tabno;*/

                //$hydrator = new DoctrineHydrator($this->getEntityManager());
                //$tMarketProduct = $hydrator->hydrate($post, $tMarketProduct);


                $this->getEntityManager()->persist($tMarketProduct); //$form->getData()
                $this->getEntityManager()->flush();
                
                //get market_product criterionjurisdictionId
                $criterion_jurisId = $tMarketProduct->getMarket()->getCriterionJurisdictionId();

                //saving jurisdiction product
		        if ($postParams['jurs_prod']) {
	            	
	            	$marketJurisdictions = $this->getEntityManager()->getRepository('GDI\Entity\RMarketJurisdiction')->findByMarket($postParams['market']);

                    foreach ($marketJurisdictions as $key => $marketJurisdiction) {
	            		$jurisAbbr = $marketJurisdiction->getJurisdiction()->getJurisdictionAbbr();

	            		$hydrator = new DoctrineHydrator($this->getEntityManager());
		            	
                        $jurisProduct = $this->getEntityManager()->getRepository('GDI\Entity\TJurisdictionProduct')->findOneBy(array('marketProduct' => $tMarketProduct->getMarketProductId(), 'jurisdiction' =>  $marketJurisdiction->getJurisdiction()->getJurisdictionId() ));
                        
                        if (is_null($jurisProduct)) 
                            $jurisProduct = new TJurisdictionProduct();
	
    	            	$jurisProductHydrate = $hydrator->hydrate($postParams['jurs_prod'][$jurisAbbr], $jurisProduct);

		            	$jurisProduct->setMarketProduct($tMarketProduct);
                        $jurisProduct->setJurisdiction($marketJurisdiction->getJurisdiction());

                        //status
                        $status = $this->getEntityManager()->find('GDI\Entity\MStatus', $jurisProduct->getJurisProductStatus());
                        $jurisProduct->setStatus($status);

		            	//temporary
			        	$jurisProduct->setCreateUserId($user_info['user_id']);
			            $jurisProduct->setUpdateUserId($user_info['user_id']);
			            $jurisProduct->setCreateTime(new \DateTime());

		            	$this->getEntityManager()->persist($jurisProduct);
	                	$this->getEntityManager()->flush();

                        //update marketproduct
                        if ($criterion_jurisId == $jurisProduct->getJurisdictionId()) {
                            $tMarketProduct->setJurisdictionProductId($jurisProduct->getJurisdictionProductId());
                            $this->getEntityManager()->persist($tMarketProduct);
                            $this->getEntityManager()->flush();
                        }
	            	}
	            }

                if ($isNew) {
                    //save tab

                    $controlid = substr($tMarketProduct->getProduct()->getControlId(), 0, strrpos($tMarketProduct->getProduct()->getControlId(), "-"));
        
                    // group users by criteria, order, limit, offset.
                    $inputproduct_tab = $this->getEntityManager()->getRepository('GDI\Entity\InputProductTab')->findBy(
                        array('control_no' => $controlid), array('tab_no' => 'DESC'), 1
                    );

                    //update market product
                   /* $tabno = '-01'; 
                    if (!empty($inputproduct_tab)) {
                        $tabno = '-0'.$inputproduct_tab[0]->getTabNo() + 1;
                    }

                    $tMarketProduct->getProduct()->setControlId($controlid.$tabno);
                    $this->getEntityManager()->flush();*/


                    if (empty($inputproduct_tab)) {
                        $inputproduct_tab = new InputProductTab();
                        $inputproduct_tab->setControlNo($controlid);
                        $inputproduct_tab->setMarketProductId($tMarketProduct->getMarketProductId());
                        $inputproduct_tab->setProductId($tMarketProduct->getProduct()->getProductId());
                        $inputproduct_tab->setTabNo(1);

                        $this->getEntityManager()->persist($inputproduct_tab);
                        $this->getEntityManager()->flush();

                        $this->flashMessenger()->addSuccessMessage("Successfully Saved");
                        return $this->redirect()->toUrl('/input-product-information/'.$inputproduct_tab->getId().'?controlno='.$inputproduct_tab->getControlNo().'&tabno='.$tabno);
                    }

                    //update tab
                    $this->updateInpuTabValues($input_tab,$tMarketProduct);

                }

                //successful
                //
                $this->flashMessenger()->addSuccessMessage("Successfully Saved");
                return $this->redirect()->toUrl('/input-product-information/'.$tab_id.'?controlno='.$controlno.'&tabno='.$tabno);

            } else {
            }
        }
        
        $this->getTabs();

        return array('form' => $form, 'userInfo' => $user_info, 'nav'=> $this->nav, 'tMarketProduct' => $tMarketProduct);

    }

    public function createtabAction()
    {
        $controlno = $this->params()->fromQuery('controlno', 0);

        $inputproduct_tab = $this->getEntityManager()->getRepository('GDI\Entity\InputProductTab')->findBy(
            array('control_no' => $controlno), array('tab_no' => 'DESC'), 1
        );

        if ($inputproduct_tab) {
            $tabno = $inputproduct_tab[0]->getTabNo() + 1;
            $inputproduct = new InputProductTab();
            $inputproduct->setControlNo($controlno);
            $inputproduct->setTabNo($tabno);

            $this->getEntityManager()->persist($inputproduct);
            $this->getEntityManager()->flush();
            
            return $this->redirect()->toUrl('/input-product-information/'.$inputproduct->getId().'?controlno='.$inputproduct->getControlNo().'&tabno='.$tabno);
        }

        return $this->redirect()->toRoute('input-product-information');

    }


    public function getjurisdictionproductformAction()
    {

    	//$response = new \Zend\Http\Response();
    	//$response->getHeaders()->addHeaderLine('Content-Type', 'text/xml; charset=utf-8');
    	//$response->setContent($xml);

    	$marketid = (int) $this->params()->fromQuery('marketid', 0);
        $marketproductId = (int) $this->params()->fromQuery('marketproductId', 0);
            	
    	$form = new \Zend\Form\Form();
        $marketJurisdictions = $this->getEntityManager()->getRepository('GDI\Entity\RMarketJurisdiction')->findByMarket($marketid);

        foreach ($marketJurisdictions as $key => $marketJurisdiction) {

            $jurisAbbr = $marketJurisdiction->getJurisdiction()->getJurisdictionAbbr();

            //$form->setHydrator(new DoctrineHydrator($this->getEntityManager(), 'GDI\Entity\TJurisdictionProduct'));
            
            $jurisdictionProduct = $this->getEntityManager()->getRepository('GDI\Entity\TJurisdictionProduct')->findOneBy(array('marketProduct' => $marketproductId, 'jurisdiction' =>  $marketJurisdiction->getJurisdiction()->getJurisdictionId() ));
            
            //var_dump($jurisdictionProduct->getRSubmissionDate());
            //exit;
            //var_dump($jurisdictionProduct);
            
            //$form->bind($jurisdictionProduct);

            $form->setName('jurisdictionProduct');

            $form->add(array(
                'type'  => 'Zend\Form\Element\Date',
                'name' => "jurs_prod[$jurisAbbr][eSubmissionDate]",
                'options' => array(
                    'label' => 'Submission (Estimated)',
                ),
                'attributes' => array(
                    'value' => is_null($jurisdictionProduct) ? "" : $jurisdictionProduct->getESubmissionDate(),
                	'class' => 'form-control',
                ),
            ));

            $form->add(array(
                'type'  => 'Zend\Form\Element\Date',
                'name' => "jurs_prod[$jurisAbbr][eApprovalDate]",
                'options' => array(
                    'label' => 'Approval (Estimated)',
                ),
                'attributes' => array(
                    'value' => is_null($jurisdictionProduct) ? "" : $jurisdictionProduct->getEApprovalDate(),
                	'class' => 'form-control',
                ),
            ));

            $form->add(array(
                'type'  => 'Zend\Form\Element\Date',
                'name' => "jurs_prod[$jurisAbbr][eReleaseDate]",
                'options' => array(
                    'label' => 'Master Release (Estimated)',
                ),
                'attributes' => array(
                    'value' => is_null($jurisdictionProduct) ? "" : $jurisdictionProduct->getEReleaseDate(),
                	'class' => 'form-control',
                ),
            ));

            $form->add(array(
                'type'  => 'Zend\Form\Element\Date',
                'name' => "jurs_prod[$jurisAbbr][eLaunchDate]",
                'options' => array(
                    'label' => 'Launch (Estimated)',
                ),
                'attributes' => array(
                    'value' => is_null($jurisdictionProduct) ? "" : $jurisdictionProduct->getELaunchDate(),
                	'class' => 'form-control',
                ),
            ));

            $form->add(array(
                'type'  => 'Zend\Form\Element\Date',
                'name' => "jurs_prod[$jurisAbbr][eRegulatorDate]",
                'options' => array(
                    'label' => 'Regulator (Estimated)',
                ),
                'attributes' => array(
                    'value' => is_null($jurisdictionProduct) ? "" : $jurisdictionProduct->getERegulatorDate(),
                	'class' => 'form-control',
                ),
            ));

            // result

            $form->add(array(
                'type'  => 'Zend\Form\Element\Date',
                'name' => "jurs_prod[$jurisAbbr][rSubmissionDate]",
                'options' => array(
                    'label' => 'Submission (Result)',
                ),
                'attributes' => array(
                    'value' => is_null($jurisdictionProduct) ? "" : $jurisdictionProduct->getRSubmissionDate(),
                	'class' => 'form-control',
                ),
            ));

            $form->add(array(
                'type'  => 'Zend\Form\Element\Date',
                'name' => "jurs_prod[$jurisAbbr][rApprovalDate]",
                'options' => array(
                    'label' => 'Approval (Result)',
                ),
                'attributes' => array(
                    'value' => is_null($jurisdictionProduct) ? "" : $jurisdictionProduct->getRApprovalDate(),
                	'class' => 'form-control',
                ),
            ));

            $form->add(array(
                'type'  => 'Zend\Form\Element\Date',
                'name' => "jurs_prod[$jurisAbbr][rReleaseDate]",
                'options' => array(
                    'label' => 'Master Release (Result)',
                ),
                'attributes' => array(
                    'value' => is_null($jurisdictionProduct) ? "" : $jurisdictionProduct->getRReleaseDate(),
                	'class' => 'form-control',
                ),
            ));

            $form->add(array(
                'type'  => 'Zend\Form\Element\Date',
                'name' => "jurs_prod[$jurisAbbr][rLaunchDate]",
                'options' => array(
                    'label' => 'Launch (Result)',
                ),
                'attributes' => array(
                    'value' => is_null($jurisdictionProduct) ? "" : $jurisdictionProduct->getRLaunchDate(),
                	'class' => 'form-control',
                ),
            ));

            $form->add(array(
                'type'  => 'Zend\Form\Element\Date',
                'name' => "jurs_prod[$jurisAbbr][rRegulatorDate]",
                'options' => array(
                    'label' => 'Regulator (Result)',
                ),
                'attributes' => array(
                    'value' => is_null($jurisdictionProduct) ? "" : $jurisdictionProduct->getRRegulatorDate(),
                	'class' => 'form-control',
                ),
            ));
            
            /*if ($key>0) {
                var_dump($key);
                break;
            }*/

        }

       

        $request = $this->getRequest();

        if ($request->isPost()) {
            $form->setData($request->getPost());

            if ($form->isValid()) {
                //var_dump($product);
            }
        }

        $view = new JsonModel(array('form'=> $form, 'marketJurisdictions' => $marketJurisdictions));
        //$view->setTemplate('Application/InputProductInformation/jurisdictionproductform.phtml'); // path to phtml file under view folder
        $view->setTemplate('GDI/Index2/jurisdictionproductform.phtml'); // path to phtml file under view folder
        
        return $view;
    }

    protected function getTabs()
    {
        $tab_id = $this->params()->fromRoute('id', 0);
        $controlno = $this->params()->fromQuery('controlno', 0);

        $tabs = $this->getEntityManager()->getRepository('GDI\Entity\InputProductTab')->findBy(
            array('control_no' => $controlno), array('tab_no' => 'ASC')
        );

        $nav = array();

        foreach ($tabs as $key => $tab) {

            $all = new Navigation();
            $all->setUrl('/input-product-information/'.$tab->getId().'?controlno='.$controlno.'&tabno='.$tab->getTabNo());
            $all->setTitle($tab->getControlNo() .'-0'.$tab->getTabNo());
            $all->setHighlighted($tab->getId() == $tab_id);
            $nav[] = $all;

        }

        $this->nav = $nav;

    }


    protected function updateInpuTabValues($inputTab, $tMarketProduct)
    {
        $tab_id = $this->params()->fromRoute('id', 0);
        $controlno = $this->params()->fromQuery('controlno', 0);

        if (!is_null($inputTab)) {

            $inputTab->setMarketProductId($tMarketProduct->getMarketProductId());
            $inputTab->setProductId($tMarketProduct->getProduct()->getProductId());

            $this->getEntityManager()->persist($inputTab);
            $this->getEntityManager()->flush();
        }
       
    }



    //protected function 
}