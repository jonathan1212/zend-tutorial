<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\View\Model\ViewModel;
use Zend\Mvc\Controller\AbstractActionController;
use Application\Storage\IdentityManagerInterface;

class ApprovedPublicationController extends AbstractActionController{
	
	
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
    	//$id = $this->getPar
       	//$user_info =  $this->authPlugin()->getUserInfo();
		
 		$id = $this->params()->fromRoute('id', 1);
		
		$marketProduct = $this->getEntityManager()->getRepository('GDI\Entity\TMarketProduct')->find($id);
        
        $inputTab = $this->getEntityManager()->getRepository('GDI\Entity\InputProductTab')->findOneBy(array('market_product_id' => $id));

		return new ViewModel(array('marketProduct'=> $marketProduct, 'inputTab' => $inputTab));
    }
}