<?php

namespace Rgou\BootstrapBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\DependencyInjection\ContainerAware;

/**
 * @see https://gist.github.com/Gregoire-M/4585334 
 */
class Builder extends ContainerAware
{
    
    public function mainMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav pull-left');

        $menu->addChild('Language')
             ->setAttribute('dropdown', true);

        $menu['Language']->addChild('Deutsch', array('uri' => '#'));
        $menu['Language']->addChild('English', array('uri' => '#'));

        return $menu;
    }
    
    public function userMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav pull-right');

        $menu->addChild('User')
             ->setAttribute('dropdown', true)
             ->setAttribute('divider_prepend', true);

        
        //$menu['User']->addChild('Profile', array('route' => 'homepage'))
        $menu['User']->addChild('Profile', array('uri' => '#'))
                     ->setAttribute('divider_append', true);
        $menu['User']->addChild('Logout', array('uri' => '#'));

        return $menu;
    }

    public function demoBootstrapMenu(FactoryInterface $factory, array $options)
    {
        $menu = $factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav pull-left');

        $menu->addChild('Home', array('route' => 'rgou_bootstrap'));
        $menu->addChild('Get started', array('route' => 'rgou_bootstrap_getting_started'));
        $menu->addChild('Scaffolding', array('route' => 'rgou_bootstrap_scaffolding'));
        $menu->addChild('Base CSS', array('route' => 'rgou_bootstrap_base'));
        $menu->addChild('Components', array('route' => 'rgou_bootstrap_components'));
        $menu->addChild('JavaScript', array('route' => 'rgou_bootstrap_javascript'));
        $menu->addChild('Customize', array('route' => 'rgou_bootstrap_customize'));
        $menu->addChild('Font Awesome', array('route' => 'rgou_bootstrap_font_awesome'));
        
        return $menu;
    }
    
}