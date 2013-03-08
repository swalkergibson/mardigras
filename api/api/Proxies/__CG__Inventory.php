<?php

namespace Proxies\__CG__;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class Inventory extends \Inventory implements \Doctrine\ORM\Proxy\Proxy
{
    private $_entityPersister;
    private $_identifier;
    public $__isInitialized__ = false;
    public function __construct($entityPersister, $identifier)
    {
        $this->_entityPersister = $entityPersister;
        $this->_identifier = $identifier;
    }
    /** @private */
    public function __load()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;

            if (method_exists($this, "__wakeup")) {
                // call this after __isInitialized__to avoid infinite recursion
                // but before loading to emulate what ClassMetadata::newInstance()
                // provides.
                $this->__wakeup();
            }

            if ($this->_entityPersister->load($this->_identifier, $this) === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            unset($this->_entityPersister, $this->_identifier);
        }
    }

    /** @private */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int) $this->_identifier["id"];
        }
        $this->__load();
        return parent::getId();
    }

    public function setSku($sku)
    {
        $this->__load();
        return parent::setSku($sku);
    }

    public function getSku()
    {
        $this->__load();
        return parent::getSku();
    }

    public function setDescription($description)
    {
        $this->__load();
        return parent::setDescription($description);
    }

    public function getDescription()
    {
        $this->__load();
        return parent::getDescription();
    }

    public function setQty($qty)
    {
        $this->__load();
        return parent::setQty($qty);
    }

    public function getQty()
    {
        $this->__load();
        return parent::getQty();
    }

    public function setLastCost($lastCost)
    {
        $this->__load();
        return parent::setLastCost($lastCost);
    }

    public function getLastCost()
    {
        $this->__load();
        return parent::getLastCost();
    }

    public function setPrice($price)
    {
        $this->__load();
        return parent::setPrice($price);
    }

    public function getPrice()
    {
        $this->__load();
        return parent::getPrice();
    }

    public function setVendorStock($vendorStock)
    {
        $this->__load();
        return parent::setVendorStock($vendorStock);
    }

    public function getVendorStock()
    {
        $this->__load();
        return parent::getVendorStock();
    }

    public function setSizeId($sizeId)
    {
        $this->__load();
        return parent::setSizeId($sizeId);
    }

    public function getSizeId()
    {
        $this->__load();
        return parent::getSizeId();
    }

    public function setMinQty($minQty)
    {
        $this->__load();
        return parent::setMinQty($minQty);
    }

    public function getMinQty()
    {
        $this->__load();
        return parent::getMinQty();
    }

    public function setDoNotOrder($doNotOrder)
    {
        $this->__load();
        return parent::setDoNotOrder($doNotOrder);
    }

    public function getDoNotOrder()
    {
        $this->__load();
        return parent::getDoNotOrder();
    }

    public function setOnline($online)
    {
        $this->__load();
        return parent::setOnline($online);
    }

    public function getOnline()
    {
        $this->__load();
        return parent::getOnline();
    }

    public function setVendor(\Vendors $vendor)
    {
        $this->__load();
        return parent::setVendor($vendor);
    }

    public function getVendor()
    {
        $this->__load();
        return parent::getVendor();
    }

    public function setCategory(\Category $category)
    {
        $this->__load();
        return parent::setCategory($category);
    }

    public function getCategory()
    {
        $this->__load();
        return parent::getCategory();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'sku', 'description', 'qty', 'lastCost', 'price', 'vendorStock', 'sizeId', 'minQty', 'doNotOrder', 'online', 'vendor', 'category');
    }

    public function __clone()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;
            $class = $this->_entityPersister->getClassMetadata();
            $original = $this->_entityPersister->load($this->_identifier);
            if ($original === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            foreach ($class->reflFields as $field => $reflProperty) {
                $reflProperty->setValue($this, $reflProperty->getValue($original));
            }
            unset($this->_entityPersister, $this->_identifier);
        }
        
    }
}