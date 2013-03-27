<?php

namespace Rgou\BootstrapBundle\DependencyInjection;

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
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('rgou_bootstrap');

        $rootNode
            ->addDefaultsIfNotSet()
            ->children()
                ->scalarNode('template')->defaultValue('RgouBootstrapBundle::layout_local.html.twig')->end()
                ->scalarNode('block')->defaultValue('content')->end()
            ->end();

        return $treeBuilder;
    }
}
