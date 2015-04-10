<?php

namespace IQ2i\PrestaShopWebServiceBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class IQ2iPrestaShopWebServiceBundle extends Bundle
{
    /**
     * Trick allowing bypassing the Bundle::getContainerExtension check on getAlias
     *
     * @return Object DependencyInjection\M6WebStatsdExtension
     */
    public function getContainerExtension()
    {
        return new DependencyInjection\IQ2iPrestaShopWebServiceExtension();
    }
}
