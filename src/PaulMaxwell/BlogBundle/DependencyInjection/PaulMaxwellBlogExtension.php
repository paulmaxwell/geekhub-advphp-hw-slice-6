<?php

namespace PaulMaxwell\BlogBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class PaulMaxwellBlogExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter(
            'paul_maxwell_blog.main_menu_append',
            isset($config['main_menu']) ? $config['main_menu'] : array()
        );
        $container->setParameter('paul_maxwell_blog.images_location', $config['images_location']);
        $container->setParameter('paul_maxwell_blog.articles_per_page', $config['articles_per_page']);
        $container->setParameter('paul_maxwell_blog.articles_per_panel', $config['articles_per_panel']);
        $container->setParameter('paul_maxwell_blog.gb_posts_per_panel', $config['gb_posts_per_panel']);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');
    }
}
