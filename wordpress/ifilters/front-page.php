<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>
<div class="container-fluid block-1">
    <div class="container">
        <div class="block-title">
            <p class="title">Производство воздушных фильтров
            для систем вентиляции</p>
            <p class="desc">доставка по всей Беларуси</p>
        </div>
        <div class="row slide-form">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 slide-block">
                <div class="carousel slide slide-content" id="carousel">
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="carousel-caption">
                                <h3>Фильтры воздушные карманные</h3>
                                <p>по минимальным ценам</p>
                            </div>
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/slide_1.png" >
                        </div>
                        <div class="item ">
                            <div class="carousel-caption">
                                <h3>Фильтры воздушные складчатые</h3>
                                <p>по минимальным ценам</p>
                            </div>
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/slide_2.png" >
                        </div>
                        <div class="item ">
                            <div class="carousel-caption">
                                <h3>Фильтры воздушные панельные</h3>
                                <p>по минимальным ценам</p>
                            </div>
                            <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/slide_3.png" >
                        </div>
                    </div>
                    <ol class="carousel-indicators">
                        <li class="active" data-target="#carousel" data-slide-to="0"></li>
                        <li data-target="#carousel" data-slide-to="1"></li>
                        <li data-target="#carousel" data-slide-to="2"></li>
                    </ol>
                    <a href="#carousel" class="left carousel-control" data-slide="prev">
                        <span class="prev-left" aria-hidden="true"></span>
                    </a>
                    <a href="#carousel" class="right carousel-control" data-slide="next">
                        <span class="next-right" aria-hidden="true"></span>
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-block">
                <div class="form-block1">
                <form class="form-horizontal" id="form_request2">
                    <div class="form-title text-center">Узнать стоимость</div>
                    <div class="form-desc text-center">Оставьте заявку и получите быструю и бесплатную консультацию нашего менеджера</div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" name="request_name" id="request_name" class="form-control" placeholder="Ваше имя (обязательное поле)">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="tel" name="request_phone" id="request_phone" class="form-control"  placeholder="Ваш телефон (обязательное поле)">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="email" name="request_email" id="request_email" class="form-control"  placeholder="Ваш e-mail">
                        </div>
                    </div>

                    <div class="form-group group-btn text-center">
                        <div class="col-sm-12">
                            <button type="submit" class="btn  blue-btn" onclick="order_request_no_modal(this.form);return false;">Отправить заявку</button>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container block-2" id="onas">
    <p class="p-title text-center">Почему следует выбрать нас?</p>
    <h2 class="border-blue text-center">Наши преимущества</h2>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 text-right">
                <p class="block-2-title">Собственное производство</p>
                <p>оперативное выполнение заказа<br> от 1 до 13 дней</p>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/proizv.png">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/kachestvo.png">
            </div>
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                <p class="block-2-title">Отличное качество</p>
                <p>фильтровальная ткань производства
                   <br> Sandler AG, VOLZ Luftfilter GmbH(Германия)</p>
            </div>

        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 text-right">
                <p class="block-2-title">Лучшая цена</p>
                <p>на нашу продукцию<br> отсутствует НДС</p>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/price.png">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/pay.png">
            </div>
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                <p class="block-2-title">Гибкие условия оплаты</p>
                <p>возможна отсрочка платежа</p>
            </div>
        </div>
    </div>
	<div class="block-3" id="products">
    <div class="container-fluid product">
        <p class="p-title text-center white">Выберите интересующую Вас категорию</p>
        <h2 class="border-white text-center">Наша продукция</h2>
    </div>
    <div class="container-fluid catalog-bg"></div>
    <div class="container block-catalog">
        <div class="row catalog catalog-block">
            <div class="col-md-4 col-lg-4 c-menu">
                <div class="catalog-title">Каталог продукции</div>
                <ul class="nav">
                    <li class="active"><a data-toggle="tab" href="#tab1">Фильтр воздушный карманный</a> </li>
                    <li><a data-toggle="tab" href="#tab2">Фильтр воздушный панельный </a></li>
                    <li><a data-toggle="tab" href="#tab3">Фильтр воздушный складчатый</a></li>
                    <li><a data-toggle="tab" href="#tab4">Фильтр воздушный абсолютной очистки</a></li>
                    <li><a data-toggle="tab" href="#tab5">Фильтр компактный</a></li>
                    <li><a data-toggle="tab" href="#tab6">Фильтрующий материал</a></li>
                    <li><a data-toggle="tab" href="#tab7">Фильтр для камер окраски и лакировки</a></li>
                </ul>
            </div>
            <div class="col-md-8 col-lg-8 tab-content">
                <div id="tab1" class="tab-pane fade in active">
                    <h3 class="catalog-title">Фильтр воздушный карманный</h3>
                    <div class="row catalog-item">
                        <div class="col-md-6 col-lg-6 c-img">
                            <img src="wp-content/uploads/2017/1/1.jpeg">
                        </div>
                        <div class="col-md-6 col-lg-6 c-desc">
                            <p>Карманные воздушные фильтры могут быть изготовлены по индивидуальному заказу в любом размере</p>
                            <p><a href="wp-content/uploads/Визитка_3ДМ_новый.pdf" class="link-download" target="_blank">Скачать полное описание</a></p>

                            <p><button type="button" class="blue-btn top-btn order" data-toggle="modal" data-target="#modal-3">Заказать</button></p>
                        </div>
                    </div>
                    <div class="c-title">Краткое описание</div>
                    <div class="c-desc1"><p><strong>Применение:</strong> в зависимости от фильтрующего материала применяется в качестве, как первой, так и второй ступени очистки воздуха в системах вентиляции и кондиционирования.</p>
                        <p><strong>Преимущества:</strong></p>
						<ul>
						<li>Низкое начальное сопротивление.</li>
						<li>Высокая пылеемкость.</li>
						<li>Пожаробезопасный материал.</li>
						<li>Жесткая рамка.</li>
						</ul>
                        <p> <strong>Класс фильтрации: </strong>(G3, G4, F5 (M5))-грубая очистка, (F6 (М6), F7, F8, F9) - тонкая очистка.</p>
						 <p> <strong>Корпус </strong> - пластмассовый, металлический,  деревянный. </p>
						</div>
                </div>
                <div id="tab2" class="tab-pane fade in">
                    <h3 class="catalog-title">Фильтр воздушный панельный</h3>
                    <div class="row catalog-item">
                        <div class="col-md-6 col-lg-6 c-img">
                            <img src="wp-content/uploads/2017/1/3.jpg">
                        </div>
                        <div class="col-md-6 col-lg-6 c-desc">
                            <p>Воздушные панельные фильтры могут быть изготовлены по индивидуальному заказу в любом размере</p>
                            <p><a href="wp-content/uploads/Визитка_3ДМ_новый.pdf" class="link-download" target="_blank">Скачать полное описание</a></p>

                            <p><button type="button" class="blue-btn top-btn order" data-toggle="modal" data-target="#modal-3">Заказать</button></p>
                        </div>
                    </div>
                    <div class="c-title">Краткое описание</div>
                    <div class="c-desc1"><p><strong>Применение:</strong> в качестве первой ступени очистки воздуха в системах вентиляции и кондиционирования.</p>
                        <p><strong>Преимущества:</strong></p>
						<ul>
						<li>Низкое начальное сопротивление.</li>
						<li>Сетка плоская.</li>
						<li>Пожаробезопасный материал.</li>
						</ul>
                        <p> <strong>Класс фильтрации: </strong>G2, G3, G4.</p>
						 <p> <strong>Корпус </strong> - металлический, пластиковый, картонный. </p>
						</div>
                </div>
                <div id="tab3" class="tab-pane fade in">
                    <h3 class="catalog-title">Фильтр воздушный складчатый</h3>
                    <div class="row catalog-item">
                        <div class="col-md-6 col-lg-6 c-img">
                            <img src="wp-content/uploads/2017/1/4.jpg">
                        </div>
                        <div class="col-md-6 col-lg-6 c-desc">
                            <p>Воздушные складчатые фильтры могут быть изготовлены по индивидуальному заказу в любом размере</p>
                            <p><a href="wp-content/uploads/Визитка_3ДМ_новый.pdf" class="link-download" target="_blank">Скачать полное описание</a></p>

                            <p><button type="button" class="blue-btn top-btn order" data-toggle="modal" data-target="#modal-3">Заказать</button></p>
                        </div>
                    </div>
                    <div class="c-title">Краткое описание</div>
                     <div class="c-desc1"><p><strong>Применение:</strong> в качестве первой ступени очистки воздуха в системах вентиляции и кондиционирования.</p>
                        <p><strong>Преимущества:</strong></p>
						<ul>
						<li>Большая площадь фильтрующего слоя по сравнению с панельными.</li>
						<li>Отличная аэродинамика.</li>
						<li>Увеличенный срок службы по сравнению с панельными.</li>
						<li>Экономичность в обслуживании и электропотреблении по сравнению с карманными.</li>
						<li>Эргономичная конструкция.</li>
						</ul>
                        <p> <strong>Класс фильтрации: </strong>G2, G3, G4, М5.</p>
						 <p> <strong>Корпус </strong> - металлический. </p>
						</div>
                </div>
				
				   <div id="tab4" class="tab-pane fade in">
                    <h3 class="catalog-title">Фильтр воздушный абсолютной очистки</h3>
                    <div class="row catalog-item">
                        <div class="col-md-6 col-lg-6 c-img">
                            <img src="wp-content/uploads/2017/1/7.jpg">
                        </div>
                        <div class="col-md-6 col-lg-6 c-desc">
                            <p>Воздушные абсолютной очистки фильтры могут быть изготовлены по индивидуальному заказу в любом размере</p>
                            <p><a href="wp-content/uploads/Визитка_3ДМ_новый.pdf" class="link-download" target="_blank">Скачать полное описание</a></p>

                            <p><button type="button" class="blue-btn top-btn order" data-toggle="modal" data-target="#modal-3">Заказать</button></p>
                        </div>
                    </div>
                    <div class="c-title">Краткое описание</div>
                     <div class="c-desc1"><p><strong>Применение:</strong> в качестве фильтра последней ступени очистки в многоступенчатых системах очистки приточной вентиляции; для подготовки и конечной очистки воздуха в системах кондиционирования для создания Чистых помещений и Чистых зон (микроэлектронной, микробиологической, пищевой промышленности), для очистки воздуха в вытяжных системах вентиляции от опасных микроорганизмов и радиоактивных аэрозолей в медицинских учреждениях, фармацевтической промышленности.</p>
                        <p><strong>Преимущества:</strong></p>
						<ul>
						<li>Абсолютная очистка воздуха.</li>
						<li>Низкое начальное сопротивление.</li>
						<li>Большая пылеемкость.</li>
						<li>Пожаробезопасный материал.</li>
						
						</ul>
                        <p> <strong>Класс фильтрации: </strong>H10-H14, U15, U16, U17.</p>
						 <p> <strong>Корпус </strong> - металлический, пластиковый. </p>
						</div>
                </div>	
				
				   <div id="tab5" class="tab-pane fade in">
                    <h3 class="catalog-title">Фильтр компактный</h3>
                    <div class="row catalog-item">
                        <div class="col-md-6 col-lg-6 c-img">
                            <img src="wp-content/uploads/2017/1/2.JPG">
                        </div>
                        <div class="col-md-6 col-lg-6 c-desc">
                            <p>Компактные фильтры могут быть изготовлены по индивидуальному заказу в любом размере</p>
                            <p><a href="wp-content/uploads/Визитка_3ДМ_новый.pdf" class="link-download" target="_blank">Скачать полное описание</a></p>

                            <p><button type="button" class="blue-btn top-btn order" data-toggle="modal" data-target="#modal-3">Заказать</button></p>
                        </div>
                    </div>
                    <div class="c-title">Краткое описание</div>
                     <div class="c-desc1"><p><strong>Применение:</strong> в качестве второй ступени очистки воздуха в системах вентиляции и кондиционирования.</p>
                        <p><strong>Преимущества:</strong></p>
						<ul>
						<li>Эффективен в тяжелых аэродинамических условиях.</li>
						<li> Обладает прочной и компактной конструкцией.</li>
						<li>Имеет высокие производительность и эффективность очистки.</li>
						<li>Экологически безопасен.</li>
						
						</ul>
                        <p> <strong>Класс фильтрации: </strong>М5, М6, F7, F8, F9.</p>
						 <p> <strong>Корпус </strong> - пластиковый. </p>
						</div>
                </div>
				
				 <div id="tab6" class="tab-pane fade in">
                    <h3 class="catalog-title">Фильтрующий материал</h3>
                    <div class="row catalog-item">
                        <div class="col-md-6 col-lg-6 c-img">
                            <img src="wp-content/uploads/2017/1/6.jpg">
                        </div>
                        <div class="col-md-6 col-lg-6 c-desc">
                            <p>Фильтрующие материалы могут быть изготовлены по индивидуальному заказу в любом размере</p>
                            <p><a href="wp-content/uploads/Визитка_3ДМ_новый.pdf" class="link-download" target="_blank">Скачать полное описание</a></p>

                            <p><button type="button" class="blue-btn top-btn order" data-toggle="modal" data-target="#modal-3">Заказать</button></p>
                        </div>
                    </div>
                    <div class="c-title">Краткое описание</div>
                     <div class="c-desc1"><p><strong>Применение:</strong> для очистки воздуха в системах приточно-вытяжной вентиляции и кондиционирования воздуха, для очистки от пыли и лакокрасочной аэрозоли в окрасочных камерах.</p>
                        <p>Изготовлен по европейскому стандарту EN 779:2012 на основе 100% полиэфира.</p>
						
						</div>
                </div>
				 <div id="tab7" class="tab-pane fade in">
                    <h3 class="catalog-title">Фильтр для камер окраски и лакировки</h3>
                    <div class="row catalog-item">
                        <div class="col-md-6 col-lg-6 c-img">
                            <img src="wp-content/uploads/2017/1/5.jpg">
                        </div>
                        <div class="col-md-6 col-lg-6 c-desc">
                            <p>Фильтры для камер окраски и лакировки могут быть изготовлены по индивидуальному заказу в любом размере</p>
                            <p><a href="wp-content/uploads/Визитка_3ДМ_новый.pdf" class="link-download" target="_blank">Скачать полное описание</a></p>

                            <p><button type="button" class="blue-btn top-btn order" data-toggle="modal" data-target="#modal-3">Заказать</button></p>
                        </div>
                    </div>
                    <div class="c-title">Краткое описание</div>
                     <div class="c-desc1"><p><strong>Применение:</strong> для очистки воздуха от лакокрасочной аэрозоли (класс фильтра G3) воздуха, для финишной очистки воздуха в покрасочных камерах (класс фильтра F5 (M5)).</p>
                        <p>Поставляются в рулонах и готовых комплектах для различных окрасочных камер.</p>
						<p>В ассортименте есть «потолочный», напольный, картонный гофрированный, бумажный фильтры.</p>						
						</div>
                </div>
					
            </div>
        </div>
    </div>
</div>
<div class="container-fluid working" id="working">
    <p class="p-title text-center">Схема работы с нами</p>
    <h2 class="border-blue text-center">Как мы работаем</h2>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/1.png">
                <div class="working-title text-center">Звонок/заявка</div>
                <div class="working-desc text-center"><p>Оставляйте заявку на сайте<br> или звоните<br> 8 017 <strong>388 22 66</strong></p></div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/2.png">
                <div class="working-title text-center">Коммерческое <br>предложение</div>
                <div class="working-desc text-center"><p>Получаете ответ с ценами,<br> актуальными сроками <br>производства</p></div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/3.png">
                <div class="working-title text-center">Договор/оплата</div>
                <div class="working-desc text-center"><p>Заключаем договор.
                    <br>Отдаем заказ в производство</p></div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/4.png">
                <div class="working-title text-center">Производство<br>/доставка</div>
                <div class="working-desc text-center"><p>Производство заказа в<br> течение от 1 до 13 дней.<br> Доставка по всей Беларуси</p></div>
            </div>
        </div>
        <div class="text-center"> <button type="submit" class="btn blue-btn" data-toggle="modal" data-target="#modal-3">Отправить заявку</button></div>
    </div>
</div>

<div class="block-4" id="clients">
    <div class="container-fluid product">
        <p class="p-title text-center white">Более 20 довольных VIP-клиентов</p>
        <h2 class="border-white text-center">Наши клиенты</h2>
    </div>
    <div class="container-fluid catalog-bg"></div>
    <div class="container block-catalog">
        <div class="row catalog">
            <div class="col-md-12 col-lg-12 block-klients1" >
            <ul class="nav nav-tabs slider-klients">
			<?php
				if (have_posts()) :
					query_posts('cat=2');
					while (have_posts()) : the_post();
			?>
					<li><a data-toggle="tab" href="#tab<?php the_ID();?>"><div class="link-klients"><?php the_post_thumbnail(); ?></div></a> </li>
			<?php 
					endwhile;
				endif;
				wp_reset_query();                
			?>		
            </ul>
			
      <div class="col-md-12 col-lg-12 tab-content block-klients">
  <?php
				if (have_posts()) :
					query_posts('cat=2');
					$counter = 0;
					while (have_posts()) : the_post();
	?>
                <div id="tab<?php the_ID();?>" class="tab-pane fade in <?php if(!$counter) echo 'active';?>">
                    <div class="row ">
                        <div class="col-md-6 col-lg-6 klient-desc">
                            <div class="klient-title">Клиент</div>
                            <div class="klient-name"><?php the_title(); ?></div>
                                <div class="klient-title">Поставленная продукция</div>
									<?php the_content(); ?>
                            <div class="zakaz">Сделать похожий заказ</div>
                            <button type="submit" data-toggle="modal" data-target="#modal-3" class="btn  blue-btn">Отправить заявку</button>
                        </div>
                        <div class="col-md-6 col-lg-6 klient-review">
                            <div class="klient-title">Отзыв</div>
							<?php $id = get_the_ID();?>
                            <a data-fancybox="galllery-review" href="<?php echo get_post_meta($id, 'otzyv', true); ?>" class="img-review">
                            <img  src="<?php echo get_post_meta($id, 'otzyv', true); ?>">
                            </a>
                        </div>
           </div >
        </div>
	<?php 
					$counter++;
					endwhile;
				endif;
				wp_reset_query();                
	?>		
    </div>
	

</div></div></div></div>

<div class="container-fluid setrificates" id="setrificates">
                <p class="p-title text-center">Подтверждение качества нашей продукции</p>
                <h2 class="border-blue text-center">Сертификаты На фильтры</h2>
                <div class="container slider-sertificate">
				  <?php
					if (have_posts()) :
						query_posts('cat=3');
						while (have_posts()) : the_post();
					?>
                    <div class="sertificate"><a data-fancybox="sertificate-galllery" href="<?php the_post_thumbnail_url(); ?> "><?php the_post_thumbnail(); ?></a></div>
					<?php 
						endwhile;
					endif;
					wp_reset_query();                
					?>	
                </div>
</div>


        <div class="container questions1">
            <div class="row questions">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 slide-block">
                    <div class="carousel slide questions-content1">

                                    <div class="form-title white text-center">ОСТАЛИСЬ ВОПРОСЫ?</div>
                        <div class="questions-desc white text-center">позвоните нам или задайте вопрос через форму обратной связи
                                    </div>
                                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/fittres.png">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 form-block">
                    <div class="form-block2">
                        <form class="form-horizontal" id="form_request">
                            <div class="form-title text-center">Задать вопрос через форму
                                обратной связи</div>
                            <div class="form-desc text-center">Задайте Ваш вопрос и наш менеджер свяжется с Вами в течение дня</div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="text" name="request_name2" id="request_name2" class="form-control" placeholder="Ваше имя (обязательное поле)">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="tel" class="form-control" name="request_phone2" id="request_phone2" placeholder="Ваш телефон (обязательное поле)">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="email" name="request_email2" id="request_email2" class="form-control" placeholder="Ваш e-mail">
                                </div>
                            </div>

                            <div class="form-group group-btn text-center">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn  blue-btn" onclick="order_request_no_modal2(this.form);return false;">Отправить заявку</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
		        <div class="container-fluid map">
            <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A2f4438542dc0646bd2b8c671ca1d0985f7b00ca324763c798145b43fa6f3ea38&amp;width=100%&amp;height=970&amp;lang=ru_RU&amp;scroll=true"></script>
        </div>

        <div class="container contacts-bottom" id="contacts">
            <div class="col-md-12 col-lg-12 title-header">
                <p class="p-title text-center">Как с нами связаться</p>
                <h2 class="border-blue text-center">Наши контакты</h2>
            </div>
            <div class="col-md-4 col-lg-4 three">
                <div class="klient-title">Адрес</div>
                <ul class="bottom-adress">
					<li class="name">ООО "3D Мануфактура"</li>
                    <li><strong>Офис:</strong> г. Минск,<br> пр. Партизанский 8/2</li>
					<li><strong>Производство:</strong> г. Минск,<br> пр. Партизанский 8/2</li>
                </ul>
            </div>
            <div class="col-md-4 col-lg-4 three">
                <div class="klient-title">Телефоны</div>
                <ul class="top-numbers">
                    <li class="velcom"><span>8 029</span> 133 23 56</li>
                    <li class="mts"><span>8 029</span> 233 23 56</li>
                    <li class="tel"><span>8 017</span> 388 22 66</li>
                    <li class="time">Пн-Пт, с 8.00 до 17.00</li>
                    <li class="mail"><a class="blue-color" href="mailto:sales@ifilters.by"><span class="mail-icon"></span>sales@ifilters.by</a></li>
                </ul>
            </div>
            <div class="col-md-4 col-lg-4 three">
                <div class="klient-title">Заказать обратный звонок</div>
                <form class="form-horizontal" id="form_footer">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="phone_name" id="phone_name" placeholder="Ваше имя (обязательное поле)">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <input type="tel" class="form-control" name="phone_phone" id="phone_phone" placeholder="Ваш телефон (обязательное поле)">
                        </div>
                    </div>
                    <div class="form-group group-btn text-center">
                        <div class="col-sm-12">
                            <button type="submit" class="btn  blue-btn" onclick="order_call_footer(this.form);return false;">Заказать звонок</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

<?php get_footer(); ?>