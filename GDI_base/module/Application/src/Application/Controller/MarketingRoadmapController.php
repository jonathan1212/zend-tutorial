<?php 
namespace Application\Controller;

use Zend\View\Model\ViewModel;
use Zend\Mvc\Controller\AbstractActionController;

class MarketingRoadmapController extends AbstractActionController{

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
        $market = $this->getEntityManager()
            ->getRepository('GDI\Entity\MMarket')
            ->findBy(array(), array('marketName' => 'ASC')
        );

        $status = $this->getEntityManager()
            ->getRepository('GDI\Entity\MStatus')
            ->findBy(array(), array('statusId' => 'ASC')
        );

		return new ViewModel(array(
			'marketproductList'  => $marketproductList,
			'page'               => $this->page,
            'market'             => $market,
            'status'             => $status,
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