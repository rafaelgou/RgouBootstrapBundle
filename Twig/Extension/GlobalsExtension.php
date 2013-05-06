<?php

namespace Rgou\BootstrapBundle\Twig\Extension;

use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * GlobalsExtension
 *
 * @author Enrico Thies <enrico.thies@gmail.com>
 *
 */
class GlobalsExtension extends \Twig_Extension
{
    /** @var ContainerInterface $container */
    private $container;

    /**
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @return array
     */
    public function getGlobals()
    {
        return array('rgou_bootstrap' => $this->container->getParameter('rgou_bootstrap'));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'rgou_bootstrap';
    }
}
