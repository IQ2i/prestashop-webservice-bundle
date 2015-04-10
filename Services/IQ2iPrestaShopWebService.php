<?php

namespace IQ2i\PrestaShopWebServiceBundle\Services;

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
    
    public function getInstance(){
        if(is_null($this->instance)){
            $this->instance =  new PrestaShopWebService(
                $this->container->getParameter('iq2i_prestashop_web_service.url'),
                $this->container->getParameter('iq2i_prestashop_web_service.key'),
                $this->container->getParameter('iq2i_prestashop_web_service.debug')
            );
        }
        return $this->instance;
    }
}
