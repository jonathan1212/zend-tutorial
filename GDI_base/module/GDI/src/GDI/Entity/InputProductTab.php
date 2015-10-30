<?php

namespace GDI\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * HProduct
 *
 * @ORM\Table(name="input_product_tab")
 * @ORM\Entity(repositoryClass="GDI\Repository\InputProductTabRepository")
 * @ORM\HasLifecycleCallbacks()
 *
 * @author Jonathan Antivo
 * @since oct 12, 2015
 */
class InputProductTab
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="control_no", type="string", length=30, nullable=true)
     */
    protected $control_no;

    /**
     * @var integer
     *
     * @ORM\Column(name="tab_no", type="integer", nullable=true)
     */
    protected $tab_no;

    /**
     * @var integer
     *
     * @ORM\Column(name="product_id", type="integer", nullable=true)
     */
    protected $product_id;

    /**
     * @var integer
     *
     * @ORM\Column(name="market_product_id", type="integer", nullable=true)
     */
    protected $market_product_id;


    /**
     * ORM\ManyToOne(targetEntity="GDI\Entity\TProduct", inversedBy="inputTabProductID")
     * ORM\JoinColumn(name="product_id", referencedColumnName="product_id", nullable=true)
     * ORM\ManyToOne(targetEntity="GDI\Entity\TMarketProduct",inversedBy="inputTabMarketProductID")
     * ORM\JoinColumn(name="market_product_id", referencedColumnName="market_product_id", nullable=true)
     *
     */




    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set controlNo
     *
     * @param string $controlNo
     *
     * @return InputProductTab
     */
    public function setControlNo($controlNo)
    {
        $this->control_no = $controlNo;

        return $this;
    }

    /**
     * Get controlNo
     *
     * @return string
     */
    public function getControlNo()
    {
        return $this->control_no;
    }

    /**
     * Set tabNo
     *
     * @param integer $tabNo
     *
     * @return InputProductTab
     */
    public function setTabNo($tabNo)
    {
        $this->tab_no = $tabNo;

        return $this;
    }

    /**
     * Get tabNo
     *
     * @return integer
     */
    public function getTabNo()
    {
        return $this->tab_no;
    }

    /**
     * Set productId
     *
     * @param \GDI\Entity\TProduct $productId
     *
     * @return InputProductTab
     */
    public function setProductId($productId = null)
    {
        $this->product_id = $productId;

        return $this;
    }

    /**
     * Get productId
     *
     * @return \GDI\Entity\TProduct
     */
    public function getProductId()
    {
        return $this->product_id;
    }

    /**
     * Set marketProductId
     *
     * @param \GDI\Entity\TMarketProduct $marketProductId
     *
     * @return InputProductTab
     */
    public function setMarketProductId($marketProductId = null)
    {
        $this->market_product_id = $marketProductId;

        return $this;
    }

    /**
     * Get marketProductId
     *
     * @return \GDI\Entity\TMarketProduct
     */
    public function getMarketProductId()
    {
        return $this->market_product_id;
    }
}
