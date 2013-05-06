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

* Basic layouts using CDN (from [BootstrapCDN](http://www.bootstrapcdn.com/)) or local assets
* Local and CDN Bootswatch(http://bootswatch.com/) themes
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

### Public the assets

    app/console assets:install --symlink

### Prepare Assetic

Get YUI Compresor:

    cd /tmp
    wget https://github.com/downloads/yui/yuicompressor/yuicompressor-2.4.7.zip
    unzip yuicompressor-2.4.7.zip
    mkdir /PAHT_TO_APPLICATION/app/Resources/java
    cp /tmp/yuicompressor-2.4.7/build/yuicompressor-2.4.7.jar /PAHT_TO_APPLICATION/app/Resources/java/
    rm -rf yuicompressor-2.4.7.zip yuicompressor-2.4.7

Configure Assetic in app/config/config.yml

    assetic:
        debug:          %kernel.debug%
        use_controller: false
        bundles:
        - RgouBootstrapBundle
        #java: /usr/bin/java
        filters:
            cssrewrite: ~
            yui_css:
                jar: %kernel.root_dir%/Resources/java/yuicompressor-2.4.7.jar
            yui_js:
                jar: %kernel.root_dir%/Resources/java/yuicompressor-2.4.7.jar

### Compile assets with assetic 

    app/console assetic:dump

## Usage

   See [Doc Index](Resources/doc/index.md) for full usage documentation

