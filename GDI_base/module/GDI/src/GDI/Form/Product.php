<?php

namespace GDI\Form;

class Product
{
    /**
     * custom variable which is related to TMarketProduct - TJurisdictionProduct
     * @var array
     *
     */
    protected $jurisdictionProducts;


    /**
     * @param array $jurisdictionProducts
     * @return $this
     */
    public function setJurisdictionProducts(array $jurisdictionProducts)
    {
        $this->jurisdictionProducts = $jurisdictionProducts;
        return $this;
    }

    /**
     * @return array
     */
    public function getJurisdictionProducts()
    {
        return $this->jurisdictionProducts;
    }

}