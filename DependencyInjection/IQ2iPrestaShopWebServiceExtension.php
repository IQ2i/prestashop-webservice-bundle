<?php

namespace IQ2i\PrestaShopWebServiceBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader\YamlFileLoader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class IQ2iPrestaShopWebServiceExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);
        
        foreach ($config['connections'] as $connectionName => $connectionConfig) {
            foreach ($connectionConfig as $configName => $configValue) {
                $container->setParameter('iq2i_prestashop_web_service.connections.'.$connectionName.'.'.$configName, $configValue);
            }
        }

        $loader = new YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }
    
    /**
     * Select an alias for the extension
     * Trick allowing bypassing the Bundle::getContainerExtension check on getAlias
     *
     * @return string
     */
    public function getAlias()
    {
        return 'iq2i_prestashop_web_service';
    }
}
