<?php

/**

 * The template for displaying the header

 *

 * Displays all of the head element and everything up until the "site-content" div.

 *

 * @package WordPress

 * @subpackage Twenty_Fifteen

 * @since Twenty Fifteen 1.0

 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?> class="no-js">

<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!--[if lt IE 9]>

	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>

	<![endif]-->

	<?php wp_head(); ?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.25/jquery.fancybox.min.css" />

	<link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/bootstrap.css" rel="stylesheet">

    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/style.css?2" rel="stylesheet">

    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/media.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?php echo esc_url( get_template_directory_uri() ); ?>/slick/slick.css"/>

    <link rel="stylesheet" type="text/css" href="<?php echo esc_url( get_template_directory_uri() ); ?>/slick/slick-theme.css"/>

	<link rel="shortcut icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/favicon.ico" type="image/x-icon">

</head>



<body <?php body_class(); ?>>

<!-- Yandex.Metrika counter -->

<script type="text/javascript">

    (function (d, w, c) {

        (w[c] = w[c] || []).push(function() {

            try {

                w.yaCounter44243784 = new Ya.Metrika({

                    id:44243784,

                    clickmap:true,

                    trackLinks:true,

                    accurateTrackBounce:true,

                    webvisor:true

                });

            } catch(e) { }

        });



        var n = d.getElementsByTagName("script")[0],

            s = d.createElement("script"),

            f = function () { n.parentNode.insertBefore(s, n); };

        s.type = "text/javascript";

        s.async = true;

        s.src = "https://mc.yandex.ru/metrika/watch.js";



        if (w.opera == "[object Opera]") {

            d.addEventListener("DOMContentLoaded", f, false);

        } else { f(); }

    })(document, window, "yandex_metrika_callbacks");

</script>

<noscript><div><img src="https://mc.yandex.ru/watch/44243784" style="position:absolute; left:-9999px;" alt="" /></div></noscript>

<!-- /Yandex.Metrika counter -->



<script>

  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){

  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),

  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)

  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');



  ga('create', 'UA-98102254-1', 'auto');

  ga('send', 'pageview');



</script>





<header id="header">

    <div class="container">

        <div class="row header-cnt">

            <div class="col-xs-12 col-sm-5 col-md-3 col-lg-3 logo">

                <a href="/"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/logo.png"></a>

            </div>

            <div class="col-xs-12 col-sm-7 col-md-3 col-lg-3">

                <ul class="top-contact">

		    <li class="name">ООО "3D Мануфактура"</li>

                    <li class="adress">г. Минск,<br> пр. Партизанский 8/2</li>

                    <li class="time">Пн-Пт, с 8.00 до 17.00</li>

                </ul>

            </div>

            <div class="col-xs-12 col-sm-5 col-md-3 col-lg-3 block-numbers text-center">

                <ul class="top-numbers">

                    <li class="velcom"><span>+375 29</span> 133 23 56</span></li>

                    <li class="mts"><span>+375 29</span> 233 23 56</span></li>

                    <li class="tel"><span>+375 17</span> 388 22 66</span></li>

                </ul>

            </div>

            <div class="col-xs-12 col-sm-7 col-md-3 col-lg-3 text-center">

                <ul class="right-cont">

                    <li class="mail"><a class="blue-color" href="mailto:sales@ifilters.by">sales@ifilters.by</a><span class="mail-icon"></span></li>

                    <li><button type="button" class="blue-btn top-btn" data-toggle="modal" data-target="#modal-1">Заказать звонок</button> </li>

                </ul>

            </div>

        </div>

    </div>

    <nav role="navigation" class="navbar navbar-default navbar-static-top">

        <div class="container">



            <div class="navbar-header">

                <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">

                    <span class="sr-only">Меню</span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                    <span class="icon-bar"></span>

                </button>

            </div>
<!-- <div id="navbarCollapse" class="collapse navbar-collapse">

                <ul class="nav navbar-nav">

                    <li class="active">
                    	<a class="menu__link" href="#onas" class="anchor" title="hover" >
                    	О нас
                        </a>
                        <ul class="submenu">
                        	<li><a class="menu__link" href="#">О нас1</a></li>
                        	<li><a class="menu__link" href="#">О нас2</a></li>
                        	<li><a class="menu__link" href="#">О нас3</a></li>
                        	<li><a class="menu__link" href="#">О нас4</a></li>
                        </ul>
                    </li>

                    <li>
                    	<a class="menu__link" href="#products" class="anchor">Каталог продукции
                    	</a>
                    	<ul class="submenu">
                    		<li><a class="menu__link" href="#">Каталог1</a></li>
                    		<li><a class="menu__link" href="#">Каталог2</a></li>
                    		<li><a class="menu__link" href="#">Каталог3</a></li>
                    		<li><a class="menu__link" href="#">Каталог4</a></li>
                    	</ul>
                    </li>

                    <li>
                    	<a class="menu__link" href="#working" class="anchor">Схема работы
                    	</a>
                    	<ul class="submenu">
                    			<li><a class="menu__link" href="#">Схема1</a></li>
                    			<li><a class="menu__link" href="#">Схема2</a></li>
                    			<li><a class="menu__link" href="#">Схема3</a></li>
                    			<li><a class="menu__link" href="#">Схема4</a></li>
                    		</ul>	
                    </li>

                    <li>
                    	<a class="menu__link" href="#clients" class="anchor">Наши клиенты
                    	</a>
                    	<ul class="submenu">
                    		<li><a class="menu__link" href="#">Клиенты1</a></li>
                    		<li><a class="menu__link" href="#">Клиенты2</a></li>
                    		<li><a class="menu__link" href="#">Клиенты3</a></li>
                    		<li><a class="menu__link" href="#">Клиенты4</a></li>
                    	</ul>
                    </li>

                    <li>
                    	<a class="menu__link" href="#setrificates" class="anchor">Сертификаты
                    	</a>
                    	<ul class="submenu">
                    		<li><a class="menu__link" href="#">Сертификаты1</a></li>
                    		<li><a class="menu__link" href="#">Сертификаты2</a></li>
                    		<li><a class="menu__link" href="#">Сертификаты3</a></li>
                    		<li><a class="menu__link" href="#">Сертификаты4</a></li>
                    	</ul>
                    </li>

                    <li>
                    	<a class="menu__link" href="#contacts" class="anchor">Контакты
                    	</a>
                    	<ul class="submenu">
                    		<li><a class="menu__link" href="#">Контакты1</a></li>
                    		<li><a class="menu__link" href="#">Контакты2</a></li>
                    		<li><a class="menu__link" href="#">Контакты3</a></li>
                    		<li><a class="menu__link" href="#">Контакты4</a></li>
                    	</ul>
                    </li>

                </ul>

            </div>
        -->
 

<?php wp_nav_menu( array(
    'theme_location'  => 'primary',
    'menu'            => 'Верхнее меню',
    'container'       => 'div',
    'container_class' => 'collapse navbar-collapse',
    'container_id'    => 'navbarCollapse',
    'menu_class'      => 'nav navbar-nav',
) ); ?>

        </div>

    </nav>

</header>

