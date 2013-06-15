<?php

namespace Kunstmaan\VotingBundle\DependencyInjection;

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
        $rootNode = $treeBuilder->root('kunstmaan_voting');

        $rootNode
            ->children()
                ->arrayNode('actions')
                    ->useAttributeAsKey('name')
                    ->prototype('array')
                        ->fixXmlConfig('action', 'actions')
                        ->children()
                            ->scalarNode('default_value')->defaultValue('%kuma_voting_default_value%')->end()
                            ->scalarNode('max_number_by_ip')->defaultValue(null)->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ->end();

        return $treeBuilder;
    }
}
