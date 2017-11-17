<?php

namespace IQ2i\PrestaShopWebServiceBundle\Services;

use InvalidArgumentException;
use IQ2i\PrestaShopWebServiceBundle\Libraries\PrestaShopWebService;

/**
 * IQ2i PrestaShop Web Service
 */
class IQ2iPrestaShopWebService {
    
    private $container;
    private $em;
    private $instance = null;
    
    public function __construct($container){
        $this->container = $container;
        $this->em        = $container->get('doctrine')->getManager();
    }
    
    public function getInstance($name = null) {
        if (is_null($this->instance)){
            if ($name === null) {
                throw new InvalidArgumentException("You must specified a connection name.");
            }
            
            if (!$this->container->hasParameter('iq2i_prestashop_web_service.connections.'.$name.'.url')) {
                throw new InvalidArgumentException("You must specified a valid connection name.");
            }
            
            $this->instance =  new PrestaShopWebService(
                $this->container->getParameter('iq2i_prestashop_web_service.connections.'.$name.'.url'),
                $this->container->getParameter('iq2i_prestashop_web_service.connections.'.$name.'.key'),
                $this->container->getParameter('iq2i_prestashop_web_service.connections.'.$name.'.debug')
            );
        }
        return $this->instance;
    }
}
