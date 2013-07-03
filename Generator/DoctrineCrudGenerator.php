<?php

namespace Rgou\BootstrapBundle\Generator;

use Sensio\Bundle\GeneratorBundle\Generator\DoctrineCrudGenerator as BaseDoctrineCrudGenerator;
use Rgou\BootstrapBundle\Twig\Extension\GlobalsExtension;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Generator is the base class for all generators.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class DoctrineCrudGenerator extends BaseDoctrineCrudGenerator
{
    private $container;

    /**
     * @param Filesystem         $filesystem  A Filesystem
     * @param ContainerInterface $container   The service container
     */
    public function __construct(Filesystem $filesystem, ContainerInterface $container)
    {
        parent::__construct($filesystem);

        $this->container = $container;
    }

    /**
     * Generates the index.html.twig template in the final bundle.
     *
     * @param string $dir The path to the folder that hosts templates in the bundle
     */
    protected function generateIndexView($dir)
    {
        $this->renderFile('crud/views/index.html.twig.twig', $dir.'/index.html.twig', array(
            'bundle'            => $this->bundle->getName(),
            'entity'            => $this->entity,
            'fields'            => $this->metadata->fieldMappings,
            'actions'           => $this->actions,
            'record_actions'    => $this->getRecordActions(),
            'route_prefix'      => $this->routePrefix,
            'route_name_prefix' => $this->routeNamePrefix,
            'rgou_bootstrap'    => $this->container->getParameter('rgou_bootstrap'),
        ));
    }

    /**
     * Generates the show.html.twig template in the final bundle.
     *
     * @param string $dir The path to the folder that hosts templates in the bundle
     */
    protected function generateShowView($dir)
    {
        $this->renderFile('crud/views/show.html.twig.twig', $dir.'/show.html.twig', array(
            'bundle'            => $this->bundle->getName(),
            'entity'            => $this->entity,
            'fields'            => $this->metadata->fieldMappings,
            'actions'           => $this->actions,
            'route_prefix'      => $this->routePrefix,
            'route_name_prefix' => $this->routeNamePrefix,
            'rgou_bootstrap'    => $this->container->getParameter('rgou_bootstrap'),
        ));
    }

    /**
     * Generates the new.html.twig template in the final bundle.
     *
     * @param string $dir The path to the folder that hosts templates in the bundle
     */
    protected function generateNewView($dir)
    {
        $this->renderFile('crud/views/new.html.twig.twig', $dir.'/new.html.twig', array(
            'bundle'            => $this->bundle->getName(),
            'entity'            => $this->entity,
            'route_prefix'      => $this->routePrefix,
            'route_name_prefix' => $this->routeNamePrefix,
            'actions'           => $this->actions,
            'rgou_bootstrap'    => $this->container->getParameter('rgou_bootstrap'),
        ));
    }

    /**
     * Generates the edit.html.twig template in the final bundle.
     *
     * @param string $dir The path to the folder that hosts templates in the bundle
     */
    protected function generateEditView($dir)
    {
        $this->renderFile('crud/views/edit.html.twig.twig', $dir.'/edit.html.twig', array(
            'route_prefix'      => $this->routePrefix,
            'route_name_prefix' => $this->routeNamePrefix,
            'entity'            => $this->entity,
            'bundle'            => $this->bundle->getName(),
            'actions'           => $this->actions,
            'rgou_bootstrap'    => $this->container->getParameter('rgou_bootstrap'),
        ));
    }



}