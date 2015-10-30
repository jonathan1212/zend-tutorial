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

class IndexController extends AbstractActionController{
	
    protected $em;

    protected function getEntityManager()
    {
        if (null === $this->em) {
            $this->em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        }
        return $this->em;
    }

    public function indexAction()
    {
    	//$user_info =  $this->authPlugin()->getUserInfo();
        //return new ViewModel(array('userInfo'=>$user_info));

        $params = $this->getRequest()->getQuery();

        $this->criteria();
    	
        $params['limit']   = $this->limit;
        $params['offset']  = $this->offset;
        
        if ( isset($params['title']) )
            $marketproductList = $this->getEntityManager()->getRepository('GDI\Entity\TMarketProduct')->filterMarketProduct($params);
        else {
            $marketproductList = $this->getEntityManager()->getRepository('GDI\Entity\TMarketProduct')->getSimple($this->offset,$this->limit);
        }
        
        //select box
        $platform = $this->getEntityManager()
            ->getRepository('GDI\Entity\MPlatform')
            ->findBy(array(), array('platformName' => 'ASC')
        );

        $category = $this->getEntityManager()
            ->getRepository('GDI\Entity\MGameCategory')
            ->findBy(array(), array('gameCategoryName' => 'ASC')
        );

        $market = $this->getEntityManager()
            ->getRepository('GDI\Entity\MMarket')
            ->findBy(array(), array('marketName' => 'ASC')
        );

        $branch = $this->getEntityManager()
            ->getRepository('GDI\Entity\MBranch')
            ->findBy(array(), array('branchName' => 'ASC')
        );

		return new ViewModel(array(
			'marketproductList'  => $marketproductList,
			'page'               => $this->page,
            'platform'           => $platform,
            'category'           => $category,
            'market'             => $market,
            'branch'             => $branch,
            'getEntityManager'   => $this->getEntityManager()
		));
    }

    protected function criteria()
    {
    	$this->page = $this->params()->fromQuery('page', 1);
        $this->limit = 10;
        $this->offset = ($this->page == 0) ? 0 : ($this->page - 1) * $this->limit;
    	
    }
}
