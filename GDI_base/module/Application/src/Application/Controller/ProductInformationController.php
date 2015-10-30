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

class ProductInformationController extends AbstractActionController{
	
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

        $status = $this->getEntityManager()
            ->getRepository('GDI\Entity\MStatus')
            ->findBy(array(), array('statusId' => 'ASC')
        );

		return new ViewModel(array(
			'marketproductList'  => $marketproductList,
			'page'               => $this->page,
            'platform'           => $platform,
            'category'           => $category,
            'market'             => $market,
            'status'             => $status,
            'getEntityManager'   => $this->getEntityManager()
		));
    }

    public function detailAction()
    {
        $id = $this->params()->fromRoute('id', 1);
        
        $marketProduct = $this->getEntityManager()
            ->getRepository('GDI\Entity\TMarketProduct')
            ->find($id);
        
        /*$marketJurisdictions = $this->getEntityManager()
            ->getRepository('GDI\Entity\RMarketJurisdiction')
            ->findByMarket($marketProduct->getMarket()->getMarketId());*/

        $jurisdictionProduct = $marketProduct->getTJurisdictionProductMarketProduct();

        $approvalStatus = array();
        $avail_abbrs = array();
        $criterion = '';

        foreach ($jurisdictionProduct as $key => $jp) {
            
            $abbr = $jp->getJurisdiction()->getJurisdictionAbbr();
            
            if ($marketProduct->getMarket()->getCriterionJurisdictionId() == $jp->getJurisdictionId() ) {
                $criterion = $abbr;
            }

            $approvalStatus['Submission'][$abbr] = $jp->getSubmissionStatus();
            $approvalStatus['Regulator'][$abbr] = $jp->getRegulatorStatus();
            $approvalStatus['Approval'][$abbr] = $jp->getApprovalStatus();
            $approvalStatus['Master Release'][$abbr] = $jp->getReleaseStatus();
            $approvalStatus['Launch'][$abbr] = $jp->getLaunchStatus();
            
            $avail_abbrs[$abbr] = $abbr;
        }

        return new ViewModel(array(
            'marketProduct'=> $marketProduct,
            'getOptionGvn' => $this->getOptionGvn(),
            //'marketJurisdictions' => $marketJurisdictions,
            'approvalStatus' => $approvalStatus,
            'avail_abbrs' => $avail_abbrs,
            'criterion' => $criterion
        ));  

    }


    protected function criteria()
    {
    	$this->page = $this->params()->fromQuery('page', 1);
        $this->limit = 10;
        $this->offset = ($this->page == 0) ? 0 : ($this->page - 1) * $this->limit;
    	
    }

    private function getOptionGvn()
    {
        $dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
        
        $sql       = 'SELECT market_product_id,gvn FROM t_market_product ORDER BY gvn ASC';
        $statement = $dbAdapter->query($sql);
        $result    = $statement->execute();

        $selectData = array();

        foreach ($result as $res) {
            $selectData[$res['market_product_id']] = $res['gvn'];
        }
        return $selectData;
    }
}
