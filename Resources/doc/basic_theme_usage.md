# Basic Theme Usage

Some simple technics for quick start. Please see the IMPORTANT TIP on the end.

## Very, very basic

In any template, extends a layout and overwride the blocks you need.

A very basic use can be:

    {% extends 'RgouBootstrapBundle::layout_local.html.twig' %}

    {% block title %}My Page Title{% endblock title %}

    {% block headline %}My headline{% endblock headline %}

    {% block content %}
    <did class="row">
        <div class="span3"><!-- a sample sidebar-->
            <ul class="nav nav-tabs nav-stacked sidebar">
            <li><a href="">Main</a></li>
            <li><a href="">Second Option</a></li>
            </ul>
        </div>
        <div class="span9">
            <h2>Another part</h2>
            <p>Text for this part</p>
        </div>
    </did>
    {% endblock content %}

## A plain top navbar 

    {% extends 'RgouBootstrapBundle::layout_local.html.twig' %}

    {% block title %}My Page Title{% endblock title %}

    {% block headline %}My headline{% endblock headline %}

    {# Top Navigation Bar #}
    {% block navbar_top %}
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="{{ container_class }}">

                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>            

                <a class="brand" href="#">Rgou</a>

                <div class="nav-collapse collapse">
                    <ul class="nav">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#">Link</a></li>
                        <li><a href="#">Link</a></li>
                    </ul>
                </div>            
            </div>
        </div>
    </div> 
    {% endblock navbar_top %}

    {% block content %}
    <did class="row">
        <div class="span3"><!-- a sample sidebar-->
            <ul class="nav nav-tabs nav-stacked sidebar">
            <li><a href="">Main</a></li>
            <li><a href="">Second Option</a></li>
            </ul>
        </div>
        <div class="span9">
            <h2>Another part</h2>
            <p>Text for this part</p>
        </div>
    </did>
    {% endblock content %}

## Adding your contextual Javascript and Stylesheet

Use the default blocks `stylesheets` and `javascripts`:

    {% extends 'RgouBootstrapBundle::layout_local.html.twig' %}

    {# It will be rendered on HEAD section after any global stylesheet #}
    {% block stylesheets %}
    <link href="whatever/my.css" type="text/css" rel="stylesheet" media="screen" />
    <script type="text/css">
        @import url("whatever/my2.css");
        h1 {color: red;}
    </script>
    {% endblock stylesheets %}

    {# It will be rendered before </body> after any global javascript #}
    {% block javascripts %}
    <script type="text/javascript" src="whatever/my.js"></script>
    <script type="text/javascript">
        var myscript = 'text';
        // (...)
    </script>
    {% endblock javascripts %}

    {% block title %}My Page Title{% endblock title %}

    {% block headline %}My headline{% endblock headline %}

    {% block content %}
    <did class="row">
        <div class="span3"><!-- a sample sidebar-->
            <ul class="nav nav-tabs nav-stacked sidebar">
            <li><a href="">Main</a></li>
            <li><a href="">Second Option</a></li>
            </ul>
        </div>
        <div class="span9">
            <h2>Another part</h2>
            <p>Text for this part</p>
        </div>
    </did>
    {% endblock content %}

## Advanced use of base layout

The base layout has some default blocks and one variable described bellow:

- `container_class` (variable): Container class definition, it can be 'container' or 'container-fluid' (default)
  use: {% set container_class = 'container-fluid' %}
- `head_stylesheets`: Main Stylesheets on HEAD
- `stylesheets`: Additional Stylesheets on HEAD
- `head_javascripts`: Additional Javascripts on head
- `title`: Page Title
- `head_extra`: Extra HEAD stuff
- `body`: all <body></body> Content
- `body_attributes`: Body Attributes
- `navbar_top`: Top Navigation Bar
- `navbar_bottom`: Bottom Navigation Bar
- `container`: Main Container (all body without navbars, footer and javascripts)
- `page_header`: Page Header
- `headline`: Page Headline
- `alerts`: Alerts (flash messages)
- `content`: The main content
- `footer`: The Full Footer
- `footer_content`: Only the footer content with div formating
- `footer_javascripts`: Main Javascripts on footer
- `javascripts`: Additional Javascripts on footer

Some layout can implement other stuffs, or even you can do in a diferent way.

See comments on (../views/base.html.twig) for advanced explanations.

## Very, very important TIP

You can use all available layouts directly, but is far more useful for you
*EXTEND* in some of your bundles or on `app/Resources/views/base.html.twig` 
and then extend all your templates from that point, adding your navbars and
whatever customization you desire.

Why? If you need/want to change a theme globally, you have one single point
to change (that is *SPECIALLY* valid to [Using CRUD Generator](using_crud_generator.md)).

See (`app/Resources/views/base.html.twig`):

    {% extends 'RgouBootstrapBundle::layout_local.html.twig' %}

    {% block title %}My System{% endblock title %}

    {% block headline %}My Homepage{% endblock headline %}

    {# Top Navigation Bar #}
    {% block navbar_top %}
    <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
            <div class="{{ container_class }}">

                <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>            

                <a class="brand" href="#">My System</a>

                <div class="nav-collapse collapse">
                    <ul class="nav">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#">Link 1</a></li>
                        <li><a href="#">Link 2</a></li>
                    </ul>
                </div>            
            </div>
        </div>
    </div> 
    {% endblock navbar_top %}

    {% block footer_content %}
            <p><a href="http://mysystem.com" target="_blank">My System </a> &copy; <a href="http://myself.com" target="_blank">Myself</a> 2013</p>
    {% endblock footer_content %}

In your templates, put:

    {% extends '::base.html.twig' %}

    {% block title %}My System - Inner Page{% endblock title %}

    {% block headline %}Inner Page{% endblock headline %}

    {% block content %}
    Page content
    {% endblock content %}    

If you want to change your theme to Cerulean from CDN (see [Available Layouts](available_layouts.md)),
edit `app/Resources/views/base.html.twig` an change the first line to:

    {% extends 'RgouBootstrapBundle:Bootswatch:layout_cdn_cerulean.html.twig' %}

And that's all.