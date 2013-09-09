<?php

namespace Rgou\BootstrapBundle\Menu;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\Request;

class MenuBuilder
{
    private $factory;

    /**
     * @param FactoryInterface $factory
     */
    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function mainMenu(Request $request)
    {
        $menu = $this->factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav navbar-nav pull-left');

        $menu->addChild('Language')
             ->setAttribute('dropdown', true);

        $menu['Language']->addChild('Deutsch', array('uri' => '#'));
        $menu['Language']->addChild('English', array('uri' => '#'));

        return $menu;
        
    }
    
    public function userMenu(Request $request)
    {
        $menu = $this->factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav pull-right');

        $menu->addChild('User')
             ->setAttribute('dropdown', true)
             ->setAttribute('divider_prepend', true)
             ->setAttribute('icon', 'icon-user');

        $menu['User']->addChild('Profile', array('route' => 'homepage'))
                     ->setAttribute('icon', 'icon-user')
                     ->setAttribute('divider_append', true);
        
        $menu['User']->addChild('Logout', array('route' => 'homepage'))
                     ->setAttribute('icon', 'icon-off');

        return $menu;
    }
    
}