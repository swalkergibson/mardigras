<?php

namespace Proxies\__CG__\Entities;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class OauthClients extends \Entities\OauthClients implements \Doctrine\ORM\Proxy\Proxy
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
            return $this->_identifier["id"];
        }
        $this->__load();
        return parent::getId();
    }

    public function setSecret($secret)
    {
        $this->__load();
        return parent::setSecret($secret);
    }

    public function getSecret()
    {
        $this->__load();
        return parent::getSecret();
    }

    public function setName($name)
    {
        $this->__load();
        return parent::setName($name);
    }

    public function getName()
    {
        $this->__load();
        return parent::getName();
    }

    public function setAutoApprove($autoApprove)
    {
        $this->__load();
        return parent::setAutoApprove($autoApprove);
    }

    public function getAutoApprove()
    {
        $this->__load();
        return parent::getAutoApprove();
    }

    public function setClientEndpoints(\Entities\OauthClientEndpoints $clientEndpoints)
    {
        $this->__load();
        return parent::setClientEndpoints($clientEndpoints);
    }

    public function getClientEndpoints()
    {
        $this->__load();
        return parent::getClientEndpoints();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'secret', 'name', 'autoApprove', 'clientEndpoints');
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