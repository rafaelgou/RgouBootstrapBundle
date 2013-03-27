<?php

namespace Rgou\BootstrapBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('RgouBootstrapBundle:Default:index.html.twig');
    }
    
    public function baseAction()
    {
        return $this->render('RgouBootstrapBundle:Default:base-css.html.twig');
    }
    
    public function componentsAction()
    {
        return $this->render('RgouBootstrapBundle:Default:components.html.twig');
    }
    
    public function customizeAction()
    {
        return $this->render('RgouBootstrapBundle:Default:customize.html.twig');
    }
    
    public function gettingStartedAction()
    {
        return $this->render('RgouBootstrapBundle:Default:getting-started.html.twig');
    }

    public function javascriptAction()
    {
        return $this->render('RgouBootstrapBundle:Default:javascript.html.twig');
    }
    
    public function scaffoldingAction()
    {
        return $this->render('RgouBootstrapBundle:Default:scaffolding.html.twig');
    }

    public function fontAwesomeAction()
    {
        return $this->render('RgouBootstrapBundle:Default:font-awesome.html.twig');
    }

    public function exampleStarterAction()
    {
        return $this->render('RgouBootstrapBundle:Examples:starter-template.html.twig');
    }
    
    public function exampleHeroAction()
    {
        return $this->render('RgouBootstrapBundle:Examples:hero.html.twig');
    }
    
    public function exampleFluidAction()
    {
        return $this->render('RgouBootstrapBundle:Examples:fluid.html.twig');
    }
    
    public function exampleMarketingNarrowAction()
    {
        return $this->render('RgouBootstrapBundle:Examples:marketing-narrow.html.twig');
    }
    
    public function exampleSigninAction()
    {
        return $this->render('RgouBootstrapBundle:Examples:signin.html.twig');
    }
    
    public function exampleStickyFooterAction()
    {
        return $this->render('RgouBootstrapBundle:Examples:sticky-footer.html.twig');
    }
    
    public function exampleStickyFooterNavbarAction()
    {
        return $this->render('RgouBootstrapBundle:Examples:sticky-footer-navbar.html.twig');
    }
    
    public function exampleCarouselAction()
    {
        return $this->render('RgouBootstrapBundle:Examples:carousel.html.twig');
    }

    public function exampleJustifiedNavAction()
    {
        return $this->render('RgouBootstrapBundle:Examples:justified-nav.html.twig');
    }
    
}
