# Using Menu Classes

If you configure KnpMenuBundle to use the RgouBootstrapBundle template to render
the menus, you must read the [KnpMenuBundle docs](https://github.com/KnpLabs/KnpMenuBundle/blob/master/Resources/doc/index.md) 
to create your own menus. 

Here we just make a sample using services. You of course will customize your menus
to fit your needs. Just see our sample in on the files:

- [Menu/MenuBuilder.php](../../Menu/MenuBuilder.php)
- [Resources/config/services.yml](../config/services.yml)
- [Resources/views/layout_local.html.twig](../views/layout_local.html.twig)

Our implementation use services as described on [KnpMenuBundle - Creating Menus as Services](https://github.com/KnpLabs/KnpMenuBundle/blob/master/Resources/doc/menu_service.md).

But you can do that without services following the [KnpMenuBundle - Create your first menu](https://github.com/KnpLabs/KnpMenuBundle/blob/master/Resources/doc/index.md#first-menu)

