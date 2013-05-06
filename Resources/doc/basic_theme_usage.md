# Basic Theme Usage

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
- `content`: The main content
- `footer`: The Full Footer
- `footer_content`: Only the footer content with div formating
- `footer_javascripts`: Main Javascripts on footer
- `javascripts`: Additional Javascripts on footer

Some layout can implement other stuffs, or even you can do in a diferent way.

See comments on (../views/base.html.twig) for advanced explanations.