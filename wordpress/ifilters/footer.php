<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<footer class="main-footer">
<div class="container-fluid bg-bottom"></div>
<div class="container-fluid copyright">
    <div class="container">
    <div class="col-lg-3">
        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/logo.png">
    </div>
<!--     <div class="col-lg-6 bt-pad">
        <ul class="menu-bottom">
            <li><a href="#onas" class="anchor">О нас</a> </li>
            <li><a href="#products" class="anchor">Каталог продукции</a> </li>
            <li><a href="#working" class="anchor">Схема работы</a> </li>
            <li><a href="#clients" class="anchor">Наши клиенты и отзывы</a> </li>
            <li><a href="#setrificates" class="anchor">Сертификаты</a> </li>
            <li><a href="#contacts" class="anchor">Контакты</a> </li>
        </ul>
    </div> -->

<?php wp_nav_menu( array(
    'theme_location'  => 'secondary',
    'menu'            => 'Меню в подвале',
    'container'       => 'div',
    'container_class' => 'col-lg-6 bt-pad',
    'menu_class'      => 'menu-bottom',
) ); ?>

    <div class="col-lg-3 bt-pad">
        <p>© 2017 Воздушные фильтры и фильтрующие материалы - ifilters </p>
        <p class="seologic">Разработка сайта - <a href="#">Seologic</a> </p>
    </div>
    </div>
</div>
</footer>
<a href="#header" class="up"></a>



   <!--Модальное окно-->
<div class="modal md-effect-11" id="modal-1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal"></button>
                <h4 class="modal-title form-title text-center">Заказать звонок</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" name="phone_name_modal" id="phone_name_modal" class="form-control" placeholder="Ваше имя (обязательное поле)">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="tel" name="phone_phone_modal" id="phone_phone_modal" class="form-control" placeholder="Ваш телефон (обязательное поле)">
                        </div>
                    </div>
                    <div class="form-group group-btn text-center">
                        <div class="col-sm-12">
                            <button type="submit" class="btn blue-btn" id="phone-submit-modal" onclick="order_call(this.form);return false;">Отправить заявку</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    <!--Модальное окно-->

	<!--Модальное окно-->
	<div class="modal md-effect-11" id="modal-3">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal"></button>
                <h4 class="modal-title form-title text-center">Оставить заявку</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" name="request_name_modal" id="request_name_modal" class="form-control" placeholder="Ваше имя (обязательное поле)">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="tel" name="request_phone_modal" id="request_phone_modal" class="form-control" placeholder="Ваш телефон (обязательное поле)">
                        </div>
                    </div>
					<div class="form-group">
                        <div class="col-sm-12">
                            <input type="email" name="request_email_modal" id="request_email_modal" class="form-control" placeholder="Ваш E-mail">
                        </div>
                    </div>
                    <div class="form-group group-btn text-center">
                        <div class="col-sm-12">
                            <button type="submit" class="btn blue-btn" id="phone-submit-modal" onclick="order_request(this.form);return false;">Отправить заявку</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
	<!--Модальное окно-->



<!--Модальное окно-->
<div class="modal md-effect-1 md-show" id="modal-2">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal"></button>
                <h4 class="modal-title form-title text-center">Спасибо</h4>
            </div>
            <div class="modal-body">
               <p class="text-center">Ваши данные отправлены.<br>Мы свяжемся с Вами с течении часа</p>
            </div>
        </div>
    </div>
</div>
<!--Модальное окно-->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.25/jquery.fancybox.min.js"></script>

<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/slick/slick.min.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/slk.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/scroll.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/serficate.js"></script>
<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/forms.js"></script>


<?php wp_footer(); ?>

<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 855310428;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/855310428/?guid=ON&amp;script=0"/>
</div>
</noscript>

</body>
</html>




