# Using CRUD Generator

The CRUD-generator in [RgouBootstrapBundle](https://github.com/rafaelgou/RgouBootstrapBundle) 
is based on [SensioGeneratorBundle](https://github.com/sensio/SensioGeneratorBundle).

It's a one time generator - not a configurable one. Generates controllers, routes and views once,
if you change your Model, you need to run again with `--overwrite`, and
*THAT IS DESTRUCTIVE* - you were warned!

## Base layout configuration

Edit `app/config/config.yml` and configure:

    rgou_bootstrap:
        template: "RgouBootstrapBundle::layout_local.html.twig"

If you don't do that, the default `` will be used. See [Available Layouts](available_layouts.md)
to choose which you wanna use.

Be aware this will be used ONE TIME in generation. You'd better see below "Very, very important TIP".

## Generating

Create your entity (Doctrine ORM) or document and choose your interactive command:

For Doctrine generator (MySQL, PostgreSQL, etc) use:
- `php ./app/console rgou:generate:bootstrap-crud`
   with the same options and arguments.

For Doctrine MongoDB ODM generator (MongoDB !!) use:
- `php ./app/console rgou:generate:bootstrap-crud-odm`
   with the same options and arguments - of course for *Documents" instead of "Entities".

The commands are interactive. You can also use a no-interactive syntax (`--overwrite` and `--with-write` are optionals): 

    app/console rgou:generate:bootstrap-crud --entity AcmeBundle:Person --format yml --overwrite --with-write --no-interaction

or 

    app/console rgou:generate:bootstrap-crud-odm --entity AcmeBundle:Person --format yml --overwrite --with-write --no-interaction

Important: "entity" and "documents" are considered the same for this commands. Just inform your Entity or Document as your needs.

## Template overriding

Default CRUD-templates reside in [Resources/skeleton/crud]() that can be overridden in `/app/Resources/RgouBootstrapBundle/skeleton/crud` or .  
the base-templates of [SensioGeneratorBundle](https://github.com/sensio/SensioGeneratorBundle) can be overridden in the same way.

For ODM versions, [Resources/skeleton/crud-odm]() that can be overridden in `/app/Resources/RgouBootstrapBundle/skeleton/crud-odm`

## Very, very important TIP

First, see "Very, very important TIP" in [Basic Theme Usage](basic_usage.md).

Now, configure the basic theme for the generator pointing to YOUR layout,
and you can change ir globally at any time.

For example, if you define `app/Resources/views/base.html.twig` as your layout,
edit `app/config/config.yml` and configure:

    rgou_bootstrap:
        template: "::base.html.twig"

And that's all.

