<?php

namespace SFBCN\EventbriteBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class SFBCNEventbriteExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        if (isset($config['app_key'])) {
            $container->setParameter('app_key', $config['app_key']);
        }

        if (isset($config['user_key'])) {
            $container->setParameter('user_key', $config['user_key']);
        }

        if (isset($config['servicesDescriptionFile']) && file_exists($config['servicesDescriptionFile'])) {
            $container->setParameter('servicesDescriptionFile', $config['servicesDescriptionFile']);
        }

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }
}
