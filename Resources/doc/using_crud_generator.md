# Using CRUD Generator

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
All generated views extend from `RgouBootstrapBundle::layout.html.twig` that can be overridden in `/app/Resources/RgouBootstrapBundle/skeleton/crud/views/others/extends.twig.twig`.

###### Example #2:
All generated views use the `content` block that can be overridden in `/app/Resources/RgouBootstrapBundle/skeleton/crud/views/others/block.twig.twig`.
