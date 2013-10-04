<?php

namespace Rgou\BootstrapBundle\Twig\Extension;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Rgou\BootstrapBundle\Util\Inflector;

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

    /** @var Inflector $inflector */
    private $inflector;
    
    /**
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
        $this->inflector = $this->container->get('rgou_bootstrap.util.inflector');
    }

    /**
     * @return array
     */
    public function getGlobals()
    {
        return array('rgou_bootstrap' => $this->container->getParameter('rgou_bootstrap'));
    }

    public function getFilters()
    {
        return array(
            'pluralize'   => new \Twig_Filter_Method($this, 'pluralizeFilter'),
            'singularize' => new \Twig_Filter_Method($this, 'singularizeFilter'),
            'titleize'    => new \Twig_Filter_Method($this, 'titleizeFilter'),
            'camelize'    => new \Twig_Filter_Method($this, 'camelizeFilter'),
            'underscore'  => new \Twig_Filter_Method($this, 'underscoreFilter'),
            'humanize'    => new \Twig_Filter_Method($this, 'humanizeFilter'),
            'variablize'  => new \Twig_Filter_Method($this, 'variablizeFilter'),
            'tableize'    => new \Twig_Filter_Method($this, 'tableizeFilter'),
            'classify'    => new \Twig_Filter_Method($this, 'classifyFilter'),
            'ordinalize'  => new \Twig_Filter_Method($this, 'ordinalizeFilter'),
        );
    }

    public function pluralizeFilter($word)
    {
        return $this->inflector->pluralize($word);
    }    

    public function singularizeFilter($word)
    {
        return $this->inflector->singularize($word);
    }    

    public function titleizeFilter($word, $uppercase = '')
    {
        return $this->inflector->titleize($word, $uppercase);
    }    

    public function camelizeFilter($word)
    {
        return $this->inflector->camelize($word);
    }    

    public function underscoreFilter($word)
    {
        return $this->inflector->underscore($word);
    }    

    public function humanizeFilter($word, $uppercase = '')
    {
        return $this->inflector->humanize($word, $uppercase);
    }    

    public function variablizeFilter($word)
    {
        return $this->inflector->variablize($word);
    }    

    public function tableizeFilter($class_name)
    {
        return $this->inflector->tableize($class_name);
    }    

    public function classifyFilter($table_name)
    {
        return $this->inflector->classify($table_name);
    }    

    public function ordinalizeFilter($number)
    {
        return $this->inflector->ordinalize($number);
    }    

    /**
     * @return string
     */
    public function getName()
    {
        return 'rgou_bootstrap';
    }

}

