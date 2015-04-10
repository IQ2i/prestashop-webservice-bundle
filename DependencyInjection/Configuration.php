<?php

namespace IQ2i\PrestaShopWebServiceBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('iq2i_presta_shop_web_service');
        
        $rootNode
            ->children()
                ->scalarNode('url')->isRequired()->cannotBeEmpty()->end()
                ->scalarNode('key')->isRequired()->cannotBeEmpty()->end()
                ->scalarNode('debug')->defaultFalse()->end()
            ->end();

        return $treeBuilder;
    }
}
