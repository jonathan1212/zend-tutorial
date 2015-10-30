<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use DoctrineORMModule\Form\Annotation\AnnotationBuilder;
use Application\Entity\User;
     
class IndexController extends AbstractActionController
{
	protected $_em;

	protected function getEm()
	{
		return $this->getServiceLocator()
            	->get('doctrine.entitymanager.orm_default');
	} 
    

    public function indexAction()
    {
    	
    	$data = $this->getEm()
    		->getRepository('Application\Entity\User')->findAll();

        foreach ($data as $key => $value) {
        	var_dump($value->getPlace());
        }

        exit;

        return new ViewModel();
    }

    public function addAction()
    {
        $userForm = $this->getServiceLocator()->get('FormElementManager')->get('Application\Form\UserForm');
       
    	$repository = $this->getEm()->getRepository('Application\Entity\User');
	    $id =  3; //(int)$this->params()->fromQuery('id');
	    $user = $repository->find($id);
    	//$user = new User();
        
        $request = $this->getRequest();
        
        $userForm->bind($user);

        var_dump($user);

        if ($request->isPost()) {

            $userForm->setData($request->getPost());

            if ($userForm->isValid()) {
                var_dump('expression');

                $this->getEm()->persist($user);
                $this->getEm()->flush();

                // Redirect to list of albums
                return $this->redirect()->toRoute('/application/index/add');
             }

        }
        //$builder = new AnnotationBuilder( $this->getEm() );
      	//$form = $builder->createForm( $user );
      	//$userForm->setHydrator(new DoctrineHydrator($this->getEm(),'Application\Entity\User'));
      	//$form->bind($user);

      	/*$view =  new ViewModel();
      	$view->setVariable('form',$form);*/

        return array('form' => $userForm);
    }

    public function addplaceAction()
    {
        $placeForm = $this->getServiceLocator()->get('FormElementManager')->get('Application\Form\PlaceForm');
        
        $repository = $this->getEm()->getRepository('Application\Entity\Place');
        $id =  1; //(int)$this->params()->fromQuery('id');
        $place = $repository->find($id);
        //$user = new User();
        
        $request = $this->getRequest();
        
        $placeForm->bind($place);

        var_dump($place);

        if ($request->isPost()) {

            $placeForm->setData($request->getPost());

            if ($placeForm->isValid()) {
                var_dump('expression');
                exit;
                var_dump($place);
                exit;
                //$this->getEm()->persist($place);
                //$this->getEm()->flush();

                // Redirect to list of albums
                return $this->redirect()->toRoute('/application/index/add');
             }

        }

        return array('form' => $placeForm);
    }
}
