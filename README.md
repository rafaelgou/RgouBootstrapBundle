# RgouBootstrapBundle

*UnderConstruction*: This bundle is alpha and has no release yet.

RgouBootstrapBundle is a twitter's bootstrap
(http://twitter.github.com/bootstrap/) integrationinto your symfony2
(http://www.symfony.com) Project.

It includes a CRUD-generator based on [SensioGeneratorBundle](https://github.com/sensio/SensioGeneratorBundle)
for Doctrine and Doctrine MongoDB ODM.

Is inspired and has borrowed some code from:

- [MopaBootstrapBundle](https://github.com/phiamo/MopaBootstrapBundle)
- [ToaTwitterBootstrapBundle](https://github.com/toaotc/ToaTwitterBootstrapBundle)

Both are great jobs! I just want to merge some features in a more personal way.

## Included Features

* Basic layouts using CDN or local assets
* A generic Navbar class to generate your Navbar outside the template
  * helpers for dropdowns, seperators, etc. (from [MopaBootstrapBundle](https://github.com/phiamo/MopaBootstrapBundle))
* twig templates for KnpPaginatorBundle (https://github.com/knplabs/KnpPaginatorBundle)
  (from [MopaBootstrapBundle](https://github.com/phiamo/MopaBootstrapBundle))
* twig template for KnpMenu (https://github.com/KnpLabs/KnpMenu)
  * icon support on menu links (from [MopaBootstrapBundle](https://github.com/phiamo/MopaBootstrapBundle))
* CRUD Generation based on [SensioGeneratorBundle](https://github.com/sensio/SensioGeneratorBundle)
  (from ToaTwitterBootstrapBundle](https://github.com/toaotc/ToaTwitterBootstrapBundle))
* CRUD Generation for Doctrine MongoDB ODM (exclusive feature!)


## Basic Install

### Add `rgou/bootstrap-bundle` to `composer.json`.

	{
	    "require": {
	        // ...
	        "rgou/bootstrap-bundle": "dev-master",
	        // ...
	    }
	}

### Register this bundle in the `app/AppKernel.php`

	public function registerBundles()
	{
		$bundles = array(
			// ...
            new Rgou\BootstrapBundle\RgouBootstrapBundle(),
			// ...
		);
	}


## Usage

#### CRUD generation

The CRUD-generator in [RgouBootstrapBundle](https://github.com/rafaelgou/RgouBootstrapBundle) is based on [SensioGeneratorBundle](https://github.com/sensio/SensioGeneratorBundle).

For Doctrine generator (MySQL, PostgreSQL, etc) use:
- `php ./app/console rgou:generate:bootstrap-crud`
   with the same options and arguments.

For Doctrine MongoDB ODM generator (MongoDB !!) use:
- `php ./app/console rgou:generate:bootstrap-crud-odm`
   with the same options and arguments - of course for *Documents" instead of "Entities".


#### Template overriding

Default CRUD-templates reside in [Resources/skeleton/crud]() that can be overridden in `/app/Resources/RgouBootstrapBundle/skeleton/crud` or .  
The base-templates of [SensioGeneratorBundle](https://github.com/sensio/SensioGeneratorBundle) can be overridden in the same way.

###### Example #1:
All generated views extend from `ToaTwitterBootstrapBundle::layout.html.twig` that can be overridden in `/app/Resources/RgouBootstrapBundle/skeleton/crud/views/others/extends.twig.twig`.

###### Example #2:
All generated views use the `content` block that can be overridden in `/app/Resources/RgouBootstrapBundle/skeleton/crud/views/others/block.twig.twig`.
